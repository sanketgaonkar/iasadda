<?php

if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class ProjectModel extends CI_Model{

public function __construct()

{

parent::__construct();

}


function insert_image($data)
 	{

 		$this->db->insert('image', $data);

    		$id= $this->db->insert_id();

    		if($id != '0'||$id!=" ")
    		  return $id;

    		else
    			$id="0";
    			return $id;

 	}

 	public function insert($data = array()){
       
        if(!array_key_exists("created",$data)){
            $data['created'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists("modified",$data)){
            $data['modified'] = date("Y-m-d H:i:s");
        }
        //$insert = $this->db->insert('user',$data);
        
        $this->db->where('id', $id);
		$update=$this->db->update('user', $data);
  		
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

}?>