<?php
if (!defined('BASEPATH'))exit('Hacking Attempt : Get Out of the system ..!');

class Main_model extends CI_Model {

    function can_login($username, $password) {

        $this->db->where('phone', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('aspirantuser');
        if ($query->num_rows() > 0) {
            $row = $query->first_row();
            $session_data = array('username' => $username,'aspirant_id'=> $row->id, 'aspirant_data' => $row);
            $this->session->set_userdata($session_data);
            return $row->id;
        } else {
            return false;
        }
    }
    
    function register($post){
        $data = array(
            'firstname' => $post['fname'],
            'lastname' => $post['lname'],
            'phone' => $post['mobile'],
            'password' => $post['password'],
        );
        return $this->db->insert('aspirantuser',$data);
    }

}
