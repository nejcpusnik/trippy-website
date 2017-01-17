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
                $this->dbforge->create_table('UsersTest');
			
				
				
        }

        public function down()
        {
                $this->dbforge->drop_table('UsersTest');

        }
}