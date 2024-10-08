<?php
class User_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function insert_user($user_data) {
        return $this->db->insert('users', $user_data);
    }

	public function soft_delete_user($user_id) {
        $this->db->where('id', $user_id);
        return $this->db->update('users', ['deleted_at' => date('Y-m-d H:i:s')]);
    }

    public function get_users() {
        $this->db->select('users.*, groups.name as group_name');
        $this->db->from('users');
        $this->db->join('groups', 'users.group_id = groups.id');
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>
