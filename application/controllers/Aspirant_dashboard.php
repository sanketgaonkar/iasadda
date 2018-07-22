<?php
if (!defined('BASEPATH'))exit('No direct script access allowed');

class Aspirant_dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if($this->session->userdata('aspirant_id') == null) redirect ('main/login');
    }
    
    function index(){
        
        $this->load->model('Questions_model');
        $data['applied_evaluator'] = $this->Questions_model->get_applied_evaluator_for_question();
        $data['under_review_questions'] = $this->Questions_model->get_under_review_questions();
        $data['evaluated_questions'] = $this->Questions_model->get_evaluated_questions();
        
        $this->load->view('dashboard_aspirant/dashboard_aspirant',$data);
    }
    
    function insert_evaluator(){
        
        $primary = $_POST['primary'];
        $secondary = $_POST['secondary'];
        $q_id = $_POST['q_id'];
        if(!empty($primary) && !empty($q_id)){
            $this->load->model('Questions_model');
            if($this->Questions_model->insert_evaluators_for_question($primary,$secondary,$q_id)){
                $this->session->set_flashdata('success_eval_select', 'Sucessfully Selected Evaluator');
            }else{
                $this->session->set_flashdata('error_eval_select', 'Error Selecting Evaluator');
            }
        }
        redirect ('Aspirant_dashboard');
       
    }
    
    function evaluated_comments($q_id) {
        $this->load->model('Questions_model');
        $data['evaluated_files'] = $this->Questions_model->get_evaluated_comments_aspirant($q_id);
        
        $data['question'] = $data['evaluated_files']['question'][0];
        $data['images'] = $data['evaluated_files']['images'];
        
        $this->load->view('dashboard_evaluator/evaluated_comments',$data);
    }
    

}

?>