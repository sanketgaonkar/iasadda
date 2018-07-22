<?php require 'a_dash/a_header.php'; ?>
<?php require 'a_dash/a_info.php'; ?>

<div class="col-md-10">
    <div class="rightsd-p">
        <div class="banrp-p">
            <img src="<?= base_url('assets/images/login/a1.jpg') ?>">
        </div>
        <div class="dashbrcontent-p">
            <h2>Dashboard</h2>
            <div class="row">
                <div class="mthnsel-p">
                    <div class="col-md-4"></div>
                    <div class="col-md-2">
                        <div class="sectmonth-p">
                            <select class="form-control">
                                <option value='0'>--Select Month--</option>
                                <option value='1'>Janaury</option>
                                <option value='2'>February</option>
                                <option value='3'>March</option>
                                <option value='4'>April</option>
                                <option value='5'>May</option>
                                <option value='6'>June</option>
                                <option selected value='7'>July</option>
                                <option value='8'>August</option>
                                <option value='9'>September</option>
                                <option value='10'>October</option>
                                <option value='11'>November</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="sectmonth-p">
                            <select class="form-control">
                                <option value='0'>--Select Year--</option>
                                <option>1991</option>
                                <option>1992 </option>
                                <option>1993</option>
                                <option selected="selected">2018</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>
        </div>


        <!--   submission start -->
        <div class="dlysurp-p dashasprnt-p">
            <h2>Submission</h2>
            <?=(($this->session->flashdata('success_eval_select'))?"<div class='alert alert-success'>".$this->session->flashdata('success_eval_select')."</div>":"")?>
            <?=(($this->session->flashdata('error_eval_select'))?"<div class='alert alert-danger'>".$this->session->flashdata('error_eval_select')."</div>":"")?>
            <?php
            $i = 1;
            foreach ($applied_evaluator['question'] as $k => $v) {
                $class = "";
                if ($i % 2 == 0)
                    $class = "greycolr";
                ?>
                <div class="backgrndwhtp-p <?= $class ?>">
                    <div class="row">
                        <div class="col-md-1 pppadrm-p">
                            <div class="questp-p">
                                <h3>Q.<?=$v['question_no']?></h3>
                                <p>(<?=$v['question_alpha']?>)</p>
                                <p class="rupsgn-p"><i class="fa fa-rupee"></i> <?=intval($v['evaluation_charges'])?></p>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="contnt-p">
                                <p class="p1"><?= $v['Question'] ?></p>
                                <p class="col-md-3 p5 flpcentr">Files</p>
                                <p class="col-md-3 p3"><?=((!empty($v['model_answer']))?anchor('/uploads/question_model_ans/'.$v['model_answer'],'Model Answer','target="_new"'):"")?></p>
                                <p class="col-md-4 p4">Answer Submitted : 999</p>
                                <p class="col-md-2 p5"><?= $v['Date'] ?></p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="lnkspaper-p">
                                <div class="col-md-6">
                                    <p><?=$v['paper']?></p>
                                    <div class="submtdash-p-p">
                                        <?=form_open('Aspirant_dashboard/insert_evaluator','class="insert_evaluator form_'.$v['q_id'].' '.((isset($applied_evaluator['evaulator'][$v['q_id']]))?"":"hide").'"')?>
                                        <button type="submit" class="btn">Submit</button>
                                        <input type="hidden" name="primary" value=""/>
                                        <input type="hidden" name="secondary" value=""/>
                                        <input type="hidden" name="q_id" value="<?=$v['q_id']?>"/>
                                        <input type="hidden" id="count" value="<?=((isset($applied_evaluator['evaulator'][$v['q_id']]))?count($applied_evaluator['evaulator'][$v['q_id']]):"")?>"/>
                                        <?=form_close()?>
                                    </div>
                                </div>
                                <div class="col-md-6 <?=((isset($applied_evaluator['evaulator'][$v['q_id']]))?"":"hide")?>">
                                    <p><?=$v['subject']?></p>
                                    <div class="clrall-p">
                                        <button class="btn clear_all">Clear All</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--  slider  -->
                    <div class="row ppsldrbtm-p">
                        <div class="col-md-12">
                            <h2>Select Your Evaluators</h2>
                            <div class="alert alert-danger hide evaluator_error"></div>
                            <div id="myselevlu-p-p" class="carousel slide selectevlutr-p" data-ride="carousel" data-interval="false">
                                <div class="carousel-inner">
                                    <?php
                                    
                                    if(isset($applied_evaluator['evaulator'][$v['q_id']])){
                                    $j = 0;
                                    $main_cnt = 0;
                                    foreach ($applied_evaluator['evaulator'][$v['q_id']] as $v1) {
                                        if ($j == 0)
                                            echo '<div class="item ' . (($main_cnt == 0) ? 'active' : '') . '"><div class="row">';
                                        $main_cnt++;
                                        echo '<div class="col-md-6">
                                                <div class="evlurimg-p1">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <p class="nick-p1">'.$v1['evaluator_name'].'</p>
                                                            <div class="evimgcss-p1"> 
                                                                <img src="'.$v1['picture_url'].'">
                                                            </div>
                                                            <div class="leftpsldr hide">
                                                                <p class="inpt-p"><input type="checkbox"></p>
                                                                <p>Hire  </p>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="ratpcls-p1">
                                                                <p class="col-md-12">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                </p>
                                                            </div>

                                                            <div class="ppdescrptn-p1">
                                                                <p class="col-md-12">
                                                                    <span>Mains :</span>
                                                                    <span class="padright">'.$v1['appearedinmains'].'</span>
                                                                    <span>Interview : </span>
                                                                    <span>'.$v1['appearedininterview'].'</span>
                                                                </p>
                                                                <p class="col-md-12">
                                                                    <span>Answers Evaluated:</span>
                                                                    <span>999</span>
                                                                </p>     
                                                                <p class="col-md-12">
                                                                    <span>Opt :</span>
                                                                    <span>History</span>
                                                                </p>   
                                                                <p class="col-md-12 rghtpsldr">
                                                                    <span>Verified : </span>
                                                                    <span><i class="fa fa-check-circle"></i></span>
                                                                </p>          
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="recntrat-p">
                                                                <input type="hidden" value="'.$v1['eqa_id'].'" id="eqa_id"/>
                                                                <div class="'.((count($applied_evaluator['evaulator'][$v['q_id']])==1)?"col-md-12":"col-md-6").'">
                                                                    <input type="checkbox" class="chbp'.$v1['e_id'].' clr" data-form="form_'.$v['q_id'].'" value="'.$v1['e_id'].'">Primary
                                                                </div>
                                                                <div class="col-md-6 '.((count($applied_evaluator['evaulator'][$v['q_id']])==1)?"hide":"").' ">
                                                                    <input type="checkbox" class="chbs'.$v1['e_id'].' clr" data-form="form_'.$v['q_id'].'" value="'.$v1['e_id'].'">Secondary
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 hide">
                                                            <div class="recntrat-p">
                                                                <p>Platinum</p>
                                                                <!--  ********** DO NOT REMOVE CODE ************     
                                                                <h3>Recent Rating</h3>
                                                                <div class="rtngcss-p">
                                                                    <span><a href="javascript:void(0);">0</a></span>
                                                                    <span><a href="javascript:void(0);">1</a></span>
                                                                    <span><a href="javascript:void(0);">2</a></span>
                                                                </div>
                                                                -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>';
                                        $j++;
                                        if ($j == 2) {
                                            echo '</div></div>';
                                            $j = 0;
                                        }
                                    }
                                    if ($j > 0 && $j < 2)
                                        echo '</div></div>';
                                        }
                                    ?>
                                </div>
                                <!-- Left and right controls -->
                                <a class="left carousel-control" href="#myselevlu-p-p" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#myselevlu-p-p" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
            if(empty($applied_evaluator['question']))
                echo "<p class='text-center'>No Data to display</p>";
            ?>
        </div><!-- submission end -->


        <!--  under review  -->
        <div class="dlysurp-p undrrevp-p">
            <h2>Under Review</h2>
            <?php
            	if(isset($under_review_questions['question'])){
            	
                $i = 1;
                foreach ($under_review_questions['question'] as $k => $v) {
                $class = "";
                if ($i % 2 == 0)$class = "greycolr";
                ?>
                <div class="backgrndwhtp-p <?= $class ?>">
                <div class="row">
                    <div class="col-md-1 pppadrm-p">
                        <div class="questp-p">
                            <h3>Q.<?=$v['question_no']?></h3>
                            <p>(<?=$v['question_alpha']?>)</p>
                            <p class="rupsgn-p"><i class="fa fa-rupee"></i> <?=intval($v['evaluation_charges'])?></p>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="contnt-p">
                            <p class="p1"><?=$v['Question']?></p>
                            <p class="col-md-6 p3">Primary Evaluator : <?=$v['primary_evaluator']?>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i> 
                            </p>
                            <?php if($v['secondary_evaluator']){?>
                            <p class="col-md-6 p3">
                                Secondary Evaluator : <?=$v['secondary_evaluator']?> 
                                <i class="fa fa-star-o"></i> 
                                <i class="fa fa-star-o"></i> 
                                <i class="fa fa-star-o"></i> 
                                <i class="fa fa-star-o"></i> 
                                <i class="fa fa-star-o"></i>
                            </p>
                            <?php }?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="lnkspaper-p">
                            <div class="col-md-6">
                                <p><?=$v['paper']?></p>
                            </div>
                            <div class="col-md-6">
                                <p><?=$v['subject']?></p>
                            </div>
                            <div class="col-md-12">
                                <div class="submtfl-p">
                                    <a href="#" class="submitted_files_show" data-image="<?=implode(',',$under_review_questions['images'][$v['id']])?>">Submitted Files</a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <p><?=date('d-m-Y', strtotime($v['created']))?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $i++; }
            if(empty($under_review_questions['question']))
                echo "<p class='text-center'>No Data to display</p>";
                            }?>

        </div><!--  under review end-->

        <!--  evaluation  -->
        <div class="dlysurp-p dashbreval-p">
            <h2>Evaluation</h2>
            
            <?php
                $i = 1;
                foreach ($evaluated_questions['question'] as $k => $v) {
                $class = "";
                if ($i % 2 == 0)$class = "greycolr";
                ?>
                <div class="backgrndwhtp-p <?= $class ?>">
                <div class="row">
                    <div class="col-md-1 pppadrm-p">
                        <div class="questp-p">
                            <h3>Q.<?=$v['question_no']?></h3>
                            <p>(<?=$v['question_alpha']?>)</p>
                            <p class="rupsgn-p"><i class="fa fa-rupee"></i> 999</p>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="contnt-p">
                            <p class="p1"><?=$v['Question']?></p>
                            <p class="col-md-3 p2">Evaluated</p>
                            <p class="col-md-3 p3"><?=anchor('uploads/question_model_ans/'.$v['model_answer'],'Model Answer','target="_new"')?></p>
                            <p class="col-md-3 p4">By : <?=$v['primary_evaluator']?></p>
                            <p class="col-md-3 p5"><?=date('d-m-Y', strtotime($v['question_alpha']))?></p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="lnkspaper-p">
                            <div class="col-md-6">
                                <p><?=$v['paper']?></p>
                            </div>
                            <div class="col-md-6">
                                <p><?=$v['subject']?></p>
                            </div>
                            <div class="col-md-12">
                                <div class="submtfl-p">
                                    <?=anchor('Aspirant_dashboard/evaluated_comments/'.$v['q_id'],'Evaluated Files')?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="btnhist-p">
                                    <button class="btn" data-target="#ratesystem" data-toggle="modal">Rate Evaluation</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- white background end-->
                <?php $i++; }
                if(empty($evaluated_questions['question']))
                echo "<p class='text-center'>No Data to display</p>";
                ?>

        </div><!--  evaluated end-->
    </div>
</div>
</div>
</div>
<!-- footer end -->
<!-- images Modal -->
<div id="submitted_files_Modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
        <div class="modal-body">
            <div class="row" style="max-height: 300px;overflow: auto;"></div>
        </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function (){
        $('.submitted_files_show').click(function (){
            $('#submitted_files_Modal .modal-body .row').html("");
            if($(this).data('image')){
                var image = $(this).data('image')
                image = image.split(",");

                for(i=0;i<image.length;i++){
                    $('#submitted_files_Modal .modal-body .row').append('<div class="col-md-6"><img src="<?=base_url()?>uploads/aspirant_uploads/'+image[i]+'" width="100%"/></div>');
                }
                $('#submitted_files_Modal').modal('show');
            }
        });
        $("[class^='chbp']").change(function() {
            var checked = $(this).is(':checked');
            $("[class^='chbp']").prop('checked',false);
            if(checked){
                $('form.'+$(this).data('form')).find('[name="primary"]').val($(this).val());
                $(this).prop('checked',true);
            }else{
                $('form.'+$(this).data('form')).find('[name="primary"]').val("");
            }
        });
        $("[class^='chbs']").change(function() {
            var checked = $(this).is(':checked');
            $("[class^='chbs']").prop('checked',false);
            if(checked){
                $('form.'+$(this).data('form')).find('[name="secondary"]').val($(this).val());
                $(this).prop('checked',true);
            }else{
                $('form.'+$(this).data('form')).find('[name="secondary"]').val("");
            }
        });
        
        $("[class^='chbp']").click(function(e) {
            if($(this).parents('.recntrat-p').find('[class^="chbs"]').is(':checked'))
                e.preventDefault();
        });
        $("[class^='chbs']").click(function(e) {
            if($(this).parents('.recntrat-p').find("[class^='chbp']").is(':checked'))
                e.preventDefault();
        });
        
        $('.insert_evaluator').submit(function (){
            var error = 0;
            $('.evaluator_error').addClass('hide').html("");
            if(!$(this).find('[name="primary"]').val() && !$(this).find('[name="secondary"]').val()){
                $('.evaluator_error').html("Select Primary and Secondary Evaluator");
                error = 1;
            }else if(!$(this).find('[name="primary"]').val()){
                $('.evaluator_error').html("Select Primary Evaluator");
                error = 1;
            }else {
                if($(this).find('#count').val()>1)
                    if(!$(this).find('[name="secondary"]').val()){
                        $('.evaluator_error').html("Select Secondary Evaluator");
                        error = 1;
                    }
            }
            if(error){
                $('.evaluator_error').removeClass('hide');
                return false;
            }
        });
        
        $('.clear_all').click(function (){
            $('.clr').prop('checked',false);
        });
        
    });
</script>

<!-- rate evaluation -->
<div class="modal fade rate-pmod-p" id="ratesystem" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Rate Evaluation</h4>
                <p>John</p>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <label class="col-md-12 control-label"><i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 ppmodtxt-p">
                        <p>Let Others Know the Quality ( Optional )</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 ppinevl-p">
                        <textarea class="form-control" rows="4" cols="4"></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 ppmodpop-p">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- rate evaluation -->
</body>
</html>