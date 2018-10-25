<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CRUD {
    private $table;
    private $columns;
    private $db;
    private $load;

    function __construct(){}

    public function init($table, $columns, $db, $load, $input)
    {
        $this->table = $table;
        $this->columns = $columns;
        $this->db = $db;
        $this->load = $load;
        $this->input = $input;
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

    public function add()
    {
        $data = [
            'columns' => $this->columns,
            'table' => $this->table
        ];
        $this->load->view('admin/create_item', $data);
    }

    public function update()
    {
        $data = $this->input->post();

        $set_column_query = "";
        $index = 0;

        foreach ($this->columns as $column) {
            $set_column_query = $set_column_query . $column['name'] . " = " . "'" . $data[$column['name']] . "'";
            if ($index < count($this->columns) - 1) {
                $set_column_query = $set_column_query . ', ';
            }
            $index++;
        }

        $query = $this->db->query(
            "update " . $this->table . " set " . $set_column_query . " where id = " . $data['id']
        );

        redirect('admin/' . $this->table, 'refresh');

    }

    public function create()
    {
        $data = $this->input->post();
        $query_columns = "";
        $query_values = "";
        $index = 0;
        foreach ($this->columns as $column) {
            $query_columns = $query_columns . $column['name'];
            $query_values = $query_values . "'". $data[$column['name']] . "'";
            if ($index < count($this->columns) - 1) {
                $query_columns = $query_columns . ', ';
                $query_values = $query_values . ', ';
            }
            $index++;
        }

        $query = $this->db->query(
            "insert into " . $this->table . " (" . $query_columns . ")" . " values (" . $query_values . ")" 
        );

        redirect('admin/' . $this->table, 'refresh');
    }

}
