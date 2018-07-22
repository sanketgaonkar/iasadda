<?php

if (!defined('BASEPATH'))exit('No direct script access allowed');

class Profilee extends CI_Controller {


    public function __construct() {
        parent::__construct();
    }
    
    public function index() {

        if (isset($_GET['code'])) {
            //authenticate user
            $this->google->getAuthenticate();

            //get user info from google
            $gpInfo = $this->google->getUserInfo();

            //preparing data for database insertion
            $userData['oauth_provider'] = 'google';
            $userData['oauth_uid'] = $gpInfo['id'];
            $userData['first_name'] = $gpInfo['given_name'];
            $userData['last_name'] = $gpInfo['family_name'];
            $userData['email'] = $gpInfo['email'];
            $userData['gender'] = !empty($gpInfo['gender']) ? $gpInfo['gender'] : '';
            $userData['locale'] = !empty($gpInfo['locale']) ? $gpInfo['locale'] : '';
            $userData['profile_url'] = !empty($gpInfo['link']) ? $gpInfo['link'] : '';
            $userData['picture_url'] = !empty($gpInfo['picture']) ? $gpInfo['picture'] : '';

            //insert or update user data to the database
            $userID = $this->User->checkUser($userData);

            if($this->User->check_login_count($userID,'evaluatorusers')){
                redirect('Profilee/profile/');
            }else{
                redirect('Evaluator_dashboard/');
            }
            
        }
        
        $this->load->model('Profile_model');
        $this->load->model('Questions_model');
        $data['evaluators'] = $this->Profile_model->get_evaluators();
        $data['questions'] = $this->Questions_model->get_questions();
        $this->load->view('index', $data);
    }

    function profile($error = array()) {

        //$session = "omkar.mahabadi@gmail.com"; 
        $session = $this->session->userdata('userData')['email'];
        $data['error'] = $error;
        if ($session == FALSE) {
            redirect('/main/login');
        } else {
            $this->load->model('Profile_model');
            if ($query = $this->Profile_model->profileE_Display($session)) {
                # code...
                $data['User'] = null;

                if ($query != " " || $query != "0") {
                    foreach ($query as $row) {
                        $data['ID'] = $row->id;
                        $data['firstname'] = $row->first_name;
                        $data['lastname'] = $row->last_name;
                        $data['shortname'] = $row->nickname;
                        $data['phone'] = $row->number;
                        $data['emailid'] = $row->email;
                        $data['activesince'] = $row->created;
                        $data['username'] = $row->email;
                        $data['imagename'] = $row->imagenamel;
                        $data['usercategory'] = $row->usercategory;
                        $data['userrating'] = $row->userrating;
                        $data['myinfo'] = $row->myinfo;
                        $data['active'] = $row->active;
                        
                        $data['civil'] = $this->Profile_model->profileE_get_civil($row->id);
                        $data['ifos'] = $this->Profile_model->profileE_get_ifos($row->id);
                    }
                }
                $this->load->view('evaluator_profile', $data);
            }
        }
    }

    function UPSC() {

        $session = $this->session->userdata('userData')['email']; //$this->session->userdata('username');

        $error = array();
        if ($this->input->post('type') == 1) {
            $civil_id = $this->input->post('id');
            $Upsccivildata = array(
                'user_id' => $this->input->post('user_id'),
                'totalattempts' => $this->input->post('c_drop1'),
                'appearedinmains' => $this->input->post('c_drop2'),
                'appearedininterview' => $this->input->post('c_drop3'),
                'finalselection' => $this->input->post('c_drop4'),
            );

            $config['upload_path'] = './uploads/Evaluatorprofile/';
            $config['allowed_types'] = 'pdf';
            $this->load->library('upload', $config);
            if (!$civil_id && intval($this->input->post('c_drop2')) > 0 && $this->upload->do_upload('c_drop2_picture')) {
                $data = $this->upload->data();
                $Upsccivildata['uploadlatestDAF'] = $data['file_name'];
            } else if($this->upload->display_errors()) {
                $error['img1'] = "Please Upload a PDF file";
            }
            $this->upload->initialize($config);
            if (!$civil_id && intval($this->input->post('c_drop3')) > 0 && $this->upload->do_upload('c_drop3_picture')) {
                $data = $this->upload->data();
                $Upsccivildata['interviewAdmitCard'] = $data['file_name'];
            } else if($this->upload->display_errors()) {
                $error['img2'] = "Please Upload a PDF file";
            }

            if (empty($error)) {
                $this->load->model('Profile_model');
                $insertUserData = $this->Profile_model->insertUPSC_civil($Upsccivildata,$civil_id);
                $error['main_civil_save'] = $insertUserData;
            }
        } else if ($this->input->post('type') == 2) {
            $ifos_id = $this->input->post('id');
            $UpscIFosdata = array(
                'user_id' => $this->input->post('user_id'),
                'totalattempts' => $this->input->post('i_drop1'),
                'appearedinmains' => $this->input->post('i_drop2'),
                'appearedininterview' => $this->input->post('i_drop3'),
                'finalselection' => $this->input->post('i_drop4'),
            );

            $config['upload_path'] = './uploads/EvaluatorIFosDAF/';
            $config['allowed_types'] = 'pdf';
            $this->load->library('upload', $config);
            if (!$ifos_id && intval($this->input->post('i_drop2')) > 0 && $this->upload->do_upload('i_drop2_picture')) {
                $data = $this->upload->data();
                $UpscIFosdata['uploadlatestDAF'] = $data['file_name'];
            } else if($this->upload->display_errors()){
                $error['img11'] = "Please Upload a PDF file";
            }
            $this->upload->initialize($config);
            if (!$ifos_id && intval($this->input->post('i_drop3')) > 0 && $this->upload->do_upload('i_drop3_picture')) {
                $data = $this->upload->data();
                $UpscIFosdata['interviewAdmitCard'] = $data['file_name'];
            } else if($this->upload->display_errors()){
                //$error['img22'] = strip_tags($this->upload->display_errors());
                $error['img22'] = "Please Upload a PDF file";
            }

            if (empty($error)) {
                $this->load->model('Profile_model');
                $insertUserData = $this->Profile_model->insertUPSC_ifos($UpscIFosdata,$ifos_id);
                $error['main_ifos_save'] = $insertUserData;
            }
        }
        $this->profile($error);
    }

    function profile_validation() {
        $session = $this->session->userdata('userData')['email']; //$this->session->userdata('username');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('shortname', 'ShortName', 'trim|required');
        $this->form_validation->set_rules('myinfo', 'Myinfo', 'trim|required');
        $this->form_validation->set_rules('usercategory', 'Usercategory', 'required');
        $this->form_validation->set_rules('userrating', 'Userrating', 'required');
        $this->form_validation->set_rules('phone', 'Mobile No', 'trim|required');

        $picture = null;
        $config['upload_path'] = './uploads/Evaluatorprofile/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('picture')) {

            $uploadData = $this->upload->data();
            $picture = $uploadData['file_name'];
        }
         
        $id = $this->input->post('id');

        $userData = array();
        ($this->input->post('myinfo')) ? $userData['myinfo'] =  wordwrap($this->input->post('myinfo'),500) : "";
        ($this->input->post('userrating')) ? $userData['userrating'] = $this->input->post('userrating') : "";
        ($this->input->post('shortname')) ? $userData['nickname'] = $this->input->post('shortname') : "";
        ($this->input->post('usercategory')) ? $userData['usercategory'] = $this->input->post('usercategory') : "";
        ($this->input->post('phone')) ? $userData['number'] = $this->input->post('phone') : "";
        ($picture) ? $userData['imagenamel'] = $picture : "";

        if (count($userData)) {
            $this->load->model('Profile_model');
            $insertUserData = $this->Profile_model->insert($userData, $id);
        }
        $this->profile();
    }

    public function logout_google() {
        unset($_SESSION['userData']);
        unset($_SESSION['evaluator_id']);
        unset($_SESSION['user_display_name']);
        redirect('profilee/');
    }

}
