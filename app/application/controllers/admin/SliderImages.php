<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SliderImages extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $table = "slider_images";
        $columns = [
            [
                'name' => 'id',
                'type' => 'text',
                'readonly' => true
            ],
            [
                'name' => 'description',
                'type' => 'text_area'
            ],
            [
                'name' => 'type',
                'type' => 'options',
                'option_values' => [
                    'homepage'
                ]
            ],
            [
                'name' => 'image_url',
                'type' => 'file'
            ],
            [
                'name' => 'order_priority',
                'type' => 'text',
                'readonly' => false
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