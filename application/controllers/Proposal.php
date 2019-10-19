<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Proposal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Proposal_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $proposal = $this->Proposal_model->get_all();

        $data = array(
            'proposal_data' => $proposal
        );

        $this->load->view('proposal_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Proposal_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_proposal' => $row->id_proposal,
		'no_agenda' => $row->no_agenda,
		'lembaga' => $row->lembaga,
		'alamat' => $row->alamat,
		'judul_proposal' => $row->judul_proposal,
		'pelaksanaan' => $row->pelaksanaan,
		'pimpinan_lembaga' => $row->pimpinan_lembaga,
		'status' => $row->status,
		'surat_permohonan' => $row->surat_permohonan,
		'akta_pendirian' => $row->akta_pendirian,
		'ad' => $row->ad,
		'surat_ijin_domisili' => $row->surat_ijin_domisili,
		'sk_pengurus' => $row->sk_pengurus,
		'ktp_ketua' => $row->ktp_ketua,
		'sk_panitia' => $row->sk_panitia,
		'ktp_panitia' => $row->ktp_panitia,
		'npwp' => $row->npwp,
		'rekening' => $row->rekening,
		'struktur' => $row->struktur,
		'papan_nama' => $row->papan_nama,
		'dokumentasi' => $row->dokumentasi,
		'rab' => $row->rab,
	    );
            $this->load->view('proposal_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('proposal'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('proposal/create_action'),
	    'id_proposal' => set_value('id_proposal'),
	    'no_agenda' => set_value('no_agenda'),
	    'lembaga' => set_value('lembaga'),
	    'alamat' => set_value('alamat'),
	    'judul_proposal' => set_value('judul_proposal'),
	    'pelaksanaan' => set_value('pelaksanaan'),
	    'pimpinan_lembaga' => set_value('pimpinan_lembaga'),
	    'status' => set_value('status'),
	    'surat_permohonan' => set_value('surat_permohonan'),
	    'akta_pendirian' => set_value('akta_pendirian'),
	    'ad' => set_value('ad'),
	    'surat_ijin_domisili' => set_value('surat_ijin_domisili'),
	    'sk_pengurus' => set_value('sk_pengurus'),
	    'ktp_ketua' => set_value('ktp_ketua'),
	    'sk_panitia' => set_value('sk_panitia'),
	    'ktp_panitia' => set_value('ktp_panitia'),
	    'npwp' => set_value('npwp'),
	    'rekening' => set_value('rekening'),
	    'struktur' => set_value('struktur'),
	    'papan_nama' => set_value('papan_nama'),
	    'dokumentasi' => set_value('dokumentasi'),
	    'rab' => set_value('rab'),
	);
        $this->load->view('proposal_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'no_agenda' => $this->input->post('no_agenda',TRUE),
		'lembaga' => $this->input->post('lembaga',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'judul_proposal' => $this->input->post('judul_proposal',TRUE),
		'pelaksanaan' => $this->input->post('pelaksanaan',TRUE),
		'pimpinan_lembaga' => $this->input->post('pimpinan_lembaga',TRUE),
		'status' => $this->input->post('status',TRUE),
		'surat_permohonan' => $this->input->post('surat_permohonan',TRUE),
		'akta_pendirian' => $this->input->post('akta_pendirian',TRUE),
		'ad' => $this->input->post('ad',TRUE),
		'surat_ijin_domisili' => $this->input->post('surat_ijin_domisili',TRUE),
		'sk_pengurus' => $this->input->post('sk_pengurus',TRUE),
		'ktp_ketua' => $this->input->post('ktp_ketua',TRUE),
		'sk_panitia' => $this->input->post('sk_panitia',TRUE),
		'ktp_panitia' => $this->input->post('ktp_panitia',TRUE),
		'npwp' => $this->input->post('npwp',TRUE),
		'rekening' => $this->input->post('rekening',TRUE),
		'struktur' => $this->input->post('struktur',TRUE),
		'papan_nama' => $this->input->post('papan_nama',TRUE),
		'dokumentasi' => $this->input->post('dokumentasi',TRUE),
		'rab' => $this->input->post('rab',TRUE),
	    );

            $this->Proposal_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('proposal'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Proposal_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('proposal/update_action'),
		'id_proposal' => set_value('id_proposal', $row->id_proposal),
		'no_agenda' => set_value('no_agenda', $row->no_agenda),
		'lembaga' => set_value('lembaga', $row->lembaga),
		'alamat' => set_value('alamat', $row->alamat),
		'judul_proposal' => set_value('judul_proposal', $row->judul_proposal),
		'pelaksanaan' => set_value('pelaksanaan', $row->pelaksanaan),
		'pimpinan_lembaga' => set_value('pimpinan_lembaga', $row->pimpinan_lembaga),
		'status' => set_value('status', $row->status),
		'surat_permohonan' => set_value('surat_permohonan', $row->surat_permohonan),
		'akta_pendirian' => set_value('akta_pendirian', $row->akta_pendirian),
		'ad' => set_value('ad', $row->ad),
		'surat_ijin_domisili' => set_value('surat_ijin_domisili', $row->surat_ijin_domisili),
		'sk_pengurus' => set_value('sk_pengurus', $row->sk_pengurus),
		'ktp_ketua' => set_value('ktp_ketua', $row->ktp_ketua),
		'sk_panitia' => set_value('sk_panitia', $row->sk_panitia),
		'ktp_panitia' => set_value('ktp_panitia', $row->ktp_panitia),
		'npwp' => set_value('npwp', $row->npwp),
		'rekening' => set_value('rekening', $row->rekening),
		'struktur' => set_value('struktur', $row->struktur),
		'papan_nama' => set_value('papan_nama', $row->papan_nama),
		'dokumentasi' => set_value('dokumentasi', $row->dokumentasi),
		'rab' => set_value('rab', $row->rab),
	    );
            $this->load->view('proposal_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('proposal'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_proposal', TRUE));
        } else {
            $data = array(
		'no_agenda' => $this->input->post('no_agenda',TRUE),
		'lembaga' => $this->input->post('lembaga',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'judul_proposal' => $this->input->post('judul_proposal',TRUE),
		'pelaksanaan' => $this->input->post('pelaksanaan',TRUE),
		'pimpinan_lembaga' => $this->input->post('pimpinan_lembaga',TRUE),
		'status' => $this->input->post('status',TRUE),
		'surat_permohonan' => $this->input->post('surat_permohonan',TRUE),
		'akta_pendirian' => $this->input->post('akta_pendirian',TRUE),
		'ad' => $this->input->post('ad',TRUE),
		'surat_ijin_domisili' => $this->input->post('surat_ijin_domisili',TRUE),
		'sk_pengurus' => $this->input->post('sk_pengurus',TRUE),
		'ktp_ketua' => $this->input->post('ktp_ketua',TRUE),
		'sk_panitia' => $this->input->post('sk_panitia',TRUE),
		'ktp_panitia' => $this->input->post('ktp_panitia',TRUE),
		'npwp' => $this->input->post('npwp',TRUE),
		'rekening' => $this->input->post('rekening',TRUE),
		'struktur' => $this->input->post('struktur',TRUE),
		'papan_nama' => $this->input->post('papan_nama',TRUE),
		'dokumentasi' => $this->input->post('dokumentasi',TRUE),
		'rab' => $this->input->post('rab',TRUE),
	    );

            $this->Proposal_model->update($this->input->post('id_proposal', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('proposal'));
        }
    }

    public function verif($id) 
    {
        $row = $this->Proposal_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Verif',
                'action' => site_url('proposal/verif_action'),
		'id_proposal' => set_value('id_proposal', $row->id_proposal),
		'no_agenda' => set_value('no_agenda', $row->no_agenda),
		'lembaga' => set_value('lembaga', $row->lembaga),
		'alamat' => set_value('alamat', $row->alamat),
		'judul_proposal' => set_value('judul_proposal', $row->judul_proposal),
		'pelaksanaan' => set_value('pelaksanaan', $row->pelaksanaan),
		'pimpinan_lembaga' => set_value('pimpinan_lembaga', $row->pimpinan_lembaga),
		'status' => set_value('status', $row->status),
		'surat_permohonan' => set_value('surat_permohonan', $row->surat_permohonan),
		'akta_pendirian' => set_value('akta_pendirian', $row->akta_pendirian),
		'ad' => set_value('ad', $row->ad),
		'surat_ijin_domisili' => set_value('surat_ijin_domisili', $row->surat_ijin_domisili),
		'sk_pengurus' => set_value('sk_pengurus', $row->sk_pengurus),
		'ktp_ketua' => set_value('ktp_ketua', $row->ktp_ketua),
		'sk_panitia' => set_value('sk_panitia', $row->sk_panitia),
		'ktp_panitia' => set_value('ktp_panitia', $row->ktp_panitia),
		'npwp' => set_value('npwp', $row->npwp),
		'rekening' => set_value('rekening', $row->rekening),
		'struktur' => set_value('struktur', $row->struktur),
		'papan_nama' => set_value('papan_nama', $row->papan_nama),
		'dokumentasi' => set_value('dokumentasi', $row->dokumentasi),
		'rab' => set_value('rab', $row->rab),
	    );
            $this->load->view('proposal_verif', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('proposal'));
        }
    }

    public function verif_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_proposal', TRUE));
        } else {
            $data = array(
		'no_agenda' => $this->input->post('no_agenda',TRUE),
		'lembaga' => $this->input->post('lembaga',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'judul_proposal' => $this->input->post('judul_proposal',TRUE),
		'pelaksanaan' => $this->input->post('pelaksanaan',TRUE),
		'pimpinan_lembaga' => $this->input->post('pimpinan_lembaga',TRUE),
		'status' => $this->input->post('status',TRUE),
		'surat_permohonan' => $this->input->post('surat_permohonan',TRUE),
		'akta_pendirian' => $this->input->post('akta_pendirian',TRUE),
		'ad' => $this->input->post('ad',TRUE),
		'surat_ijin_domisili' => $this->input->post('surat_ijin_domisili',TRUE),
		'sk_pengurus' => $this->input->post('sk_pengurus',TRUE),
		'ktp_ketua' => $this->input->post('ktp_ketua',TRUE),
		'sk_panitia' => $this->input->post('sk_panitia',TRUE),
		'ktp_panitia' => $this->input->post('ktp_panitia',TRUE),
		'npwp' => $this->input->post('npwp',TRUE),
		'rekening' => $this->input->post('rekening',TRUE),
		'struktur' => $this->input->post('struktur',TRUE),
		'papan_nama' => $this->input->post('papan_nama',TRUE),
		'dokumentasi' => $this->input->post('dokumentasi',TRUE),
		'rab' => $this->input->post('rab',TRUE),
	    );

            $this->Proposal_model->update($this->input->post('id_proposal', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('proposal'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Proposal_model->get_by_id($id);

        if ($row) {
            $this->Proposal_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('proposal'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('proposal'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('no_agenda', 'no agenda', 'trim|required');
	$this->form_validation->set_rules('lembaga', 'lembaga', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('judul_proposal', 'judul proposal', 'trim|required');
	$this->form_validation->set_rules('pelaksanaan', 'pelaksanaan', 'trim|required');
	$this->form_validation->set_rules('pimpinan_lembaga', 'pimpinan lembaga', 'trim|required');
	// $this->form_validation->set_rules('status', 'status', 'trim|required');
	// $this->form_validation->set_rules('surat_permohonan', 'surat permohonan', 'trim|required');
	// $this->form_validation->set_rules('akta_pendirian', 'akta pendirian', 'trim|required');
	// $this->form_validation->set_rules('ad', 'ad', 'trim|required');
	// $this->form_validation->set_rules('surat_ijin_domisili', 'surat ijin domisili', 'trim|required');
	// $this->form_validation->set_rules('sk_pengurus', 'sk pengurus', 'trim|required');
	// $this->form_validation->set_rules('ktp_ketua', 'ktp ketua', 'trim|required');
	// $this->form_validation->set_rules('sk_panitia', 'sk panitia', 'trim|required');
	// $this->form_validation->set_rules('ktp_panitia', 'ktp panitia', 'trim|required');
	// $this->form_validation->set_rules('npwp', 'npwp', 'trim|required');
	// $this->form_validation->set_rules('rekening', 'rekening', 'trim|required');
	// $this->form_validation->set_rules('struktur', 'struktur', 'trim|required');
	// $this->form_validation->set_rules('papan_nama', 'papan nama', 'trim|required');
	// $this->form_validation->set_rules('dokumentasi', 'dokumentasi', 'trim|required');
	// $this->form_validation->set_rules('rab', 'rab', 'trim|required');

	$this->form_validation->set_rules('id_proposal', 'id_proposal', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "proposal.xls";
        $judul = "proposal";
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
	xlsWriteLabel($tablehead, $kolomhead++, "No Agenda");
	xlsWriteLabel($tablehead, $kolomhead++, "Lembaga");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "Judul Proposal");
	xlsWriteLabel($tablehead, $kolomhead++, "Pelaksanaan");
	xlsWriteLabel($tablehead, $kolomhead++, "Pimpinan Lembaga");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");
	xlsWriteLabel($tablehead, $kolomhead++, "Surat Permohonan");
	xlsWriteLabel($tablehead, $kolomhead++, "Akta Pendirian");
	xlsWriteLabel($tablehead, $kolomhead++, "Ad");
	xlsWriteLabel($tablehead, $kolomhead++, "Surat Ijin Domisili");
	xlsWriteLabel($tablehead, $kolomhead++, "Sk Pengurus");
	xlsWriteLabel($tablehead, $kolomhead++, "Ktp Ketua");
	xlsWriteLabel($tablehead, $kolomhead++, "Sk Panitia");
	xlsWriteLabel($tablehead, $kolomhead++, "Ktp Panitia");
	xlsWriteLabel($tablehead, $kolomhead++, "Npwp");
	xlsWriteLabel($tablehead, $kolomhead++, "Rekening");
	xlsWriteLabel($tablehead, $kolomhead++, "Struktur");
	xlsWriteLabel($tablehead, $kolomhead++, "Papan Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Dokumentasi");
	xlsWriteLabel($tablehead, $kolomhead++, "Rab");

	foreach ($this->Proposal_model->get_all() as $data) {
            $kolombody = 0;
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_agenda);
	    xlsWriteLabel($tablebody, $kolombody++, $data->lembaga);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->judul_proposal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pelaksanaan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pimpinan_lembaga);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);
	    xlsWriteNumber($tablebody, $kolombody++, $data->surat_permohonan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->akta_pendirian);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ad);
	    xlsWriteNumber($tablebody, $kolombody++, $data->surat_ijin_domisili);
	    xlsWriteNumber($tablebody, $kolombody++, $data->sk_pengurus);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ktp_ketua);
	    xlsWriteNumber($tablebody, $kolombody++, $data->sk_panitia);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ktp_panitia);
	    xlsWriteNumber($tablebody, $kolombody++, $data->npwp);
	    xlsWriteNumber($tablebody, $kolombody++, $data->rekening);
	    xlsWriteNumber($tablebody, $kolombody++, $data->struktur);
	    xlsWriteNumber($tablebody, $kolombody++, $data->papan_nama);
	    xlsWriteNumber($tablebody, $kolombody++, $data->dokumentasi);
	    xlsWriteNumber($tablebody, $kolombody++, $data->rab);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=proposal.doc");

        $data = array(
            'proposal_data' => $this->Proposal_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('proposal_doc',$data);
    }

}

/* End of file Proposal.php */
/* Location: ./application/controllers/Proposal.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-20 14:21:52 */
/* http://harviacode.com */