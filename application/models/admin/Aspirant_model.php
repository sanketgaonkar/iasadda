<?php
if (!defined('BASEPATH'))exit('Hacking Attempt : Get Out of the system ..!');

class Aspirant_model extends CI_Model {

    function get_aspirants() {

        $query = $this->db->where('deleted',0)
                ->get('aspirantuser');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
    
    function get_aspirant($asp_id) {

        $query = $this->db->where('id', $asp_id)
                ->get('aspirantuser');
        if ($query->num_rows() > 0) {
            return json_decode(json_encode($query->first_row()), True);
        } else {
            return false;
        }
    }
    
    function edit_aspirant($mydata, $id){
        $query = $this->db->where('id',$id)
                ->update('aspirantuser',$mydata);
        if ($query)
            return TRUE;
        else
            return FALSE;
    }
    
    function delete_aspirant($id){
        $query = $this->db->where('id',$id)
                ->update('aspirantuser',array('deleted'=>1));
        if ($query)
            return TRUE;
        else
            return FALSE;
    }
        

}
