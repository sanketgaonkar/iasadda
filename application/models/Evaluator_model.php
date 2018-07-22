<?php
if (!defined('BASEPATH'))exit('Hacking Attempt : Get Out of the system ..!');

class Evaluator_model extends CI_Model {

    function get_evaluator($eval_id) {

        $query = $this->db->where('id', $eval_id)
                ->get('evaluatorusers');
        if ($query->num_rows() > 0) {
            return json_decode(json_encode($query->first_row()), True);
        } else {
            return false;
        }
    }
    

}
