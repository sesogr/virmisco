<?php
	namespace sednasoft\virmisco\readlayer\valueobject;
	/**
	 * Do not edit. This class was automatically generated by codegen/read-layer/generator.php on
	 * 2016-01-13T22:53:08+01:00
	 */
	class PhotomicrographMicroscope {
		/** @var null|string */
		protected $camera_mount_adapter_article_or_serial_number = null;
		/** @var double|null */
		protected $camera_mount_adapter_magnification = null;
		/** @var null|string */
		protected $camera_mount_adapter_maker = null;
		/** @var null|string */
		protected $camera_mount_adapter_name = null;
		/** @var null|string */
		protected $condenser_article_or_serial_number = null;
		/** @var null|string */
		protected $condenser_maker = null;
		/** @var null|string */
		protected $condenser_name = null;
		/** @var null|string */
		protected $condenser_turret_prism_article_or_serial_number = null;
		/** @var null|string */
		protected $condenser_turret_prism_maker = null;
		/** @var null|string */
		protected $condenser_turret_prism_name = null;
		/** @var null|string */
		protected $dic_turret_prism_article_or_serial_number = null;
		/** @var null|string */
		protected $dic_turret_prism_maker = null;
		/** @var null|string */
		protected $dic_turret_prism_name = null;
		/** @var null|string */
		protected $magnification_changer_article_or_serial_number = null;
		/** @var null|string */
		protected $magnification_changer_maker = null;
		/** @var null|string */
		protected $magnification_changer_name = null;
		/** @var null|string */
		protected $nosepiece_objective_article_or_serial_number = null;
		/** @var double|null */
		protected $nosepiece_objective_magnification = null;
		/** @var null|string */
		protected $nosepiece_objective_maker = null;
		/** @var null|string */
		protected $nosepiece_objective_name = null;
		/** @var double|null */
		protected $nosepiece_objective_numerical_aperture = null;
		/** @var null|string */
		protected $nosepiece_objective_type = null;
		/** @var null|string */
		protected $ports_article_or_serial_number = null;
		/** @var null|string */
		protected $ports_maker = null;
		/** @var null|string */
		protected $ports_name = null;
		/** @var null|string */
		protected $stand_article_or_serial_number = null;
		/** @var null|string */
		protected $stand_maker = null;
		/** @var null|string */
		protected $stand_name = null;

		/**
		 * @param null|string $standMaker
		 * @param null|string $standName
		 * @param null|string $standArticleOrSerialNumber
		 * @param null|string $condenserMaker
		 * @param null|string $condenserName
		 * @param null|string $condenserArticleOrSerialNumber
		 * @param null|string $condenserTurretPrismMaker
		 * @param null|string $condenserTurretPrismName
		 * @param null|string $condenserTurretPrismArticleOrSerialNumber
		 * @param null|string $nosepieceObjectiveMaker
		 * @param null|string $nosepieceObjectiveName
		 * @param null|string $nosepieceObjectiveArticleOrSerialNumber
		 * @param null|string $nosepieceObjectiveType
		 * @param double|null $nosepieceObjectiveNumericalAperture
		 * @param double|null $nosepieceObjectiveMagnification
		 * @param null|string $dicTurretPrismMaker
		 * @param null|string $dicTurretPrismName
		 * @param null|string $dicTurretPrismArticleOrSerialNumber
		 * @param null|string $magnificationChangerMaker
		 * @param null|string $magnificationChangerName
		 * @param null|string $magnificationChangerArticleOrSerialNumber
		 * @param null|string $portsMaker
		 * @param null|string $portsName
		 * @param null|string $portsArticleOrSerialNumber
		 * @param null|string $cameraMountAdapterMaker
		 * @param null|string $cameraMountAdapterName
		 * @param double|null $cameraMountAdapterMagnification
		 * @param null|string $cameraMountAdapterArticleOrSerialNumber
		 */
		public function __construct ($standMaker = null, $standName = null, $standArticleOrSerialNumber = null, $condenserMaker = null, $condenserName = null, $condenserArticleOrSerialNumber = null, $condenserTurretPrismMaker = null, $condenserTurretPrismName = null, $condenserTurretPrismArticleOrSerialNumber = null, $nosepieceObjectiveMaker = null, $nosepieceObjectiveName = null, $nosepieceObjectiveArticleOrSerialNumber = null, $nosepieceObjectiveType = null, $nosepieceObjectiveNumericalAperture = null, $nosepieceObjectiveMagnification = null, $dicTurretPrismMaker = null, $dicTurretPrismName = null, $dicTurretPrismArticleOrSerialNumber = null, $magnificationChangerMaker = null, $magnificationChangerName = null, $magnificationChangerArticleOrSerialNumber = null, $portsMaker = null, $portsName = null, $portsArticleOrSerialNumber = null, $cameraMountAdapterMaker = null, $cameraMountAdapterName = null, $cameraMountAdapterMagnification = null, $cameraMountAdapterArticleOrSerialNumber = null) {
			$this->stand_maker = $standMaker;
			$this->stand_name = $standName;
			$this->stand_article_or_serial_number = $standArticleOrSerialNumber;
			$this->condenser_maker = $condenserMaker;
			$this->condenser_name = $condenserName;
			$this->condenser_article_or_serial_number = $condenserArticleOrSerialNumber;
			$this->condenser_turret_prism_maker = $condenserTurretPrismMaker;
			$this->condenser_turret_prism_name = $condenserTurretPrismName;
			$this->condenser_turret_prism_article_or_serial_number = $condenserTurretPrismArticleOrSerialNumber;
			$this->nosepiece_objective_maker = $nosepieceObjectiveMaker;
			$this->nosepiece_objective_name = $nosepieceObjectiveName;
			$this->nosepiece_objective_article_or_serial_number = $nosepieceObjectiveArticleOrSerialNumber;
			$this->nosepiece_objective_type = $nosepieceObjectiveType;
			$this->nosepiece_objective_numerical_aperture = $nosepieceObjectiveNumericalAperture;
			$this->nosepiece_objective_magnification = $nosepieceObjectiveMagnification;
			$this->dic_turret_prism_maker = $dicTurretPrismMaker;
			$this->dic_turret_prism_name = $dicTurretPrismName;
			$this->dic_turret_prism_article_or_serial_number = $dicTurretPrismArticleOrSerialNumber;
			$this->magnification_changer_maker = $magnificationChangerMaker;
			$this->magnification_changer_name = $magnificationChangerName;
			$this->magnification_changer_article_or_serial_number = $magnificationChangerArticleOrSerialNumber;
			$this->ports_maker = $portsMaker;
			$this->ports_name = $portsName;
			$this->ports_article_or_serial_number = $portsArticleOrSerialNumber;
			$this->camera_mount_adapter_maker = $cameraMountAdapterMaker;
			$this->camera_mount_adapter_name = $cameraMountAdapterName;
			$this->camera_mount_adapter_magnification = $cameraMountAdapterMagnification;
			$this->camera_mount_adapter_article_or_serial_number = $cameraMountAdapterArticleOrSerialNumber;
		}

		/**
		 * @return null|string
		 */
		public function getCameraMountAdapterArticleOrSerialNumber () {
			return $this->camera_mount_adapter_article_or_serial_number;
		}

		/**
		 * @return double|null
		 */
		public function getCameraMountAdapterMagnification () {
			return $this->camera_mount_adapter_magnification;
		}

		/**
		 * @return null|string
		 */
		public function getCameraMountAdapterMaker () {
			return $this->camera_mount_adapter_maker;
		}

		/**
		 * @return null|string
		 */
		public function getCameraMountAdapterName () {
			return $this->camera_mount_adapter_name;
		}

		/**
		 * @return null|string
		 */
		public function getCondenserArticleOrSerialNumber () {
			return $this->condenser_article_or_serial_number;
		}

		/**
		 * @return null|string
		 */
		public function getCondenserMaker () {
			return $this->condenser_maker;
		}

		/**
		 * @return null|string
		 */
		public function getCondenserName () {
			return $this->condenser_name;
		}

		/**
		 * @return null|string
		 */
		public function getCondenserTurretPrismArticleOrSerialNumber () {
			return $this->condenser_turret_prism_article_or_serial_number;
		}

		/**
		 * @return null|string
		 */
		public function getCondenserTurretPrismMaker () {
			return $this->condenser_turret_prism_maker;
		}

		/**
		 * @return null|string
		 */
		public function getCondenserTurretPrismName () {
			return $this->condenser_turret_prism_name;
		}

		/**
		 * @return null|string
		 */
		public function getDicTurretPrismArticleOrSerialNumber () {
			return $this->dic_turret_prism_article_or_serial_number;
		}

		/**
		 * @return null|string
		 */
		public function getDicTurretPrismMaker () {
			return $this->dic_turret_prism_maker;
		}

		/**
		 * @return null|string
		 */
		public function getDicTurretPrismName () {
			return $this->dic_turret_prism_name;
		}

		/**
		 * @return null|string
		 */
		public function getMagnificationChangerArticleOrSerialNumber () {
			return $this->magnification_changer_article_or_serial_number;
		}

		/**
		 * @return null|string
		 */
		public function getMagnificationChangerMaker () {
			return $this->magnification_changer_maker;
		}

		/**
		 * @return null|string
		 */
		public function getMagnificationChangerName () {
			return $this->magnification_changer_name;
		}

		/**
		 * @return null|string
		 */
		public function getNosepieceObjectiveArticleOrSerialNumber () {
			return $this->nosepiece_objective_article_or_serial_number;
		}

		/**
		 * @return double|null
		 */
		public function getNosepieceObjectiveMagnification () {
			return $this->nosepiece_objective_magnification;
		}

		/**
		 * @return null|string
		 */
		public function getNosepieceObjectiveMaker () {
			return $this->nosepiece_objective_maker;
		}

		/**
		 * @return null|string
		 */
		public function getNosepieceObjectiveName () {
			return $this->nosepiece_objective_name;
		}

		/**
		 * @return double|null
		 */
		public function getNosepieceObjectiveNumericalAperture () {
			return $this->nosepiece_objective_numerical_aperture;
		}

		/**
		 * @return null|string
		 */
		public function getNosepieceObjectiveType () {
			return $this->nosepiece_objective_type;
		}

		/**
		 * @return null|string
		 */
		public function getPortsArticleOrSerialNumber () {
			return $this->ports_article_or_serial_number;
		}

		/**
		 * @return null|string
		 */
		public function getPortsMaker () {
			return $this->ports_maker;
		}

		/**
		 * @return null|string
		 */
		public function getPortsName () {
			return $this->ports_name;
		}

		/**
		 * @return null|string
		 */
		public function getStandArticleOrSerialNumber () {
			return $this->stand_article_or_serial_number;
		}

		/**
		 * @return null|string
		 */
		public function getStandMaker () {
			return $this->stand_maker;
		}

		/**
		 * @return null|string
		 */
		public function getStandName () {
			return $this->stand_name;
		}
	}
