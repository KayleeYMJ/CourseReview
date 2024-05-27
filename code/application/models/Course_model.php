<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Course_model extends CI_Model{
    function fetch_data($query) {
        if($query == ''){
            return null;
        }else{
            $this->db->select("*");
            $this->db->from("course");
            $this->db->like('course_id', $query);
            $this->db->order_by('course_id', 'DESC');
            return  $this->db->get();
        }
    }

    function fetch_course($course_id) {
        $this->db->select("*");
        $this->db->from("course");
        $this->db->like('course_id', $course_id);
        $this->db->order_by('course_id', 'DESC');
        $result = $this->db->get();
        return  $result->result_array();
    }
}