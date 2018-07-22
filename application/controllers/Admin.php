<?php if (!defined('BASEPATH'))exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('admin') == null && $this->router->fetch_method() !== "login")
            redirect('Admin/login');
        else if ($this->session->userdata('admin') !== null && $this->router->fetch_method() == "login")
            redirect('Admin/');
    }

    function login() {
        $data = array();
        if ($_POST) {

            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == true) {
                $this->load->model('admin/Login_model');
                if ($userID = $this->Login_model->checkUser($_POST)) {
                    $this->session->set_userdata('admin', $userID);
                    redirect('admin/questions');
                } else {
                    $data['error'] = "Invalid Username / Password";
                }
            } else {
                $data['error'] = "Invalid Username / Password";
            }
        }

        $this->load->view('admin/login', $data);
    }

    function index() {
        $this->load->view('admin/admin_dashboard');
    }

    function questions() {
        $data = array();
        $this->load->model('admin/Questions_model');
        $data['questions'] = $this->Questions_model->get_questions();
        $this->load->view('admin/questions', $data);
    }

    function add_edit_question($q_id = 0) {
        $data = array("error" => "");
        $this->load->model('admin/Questions_model');

        if (isset($_POST) && !empty($_POST)) {
            $picture = "";

            if (isset($_FILES) && !empty($_FILES['model_answer']['name'])) {
                $config['upload_path'] = 'uploads/question_model_ans/';
                $config['allowed_types'] = 'pdf';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('model_answer')) {
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                } else {
                    $data['error'] = strip_tags($this->upload->display_errors());
                }
            }

            if (empty($data['error'])) {
                if ($this->Questions_model->add_edit_question($_POST, $picture))
                    redirect('admin/questions');
            }
        }

        $data['question'] = $this->Questions_model->get_question($q_id);
        $this->load->view('admin/add_edit_question', $data);
    }

    function view_question($q_id = 0) {
        $this->load->model('admin/Questions_model');
        $data['question'] = $this->Questions_model->get_question($q_id);
        $this->load->view('admin/view_question', $data);
    }

    function delete_question($q_id) {
        $this->load->model('admin/Questions_model');
        $this->Questions_model->delete_question($q_id);
        redirect('admin/questions');
    }

    function Evaluators() {
        $data = array();
        $this->load->model('admin/Evaluator_model');
        $data['evaluators'] = $this->Evaluator_model->get_evaluators();
        $this->load->view('admin/evaluators', $data);
    }

    function evaluator_add_edit($eval_id = 0) {
        $data = array();
        $this->load->model('admin/Evaluator_model');

        if ($_POST) {

            $mydata = array(
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'myinfo' => $_POST['myinfo'],
                'nickname' => $_POST['nickname'],
                'mobile' => $_POST['mobile'],
                'usercategory' => $_POST['usercategory'],
                'email' => $_POST['email'],
                'active' => $_POST['active']
            );
            if ($this->Evaluator_model->edit_evaluator($mydata, $_POST['id']))
                redirect('admin/Evaluators');
            else
                $data['error'] = "error updating evaluator";
        }

        $data['evaluator'] = $this->Evaluator_model->get_evaluator($eval_id);
        $this->load->view('admin/add_edit_evaluator', $data);
    }

    function Evaluator_view($eval_id = 0) {
        $data = array();
        $this->load->model('admin/Evaluator_model');
        $data['evaluator'] = $this->Evaluator_model->get_evaluator($eval_id);
        $this->load->view('admin/evaluator_view', $data);
    }
    
    function evaluator_delete($eval_id = 0) {
        $this->load->model('admin/Evaluator_model');
        $this->Evaluator_model->delete_evaluator($eval_id);
        redirect('admin/Evaluators');
    }
    
    function Aspirants() {
        $data = array();
        $this->load->model('admin/Aspirant_model');
        $data['aspirants'] = $this->Aspirant_model->get_aspirants();
        $this->load->view('admin/aspirants', $data);
    }

    function aspirant_add_edit($eval_id = 0) {
        $data = array("error_img" => "");
        $this->load->model('admin/Aspirant_model');

        if ($_POST) {

            $mydata = array(
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'nickname' => $_POST['nickname'],
                'phone' => $_POST['phone'],
                'emailid' => $_POST['emailid'],
                'optional' => $_POST['optional'],
            );
            
            if(!empty(trim($_POST['Password']))){
                $mydata['password'] = $_POST['Password'];
            }
            
            if (isset($_FILES) && !empty($_FILES['image']['name'])) {
                $config['upload_path'] = 'uploads/Aspirantprofile/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('image')) {
                    $uploadData = $this->upload->data();
                    $mydata['imagename'] = $uploadData['file_name'];
                } else {
                    $data['error_img'] = strip_tags($this->upload->display_errors());
                }
            }
            
            if(empty($data['error_img'])){
                if ($this->Aspirant_model->edit_aspirant($mydata, $_POST['id']))
                    redirect('admin/Aspirants');
                else
                    $data['error'] = "error updating aspirant";
            }
        }

        $data['aspirant'] = $this->Aspirant_model->get_aspirant($eval_id);
        $this->load->view('admin/add_edit_aspirant', $data);
    }

    function aspirant_view($eval_id = 0) {
        $data = array();
        $this->load->model('admin/Aspirant_model');
        $data['aspirant'] = $this->Aspirant_model->get_aspirant($eval_id);
        $this->load->view('admin/aspirant_view', $data);
    }
    
    function aspirant_delete($eval_id = 0) {
        $this->load->model('admin/Aspirant_model');
        $this->Aspirant_model->delete_evaluator($eval_id);
        redirect('admin/Aspirants');
    }

    function logout() {
        $this->session->unset_userdata('admin');
        redirect('admin/login');
    }

}

?>