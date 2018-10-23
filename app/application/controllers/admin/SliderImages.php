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
    }

    public function index()
    {
        $query = $this->db->query("select *" . " from " . $this->table);

        $data = [
            'columns' => $this->columns,
            'rows' => $query->result(),
            'table' => $this->table
        ];
        $this->load->view('admin/item_list', $data);
    }

    public function edit($id)
    {
        $query = $this->db->query(
            "select *" . " from " . $this->table . " where id = " . $id);
        if ($query->result()) {
            $data = [
                'columns' => $this->columns,
                'table' => $this->table,
                'row' => $query->result()[0]
            ];
            $this->load->view('admin/item_detail', $data);
        }
        else {
            $this->load->view(
                'errors/html/error_404',
                [
                    'heading' => "Not Found",
                    'message' => $this->table . "with id = " . $id . " Not Found"
                ]
            );
        }
    }
}