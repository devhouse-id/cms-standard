<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_slider_images extends CI_Migration {

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
            'description' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
            'image_url' => array(
                'type' => 'VARCHAR',
                'constraint' => '255'
            ),
            'order_priority' => array(
                'type' => 'INT',
                'constraint' => 5
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('slider_images');
    }

    public function down()
    {
        $this->dbforge->drop_table('slider_images');
    }
}