<?php
class M_admin extends CI_Model{
    public function kategori(){
		$this->db->select('*');
		return $this->db->get('kategori')->result_array();
    }
    
    public function berita($data){
		$this->db->insert('berita', $data);
	}
    
    function view_berita(){
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->join('kategori', 'berita.id_kategori = kategori.id_kategori');
		return $this->db->get()->result_array();
    }
    
    public function delete_berita($id_berita){
		$this->db->delete('berita', array('id_berita' => $id_berita));
	}
    
    function get_berita($id_berita){
		return $this->db->get_where('berita', array('id_berita' => $id_berita))->row();
	}
    
    function update($id_berita, $data){
        $this->db->where('id_berita', $id_berita)
                 ->update('berita', $data);
    }
}