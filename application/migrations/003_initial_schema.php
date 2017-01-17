<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Initial_Schema extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'idUsers' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'email' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '45',
                        ),
                        'username' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '45',
                        ),
						'password' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ),
						'type' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                        )
						
                ));
                $this->dbforge->add_key('idUsers', TRUE);
                $this->dbforge->create_table('Users1');
			
				$this->dbforge->add_field(array(
                        'idPlaces' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'placeName' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '45',
                        ),
                        'googleName' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ),
						'Regions_idRegions' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                        )
                ));
                $this->dbforge->add_key('idPlaces', TRUE);
                $this->dbforge->create_table('Places1');
				
				
				$this->dbforge->add_field(array(
                        'idRegions' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'regionName' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '45',
                        ),
                        'regionDescription' => array(
                                'type' => 'TEXT',
                        )
                ));
                $this->dbforge->add_key('idRegions', TRUE);
                $this->dbforge->create_table('Regions1');
				
        }

        public function down()
        {
                $this->dbforge->drop_table('Users1');
				$this->dbforge->drop_table('Places1');
				$this->dbforge->drop_table('Regions1');

        }
}