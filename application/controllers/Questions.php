<?php

class Questions extends CI_Controller {

    public function submit() {

        if(isset($_FILES) && !empty($_FILES['submit_ans'])){
            $image_data = array();
            $image_error = array();
            
            $config['upload_path'] = 'uploads/aspirant_uploads';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 4000;
            $filesCount = count($_FILES['submit_ans']['name']);
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['file']['name']     = $_FILES['submit_ans']['name'][$i];
                $_FILES['file']['type']     = $_FILES['submit_ans']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['submit_ans']['tmp_name'][$i];
                $_FILES['file']['error']     = $_FILES['submit_ans']['error'][$i];
                $_FILES['file']['size']     = $_FILES['submit_ans']['size'][$i];

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('file')) {
                    $data = $this->upload->data();
                    $image_data[] = $data['file_name'];
                } else {
                    $image_error[] = $_FILES['submit_ans']['name'][$i]." ".$this->upload->display_errors();
                }
            }
            
            if(empty($image_error)){
                $this->load->model('Questions_model');
                if($this->Questions_model->insert_answer($_POST['id'],$_POST['user_id'],$image_data))
                    $this->session->set_flashdata('success_upload', 'Sucessfully uploaded Answers for '.$_POST['question']);
                else
                    $this->session->set_flashdata('error_upload', 'Error uploading Answers for '.$_POST['question']);
            }else{
                $this->session->set_flashdata('error_upload', 'Error uploading Answers for '.$_POST['question']."<br>".implode("", $image_error));
            }
        }
        
        if(isset($_POST['page']) && !empty($_POST['page']))
            redirect($_POST['page']);
        else
            redirect('Profilee/');
        
    }

}

?>