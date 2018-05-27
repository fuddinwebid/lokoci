<?php

class Latihan extends CI_Controller
{

	function __construct() {
		parent::__construct();
		$this->load->model('m_latihan', 'latihan');
	}

	public function index(){
	
		$config['base_url'] 		= site_url().'latihan/'; 
		$config['total_rows'] 		= $this->latihan->get_rows();
		$config['per_page'] 		= '2';
		$page 						= $this->uri->segment(2);
		$config['use_page_numbers'] = TRUE;

		$this->pagination->initialize($config);
		$data['pagination'] 		= $this->pagination->create_links();
		$offset 					= ($page) ? $page : 1;
		$data['kursus'] 				= $this->latihan->ambil_data($config['per_page'], $config['per_page']*($offset-1));

		$this->load->view("template/header");
		$this->load->view("table", $data);
		$this->load->view("template/footer");
	}

	public function add() {
		$data['matkul'] = $this->latihan->get_matkul();
		$this->load->view("template/header");
		$this->load->view("add", $data);
		$this->load->view("template/footer");
	}

	public function addAksi() {
	if(!empty($this->input->post('matkul'))){
		$data = array(
			'matkul_id' => $this->input->post('matkul'),
			'nim' => $this->input->post('nim'),
			'nama' => $this->input->post('nama')
		);
		$this->latihan->insert_data($data);
    $this->session->set_flashdata('message', 'Data berhasil disimpan');
		redirect(base_url("latihan"));
  
	}else{
		$this->session->set_flashdata('message', 'Mata Kuliah belum dipilih !');
	}
  }

	public function edit(){
		$id =$this->uri->segment(3);
		$data['siswa'] = $this->latihan->get_by_id($id);
		$data['matkul'] = $this->latihan->get_matkul();
		$this->load->view("template/header");
		$this->load->view('update', $data);
		$this->load->view("template/footer");
	}

	public function editAksi() {
		if(!empty($this->input->post('matkul'))){
			$data = array(
				'id' => $this->input->post('id'),
				'matkul_id' => $this->input->post('matkul'),
				'nim' => $this->input->post('nim'),
				'nama' => $this->input->post('nama')
			);
			$this->latihan->update_data(array('id' => $this->input->post('id')), $data);
	    $this->session->set_flashdata('message', 'Data berhasil diubah');
	  }else{
			$this->session->set_flashdata('message', 'Mata Kuliah belum dipilih !');
	  }
  	redirect(base_url("latihan"));
	}

	public function hapus() {
		$id =$this->uri->segment(3);
		$this->latihan->delete_data($id);
    $this->session->set_flashdata('message', 'Data berhasil dihapus');
		redirect(base_url("latihan"));
	}

	public function ordering(){
		if(!empty($this->input->post('order')) && !empty($this->input->post('by'))){
		$this->session->set_flashdata('message', '');
		$data['order'] = $this->input->post('order');
		$data['by'] = $this->input->post('by');
		$data['kursus'] = $this->latihan->ordering($data);
    }else{
    $this->session->set_flashdata('message', 'Anda belum menentukan pencarian');
		$data['kursus'] = $this->latihan->get_all();
		}
		$this->load->view("template/header");
		$this->load->view("table", $data);
		$this->load->view("template/footer");

	}


	function code_otomatis(){
    $this->db->select('Right(tb_project.contract_no,3) as kode ',false);
    $this->db->order_by('id_project', 'desc');
    $this->db->limit(1);
    $query = $this->db->get('tb_project');
    if($query->num_rows()<>0){
        $data = $query->row();
        $kode = intval($data->kode)+1;
    }else{
        $kode = 1;

    }
    $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
    $kodejadi  = "KN".$kodemax;
    return $kodejadi;

  }






}




