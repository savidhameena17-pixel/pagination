<?php
defined ('BASEPATH') OR exit('No direct script access allowed');
class User_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function insert_user($data) {
        return $this->db->insert('page', $data);
    }
    public function get_users($limit, $start) {
        $this->db->order_by('id', 'DESC');
        $this->db->limit($limit, $start);
        $query = $this->db->get('page');
        return $query->result();
    }
    public function get_total_users() {
        return $this->db->count_all('page');
    }
    public function delete_user($id) {
        $this->db->where('id', $id);
        return $this->db->delete('page');
    }
}