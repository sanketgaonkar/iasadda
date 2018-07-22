<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Model{
    function __construct() {
        $this->tableName = 'evaluatorusers';
        $this->primaryKey = 'id';
    }
    public function checkUser($data = array()){
        $this->db->select($this->primaryKey);
        $this->db->from($this->tableName);
        $this->db->where(array('oauth_provider'=>$data['oauth_provider'],'oauth_uid'=>$data['oauth_uid']));
        $query = $this->db->get();
        $check = $query->num_rows();
        
        if($check > 0){
            $result = $query->row_array();
            $data['modified'] = date("Y-m-d H:i:s");
            $update = $this->db->update($this->tableName,$data,array('id'=>$result['id']));
            $userID = $result['id'];
        }else{
            $data['created'] = date("Y-m-d H:i:s");
            $data['modified']= date("Y-m-d H:i:s");
            $insert = $this->db->insert($this->tableName,$data);
            $userID = $this->db->insert_id();
        }
        
        $query1 = $this->db->select('IF(nickname <> "", nickname, first_name) as display_name')
                ->from($this->tableName)
                ->where("id",$userID)
                ->get();
        if($query1->num_rows()){
            $result1 = $query1->row_array();
           $this->session->set_userdata('user_display_name',  $result1['display_name']);
        }
        
        //store status & user info in session
        $this->session->set_userdata('userData', $data);
        $this->session->set_userdata('evaluator_id', $userID);

        return $userID?$userID:false;
    }
    
    public function check_login_count($u_id, $table){
        $query = $this->db->select('login_count')
                ->where('id',$u_id)
                ->get($table);
        if($query->num_rows()){
            $row = $query->first_row();
            if($row->login_count == 0){
                $update = $this->db->where('id',$u_id)
                        ->update($table,array('login_count'=>1));
                return true;
            }
        }
        return false;
    }
}

/*
CREATE TABLE `users` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `oauth_provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `oauth_uid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
 `locale` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
 `picture_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `profile_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `created` datetime NOT NULL,
 `modified` datetime NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
*/