<?php if (!defined('BASEPATH'))exit('No direct script access allowed');

class Cron_jobs extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    function index() {
        $this->load->model("cron/Cron_model");
        $this->Cron_model->evaluator_deactivate();
    }
}?>