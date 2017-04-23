<?php
class Login_model extends CI_Model{
    
    public function insert($data){
		$this->db->insert('admin',$data);
	}
     
    function check($uname, $pass){
            $query = $this->db->get_where('admin', array('username' => $uname, 'password' => md5($pass)));
            return $query->num_rows();
        }
    
    function admin($uname, $pass){
            $query = $this->db->get_where('admin', array('username' => $uname, 'password' => md5($pass)));
            return $query->result_array();
        }
}
?>
