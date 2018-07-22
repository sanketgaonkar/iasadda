<?php

class Upload extends CI_Controller {

        

        public function index()
        {
                $this->load->view('upload_form', array('error' => ' ' ));
        }

        public function do_upload()
        {
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        $this->load->view('upload_success', $data);
                }
        }




        /////////////////////////////////////////////////////////////

function upload1() {
    //include "file_constants.php";
    $maxsize = 10000000; //set to approx 10 MB

    //check associated error code
    if($_FILES['userfile']['error']==UPLOAD_ERR_OK) {

        //check whether file is uploaded with HTTP POST
        if(is_uploaded_file($_FILES['userfile']['tmp_name'])) {    

            //checks size of uploaded image on server side
            if( $_FILES['userfile']['size'] < $maxsize) {  
  
               //checks whether uploaded file is of image type
              //if(strpos(mime_content_type($_FILES['userfile']['tmp_name']),"image")===0) {
                 $finfo = finfo_open(FILEINFO_MIME_TYPE);
                if(strpos(finfo_file($finfo, $_FILES['userfile']['tmp_name']),"image")===0) {    

                    // prepare the image for insertion
                    $imgData =addslashes (file_get_contents($_FILES['userfile']['tmp_name']));

                    // put the image in the db...
                    // database connection

                     $this->load->model('ProjectModel');
                     $data = array('image' => '{$imgData}' );
                  if ($id=$this-> ProjectModel->insert_image($data)) {
                     # code...
                     $msg='<p>Image successfully saved in database with id ='.$id.' </p>';
                    echo $msg;
                  }
                  else{

                     
                      $msg="<p>Uploaded file is not an image.</p>";
                      echo $msg;
                  }
                        /*$data = array('image' => '{$imgData}' );
                        $this->db->insert('image', $data);
                        $id=$this->db->insert_id();*/
                           
                    /*$msg='<p>Image successfully saved in database with id ='.$id.' </p>';
                    echo $msg;*/
                }
                else
                    $msg="<p>Uploaded file is not an image.</p>";
            }
             else {
                // if the file is not less than the maximum allowed, print an error
                $msg='<div>File exceeds the Maximum File limit</div>
                <div>Maximum File limit is '.$maxsize.' bytes</div>
                <div>File '.$_FILES['userfile']['name'].' is '.$_FILES['userfile']['size'].
                ' bytes</div><hr />';
                }
        }
        else
            $msg="File not uploaded successfully.";

    }
    else {
        $msg= file_upload_error_message($_FILES['userfile']['error']);
    }
    return $msg;
}

// Function to return error message based on error code

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


               /////////////////////////////////////////////////



                function add(){
        if($this->input->post('userSubmit')){
            
            //Check whether user upload picture
            if(!empty($_FILES['picture']['name'])){
                $config['upload_path'] = 'uploads/images/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['picture']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('picture')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                }else{
                    $picture = '';
                }
            }else{
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
            if($insertUserData){
                $this->session->set_flashdata('success_msg', 'User data have been added successfully.');
            }else{
                $this->session->set_flashdata('error_msg', 'Some problems occured, please try again.');
            }
        }
        //Form for adding user data
        $this->load->view('upload_success');
    }
}
?>