<?php
    /**
     * @author SednaSoft A. Schaffhirt & A. Wünsche GbR <info@sedna-soft.de>
     * @version 2016-08-16 (date of last modification)
     * @since 2015-08-12 (date of creation)
     * @license https://creativecommons.org/publicdomain/zero/1.0/ CC0-1.0
     */

    /**
     * @param PDOStatement $statement
     * @param array $photomicrographs
     */
    function populatePhotomicrographList(PDOStatement $statement, &$photomicrographs)
    {
        foreach ($statement as $photomicrograph) {
            if (!isset($photomicrographs[$photomicrograph['p.id']])) {
                $photomicrographs[$photomicrograph['p.id']] = $photomicrograph;
                $photomicrographs[$photomicrograph['p.id']]['@hits'] = 0;
            }
            $photomicrographs[$photomicrograph['p.id']]['@hits']++;
        }
    }

    /**
     * @param PDO $connection
     * @return PDOStatement[]
     */
    function prepareFullTextSearchStatements(PDO $connection)
    {
        $fullTextSearches = [];
        $fullTextSearches['gathering'] = $connection->prepare(
        /** @lang MySQL */
            <<<'EOD'
SELECT *
FROM `photomicrograph` `p`
JOIN `organism` `o` ON `o`.`id` = `p`.`organism_id`
JOIN `specimen_carrier` `sc` ON `sc`.`id` = `o`.`specimen_carrier_id`
JOIN `gathering` `g` ON `g`.`id` = `sc`.`gathering_id`
WHERE `g`.`journal_number` = :text
OR concat(' ', `g`.`agent__organization`, ' ') LIKE concat('% ', :text, ' %')
OR concat(' ', `g`.`agent__person`, ' ') LIKE concat('% ', :text, ' %')
OR `g`.`location__country` = :text
OR concat(' ', `g`.`location__province`, ' ') LIKE concat('% ', :text, ' %')
OR concat(' ', `g`.`location__region`, ' ') LIKE concat('% ', :text, ' %')
OR concat(' ', `g`.`location__place`, ' ') LIKE concat('% ', :text, ' %')
OR concat(' ', `g`.`remarks`, ' ') LIKE concat('% ', :text, ' %')
OR `g`.`sampling_date__after` <= :text AND `g`.`sampling_date__before` > :text
EOD
        );
        $fullTextSearches['organism'] = $connection->prepare(
        /** @lang MySQL */
            <<<'EOD'
SELECT *
FROM `photomicrograph` `p`
JOIN `organism` `o` ON `o`.`id` = `p`.`organism_id`
WHERE `o`.`sequence_number` = :text
OR concat(' ', `o`.`higher_taxa`, ' ') LIKE concat('% ', :text, ' %')
OR concat(' ', `o`.`identification__identifier`, ' ') LIKE concat('% ', :text, ' %')
OR concat(' ', `o`.`phase_or_stage`, ' ') LIKE concat('% ', :text, ' %')
OR `o`.`type_designation__type_status` = :text
OR `o`.`sex` = :text
OR concat(' ', `o`.`remarks`, ' ') LIKE concat('% ', :text, ' %')
EOD
        );
        $fullTextSearches['photomicrograph'] = $connection->prepare(
        /** @lang MySQL */
            <<<'EOD'
SELECT *
FROM `photomicrograph` `p`
WHERE length(:text) > 5 AND `p`.`id` LIKE concat(:text, '%')
OR concat(' ', replace(`p`.`title`, '_', ' '), ' ') LIKE concat('% ', :text, ' %')
EOD
        );
        $fullTextSearches['scientific_name'] = $connection->prepare(
        /** @lang MySQL */
            <<<'EOD'
SELECT *
FROM `photomicrograph` `p`
JOIN `organism` `o` ON `o`.`id` = `p`.`organism_id`
LEFT JOIN `scientific_name` `mn` ON `mn`.`specimen_carrier_id` = `o`.`specimen_carrier_id` AND `mn`.`sequence_number` = `o`.`sequence_number` AND `mn`.`is_mentioned` = 'true'
LEFT JOIN `scientific_name` `vn` ON `vn`.`specimen_carrier_id` = `o`.`specimen_carrier_id` AND `vn`.`sequence_number` = `o`.`sequence_number` AND `vn`.`is_valid` = 'true'
LEFT JOIN `scientific_name` `sn` ON `sn`.`specimen_carrier_id` = `o`.`specimen_carrier_id` AND `sn`.`sequence_number` = `o`.`sequence_number` AND !`sn`.`is_valid` AND !`sn`.`is_mentioned`
WHERE (`mn`.`genus` = :text OR `mn`.`specific_epithet` = :text OR `vn`.`genus` = :text OR `vn`.`specific_epithet` = :text OR `sn`.`genus` = :text OR `sn`.`specific_epithet` = :text)
EOD
        );
        $fullTextSearches['specimen_carrier'] = $connection->prepare(
        /** @lang MySQL */
            <<<'EOD'
SELECT *
FROM `photomicrograph` `p`
JOIN `organism` `o` ON `o`.`id` = `p`.`organism_id`
JOIN `specimen_carrier` `sc` ON `sc`.`id` = `o`.`specimen_carrier_id`
WHERE `sc`.`carrier_number` = :text
OR `sc`.`preparation_type` = :text
OR concat(' ', `sc`.`owner`, ' ') LIKE concat('% ', :text, ' %')
OR concat(' ', `sc`.`previous_collection`, ' ') LIKE concat('% ', :text, ' %')
OR concat(' ', `sc`.`label_transcript`, ' ') LIKE concat('% ', :text, ' %')
EOD
        );

        return $fullTextSearches;
    }

    /**
     * TODO unused
     */
    function flatten(array $array, $minCount, $keySeparator)
    {
        if (count($array) < $minCount) {
            $result = [];
            $containsArray = false;
            foreach ($array as $k1 => $v1) {
                if (is_array($v1)) {
                    foreach ($v1 as $k2 => $v2) {
                        if (is_array($v1)) {
                            $result[implode($keySeparator, [$k1, $k2])] = $v2;
                        }
                    }
                    $containsArray = true;
                } else {
                    $result[$k1] = $v1;
                }
            }
            $array = $containsArray ? flatten($result, $minCount, $keySeparator) : $result;
        }
        $result = [];
        foreach ($array as $k => $v) {
            $k = preg_replace('<(^|\Q' . $keySeparator . '\E)(\Q' . $keySeparator . '\E)+>', '\1', $k);
            $result[$k] = is_array($v) ? flatten($v, $minCount, $keySeparator) : $v;
        }

        return $result;
    }

    function showDependentFieldsets(array $array, $fieldName)
    { ?><?php foreach ($array as $k1 => $v1): if (is_array($v1)): if ($k1): ?>
        <fieldset class="collapsed">
            <legend>
                <label>
                    <input type="checkbox" checked />
                    <span><?php echo htmlspecialchars($k1) ?></span>
                </label>
            </legend>
            <section><?php showDependentFieldsets($v1, $fieldName) ?></section>
        </fieldset>
    <?php else: showDependentFieldsets($v1, $fieldName); endif;
    else: ?>
        <div>
            <label>
                <input type="checkbox"
                    name="<?php echo htmlspecialchars($fieldName) ?>[]"
                    value="<?php echo htmlspecialchars($v1) ?>"
                    checked />
                <span><?php echo htmlspecialchars($k1) ?></span>
            </label>
        </div>
    <?php endif; endforeach ?><?php }
