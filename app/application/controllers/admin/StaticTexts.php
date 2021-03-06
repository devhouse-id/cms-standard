<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StaticTexts extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $table = "static_texts";
        $columns = [
            [
                'name' => 'id',
                'type' => 'text',
                'readonly' => true
            ],
            [
                'name' => 'type',
                'type' => 'options',
                'option_values' => [
                    'about_us'
                ]
            ],
            [
                'name' => 'body',
                'type' => 'text_area'
            ],
            [
                'name' => 'body_html',
                'type' => 'text_area'
            ]
        ];

        $config = [
            'table' => $table,
            'columns' => $columns
        ];

        $this->load->library('crud', $config);
    }

    public function index()
    {
        $this->crud->index();
    }

    public function edit($id)
    {
        $this->crud->edit($id);
    }

    public function add()
    {
        $this->crud->add();
    }

    public function update()
    {
        $this->crud->update();
    }

    public function create()
    {
        $this->crud->create();
    }

    public function delete($id)
    {
        $this->crud->delete($id);
    }
}