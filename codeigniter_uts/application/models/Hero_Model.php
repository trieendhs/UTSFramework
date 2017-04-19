<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Hero_Model extends CI_Model {
	
		public function __construct()
		{
			parent::__construct();
			//Do your magic here
		}

		public function getJenisHero()
		{
			$this->db->select("*");
			$query = $this->db->get('jenis_hero');
			return $query->result();
		}

		public function getHero($idJenis)
		{
			$this->db->select("hero.id, jenis_hero.keterangan as namaJenis, nama ,DATE_FORMAT(tanggal_lahir,'%d-%m-%Y') as tanggalLahir,foto");
			$this->db->where('fk_jenis', $idJenis);	
			$this->db->join('jenis_hero', 'jenis_hero.id = hero.fk_jenis', 'left');	
			$query = $this->db->get('hero');
			return $query->result();
		}

		public function insertJenisHero()
		{

			$nama = $this->input->post('nama');
        	$data = array (
            	'keterangan' => $nama
            );
        	$this->db->insert('jenis_hero',$data);
		}

		public function insertHero($idJenis)
		{
			$nama = $this->input->post('nama');
        	$tanggalLahir = $this->input->post('tanggalLahir');
			$date = date('Y-m-d', strtotime($tanggalLahir));
        	$foto = $this->upload->data('file_name');
        	$data = array (
            	'nama' => $nama,
            	'tanggal_lahir'=> $date,
            	'foto' => $foto,
        		'fk_jenis' => $idJenis
            );
        	$this->db->insert('hero',$data);
		}

		public function getJenisHeroById($id)
		{
			$this->db->where('id', $id);
			$query = $this->db->get('jenis_hero',1);
			return $query->result();
		}

		public function getHeroById($idHero)
		{
			$this->db->where('id', $idHero);
			$query = $this->db->get('hero',1);
			return $query->result();
		}

		public function updateJenis($id)
		{
			$nama = $this->input->post('nama');
        	$data = array (
            	'keterangan' => $nama
            );
            $this->db->where('id', $id);
        	$this->db->update('jenis_hero',$data);
		}

		public function updateHero($idHero)
		{
			$nama = $this->input->post('nama');
        	$tanggalLahir = $this->input->post('tanggalLahir');
			$date = date('Y-m-d', strtotime($tanggalLahir));
        	$foto = $this->upload->data('file_name');
        	$data = array (
            	'nama' => $nama,
            	'tanggal_lahir'=> $date,
            	'foto' => $foto
        	); 
			$this->db->where('id', $idHero);
			$this->db->update('hero', $data);
		}

		public function deleteJenis($id)
		{
			$this->db->where('fk_jenis', $id);
        	$this->db->delete('hero');

			$this->db->where('id', $id);
        	$this->db->delete('jenis_hero');
		}

		public function deleteHero($idHero)
		{
			$this->db->where('id', $idHero);
        	$this->db->delete('hero');
		}
	
	}
	
	/* End of file Hero_Model.php */
	/* Location: ./application/models/Hero_Model.php */
?>