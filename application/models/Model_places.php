<?php
	
	/*
	*	Model for Places
	*/
	
    class Model_places extends MY_Model{

    const DB_TABLE = "Places";
    const DB_TABLE_PK = "idPlaces";

        public $idPlaces;
        public $placeName;
		public $googleName;
        public $Regions_idRegions;
    }