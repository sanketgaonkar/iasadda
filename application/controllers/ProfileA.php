<?php
if (!defined('BASEPATH'))exit('No direct script access allowed');
/**
 * User Management class created by CodexWorld
 */
class profileA extends CI_Controller {

    function profile() {
        /* 	$data['title']="Get Review";
          $this ->load ->view("profile",$data); */

        $session = $this->session->userdata('username');

        if ($session == FALSE) {

            redirect('main/login');
        } else {


            // $data['session_name'] =  $session;
            $this->load->model('profileA_model');
            if ($query = $this->profileA_model->profileA_Display($session)) {
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
                        $data['image'] = $row->profilepic;
                    }


                    $this->load->view('profile', $data);
                }

                //$this->load->view('profile', $data);
                //redirect(base_url().'index.php/profileA/profile_validation');
            }
        }
    }

    function profile_validation() {


        $this->load->library('form_validation');

        $this->form_validation->set_rules('shortname1', 'ShortName', 'required');
        //$this ->form_validation ->set_rules('number', 'Number', 'required');
        $this->form_validation->set_rules('email1', 'Email', 'required');
        $this->form_validation->set_rules('Password1', 'Password', 'required');

        if ($this->form_validation->run() == true) {

            $shortname = $this->input->post('shortname1');
            //$number = $this ->input->post('number');
            $email = $this->input->post('email1');
            $password = $this->input->post('Password1');
            $username = $this->session->userdata('username');
            $ID = $this->input->post('id');

            $datainfo = array(
                'emailid' => $this->input->post('email1'),
                'password' => $this->input->post('Password1'),
                'nickname' => $this->input->post('shortname1')
            );

            //model function
            $this->load->model('profileA_model');
            if ($this->profileA_model->profileA_update($ID, $datainfo)) {
                # code...
                $data['h1title'] = 'Successful Registration';
                $data['subtext'] = '<p>Test to go here</p>';

                // Load the message page
                redirect(base_url() . 'index.php/profileA/profile');
            } else {

                log_message('error', 'Some variable did not contain a value.');
                redirect(base_url() . 'index.php/profileA/profile');
            }
        } else
            $this->profile();
    }

//file upload error function
    function file_upload_error_message($error_code) {
        switch ($error_code) {
            case UPLOAD_ERR_INI_SIZE:
                return 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
            case UPLOAD_ERR_FORM_SIZE:
                return 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
            case UPLOAD_ERR_PARTIAL:
                return 'The uploaded file was only partially uploaded';
            case UPLOAD_ERR_NO_FILE:
                return 'No file was uploaded';
            case UPLOAD_ERR_NO_TMP_DIR:
                return 'Missing a temporary folder';
            case UPLOAD_ERR_CANT_WRITE:
                return 'Failed to write file to disk';
            case UPLOAD_ERR_EXTENSION:
                return 'File upload stopped by extension';
            default:
                return 'Unknown upload error';
        }
    }

}
