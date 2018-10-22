<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_image_galeries extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
            ),
            'type' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100',
            ),
            'image_url' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '255',
            ),
            'description' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
            ),
            'order_priority' => array(
                    'type' => 'INT',
                    'constraint' => 5
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('image_galeries');
    }

    public function down()
    {
        $this->dbforge->drop_table('image_galeries');
    }
}