<?php if (!defined('BASEPATH')) exit('No direct script access allowed.');
class MY_Form_validation extends CI_Form_validation {

    function __construct($config = array()){parent::__construct($config);}

    public function unset_field_data(){    
        unset($_POST);
        unset($this->_field_data);    
    }
}