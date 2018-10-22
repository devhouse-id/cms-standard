<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SliderImages extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url'); 
    }

    public function index()
    {
        $table = "slider_images";
        $columns = [
            'id',
            'description',
            'type',
            'image_url',
            'order_priority'
        ];

        $query_columns = "";
        $index = 0;
        foreach ($columns as $column) {
            $query_columns = $query_columns . $column;
            if ($index < count($columns) - 1) {
                $query_columns = $query_columns . ', ';
            }
            $index++;
        }
        $query = $this->db->query("select " . $query_columns . " from " . $table);

        $data = [
            'columns' => $columns,
            'rows' => $query->result()
        ];
        $this->load->view('admin/item_list', $data);
    }
}