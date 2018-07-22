<?php if (!defined('BASEPATH'))exit('Hacking Attempt : Get Out of the system ..!');

class Cron_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function evaluator_deactivate() {
        $time2 = date('Y-m-d, H:i:s');
        $query = $this->db->select('id,created,evaluator_change')
                ->where('evaluator_to_evaluate <> 3')
                ->get('evaluator_for_question');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $v){
                $mydata = array(
                    'evaluator_to_evaluate' =>  'evaluator_to_evaluate+1'
                );
                if(!empty($v['evaluator_change'])){
                    $time1 = $v['evaluator_change'];
                }else{
                    $time1 = $v['created'];
                    $mydata['evaluator_change'] = $time2;
                }
                $hourdiff = round((strtotime($time2) - strtotime($time1))/3600, 1);
                if($hourdiff >= 24){
                    $query = $this->db->where('id',$v['id'])
                            ->update('evaluator_for_question',$mydata);
                }
            }
        }
        
        /*
echo $date = "2018-07-22 07:02:04";
        echo "<br>";
        echo date("Y-m-d H:i:s", strtotime('+24 hours', strtotime($date)));
        
        die;
         * 
         * <script src="<?=base_url('assets/js/jquery.countdown.min.js')?>"></script>
 $('#clock').countdown('2018/07/22 07:02:04')
        .on('update.countdown', function (){
            console.log('update');
        })
        .on('finish.countdown', function (){
            console.log('finish');
        });
         *          */
        
    }

}
