 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Jenis extends CI_Controller {
 
 	public function index()
 	{
 		$this->load->model('hero_model');
		$data["jenis_hero"] = $this->hero_model->getJenisHero();
		$this->load->view('jenis_hero',$data);	
 	}
 	
 	public function create()
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		
		$this->load->model('hero_model');	
		if($this->form_validation->run()==FALSE){

			$this->load->view('tambah_jenis_view');

		}else{

			$this->hero_model->insertJenisHero();
			$this->load->view('tambah_jenis_sukses');
		}
	}

	public function update($id)
	{

		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		
		$this->load->model('hero_model');
		$data['jenis'] = $this->hero_model->getJenisHeroById($id);
		
		if($this->form_validation->run()==FALSE){

			$this->load->view('edit_jenis_view',$data);

		}else{

			$this->hero_model->updateJenis($id);
			$this->load->view('edit_jenis_sukses');
			
		}
	}

	public function delete($id)
	{
		$this->load->model('hero_model');
		$this->hero_model->deleteJenis($id);
		redirect('jenis/index');
	}

	public function datatable()
	{
		$this->load->model('hero_model');
		$data["jenis_hero"] = $this->hero_model->getJenisHero();
		$this->load->view('jenis_hero',$data);	
	}
	
 }
 
 /* End of file Jenis.php */
 /* Location: ./application/controllers/Jenis.php */