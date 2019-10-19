<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Testing extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Testing_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $testing = $this->Testing_model->get_all();

        $data = array(
            'testing_data' => $testing
        );

        $this->load->view('testing_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Testing_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama' => $row->nama,
		'ttl' => $row->ttl,
		'umur' => $row->umur,
		'jenis_kelamin' => $row->jenis_kelamin,
	    );
            $this->load->view('testing_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('testing'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('testing/create_action'),
	    'id' => set_value('id'),
	    'nama' => set_value('nama'),
	    'ttl' => set_value('ttl'),
	    'umur' => set_value('umur'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
	);
        $this->load->view('testing_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'ttl' => $this->input->post('ttl',TRUE),
		'umur' => $this->input->post('umur',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
	    );

            $this->Testing_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('testing'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Testing_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('testing/update_action'),
		'id' => set_value('id', $row->id),
		'nama' => set_value('nama', $row->nama),
		'ttl' => set_value('ttl', $row->ttl),
		'umur' => set_value('umur', $row->umur),
		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
	    );
            $this->load->view('testing_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('testing'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'ttl' => $this->input->post('ttl',TRUE),
		'umur' => $this->input->post('umur',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
	    );

            $this->Testing_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('testing'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Testing_model->get_by_id($id);

        if ($row) {
            $this->Testing_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('testing'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('testing'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('ttl', 'ttl', 'trim|required');
	$this->form_validation->set_rules('umur', 'umur', 'trim|required');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "testing.xls";
        $judul = "testing";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Ttl");
	xlsWriteLabel($tablehead, $kolomhead++, "Umur");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Kelamin");

	foreach ($this->Testing_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ttl);
	    xlsWriteLabel($tablebody, $kolombody++, $data->umur);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_kelamin);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=testing.doc");

        $data = array(
            'testing_data' => $this->Testing_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('testing_doc',$data);
    }

}

/* End of file Testing.php */
/* Location: ./application/controllers/Testing.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-20 14:21:52 */
/* http://harviacode.com */