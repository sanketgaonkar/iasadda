<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_model extends CI_Model{
    
    public function checkUser($data = array()){
        
        $query = $this->db->where(array('username'=>$data['username'],'password'=>$data['password']))
                ->get('admin');
        $check = $query->num_rows();
        
        if($check > 0){
            $result = $query->row_array();
            return $result['id'];
        }

        return false;
    }
    
}