<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Review_model extends CI_Model{
    function fetch($course_id) {
        $this->db->select("*");
        $this->db->from("review");
        $this->db->where('course_id', $course_id);
        $this->db->order_by('time', 'DESC');
        $result = $this->db->get();
        return $reviews = $result->result_array();
    }

    public function add($course_id, $author, $content, $username){
        $data = array(
            'course_id' => $course_id,
            'author' => $author,
            'content' => $content,
            'user_name'  => $username,
        );
        $this->db->insert('review', $data);
    }
}