<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Daftar_lembaga extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Daftar_lembaga_model');
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->library('session');
    }

    public function index()
    {
        $daftar_lembaga = $this->Daftar_lembaga_model->get_all();

        $data = array(
            'daftar_lembaga_data' => $daftar_lembaga
        );

        $this->load->view('daftar_lembaga_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Daftar_lembaga_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_lembaga' => $row->id_lembaga,
		'nm_lembaga' => $row->nm_lembaga,
		'nm_pimpinan' => $row->nm_pimpinan,
		'alamat' => $row->alamat,
		'telepon' => $row->telepon,
		'email' => $row->email,
		'foto' => $row->foto,
	    );
            $this->load->view('daftar_lembaga_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('daftar_lembaga'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('daftar_lembaga/create_action'),
	    'id_lembaga' => set_value('id_lembaga'),
	    'nm_lembaga' => set_value('nm_lembaga'),
	    'nm_pimpinan' => set_value('nm_pimpinan'),
	    'alamat' => set_value('alamat'),
	    'telepon' => set_value('telepon'),
	    'email' => set_value('email'),
	    'foto' => set_value('foto'),
	);
        $this->load->view('daftar_lembaga_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
        $config['upload_path'] = './assets/picture';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['max_size'] = '2048';  //2MB max
        $config['max_width'] = '4480'; // pixel
        $config['max_height'] = '4480'; // pixel
        $this->upload->initialize($config);
            if ($this->upload->do_upload('fotopost')) {
                $foto = $this->upload->data();
                $data = array(
                    'nm_lembaga' => $this->input->post('nm_lembaga',TRUE),
                    'nm_pimpinan' => $this->input->post('nm_pimpinan',TRUE),
                    'alamat' => $this->input->post('alamat',TRUE),
                    'telepon' => $this->input->post('telepon',TRUE),
                    'email' => $this->input->post('email',TRUE),
                    'foto' => $foto['file_name'],
                );
              $this->Daftar_lembaga_model->insert($data);
              $this->session->set_flashdata('success', 'Create Record Success');
              redirect(site_url('daftar_lembaga')); 
            }
        }
    }
    
    public function update($id) 
    {
        $row = $this->Daftar_lembaga_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('daftar_lembaga/update_action'),
		'id_lembaga' => set_value('id_lembaga', $row->id_lembaga),
		'nm_lembaga' => set_value('nm_lembaga', $row->nm_lembaga),
		'nm_pimpinan' => set_value('nm_pimpinan', $row->nm_pimpinan),
		'alamat' => set_value('alamat', $row->alamat),
		'telepon' => set_value('telepon', $row->telepon),
		'email' => set_value('email', $row->email),
		'foto' => set_value('foto', $row->foto),
	    );
            $this->load->view('daftar_lembaga_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('daftar_lembaga'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_lembaga', TRUE));
        }else{
            if (!empty($_FILES["image"]["name"])) {
                $config['upload_path'] = './assets/picture';
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['max_size'] = '2048';  //2MB max
                $config['max_width'] = '4480'; // pixel
                $config['max_height'] = '4480'; // pixel
                $this->upload->initialize($config);
                if ($this->upload->do_upload('fotopost')) {
                    $foto = $this->upload->data();
                    $data = array(
                        'nm_lembaga' => $this->input->post('nm_lembaga',TRUE),
                        'nm_pimpinan' => $this->input->post('nm_pimpinan',TRUE),
                        'alamat' => $this->input->post('alamat',TRUE),
                        'telepon' => $this->input->post('telepon',TRUE),
                        'email' => $this->input->post('email',TRUE),
                        'foto' => $foto['file_name'],
                    );
                    $this->Daftar_lembaga_model->update($this->input->post('id_lembaga', TRUE), $data);
                    $this->session->set_flashdata('message', 'Update Record Success');
                    redirect(site_url('daftar_lembaga')); 
                }
            }else{
                $data = array(
                'nm_lembaga' => $this->input->post('nm_lembaga',TRUE),
                'nm_pimpinan' => $this->input->post('nm_pimpinan',TRUE),
                'alamat' => $this->input->post('alamat',TRUE),
                'telepon' => $this->input->post('telepon',TRUE),
                'email' => $this->input->post('email',TRUE),
                'foto' => $this->input->post('old_image',TRUE),
                );
                $this->Daftar_lembaga_model->update($this->input->post('id_lembaga', TRUE), $data);
                $this->session->set_flashdata('message', 'Update Record Success');
                redirect(site_url('daftar_lembaga'));
            }
        }     
    }
    
    public function delete($id) 
    {
        $row = $this->Daftar_lembaga_model->get_by_id($id);

        if ($row) {
            $this->Daftar_lembaga_model->_deleteImage($id);
            $this->Daftar_lembaga_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('daftar_lembaga'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('daftar_lembaga'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nm_lembaga', 'nm lembaga', 'trim|required');
	$this->form_validation->set_rules('nm_pimpinan', 'nm pimpinan', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('telepon', 'telepon', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	// $this->form_validation->set_rules('foto', 'foto', 'trim|required');

	$this->form_validation->set_rules('id_lembaga', 'id_lembaga', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "daftar_lembaga.xls";
        $judul = "daftar_lembaga";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nm Lembaga");
	xlsWriteLabel($tablehead, $kolomhead++, "Nm Pimpinan");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "Telepon");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Foto");

	foreach ($this->Daftar_lembaga_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nm_lembaga);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nm_pimpinan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->telepon);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->foto);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=daftar_lembaga.doc");

        $data = array(
            'daftar_lembaga_data' => $this->Daftar_lembaga_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('daftar_lembaga_doc',$data);
    }
    function do_upload()
    {
        $data['msg']    = '';
        
        $config['upload_path'] = './uploads/ktp';
        $config['allowed_types'] = 'pdf|docx|gif|jpg|png|txt';
        $config['max_size'] = '52428800';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
        

        $this->load->library('upload', $config);
    

        if ( ! $this->welcome->do_upload())
        {
            $data['error'] = $this->upload->display_errors();
            
            //load uploaded files
            $uploaded_files = $this->welcome_model->get_upload_list(); 
            $data['uploads'] = $uploaded_files['rows'];
            
            $this->load->view('daftar_lembaga_form', $data);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            
            $fileName = $data['upload_data']['file_name'];
            $filePath = $data['upload_data']['full_path'];
            $fileSize = $data['upload_data']['file_size'];
            $fileType = $data['upload_data']['file_type'];
                        
            $results = $this->Daftar_lembaga_model->save_upload($fileName, $filePath, $fileType, $fileSize);
                        
            //load uploaded files
            $uploaded_files = $this->Daftar_lembaga_model->get_upload_list(); 
            $data['uploads'] = $uploaded_files['rows'];
            
            $data['msg']    = 'The file '.$fileName.' was successfully uploaded!';
            $data['error'] = '';

            if($results && $uploaded_files) $this->load->view('daftar_lembaga_form', $data);
        }
    }

}

/* End of file Daftar_lembaga.php */
/* Location: ./application/controllers/Daftar_lembaga.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-29 18:05:09 */
/* http://harviacode.com */