##
# @author SednaSoft A. Schaffhirt & A. Wünsche GbR <info@sedna-soft.de>
# @version 2016-08-16 (date of last modification)
# @since 2015-09-15 (date of creation)
# @license https://creativecommons.org/publicdomain/zero/1.0/ CC0-1.0
##
DROP TABLE IF EXISTS `specimen_carrier`;
DROP TABLE IF EXISTS `scientific_name`;
DROP TABLE IF EXISTS `photomicrograph`;
DROP TABLE IF EXISTS `organism`;
DROP TABLE IF EXISTS `gathering`;
DROP TABLE IF EXISTS `focal_plane_image`;
DROP TABLE IF EXISTS `carrier_scan`;

CREATE TABLE `carrier_scan` (
	`id` CHAR(36) NOT NULL,
	`specimen_carrier_id` CHAR(36) NOT NULL,
	`real_path` VARCHAR(255) NOT NULL,
	`uri` VARCHAR(255) DEFAULT NULL,
	`creation_time` VARCHAR(255) DEFAULT NULL,
	`modification_time` VARCHAR(255) DEFAULT NULL,
	`_created` DECIMAL(17, 6) DEFAULT NULL,
	`_modified` DECIMAL(17, 6) DEFAULT NULL,
	`_deleted` DECIMAL(17, 6) DEFAULT NULL,
	PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = `utf8`;

CREATE TABLE `focal_plane_image` (
	`id` CHAR(36) NOT NULL,
	`photomicrograph_id` CHAR(36) NOT NULL,
	`focus_position` DOUBLE UNSIGNED DEFAULT NULL,
	`file__real_path` VARCHAR(255) DEFAULT NULL,
	`file__uri` VARCHAR(255) DEFAULT NULL,
	`file__creation_time` VARCHAR(255) DEFAULT NULL,
	`file__modification_time` VARCHAR(255) DEFAULT NULL,
	`presentation_uri` VARCHAR(255) DEFAULT NULL,
	`exposure_settings__duration` DOUBLE UNSIGNED DEFAULT NULL,
	`exposure_settings__gain` DOUBLE UNSIGNED DEFAULT NULL,
	`histogram_settings__gamma` DOUBLE UNSIGNED DEFAULT NULL,
	`histogram_settings__black_clip` TINYINT(3) UNSIGNED DEFAULT NULL,
	`histogram_settings__white_clip` TINYINT(3) UNSIGNED DEFAULT NULL,
	`post_processing_settings__shading` SET('true') DEFAULT NULL,
	`post_processing_settings__sharpening` SET('true') DEFAULT NULL,
	`_created` DECIMAL(17, 6) DEFAULT NULL,
	`_modified` DECIMAL(17, 6) DEFAULT NULL,
	`_deleted` DECIMAL(17, 6) DEFAULT NULL,
	PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = `utf8`;

CREATE TABLE `gathering` (
	`id` CHAR(36) NOT NULL,
	`journal_number` VARCHAR(255) NOT NULL,
	`sampling_date__after` VARCHAR(255) DEFAULT NULL,
	`sampling_date__before` VARCHAR(255) DEFAULT NULL,
	`agent__person` VARCHAR(255) DEFAULT NULL,
	`agent__organization` VARCHAR(255) DEFAULT NULL,
	`location__country` VARCHAR(255) DEFAULT NULL,
	`location__province` VARCHAR(255) DEFAULT NULL,
	`location__region` VARCHAR(255) DEFAULT NULL,
	`location__place` VARCHAR(255) DEFAULT NULL,
	`remarks` TEXT,
	`_created` DECIMAL(17, 6) DEFAULT NULL,
	`_modified` DECIMAL(17, 6) DEFAULT NULL,
	`_deleted` DECIMAL(17, 6) DEFAULT NULL,
	PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = `utf8`;

CREATE TABLE `organism` (
	`id` CHAR(36) NOT NULL,
	`specimen_carrier_id` CHAR(36) NOT NULL,
	`sequence_number` VARCHAR(255) NOT NULL DEFAULT '',
	`higher_taxa` TEXT,
	`identification__identifier` VARCHAR(255) DEFAULT NULL,
	`identification__qualifier` VARCHAR(255) DEFAULT NULL,
	`type_designation__type_status` VARCHAR(255) DEFAULT NULL,
	`phase_or_stage` VARCHAR(255) DEFAULT NULL,
	`sex` VARCHAR(255) DEFAULT NULL,
	`remarks` TEXT,
	`_created` DECIMAL(17, 6) DEFAULT NULL,
	`_modified` DECIMAL(17, 6) DEFAULT NULL,
	`_deleted` DECIMAL(17, 6) DEFAULT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY (`specimen_carrier_id`, `sequence_number`)
) ENGINE = InnoDB DEFAULT CHARSET = `utf8`;

CREATE TABLE `photomicrograph` (
	`id` CHAR(36) NOT NULL,
	`organism_id` CHAR(36) NOT NULL,
	`title` VARCHAR(255) DEFAULT NULL,
	`detail_of__photomicrograph_id` CHAR(36) DEFAULT NULL,
	`detail_of__hotspot__x` INT(10) UNSIGNED DEFAULT NULL,
	`detail_of__hotspot__y` INT(10) UNSIGNED DEFAULT NULL,
	`creator_capturing` VARCHAR(255) DEFAULT NULL,
	`creator_processing` VARCHAR(255) DEFAULT NULL,
	`file__real_path` VARCHAR(255) DEFAULT NULL,
	`file__uri` VARCHAR(255) DEFAULT NULL,
	`file__creation_time` VARCHAR(255) DEFAULT NULL,
	`file__modification_time` VARCHAR(255) DEFAULT NULL,
	`presentation_uri` VARCHAR(255) DEFAULT NULL,
	`digitization_data__width` INT(10) UNSIGNED DEFAULT NULL,
	`digitization_data__height` INT(10) UNSIGNED DEFAULT NULL,
	`digitization_data__color_depth` TINYINT(3) UNSIGNED DEFAULT NULL,
	`digitization_data__reproduction_scale_horizontal` DOUBLE UNSIGNED DEFAULT NULL,
	`digitization_data__reproduction_scale_vertical` DOUBLE UNSIGNED DEFAULT NULL,
	`camera__camera_maker` VARCHAR(255) DEFAULT NULL,
	`camera__camera_name` VARCHAR(255) DEFAULT NULL,
	`camera__camera_article_or_serial_number` VARCHAR(255) DEFAULT NULL,
	`camera__sensor_maker` VARCHAR(255) DEFAULT NULL,
	`camera__sensor_name` VARCHAR(255) DEFAULT NULL,
	`camera__sensor_article_or_serial_number` VARCHAR(255) DEFAULT NULL,
	`camera__optical_format` VARCHAR(255) DEFAULT NULL,
	`camera__capture_format` VARCHAR(255) DEFAULT NULL,
	`camera__chip_width` DOUBLE UNSIGNED DEFAULT NULL,
	`camera__chip_height` DOUBLE UNSIGNED DEFAULT NULL,
	`camera__pixel_width` DOUBLE UNSIGNED DEFAULT NULL,
	`camera__pixel_height` DOUBLE UNSIGNED DEFAULT NULL,
	`camera__active_pixels_hor` INT(10) UNSIGNED DEFAULT NULL,
	`camera__active_pixels_ver` INT(10) UNSIGNED DEFAULT NULL,
	`camera__color_filter_array` VARCHAR(255) DEFAULT NULL,
	`camera__protective_color_filter` VARCHAR(255) DEFAULT NULL,
	`camera__adc_resolution` VARCHAR(255) DEFAULT NULL,
	`camera__dynamic_range` DOUBLE UNSIGNED DEFAULT NULL,
	`camera__snr_max` DOUBLE UNSIGNED DEFAULT NULL,
	`camera__readout_noise` VARCHAR(255) DEFAULT NULL,
	`microscope__stand_maker` VARCHAR(255) DEFAULT NULL,
	`microscope__stand_name` VARCHAR(255) DEFAULT NULL,
	`microscope__stand_article_or_serial_number` VARCHAR(255) DEFAULT NULL,
	`microscope__condenser_maker` VARCHAR(255) DEFAULT NULL,
	`microscope__condenser_name` VARCHAR(255) DEFAULT NULL,
	`microscope__condenser_article_or_serial_number` VARCHAR(255) DEFAULT NULL,
	`microscope__condenser_turret_prism_maker` VARCHAR(255) DEFAULT NULL,
	`microscope__condenser_turret_prism_name` VARCHAR(255) DEFAULT NULL,
	`microscope__condenser_turret_prism_article_or_serial_number` VARCHAR(255) DEFAULT NULL,
	`microscope__nosepiece_objective_maker` VARCHAR(255) DEFAULT NULL,
	`microscope__nosepiece_objective_name` VARCHAR(255) DEFAULT NULL,
	`microscope__nosepiece_objective_article_or_serial_number` VARCHAR(255) DEFAULT NULL,
	`microscope__nosepiece_objective_type` VARCHAR(255) DEFAULT NULL,
	`microscope__nosepiece_objective_numerical_aperture` DOUBLE UNSIGNED DEFAULT NULL,
	`microscope__nosepiece_objective_magnification` DOUBLE UNSIGNED DEFAULT NULL,
	`microscope__dic_turret_prism_maker` VARCHAR(255) DEFAULT NULL,
	`microscope__dic_turret_prism_name` VARCHAR(255) DEFAULT NULL,
	`microscope__dic_turret_prism_article_or_serial_number` VARCHAR(255) DEFAULT NULL,
	`microscope__magnification_changer_maker` VARCHAR(255) DEFAULT NULL,
	`microscope__magnification_changer_name` VARCHAR(255) DEFAULT NULL,
	`microscope__magnification_changer_article_or_serial_number` VARCHAR(255) DEFAULT NULL,
	`microscope__ports_maker` VARCHAR(255) DEFAULT NULL,
	`microscope__ports_name` VARCHAR(255) DEFAULT NULL,
	`microscope__ports_article_or_serial_number` VARCHAR(255) DEFAULT NULL,
	`microscope__camera_mount_adapter_maker` VARCHAR(255) DEFAULT NULL,
	`microscope__camera_mount_adapter_name` VARCHAR(255) DEFAULT NULL,
	`microscope__camera_mount_adapter_magnification` DOUBLE UNSIGNED DEFAULT NULL,
	`microscope__camera_mount_adapter_article_or_serial_number` VARCHAR(255) DEFAULT NULL,
	`microscope_settings__contrast_method` VARCHAR(255) DEFAULT NULL,
	`microscope_settings__dic_prism_position` DOUBLE DEFAULT NULL,
	`microscope_settings__aperture_diaphragm_opening` DOUBLE UNSIGNED DEFAULT NULL,
	`microscope_settings__field_diaphragm_opening` DOUBLE UNSIGNED DEFAULT NULL,
	`microscope_settings__magnification_changer_magnification` DOUBLE UNSIGNED DEFAULT NULL,
	`_created` DECIMAL(17, 6) DEFAULT NULL,
	`_modified` DECIMAL(17, 6) DEFAULT NULL,
	`_deleted` DECIMAL(17, 6) DEFAULT NULL,
	PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = `utf8`;

CREATE TABLE `scientific_name` (
	`id` CHAR(36) NOT NULL,
	`specimen_carrier_id` CHAR(36) NOT NULL,
	`sequence_number` VARCHAR(255) NOT NULL DEFAULT '',
	`genus` VARCHAR(255) NOT NULL DEFAULT '',
	`subgenus` VARCHAR(255) DEFAULT NULL,
	`specific_epithet` VARCHAR(255) NOT NULL DEFAULT '',
	`infraspecific_epithet` VARCHAR(255) DEFAULT NULL,
	`authorship` VARCHAR(255) DEFAULT NULL,
	`year` SMALLINT(5) UNSIGNED DEFAULT NULL,
	`is_mentioned` SET('true') NOT NULL DEFAULT '',
	`is_parenthesized` SET('true') NOT NULL DEFAULT '',
	`is_valid` SET('true') NOT NULL DEFAULT '',
	`_created` DECIMAL(17, 6) DEFAULT NULL,
	`_modified` DECIMAL(17, 6) DEFAULT NULL,
	`_deleted` DECIMAL(17, 6) DEFAULT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY (`specimen_carrier_id`, `sequence_number`, `genus`, `specific_epithet`, `year`)
) ENGINE = InnoDB DEFAULT CHARSET = `utf8`;

CREATE TABLE `specimen_carrier` (
	`id` CHAR(36) NOT NULL,
	`gathering_id` CHAR(36) NOT NULL,
	`carrier_number` VARCHAR(255) DEFAULT NULL,
	`preparation_type` VARCHAR(255) DEFAULT NULL,
	`owner` VARCHAR(255) DEFAULT NULL,
	`previous_collection` VARCHAR(255) DEFAULT NULL,
	`label_transcript` TEXT,
	`_created` DECIMAL(17, 6) DEFAULT NULL,
	`_modified` DECIMAL(17, 6) DEFAULT NULL,
	`_deleted` DECIMAL(17, 6) DEFAULT NULL,
	PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = `utf8`;
