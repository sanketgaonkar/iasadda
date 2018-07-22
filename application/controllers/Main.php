<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * User Management class created by CodexWorld
 */
class main extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    function login() {
        if ($this->session->userdata('username') == '') {
            //http://localhost/CI/main/login
            $data['title'] = "Get Review";
            $this->load->view("login", $data);
        } else {
            redirect('main/profile');
        }
    }

    function login_validation() {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == true) {

            $username = $this->input->post('username');
            $password = $this->input->post('password');
            //model function
            $this->load->model('main_model');
            if ($userID = $this->main_model->can_login($username, $password)) {
                $this->load->model('User');
                if($this->User->check_login_count($userID,'aspirantuser')){
                    redirect('main/profile');
                }else{
                    redirect('Aspirant_dashboard/');
                }
                
                
            } else {
                $this->session->set_flashdata('error', 'Invalid Username and Password');
                redirect('main/login');
            }
        } else
            $this->login();
    }

    function alpha_dash_space($fullname) {
        if (!preg_match('/^[a-zA-Z\s]+$/', $fullname)) {
            $this->form_validation->set_message('alpha_dash_space', '%s should contain only characters');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function register() {
        $data = array();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fname', 'First Name', 'required|trim|callback_alpha_dash_space');
        $this->form_validation->set_rules('lname', 'Last Name', 'required|trim|callback_alpha_dash_space');
        $this->form_validation->set_rules('mobile', 'Mobile No', 'required|trim|min_length[10]|max_length[10]|numeric|regex_match[/^[789]\d{9}$/]|is_unique[aspirantuser.phone]',
            array(
                'regex_match' => 'Invalid Mobile No',
                'min_length' => 'Invalid Mobile No',
                'max_length' => 'Invalid Mobile No',
                'is_unique' => 'Mobile No Already Registered'
            ));
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if ($this->form_validation->run()) {
            $this->load->model('main_model');
            if ($this->main_model->register($_POST)){
                $data['success'] = true;
                $this->form_validation->unset_field_data();
            }else{
                $data['fail'] = true;
            }
        }
        $this->load->view('register', $data);
    }

    function profile() {

        $session = $this->session->userdata('username');

        if ($session == FALSE) {
            redirect('main/login');
        } else {

            if(isset($_POST) && !empty($_POST)){
                $session = $this->session->userdata('username');
                $this->load->library('form_validation');
                $this->form_validation->set_rules('shortname1', 'Nickname', 'trim|required|is_unique[aspirantuser.nickname]|max_length[12]|alpha_numeric');
                $this->form_validation->set_rules('email1', 'Email1', 'trim|required|valid_email');
                $this->form_validation->set_rules('Password1', 'Password1', 'trim|required');

                if ($this->form_validation->run() == true) {
                    if (!empty($_FILES['picture']['name'])) {
                        $config['upload_path'] = 'uploads/Aspirantprofile/';
                        $config['allowed_types'] = 'jpg|jpeg|png|gif';
                        $config['file_name'] = $_FILES['picture']['name'];

                        //Load upload library and initialize configuration
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        if ($this->upload->do_upload('picture')) {
                            $uploadData = $this->upload->data();
                            $picture = $uploadData['file_name'];
                        } else {
                            $picture = $this->input->post('imagename');
                        }
                    } else {
                        $picture = $this->input->post('imagename');
                    }
                    $id = $this->input->post('id');

                    //Prepare array of user data
                    $userData = array(
                        'id' => $this->input->post('id'),
                        'emailid' => $this->input->post('email1'),
                        'password' => $this->input->post('Password1'),
                        'nickname' => $this->input->post('shortname1'),
                        'optional' => $this->input->post('optional'),
                        'imagename' => $picture
                    );

                    //Pass user data to model
                    $this->load->model('ProfileA_model');
                    $insertUserData = $this->ProfileA_model->insert($userData, $id);

                    //Storing insertion status message.
                    if ($insertUserData) {
                        $this->session->set_flashdata('success_msg', 'User data have been added successfully.');
                    } else {
                        $this->session->set_flashdata('error_msg', 'Some problems occured, please try again.');
                    }

                }
            }

            // $data['session_name'] =  $session;
            $this->load->model('ProfileA_model');
            if ($query = $this->ProfileA_model->profileA_Display($session)) {
                # code...
                $data['User'] = null;

                if ($query != " " || $query != "0") {

                    foreach ($query as $row) {
                        $data['ID'] = $row->id;
                        $data['firstname'] = $row->firstname;
                        $data['lastname'] = $row->lastname;
                        $data['shortname'] = $row->nickname;
                        $data['password'] = $row->password;
                        $data['phone'] = $row->phone;
                        $data['emailid'] = $row->emailid;
                        $data['activesince'] = $row->activesince;
                        $data['username'] = $row->username;
                        $data['imagename'] = $row->imagename;
                        $data['optional'] = $row->optional;
                    }
                    $this->load->view('profile', $data);
                }

            }
        }
    }

    function add() {

        if ($this->input->post('userSubmit')) {
            //Check whether user upload picture
            if (!empty($_FILES['picture']['name'])) {

                $config['upload_path'] = 'uploads/images/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['picture']['name'];

                //Load upload library and initialize configuration
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('picture')) {
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                } else {
                    $picture = '';
                }
            } else {
                $picture = '';
            }

            //Prepare array of user data
            $userData = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'picture' => $picture
            );

            //Pass user data to model
            $this->load->model('ProjectModel');
            $insertUserData = $this->ProjectModel->insert($userData);

            //Storing insertion status message.
            if ($insertUserData) {
                $this->session->set_flashdata('success_msg', 'User data have been added successfully.');
            } else {
                $this->session->set_flashdata('error_msg', 'Some problems occured, please try again.');
            }
        }
        //Form for adding user data
        $this->load->view('upload_success');
    }
    
    function logout() {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('aspirant_id');
        $this->session->unset_userdata('aspirant_data');
        redirect('Profilee');
    }

}

?>