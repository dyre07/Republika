<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function index()
	{
        if($this->session->userdata('login') == TRUE){
            $data['berita'] = $this->m_admin->view_berita();

            $this->load->view('header');
            $this->load->view('sidebar');
            $this->load->view('table', $data);
            $this->load->view('footer');
        }else{
            echo "<script>
                    window.location.href='".base_url('login')."';
                    alert('Please Login First');
                 </script>";
        }
	}
    
    public function berita()
	{
        $data['kategori'] = $this->m_admin->kategori();
        
        $this->load->view('header');
        $this->load->view('sidebar');
		$this->load->view('tambah_berita', $data);
        $this->load->view('footer');
	}
    
    public function update($id_berita = NULL){
        $data['update'] = $this->m_admin->get_berita($id_berita);
        $data['kategori'] = $this->m_admin->kategori();
        
        $this->load->view('header');
        $this->load->view('sidebar');
		$this->load->view('update', $data);
        $this->load->view('footer');
    }
    
    public function input_berita(){
        $id_kategori = $this->input->post('id_kategori');
        
        if($id_kategori == 'pilih di sini'){
            echo "<script>
                    window.location.href='".base_url('admin/berita')."';
                    alert('Please Choose kategori');
                 </script>";
            
        }else{
        
        $config['upload_path'] = './images/';
        $name = 'berita_'.time();
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 2500;
        $config['file_name'] = $name;
        
        $this->load->library('upload', $config);
        $this->upload->do_upload('gambar');
        $data_upload = $this->upload->data();
        $image = $data_upload['file_name']; 

        $data = array(
                    'title' => $this->input->post('title'),
                    'content' => $this->input->post('content'),
                    'image' => $image,
                    'id_kategori' => $id_kategori
        ); 
		
		$this->m_admin->berita($data);
		redirect(base_url());
        }
	}
    
    public function update_proccess(){
        $id_kategori = $this->input->post('id_kategori');
        
        if($id_kategori == 'pilih di sini'){
            echo "<script>
                    window.history.back();
                    alert('Please Choose kategori');
                 </script>";
            
        }else{
            
        $id_berita = $this->input->post('id_berita');
        $data = array(
                    'title' => $this->input->post('title'),
                    'content' => $this->input->post('content'),
                    'id_kategori' => $id_kategori
        );
        
        $this->m_admin->update($id_berita, $data);
        redirect(base_url());
        }
    }
    
    public function delete($id_berita = NULL){
        $gambar = $this->uri->segment(4);
        unlink(FCPATH.'images/'.$gambar);
		$this->m_admin->delete_berita($id_berita);
		redirect(base_url());
	}
}
