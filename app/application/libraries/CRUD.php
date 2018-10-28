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

    private function get_update_query()
    {
        $data = $this->ci->input->post();
        $set_column_query = "";
        $index = 0;
        foreach ($this->columns as $column) {
            if ($column['type'] == 'file')
            {
                if ($data['upload_' . $column['name']] == "True") {
                    $data[$column['name']] = $this->upload($column['name']);
                }
                else {
                    continue;
                }
            }

            if ($index > 0) {
                $set_column_query = $set_column_query . ', ';
            }

            $set_column_query = $set_column_query . $column['name'] . " = " . "'" . $data[$column['name']] . "'";
            $index++;
        }

        return "update " . $this->table . " set " . $set_column_query . " where id = " . $data['id'];
    }

    private function get_insert_query()
    {
        $data = $this->ci->input->post();
        $query_columns = "";
        $query_values = "";
        $index = 0;

        foreach ($this->columns as $column) {
            if ($column['type'] == 'file')
            {
                if ($data['upload_' . $column['name']] == "True") {
                    $data[$column['name']] = $this->upload($column['name']);
                }
                else {
                    continue;
                }
            }

            if ($index > 0) {
                $query_columns = $query_columns . ', ';
                $query_values = $query_values . ', ';
            }

            $query_columns = $query_columns . $column['name'];
            $query_values = $query_values . "'". $data[$column['name']] . "'";
            $index++;
        }

        return "insert into " . $this->table . " (" . $query_columns . ")" . " values (" . $query_values . ")";
    }

    public function index()
    {
        $query = $this->ci->db->query("select *" . " from " . $this->table . " where deleted_at is null order by updated_at desc");

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
            "select *" . " from " . $this->table . " where id = " . $id . " and deleted_at is null");
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
        $query = $this->ci->db->query($this->get_update_query());
        redirect('admin/' . $this->table, 'refresh');

    }

    public function create()
    {
        $query = $this->ci->db->query($this->get_insert_query());
        redirect('admin/' . $this->table, 'refresh');
    }

    public function delete($id)
    {
        $raw = "update " . $this->table . " set deleted_at = NOW() where id = " . $id;
        $query = $this->ci->db->query($raw);
        redirect('admin/' . $this->table, 'refresh');
    }

}
