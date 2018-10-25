<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SliderImages extends CI_Controller {
    private $table;
    private $columns;

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url'); 
        $this->load->helper('form');
        $this->load->library('crud');

        $this->table = "slider_images";
        $this->columns = [
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

        $this->crud->init($this->table, $this->columns, $this->db, $this->load, $this->input);
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
}