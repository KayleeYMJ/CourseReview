<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Cart_model extends CI_Model{
    function fetch($username) {
        $sql = "favourite,review WHERE favourite.user_name='".$username."'AND favourite.review_id = review.review_id ;";
        //$que = $this->db->query($sql);
        $result = $this->db->get($sql);
        return $reviews = $result->result_array();
    }
    

    public function add($review_id, $username){
        $data = array(
            'review_id' => $review_id,
            'user_name' => $username,
        );
        $this->db->insert('favourite', $data);
    }

    public function delete($review_id, $username){
        $this->db->where('review_id', $review_id);
        $this->db->where('user_name', $username);
        $this->db->delete('favourite');
    }
}