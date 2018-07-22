<?php
if (!defined('BASEPATH'))exit('Hacking Attempt : Get Out of the system ..!');

class Questions_model extends CI_Model {

    function get_questions() {

        $query = $this->db->get('questions');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
    
    function get_question($q_id) {

        $query = $this->db->where('id',$q_id)
                ->get('questions');
        if ($query->num_rows() > 0) {
            return json_decode(json_encode($query->first_row()), True);
        } else {
            return array();
        }
    }
    
    function add_edit_question($arr,$image) {
        $data = array(
            'Question' => $arr['Question'],
            'question_no' => $arr['question_no'],
            'question_alpha' => $arr['question_alpha'],
            'subject' => $arr['subject'],
            'paper' => $arr['paper'],
            'question_order' => $arr['question_order'],
            'refer' => $arr['refer'],
            'word_limit' => $arr['word_limit'],
            'evaluation_charges' => $arr['evaluation_charges'],
        );
        
        if(!empty($image))
            $data['model_answer'] = $image;
        
        if($arr['id']){
            $query = $this->db->where('id',$arr['id'])
                    ->update('questions',$data);
        }else{
            $this->db->set('Date', 'NOW()', FALSE);
            $query = $this->db->insert('questions',$data);
        }

        if($query)
            return TRUE;
        else
            return FALSE;
        
    }
    function delete_question($q_id) {
        $this->db->where('id', $q_id);
        $this->db->delete('questions'); 
    }
    
    

}
