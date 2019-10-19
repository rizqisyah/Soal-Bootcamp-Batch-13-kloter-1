<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Peserta extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Peserta_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $peserta = $this->Peserta_model->get_all();

        $data = array(
            'peserta_data' => $peserta
        );

        $this->load->view('peserta_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Peserta_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_peserta' => $row->id_peserta,
		'nomor' => $row->nomor,
		'nama' => $row->nama,
		'created' => $row->created,
		'updated' => $row->updated,
	    );
            $this->load->view('peserta_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('peserta'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('peserta/create_action'),
	    'id_peserta' => set_value('id_peserta'),
	    'nomor' => set_value('nomor'),
	    'nama' => set_value('nama'),
	    'created' => set_value('created'),
	    'updated' => set_value('updated'),
	);
        $this->load->view('peserta_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nomor' => $this->input->post('nomor',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'created' => $this->input->post('created',TRUE),
		'updated' => $this->input->post('updated',TRUE),
	    );

            $this->Peserta_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('peserta'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Peserta_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('peserta/update_action'),
		'id_peserta' => set_value('id_peserta', $row->id_peserta),
		'nomor' => set_value('nomor', $row->nomor),
		'nama' => set_value('nama', $row->nama),
		'created' => set_value('created', $row->created),
		'updated' => set_value('updated', $row->updated),
	    );
            $this->load->view('peserta_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('peserta'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_peserta', TRUE));
        } else {
            $data = array(
		'nomor' => $this->input->post('nomor',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'created' => $this->input->post('created',TRUE),
		'updated' => $this->input->post('updated',TRUE),
	    );

            $this->Peserta_model->update($this->input->post('id_peserta', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('peserta'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Peserta_model->get_by_id($id);

        if ($row) {
            $this->Peserta_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('peserta'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('peserta'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nomor', 'nomor', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('created', 'created', 'trim|required');
	$this->form_validation->set_rules('updated', 'updated', 'trim|required');

	$this->form_validation->set_rules('id_peserta', 'id_peserta', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "peserta.xls";
        $judul = "peserta";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nomor");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Created");
	xlsWriteLabel($tablehead, $kolomhead++, "Updated");

	foreach ($this->Peserta_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nomor);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->created);
	    xlsWriteLabel($tablebody, $kolombody++, $data->updated);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=peserta.doc");

        $data = array(
            'peserta_data' => $this->Peserta_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('peserta_doc',$data);
    }

}

/* End of file Peserta.php */
/* Location: ./application/controllers/Peserta.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-20 14:21:52 */
/* http://harviacode.com */