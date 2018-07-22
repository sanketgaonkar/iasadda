<?php
if (!defined('BASEPATH'))exit('Hacking Attempt : Get Out of the system ..!');

class ProfilE_model extends CI_Model {

    function profileE_Display($username) {

        $this->db->select("active, id, first_name, last_name, nickname, number, created, email, imagenamel, usercategory, userrating, myinfo");
        $this->db->where('email', $username);
        $this->db->from('evaluatorusers');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result();
        } else {

            return "0";
        }
    }
    
    function profileE_get_civil($id) {
        $query = $this->db->where('user_id', $id)
                ->get('civilexam_e');
        if ($query->num_rows() > 0) {
            return json_decode(json_encode($query->first_row()), True);
        } else {
            return false;
        }
    }
    
    function profileE_get_ifos($id) {
        $query = $this->db->where('user_id', $id)
                ->get('ifosexam_e');
        if ($query->num_rows() > 0) {
            return json_decode(json_encode($query->first_row()), True);
        } else {
            return false;
        }
    }

    //insert UPSC
    function insertUPSC_civil($civil, $id = 0) {
        if($id){
            $insert = $this->db->where('idcivil',$id)
                    ->update('civilexam_e', $civil);
        }else{
            $insert = $this->db->insert('civilexam_e', $civil);
        }
        if ($insert) {
            return TRUE;
        } else {
            return false;
        }
    }

    function insertUPSC_ifos($UpscIFosdata, $id = 0) {
        if($id){
            $insert = $this->db->where('idifos',$id)
                    ->update('ifosexam_e', $UpscIFosdata);
        }else{
            $insert = $this->db->insert('ifosexam_e', $UpscIFosdata);
        }
        if ($insert) 
            return TRUE;
         else 
            return false;
    }

    function get_evaluators(){
        $arr = array('evaluator'=>array(),'answers'=>array());
        $query = $this->db->select('distinct(evaluatorusers.id),civilexam_e.appearedinmains,civilexam_e.appearedininterview,evaluatorusers.*')
                ->join('civilexam_e', 'civilexam_e.user_id = evaluatorusers.id', 'left')
                ->get('evaluatorusers');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $v){
                $arr['evaluator'][] = $v;
                $query1 = $this->db->select('count(evaluator_for_question_evaluation.id) as tot_count')
                    ->join('evaluator_for_question_evaluation', 'evaluator_for_question_evaluation.evaluator_for_question_id = evaluator_for_question.id')
                    ->where('(evaluator_for_question.primary_evaluator ='.$v['id'].' or evaluator_for_question.secondary_evaluator = '.$v['id'].')')
                    ->get('evaluator_for_question');
                if ($query1->num_rows() > 0) {
                    $tmp = $query1->first_row();
                    $arr['answers'][$v['id']] = $tmp->tot_count;
                }else{
                    $arr['answers'][$v['id']] = 0;
                }
                
            }
                            

            
            
        }
        return $arr;
    }


//    //insert UPSC
//    function insertUPSC($civil, $IFos, $id) {
//
//        $insert = $this->db->insert('civilexam_e', $civil);
//
//
//        if ($insert) {
//
//            $civilid = $this->db->insert_id();
//            $IFosinsert = $this->db->insert('ifosexam_e', $IFos);
//
//            if ($IFosinsert) {
//                $ifosid = $this->db->insert_id();
//                $evaluatorid = $id;
//                $upsc = array('civilid' => $civilid,
//                    'ifosid' => $ifosid,
//                    'evaluatorid' => $evaluatorid);
//                $upscexperience = $this->db->insert('upscexperience', $upsc);
//                if ($upscexperience)
//                    return true;
//                else
//                    return false;
//            } else
//                return false;
//        } else
//            return false;
//    }

    function profileA_update($id, $datainfo) {
        $this->db->where('id', $id);
        $update = $this->db->update('evaluatorusers', $datainfo);
        if ($update) {
            return true;
        } else {
            return false;
        }
    }

    public function insert($data, $id) {

        if (!array_key_exists("created", $data)) {
            $data['created'] = date("Y-m-d H:i:s");
        }
        if (!array_key_exists("modified", $data)) {
            $data['modified'] = date("Y-m-d H:i:s");
        }

        $this->db->where('id', $id);
        $update = $this->db->update('evaluatorusers', $data);

        if ($update) {
            return true;
        } else {
            return false;
        }
    }

}
