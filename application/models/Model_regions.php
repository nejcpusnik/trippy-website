<?php
	
	/*
	*	Model for Regions
	*/
	
    class Model_regions extends MY_Model{

        const DB_TABLE = "Regions";
        const DB_TABLE_PK = "idRegions";

        public $idRegions;
        public $regionName;
		public $regionDescription;
    }