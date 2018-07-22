<?php

if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class ProfileA_model extends CI_Model{

public function __construct()

{

parent::__construct();

}

 	function profileA_Display($username)
 	{

 		$this->db->select("id, username, password, firstname, lastname, nickname, phone, activesince, emailid, optional, imagename");
 		$this ->db ->where('phone', $username);
 		$this->db->from('aspirantuser');
  		$query = $this->db->get();

 		if($query -> num_rows()>0)
 		{
 			
 		     return $query->result();


 		}else{

 			return "0";
 		}



 	}



 	function profileA_update($id,$datainfo)
 	{
		$this->db->where('id', $id);
		$update=$this->db->update('aspirantuser', $datainfo);
  		if($update)
            {
                return true;
            }
            else
            {
               return false;
            }



 	}

public function insert($data,$id){
       
        if(!array_key_exists("created",$data)){
            $data['created'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists("modified",$data)){
            $data['modified'] = date("Y-m-d H:i:s");
        }
        //$insert = $this->db->insert('user',$data);
        
        $this->db->where('id', $id);
    $update=$this->db->update('aspirantuser', $data);
      
      if($update)
            {
                return true;
            }
            else
            {
               return false;
            }

        /*if($insert){
            return $this->db->insert_id();
        }else{
            return false;    
        }*/
    }

}