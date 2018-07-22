<?php if (!defined('BASEPATH'))exit('No direct script access allowed');

class Evaluator_dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if($this->session->userdata('userData') == null || $this->session->userdata('evaluator_id') == null)redirect ('main/login');
    }

    function index() {
        $this->load->model('Evaluator_model');
        $this->load->model('Questions_model');
        $data['evaluator'] = $this->Evaluator_model->get_evaluator($this->session->userdata('evaluator_id'));
        $data['submisions'] = $this->Questions_model->get_submisions();
        $data['get_under_review_evaluator'] = $this->Questions_model->get_under_review_evaluator();
        $data['assignment_questions'] = $this->Questions_model->get_under_review_questions_evaluator();
        $data['evaluation_questions'] = $this->Questions_model->get_evaluation_questions_evaluator();
        
        $this->load->view('dashboard_evaluator/dashboard_evaluator',$data);
    }

    function evaluator_apply() {
        
        $this->load->model('Questions_model');
        if(isset($_POST['question_answer_id']) && !empty($_POST['question_answer_id'])){
            if($this->Questions_model->apply_evaluator($this->session->userdata('evaluator_id'),$_POST['question_answer_id'])){
                $this->session->set_flashdata('success_apply', 'Sucessfully applied for evaluation');
            }else{
                $this->session->set_flashdata('error_apply', 'Error applying for evaluation');
            }
        }
        
        redirect('Evaluator_dashboard');
    }
    
    
    function paper_evaluation($q_id = 0) {
        if($q_id == 0) redirect ('Evaluator_dashboard');
        $data = array();
        $this->load->model('Questions_model');
        
        
        if($_POST){
            
            $mydata = array(
                'evaluator_for_question_id' => $_POST['id'],
                'key_point_1'   => $_POST['key_point_1'],
                'key_point_2'   => $_POST['key_point_2'],
                'key_point_3'   => $_POST['key_point_3'],
                'key_point_4'   => $_POST['key_point_4'],
                'language_grammar' => $_POST['language_grammar'],
                'relevant_content' => $_POST['relevant_content'],
                'others' => $_POST['others'],
                'presentation' => $_POST['presentation'],
                'final_words' => $_POST['final_words'],
                'q_id' => $_POST['q_id'],
            );
            
            $imgdata = array();
            
            foreach ($_POST['image'] as $k => $v){
                $imgdata[] = array(
                    'image_id' => $k,
                    'comment' => $v
                );
            }
            
            if($this->Questions_model->add_paper_evaluation($mydata,$imgdata)){
                $data['success'] = "Sucessfully Submitted evaluation";
                redirect ('Evaluator_dashboard');
            }else{
                $data['error'] = "Error submitting evaluation";
            }
        }
        
        if($data['question'] = $this->Questions_model->paper_evaluation($q_id)){
            $this->load->view('dashboard_evaluator/paper_evalution',$data);
        } else {
            redirect ('Evaluator_dashboard');
        }     
        
    }
    
    function evaluated_comments($q_id) {
        $this->load->model('Questions_model');
        $data['evaluated_files'] = $this->Questions_model->get_evaluated_comments_evaluator($q_id);
        
        $data['question'] = $data['evaluated_files']['question'][0];
        $data['images'] = $data['evaluated_files']['images'];
        
        $this->load->view('dashboard_evaluator/evaluated_comments',$data);
    }


}

?>