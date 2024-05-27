<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class User_model extends CI_Model{

    public function login($username){
        $this->db->select("password");
        $this->db->from("user");
        $this->db->where('user_name', $username);
        $result = $this->db->get();
        $results = $result->result_array();
        return  $results;
    }



    public function checkUsername($username){
        $this->db->where('user_name', $username);
        $result = $this->db->get('user');
        if ($result -> num_rows() == 0) {
            return true;
        } else {
            return false;
        }
        
    }


    public function fetch($username){
        if($username == '') {
            return null;
        }else {
            $this->db->select("*");
            $this->db->from("user");
            $this->db->where('user_name', $username);
            $query = $this->db->get();
            $profile = $query->result_array();
            return  $profile;
        }
    }

}
?>

