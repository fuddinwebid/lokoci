<?php
class M_latihan extends CI_Model
{

	protected $tbl_dosen 			= 'dosen';
	protected $tbl_mahasiswa 	= 'mahasiswa';
	protected $tbl_matkul 		= 'matkul';

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function get_rows(){
	$this->db->select($this->tbl_matkul.'.id as id_matkul,'.$this->tbl_matkul.'.nama_matkul,'.$this->tbl_matkul.'.sks,'.$this->tbl_matkul.'.id_dosen')
				   ->select($this->tbl_mahasiswa.'.id as id_mahasiswa,'.$this->tbl_mahasiswa.'.matkul_id,'.$this->tbl_mahasiswa.'.nim,'.$this->tbl_mahasiswa.'.nama as nama_siswa')
				   ->select($this->tbl_dosen.'.id,'.$this->tbl_dosen.'.nik,'.$this->tbl_dosen.'.nama as nama_dosen')
					 ->from($this->tbl_matkul)
					 ->join($this->tbl_mahasiswa, $this->tbl_mahasiswa.'.matkul_id'.'='.$this->tbl_matkul.'.id','inner')
					 ->join($this->tbl_dosen, $this->tbl_dosen.'.id'.'='.$this->tbl_matkul.'.id_dosen','left');
					 
	return $this->db->get()->num_rows();	
	}


	function ambil_data($limit, $start)
	{

	$this->db->select($this->tbl_matkul.'.id as id_matkul,'.$this->tbl_matkul.'.nama_matkul,'.$this->tbl_matkul.'.sks,'.$this->tbl_matkul.'.id_dosen')
				   ->select($this->tbl_mahasiswa.'.id as id_mahasiswa,'.$this->tbl_mahasiswa.'.matkul_id,'.$this->tbl_mahasiswa.'.nim,'.$this->tbl_mahasiswa.'.nama as nama_siswa')
				   ->select($this->tbl_dosen.'.id,'.$this->tbl_dosen.'.nik,'.$this->tbl_dosen.'.nama as nama_dosen')
					 ->from($this->tbl_matkul)
					 ->join($this->tbl_mahasiswa, $this->tbl_mahasiswa.'.matkul_id'.'='.$this->tbl_matkul.'.id','inner')
					 ->join($this->tbl_dosen, $this->tbl_dosen.'.id'.'='.$this->tbl_matkul.'.id_dosen','left')
					 ->order_by($this->tbl_mahasiswa.'.id', 'desc')
					 ->limit($limit, $start);

	return $this->db->get()->result();
	}

	public function get_matkul()
	{

		$this->db->select('*');
		$this->db->from($this->tbl_matkul);
		$this->db->order_by('id', 'asc');
	return $this->db->get()->result();
	}

	public function get_by_id($id)
	{
  $this->db->select($this->tbl_matkul.'.id as id_matkul,'.$this->tbl_matkul.'.nama_matkul,'.$this->tbl_matkul.'.sks,'.$this->tbl_matkul.'.id_dosen')
				   ->select($this->tbl_mahasiswa.'.id as id_mahasiswa,'.$this->tbl_mahasiswa.'.matkul_id,'.$this->tbl_mahasiswa.'.nim,'.$this->tbl_mahasiswa.'.nama as nama_siswa')
				   ->select($this->tbl_dosen.'.id,'.$this->tbl_dosen.'.nik,'.$this->tbl_dosen.'.nama as nama_dosen')
					 ->from($this->tbl_matkul)
					 ->join($this->tbl_mahasiswa, $this->tbl_mahasiswa.'.matkul_id'.'='.$this->tbl_matkul.'.id','inner')
					 ->join($this->tbl_dosen, $this->tbl_dosen.'.id'.'='.$this->tbl_matkul.'.id_dosen','left')
					 ->where($this->tbl_mahasiswa.'.id',$id);
	$q = $this->db->get_where();
	if ($q -> num_rows() > 0) {
  foreach ($q->result() as $row) {
  $data[] = $row;
   }
   return $data;
   }
	}

	function insert_data($data){
		$this->db->insert($this->tbl_mahasiswa, $data);
	}

	public function update_data($id, $data)
	{
		$this->db->update($this->tbl_mahasiswa, $data, $id);
		return $this->db->affected_rows();
	}

	public function delete_data($id){
			$this->db->where('id', $id);
			return $this->db->delete($this->tbl_mahasiswa);
		}

	public function ordering($data)
	{
  
  $this->db->select($this->tbl_matkul.'.id as id_matkul,'.$this->tbl_matkul.'.nama_matkul,'.$this->tbl_matkul.'.sks,'.$this->tbl_matkul.'.id_dosen')
				   ->select($this->tbl_mahasiswa.'.id as id_mahasiswa,'.$this->tbl_mahasiswa.'.matkul_id,'.$this->tbl_mahasiswa.'.nim,'.$this->tbl_mahasiswa.'.nama as nama_siswa')
				   ->select($this->tbl_dosen.'.id,'.$this->tbl_dosen.'.nik,'.$this->tbl_dosen.'.nama as nama_dosen')
					 ->from($this->tbl_matkul)
					 ->join($this->tbl_mahasiswa, $this->tbl_mahasiswa.'.matkul_id'.'='.$this->tbl_matkul.'.id','inner')
					 ->join($this->tbl_dosen, $this->tbl_dosen.'.id'.'='.$this->tbl_matkul.'.id_dosen','left')
					 ->order_by($this->tbl_mahasiswa.'.'.$data['order'], $data['by']);
					 
	return $this->db->get()->result();
	}


	

}