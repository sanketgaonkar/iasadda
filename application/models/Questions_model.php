<?php
if (!defined('BASEPATH'))exit('Hacking Attempt : Get Out of the system ..!');

class Questions_model extends CI_Model {

    function insert_answer($q_id, $u_id, $img_data){
        $mydata = array(
            'aspirant_id' => $u_id,
            'Question_id' => $q_id, 
            'Date' => date('Y-m-d')
        );
        if($this->db->insert('question_answers',$mydata)){
           $insert_id = $this->db->insert_id();
            foreach($img_data as $v){
                $mydata1 = array(
                    'question_answers_id' => $insert_id,
                    'image' => $v, 
                    'Date' => date('Y-m-d')
                );
                $this->db->insert('question_answer_images',$mydata1);
            }
            return TRUE;
        }
        return FALSE;
    }

    function get_questions() {
        $query = $this->db->select('questions.*,question_answers.aspirant_id')
                ->where('questions.Date', date('Y-m-d'))
                ->join('question_answers', 'question_answers.Question_id = questions.id', 'left')
                ->order_by('question_order')
                ->get('questions');   
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
    
    function get_submisions() {

        $arr = array('question' => array(), 'images' => array());

        $query = $this->db->select('questions.*, question_answers.id as qa_id, question_answers.Date as submision_date, evaluator_question_apply.id as eqa_id')
                ->join('question_answers', 'question_answers.Question_id = questions.id')
                ->join('evaluator_question_apply', 'evaluator_question_apply.Question_answer_id = question_answers.id and '
                        . 'evaluator_question_apply.Evaluator_id = ' . $this->session->userdata('evaluator_id')
                        , 'left')
                ->get('questions');
        
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                if (!$this->check_already_selected($row['id']) && empty($row['eqa_id'])) {
                    $arr['question'][] = $row;
                    $query1 = $this->db->where('question_answers_id', $row['qa_id'])
                            ->get('question_answer_images');
                    if ($query1->num_rows() > 0)
                        foreach ($query1->result_array() as $row1)
                            $arr['images'][$row['id']][] = $row1['image'];
                }
            }
        }

        return $arr;
    }
    
    function get_under_review_evaluator() {

        $arr = array('question' => array(), 'images' => array());

        $query = $this->db->select('questions.*, question_answers.id as qa_id, question_answers.Date as submision_date, evaluator_question_apply.id as eqa_id')
                ->join('question_answers', 'question_answers.Question_id = questions.id')
                ->join('evaluator_question_apply', 'evaluator_question_apply.Question_answer_id = question_answers.id and '
                        . 'evaluator_question_apply.Evaluator_id = ' . $this->session->userdata('evaluator_id'))
                ->get('questions');
        
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                if (!$this->check_already_selected($row['id'])) {
                    $arr['question'][] = $row;
                    $query1 = $this->db->where('question_answers_id', $row['qa_id'])
                            ->get('question_answer_images');
                    if ($query1->num_rows() > 0)
                        foreach ($query1->result_array() as $row1)
                            $arr['images'][$row['id']][] = $row1['image'];
                }
            }
        }

        return $arr;
    }

    function apply_evaluator($evaluator_id, $qa_id) {
        $my_data = array(
            'Question_answer_id' => $qa_id,
            'Evaluator_id' => $evaluator_id,
        );
        $insert = $this->db->insert('evaluator_question_apply', $my_data);
    }

    function get_applied_evaluator_for_question() {

        $arr = array("question" => array(), "evaulator" => array(), "already_selected" => array());
        //,count(question_answers.id) as ans_count
        $query = $this->db->select('question_answers.id as qa_id,questions.id as q_id,questions.Question,'
                . 'question_answers.*,'
                . 'questions.question_no,questions.question_alpha,questions.subject,questions.paper,questions.model_answer,questions.evaluation_charges')
                ->join('questions', 'questions.id = question_answers.Question_id')
                ->where('question_answers.aspirant_id = ' . $this->session->userdata('aspirant_id'))
                ->get('question_answers');
        
        if ($query->num_rows() > 0)
            foreach ($query->result_array() as $k) {
                if (!empty($k['q_id']) && !$this->check_already_selected($k['q_id'])) {
                    $arr['question'][] = $k;
                    $query1 = $this->db->select('evaluatorusers.id as e_id,CONCAT(evaluatorusers.first_name, " " , evaluatorusers.last_name) AS evaluator_name,'
                                    . 'civilexam_e.appearedinmains,civilexam_e.appearedininterview,'
                                    . 'evaluatorusers.picture_url,evaluator_question_apply.id as eqa_id')
                            ->join('evaluator_question_apply', 'evaluator_question_apply.Question_answer_id = ' . $k['qa_id'])
                            ->join('civilexam_e', 'civilexam_e.user_id = evaluatorusers.id', 'left')
                            ->where('evaluatorusers.id = evaluator_question_apply.Evaluator_id')
                            ->get('evaluatorusers');
                    
                    if ($query1->num_rows() > 0)
                        foreach ($query1->result_array() as $k1)
                            $arr['evaulator'][$k['q_id']][] = $k1;
                }
            }

        return $arr;
    }

    function check_already_selected($q_id) {
        $query = $this->db->where('Question_id = ' . $q_id)
                ->get('evaluator_for_question');
        if ($query->num_rows() > 0)
            return TRUE;
        else
            return FALSE;
    }

    function get_under_review_questions() {

        $arr = array('question' => array(), 'images' => array());

        $query = $this->db->select('questions.id as q_id,questions.Question,question_answers.*,'
                        . 'count(question_answers.id) as ans_count,'
                        . 'CONCAT(eu1.first_name, " " , eu1.last_name) AS primary_evaluator,'
                        . 'CONCAT(eu2.first_name, " " , eu2.last_name) AS secondary_evaluator,'
                        . 'evaluator_for_question.created,'
                . 'questions.question_no,questions.question_alpha,questions.subject,questions.paper,questions.model_answer,questions.evaluation_charges')
                ->join('questions', 'questions.id = question_answers.Question_id')
                ->join('evaluator_for_question', 'evaluator_for_question.Question_id = questions.id')
                ->join('evaluatorusers as eu1', 'eu1.id = evaluator_for_question.primary_evaluator')
                ->join('evaluatorusers as eu2', 'eu2.id = evaluator_for_question.secondary_evaluator', 'left')
                ->where('question_answers.aspirant_id = ' . $this->session->userdata('aspirant_id'))
                ->get('question_answers');
        if ($query->num_rows() > 0)
            foreach ($query->result_array() as $k) {
                if($k['id'] && !$this->chk_if_evaluated($k['q_id'],$this->session->userdata('aspirant_id'))){
                $arr['question'][] = $k;
                $query1 = $this->db->where('question_answers_id', $k['id'])
                        ->get('question_answer_images');
                if ($query1->num_rows() > 0)
                    foreach ($query1->result_array() as $row1)
                        $arr['images'][$k['id']][] = $row1['image'];
                }
            }
        return $arr;
    }
    
    function chk_if_evaluated($q_id, $a_id){
        $query = $this->db->select('evaluator_for_question.id')
                ->join('evaluator_for_question_evaluation', 'evaluator_for_question_evaluation.evaluator_for_question_id = evaluator_for_question.id')
                ->where('evaluator_for_question.aspirant_id = ' . $a_id .' and Question_id = '.$q_id)
                ->get('evaluator_for_question');
        if($query->num_rows() > 0){
            return TRUE;
        }
        return FALSE;
    }
    
    function get_evaluated_questions() {

        $arr = array('question' => array(), 'images' => array());

        $query = $this->db->select('questions.id as q_id,questions.Question,question_answers.*,'
                        . 'count(question_answers.id) as ans_count,'
                        . 'CONCAT(eu1.first_name, " " , eu1.last_name) AS primary_evaluator,'
                        . 'CONCAT(eu2.first_name, " " , eu2.last_name) AS secondary_evaluator,'
                        . 'evaluator_for_question.created,'
                . 'questions.question_no,questions.question_alpha,questions.subject,questions.paper,questions.model_answer,questions.evaluation_charges')
                ->join('questions', 'questions.id = question_answers.Question_id')
                ->join('evaluator_for_question', 'evaluator_for_question.Question_id = questions.id')
                ->join('evaluatorusers as eu1', 'eu1.id = evaluator_for_question.primary_evaluator')
                ->join('evaluatorusers as eu2', 'eu2.id = evaluator_for_question.secondary_evaluator', 'left')
                ->where('question_answers.aspirant_id = ' . $this->session->userdata('aspirant_id'))
                ->get('question_answers');
        if ($query->num_rows() > 0)
            foreach ($query->result_array() as $k) {
                if($k['id'] && $this->chk_if_evaluated($k['q_id'],$this->session->userdata('aspirant_id'))){
                $arr['question'][] = $k;
                $query1 = $this->db->where('question_answers_id', $k['id'])
                        ->get('question_answer_images');
                if ($query1->num_rows() > 0)
                    foreach ($query1->result_array() as $row1)
                        $arr['images'][$k['id']][] = $row1['image'];
                }
            }
        return $arr;
    }
    
    function insert_evaluators_for_question($p_id, $s_id, $q_id) {

        if ($p_id) {
            $mydata = array(
                'Question_id' => $q_id,
                'primary_evaluator' => $p_id,
                'secondary_evaluator' => $s_id,
                'aspirant_id' => $this->session->userdata('aspirant_id'),
                'created' => date('Y-m-d h:i:s'),
            );
            $query = $this->db->insert("evaluator_for_question", $mydata);

            return TRUE;
        } else {
            return FALSE;
        }
    }

    function get_under_review_questions_evaluator() {

        $arr = array('question' => array(), 'images' => array());
        $evaluator_id = $this->session->userdata('evaluator_id');

        $query = $this->db->select('evaluator_for_question.id as efq_id,'
                        . 'questions.id as q_id,questions.Question,'
                        . 'evaluator_for_question.created,'
                        . 'question_answers.id as qa_id,'
                . 'questions.question_no,questions.question_alpha,questions.subject,questions.paper,questions.model_answer,questions.evaluation_charges')
                ->join('questions', 'questions.id = evaluator_for_question.Question_id')
                ->join('question_answers', 'question_answers.Question_id = questions.id')
                ->where("(evaluator_for_question.primary_evaluator = $evaluator_id or evaluator_for_question.secondary_evaluator= $evaluator_id)")
                ->get('evaluator_for_question');
        if ($query->num_rows() > 0)
            foreach ($query->result_array() as $k) {
                if(!$this->check_evaluated($k['efq_id'],$k['q_id'])){
                    $arr['question'][] = $k;
                    $query1 = $this->db->where('question_answers_id', $k['qa_id'])
                            ->get('question_answer_images');
                    if ($query1->num_rows() > 0)
                        foreach ($query1->result_array() as $row1)
                            $arr['images'][$k['q_id']][] = $row1['image'];
                }
            }
        return $arr;
    }

    function paper_evaluation($q_id) {
        
        $arr = array('question' => array(), 'images' => array());
        $evaluator_id = $this->session->userdata('evaluator_id');
        
        $query = $this->db->select('questions.id as q_id,question_answers.id as qa_id,questions.Question,'
                . 'evaluator_for_question.created,evaluator_for_question.id,'
                . 'questions.question_no,questions.question_alpha,questions.subject,'
                . 'questions.paper,questions.model_answer,questions.evaluation_charges')
                ->join('questions', 'questions.id = evaluator_for_question.Question_id')
                ->join('question_answers', 'question_answers.Question_id = questions.id')
                ->where('evaluator_for_question.id', $q_id)
                ->where("(primary_evaluator = $evaluator_id or secondary_evaluator = $evaluator_id)")
                ->get('evaluator_for_question');
        if ($query->num_rows() > 0)
            foreach ($query->result_array() as $k) {
                $arr['question'][] = $k;
                $query1 = $this->db->where('question_answers_id', $k['qa_id'])
                        ->get('question_answer_images');
                if ($query1->num_rows() > 0)
                    foreach ($query1->result_array() as $row1)
                        $arr['images'][] = array("image" => $row1['image'], "id"=> $row1['id']);
            }
            
        return $arr;
    }
    
    public function add_paper_evaluation($mydata,$img_data){
        $query = $this->db->insert("evaluator_for_question_evaluation", $mydata);
        if($query){
            $id = $this->db->insert_id();
            foreach ($img_data as $v){
                $v['evaluator_for_question_evaluation_id'] = $id;
                $query1 = $this->db->insert("evaluator_for_question_evaluation_image_ans", $v);
            }
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    public function get_evaluation_questions_evaluator(){
        $arr = array('question' => array(), 'images' => array());
        $evaluator_id = $this->session->userdata('evaluator_id');

        $query = $this->db->select('evaluator_for_question.id as efq_id,'
                        . 'questions.id as q_id,questions.Question,'
                        . 'evaluator_for_question.created,'
                        . 'question_answers.id as qa_id,'
                . 'questions.question_no,questions.question_alpha,questions.subject,'
                . 'questions.paper,questions.model_answer,questions.evaluation_charges')
                ->join('questions', 'questions.id = evaluator_for_question.Question_id')
                ->join('question_answers', 'question_answers.Question_id = questions.id')
                ->where("(evaluator_for_question.primary_evaluator = $evaluator_id or evaluator_for_question.secondary_evaluator= $evaluator_id)")
                ->get('evaluator_for_question');
        if ($query->num_rows() > 0)
            foreach ($query->result_array() as $k) {
                if($this->check_evaluated($k['efq_id'],$k['q_id'])){
                    $arr['question'][] = $k;
                    $query1 = $this->db->where('question_answers_id', $k['qa_id'])
                            ->get('question_answer_images');
                    if ($query1->num_rows() > 0)
                        foreach ($query1->result_array() as $row1)
                            $arr['images'][$k['q_id']][] = $row1['image'];
                }
            }
        return $arr;
    }
    
    function check_evaluated($efq_id, $q_id){
        $query = $this->db->where(array("evaluator_for_question_id"=>$efq_id,"q_id"=>$q_id,))
                ->get('evaluator_for_question_evaluation');
        if ($query->num_rows() > 0){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    public function get_evaluated_comments_evaluator($q_id){
        
        $arr = array('question' => array(), 'images' => array());
        $evaluator_id = $this->session->userdata('evaluator_id');
        
        $query = $this->db->select('questions.model_answer,questions.Question,evaluator_for_question.created,'
                . 'evaluator_for_question_evaluation.*,evaluator_for_question.id as efq_id,'
                . 'questions.question_no,questions.question_alpha,questions.subject,'
                . 'questions.paper,questions.model_answer,questions.evaluation_charges,'
                . 'evaluator_for_question.aspirant_id')
                ->join('questions', 'questions.id = evaluator_for_question.Question_id')
                ->join('question_answers', 'question_answers.Question_id = questions.id')
                ->join('evaluator_for_question_evaluation', 'evaluator_for_question_evaluation.evaluator_for_question_id = evaluator_for_question.id and evaluator_for_question_evaluation.q_id = questions.id')
                ->where('evaluator_for_question.Question_id', $q_id)
                ->where("(primary_evaluator = $evaluator_id or secondary_evaluator = $evaluator_id)")
                ->get('evaluator_for_question');
        
        if ($query->num_rows() > 0)
            foreach ($query->result_array() as $k) {

                $arr['question'][] = $k;
                $query1 = $this->db->select('evaluator_for_question_evaluation_image_ans.comment,'
                        . 'question_answer_images.image')
                        ->join('question_answer_images','question_answer_images.question_answers_id = question_answers.id')
                        ->join('evaluator_for_question_evaluation_image_ans','evaluator_for_question_evaluation_image_ans.image_id = question_answer_images.id')
                        ->where('question_answers.aspirant_id = '.$k['aspirant_id'])
                        ->get('question_answers');
                if ($query1->num_rows() > 0)
                    foreach ($query1->result_array() as $row1)
                        $arr['images'][] = array("image" => $row1['image'], "comment"=> $row1['comment']);
            }
            
        return $arr;
    }
    
    public function get_evaluated_comments_aspirant($q_id){
        $arr = array('question' => array(), 'images' => array());
        $evaluator_id = $this->session->userdata('evaluator_id');
        
        $query = $this->db->select('questions.model_answer,questions.Question,evaluator_for_question.created,'
                . 'evaluator_for_question_evaluation.*,evaluator_for_question.id as efq_id,'
                . 'questions.question_no,questions.question_alpha,questions.subject,'
                . 'questions.paper,questions.model_answer,questions.evaluation_charges,'
                . 'evaluator_for_question.aspirant_id')
                ->join('questions', 'questions.id = evaluator_for_question.Question_id')
                ->join('question_answers', 'question_answers.Question_id = questions.id')
                ->join('evaluator_for_question_evaluation', 'evaluator_for_question_evaluation.evaluator_for_question_id = evaluator_for_question.id and evaluator_for_question_evaluation.q_id = questions.id')
                ->where('evaluator_for_question.Question_id', $q_id)
                ->get('evaluator_for_question');
        if ($query->num_rows() > 0)
            foreach ($query->result_array() as $k) {
                $arr['question'][] = $k;
                $query1 = $this->db->select('evaluator_for_question_evaluation_image_ans.comment,'
                        . 'question_answer_images.image')
                        ->join('question_answer_images','question_answer_images.question_answers_id = question_answers.id')
                        ->join('evaluator_for_question_evaluation_image_ans','evaluator_for_question_evaluation_image_ans.image_id = question_answer_images.id')
                        ->where('question_answers.aspirant_id = '.$k['aspirant_id'])
                        ->get('question_answers');
                if ($query1->num_rows() > 0)
                    foreach ($query1->result_array() as $row1)
                        $arr['images'][] = array("image" => $row1['image'], "comment"=> $row1['comment']);
            }
            
        return $arr;
    }
    
}
    