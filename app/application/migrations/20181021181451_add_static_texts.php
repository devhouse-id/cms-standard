<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_static_texts extends CI_Migration {

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
            'body' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
            'body_html' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
            'deleted_at' => array(
                'type' => 'DATETIME',
                'null' => TRUE,
            ),
            'created_at DATETIME',
            'updated_at DATETIME on update NOW()'
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('static_texts');
    }

    public function down()
    {
        $this->dbforge->drop_table('static_texts');
    }
}