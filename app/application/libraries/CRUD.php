<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CRUD {
    private $ci;
    private $table;
    private $columns;
    private $db;
    private $load;

    function __construct($config)
    {
        $this->initialize_loader();
        $this->table = $config['table'];
        $this->columns = $config['columns'];

    }

    private function initialize_loader()
    {
        $this->ci =& get_instance();

        $this->ci->load->database();
        $this->ci->load->helper('url'); 
        $this->ci->load->helper('form');

        $config['upload_path'] = "./uploads/";
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 8192;
        $config['encrypt_name'] = TRUE;
        $this->ci->load->library('upload', $config);
    }

    private function upload($input_name)
    {
        if (!$this->ci->upload->do_upload($input_name))
        {
            $error = $this->ci->upload->display_errors();
            $this->ci->load->view('errors/html/error_general', [
                'heading' => 'Error!',
                'message' => $error
            ]);
        }
        else
        {
            $data = $this->ci->upload->data();
            return BASE_URL() . 'uploads/' . $data['file_name'];
        }
    }

    public function index()
    {
        $query = $this->ci->db->query("select *" . " from " . $this->table);

        $data = [
            'columns' => $this->columns,
            'rows' => $query->result(),
            'table' => $this->table
        ];
        $this->ci->load->view('admin/item_list', $data);
    }

    public function edit($id)
    {
        $query = $this->ci->db->query(
            "select *" . " from " . $this->table . " where id = " . $id);
        if ($query->result()) {
            $data = [
                'columns' => $this->columns,
                'table' => $this->table,
                'row' => $query->result()[0]
            ];
            $this->ci->load->view('admin/item_detail', $data);
        }
        else {
            $this->ci->load->view(
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
        $this->ci->load->view('admin/create_item', $data);
    }

    public function update()
    {
        $data = $this->ci->input->post();

        $set_column_query = "";
        $index = 0;
        var_dump($data);
        foreach ($this->columns as $column) {
            if ($column['type'] == 'file' && strlen($data[$column['name']]) == 0)
            {
                $data[$column['name']] = $this->upload('upload_' . $column['name']);
            }

            $set_column_query = $set_column_query . $column['name'] . " = " . "'" . $data[$column['name']] . "'";
            if ($index < count($this->columns) - 1) {
                $set_column_query = $set_column_query . ', ';
            }
            $index++;
        }

        $query = $this->ci->db->query(
            "update " . $this->table . " set " . $set_column_query . " where id = " . $data['id']
        );

        redirect('admin/' . $this->table, 'refresh');

    }

    public function create()
    {
        $data = $this->ci->input->post();
        $query_columns = "";
        $query_values = "";
        $index = 0;

        foreach ($this->columns as $column) {
            if ($column['type'] == 'file')
            {
                $data[$column['name']] = $this->upload($column['name']);
            }

            $query_columns = $query_columns . $column['name'];
            $query_values = $query_values . "'". $data[$column['name']] . "'";
            if ($index < count($this->columns) - 1) {
                $query_columns = $query_columns . ', ';
                $query_values = $query_values . ', ';
            }
            $index++;
        }

        $query = $this->ci->db->query(
            "insert into " . $this->table . " (" . $query_columns . ")" . " values (" . $query_values . ")" 
        );

        redirect('admin/' . $this->table, 'refresh');
    }

}
