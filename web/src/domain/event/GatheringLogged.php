<?php
    /**
     * @author SednaSoft A. Schaffhirt & A. Wünsche GbR <info@sedna-soft.de>
     * @version 2015-09-08 (date of last modification)
     * @since 2015-07-27 (date of creation)
     * @license https://creativecommons.org/publicdomain/zero/1.0/ CC0-1.0
     */

    namespace sednasoft\virmisco\domain\event;

    use sednasoft\virmisco\singiere\AbstractEvent;

    class GatheringLogged extends AbstractEvent
    {
        /** @var string */
        private $agentOrganization;
        /** @var string */
        private $agentPerson;
        /** @var string */
        private $journalNumber;
        /** @var string */
        private $locationCountry;
        /** @var string */
        private $locationPlace;
        /** @var string */
        private $locationProvince;
        /** @var string */
        private $locationRegion;
        /** @var string */
        private $remarks;
        /** @var string */
        private $samplingDateAfter;
        /** @var string */
        private $samplingDateBefore;

        /**
         * Creates a new instance. Subclasses should add more parameters for payload.
         * @param string $journalNumber
         * @param string $samplingDateAfter
         * @param string $samplingDateBefore
         * @param string $agentPerson
         * @param string $agentOrganization
         * @param string $locationCountry
         * @param string $locationProvince
         * @param string $locationRegion
         * @param string $locationPlace
         * @param string $remarks
         */
        public function __construct(
            $journalNumber,
            $samplingDateAfter,
            $samplingDateBefore,
            $agentPerson,
            $agentOrganization,
            $locationCountry,
            $locationProvince,
            $locationRegion,
            $locationPlace,
            $remarks
        ) {
            parent::__construct();
            $this->journalNumber = $journalNumber;
            $this->samplingDateAfter = $samplingDateAfter;
            $this->samplingDateBefore = $samplingDateBefore;
            $this->agentPerson = $agentPerson;
            $this->agentOrganization = $agentOrganization;
            $this->locationCountry = $locationCountry;
            $this->locationProvince = $locationProvince;
            $this->locationRegion = $locationRegion;
            $this->locationPlace = $locationPlace;
            $this->remarks = $remarks;
        }

        /**
         * @return string
         */
        public function getAgentOrganization()
        {
            return $this->agentOrganization;
        }

        /**
         * @return string
         */
        public function getAgentPerson()
        {
            return $this->agentPerson;
        }

        /**
         * @return string
         */
        public function getJournalNumber()
        {
            return $this->journalNumber;
        }

        /**
         * @return string
         */
        public function getLocationCountry()
        {
            return $this->locationCountry;
        }

        /**
         * @return string
         */
        public function getLocationPlace()
        {
            return $this->locationPlace;
        }

        /**
         * @return string
         */
        public function getLocationProvince()
        {
            return $this->locationProvince;
        }

        /**
         * @return string
         */
        public function getLocationRegion()
        {
            return $this->locationRegion;
        }

        /**
         * @return string
         */
        public function getRemarks()
        {
            return $this->remarks;
        }

        /**
         * @return string
         */
        public function getSamplingDateAfter()
        {
            return $this->samplingDateAfter;
        }

        /**
         * @return string
         */
        public function getSamplingDateBefore()
        {
            return $this->samplingDateBefore;
        }
    }
