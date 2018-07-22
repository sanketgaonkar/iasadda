<?php
if (!defined('BASEPATH'))exit('Hacking Attempt : Get Out of the system ..!');

class Evaluator_model extends CI_Model {

    function get_evaluators() {

        $query = $this->db->where('deleted',0)
                ->get('evaluatorusers');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
    
    function get_evaluator($eval_id) {

        $query = $this->db->select('evaluatorusers.*,'
                . 'civilexam_e.totalattempts,civilexam_e.appearedinmains,'
                . 'civilexam_e.uploadlatestDAF,civilexam_e.appearedininterview,'
                . 'civilexam_e.interviewAdmitCard,civilexam_e.finalselection,'
                . 'ifosexam_e.totalattempts as ta,ifosexam_e.appearedinmains as am,'
                . 'ifosexam_e.uploadlatestDAF as uldaf,ifosexam_e.appearedininterview as ai,'
                . 'ifosexam_e.interviewAdmitCard as iac,ifosexam_e.finalselection as fs')
                ->join('ifosexam_e','ifosexam_e.user_id = evaluatorusers.id','left')
                ->join('civilexam_e','ifosexam_e.user_id = evaluatorusers.id','left')
                ->where('id', $eval_id)
                ->get('evaluatorusers');
        if ($query->num_rows() > 0) {
            return json_decode(json_encode($query->first_row()), True);
        } else {
            return false;
        }
    }
    
    function edit_evaluator($mydata, $id){
        $query = $this->db->where('id',$id)
                ->update('evaluatorusers',$mydata);
        if ($query)
            return TRUE;
        else
            return FALSE;
    }
    
    function delete_evaluator($id){
        $query = $this->db->where('id',$id)
                ->update('evaluatorusers',array('deleted'=>1));
        if ($query)
            return TRUE;
        else
            return FALSE;
    }
        

}
