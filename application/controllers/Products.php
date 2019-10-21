<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Products extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Products_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $products = $this->Products_model->get_all();
        $data = array(
            'products_data' => $products
        );

        $this->load->view('products_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Products_model->get_by_id($id);
        if ($row) {
            $data = array(
        'id' => $row->id,
        'name' => $row->name,
        'stock' => $row->stock,
        'deskripsi' => $row->deskripsi,
        'category_id' => $row->category_id,
        );
            $this->load->view('products_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('products'));
        }
    }

    public function create() 
    {

        
        $data = array(
            'button' => 'Create',
            'action' => site_url('products/create_action'),
        'id' => set_value('id'),
        'name' => set_value('name'),
        'stock' => set_value('stock'),
        'deskripsi' => set_value('deskripsi'),
        'dd_category' => $this->Products_model->dd_kategori()->result(),
    );
        // print_r($data);
        // die();
        $this->load->view('products_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        'name' => $this->input->post('name',TRUE),
        'stock' => $this->input->post('stock',TRUE),
        'deskripsi' => $this->input->post('deskripsi',TRUE),
        'category_id' => $this->input->post('category_id',TRUE),
        );

            $this->Products_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('products'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Products_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('products/update_action'),
        'id' => set_value('id', $row->id),
        'name' => set_value('name', $row->name),
        'stock' => set_value('stock', $row->stock),
        'deskripsi' => set_value('deskripsi', $row->deskripsi),
        'category_id' => set_value('category_id', $row->category_id),
        'dd_category' => $this->Products_model->dd_kategori()->result(),

        );
            $this->load->view('products_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('products'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
        'name' => $this->input->post('name',TRUE),
        'stock' => $this->input->post('stock',TRUE),
        'deskripsi' => $this->input->post('deskripsi',TRUE),
        'category_id' => $this->input->post('category_id',TRUE),
        );
            // var_dump($data);
            // die();
            $this->Products_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('products'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Products_model->get_by_id($id);

        if ($row) {
            $this->Products_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('products'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('products'));
        }
    }

    public function _rules() 
    {
    $this->form_validation->set_rules('name', 'name', 'trim|required');
    $this->form_validation->set_rules('stock', 'stock', 'trim|required');
    $this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
    $this->form_validation->set_rules('category_id', 'category id', 'trim|required');

    $this->form_validation->set_rules('id', 'id', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
