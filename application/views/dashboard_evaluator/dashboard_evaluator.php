<?php require 'e_dash/e_header.php'; ?>
<div class="container-fluid">
    <div class="row">
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

                <!-- assignment -->
                <div class="dlysurp-p assgnsec-p">
                    <h2>Assignment</h2>
                    <?php
                    $i = 1;
                    foreach ($assignment_questions['question'] as $k => $v) {
                        $class = "";
                        if ($i % 2 == 0)
                            $class = "greycolr";
                        ?>
                        <div class="backgrndwhtp-p <?= $class ?>">
                        <div class="row">
                            <div class="col-md-1 pppadrm-p">
                                <div class="questp-p dasevassgn-p">
                                    <h3>Q<?=$v['question_no']?></h3>
                                    <p>(<?=$v['question_alpha']?>)</p>
                                    <div class="tmmartp-p">
                                        <p>Time </p>
                                        <p>Left</p>
                                        <p class="tmred-col-p">23:59</p>
                                        <p id="clock"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="contnt-p newcentrlg-p">
                                    <p class="p1"><?=$v['Question']?></p>
                                    <p class="col-md-3 penred-p">Pending</p>
                                    <p class="col-md-3 p5">General Studies</p>
                                    <p class="col-md-3 p5"><i class="fa fa-rupee"></i> <?=intval($v['evaluation_charges'])?></p>
                                    <p class="col-md-3 p5"><?=date('d-m-Y',strtotime($v['created']))?></p>
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
                                        <div class="btnhist-p evlnw-p">
                                            <?=anchor('Evaluator_dashboard/paper_evaluation/'.$v['efq_id'],'<button class="btn">Evaluate Now</button>')?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="newfls-p smtdmartp-p">
                                            <a href="#" class="submitted_files_show" data-image="<?=implode(',',$assignment_questions['images'][$v['q_id']])?>">Submitted Files</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $i++;} 
                    if(empty($assignment_questions['question']))
                echo "<p class='text-center'>No Data to display</p>";?>
                </div><!-- assignment end -->


                <!--   Submission start -->
                <div class="dlysurp-p assgnsec-p">
                    <h2>Submission</h2>
                    <?php
                    $i = 1;
                    foreach ($submisions['question'] as $k => $v) {
                        $class = "";
                        if ($i % 2 == 0)
                            $class = "greycolr";
                        ?>
                        <div class="backgrndwhtp-p <?= $class ?>">
                            <div class="row">
                                <div class="col-md-1 pppadrm-p">
                                    <div class="questp-p dasevassgn-p">
                                        <h3>Q<?=$v['question_no']?></h3>
                                        <p>(<?=$v['question_alpha']?>)</p>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="contnt-p newcentrlg-p">
                                        <p class="p1"><?=$v['Question']?></p>
                                        <p class="col-md-3 p5">New</p>
                                        <p class="col-md-3 p5">General Studies</p>
                                        <p class="col-md-3 p5"><i class="fa fa-rupee"></i> <?=intval($v['evaluation_charges'])?></p>
                                        <p class="col-md-3 p5"><?=$v['submision_date']?></p>
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
                                            <div class="btnhist-p evlnw-p">
                                                <?php if($evaluator['active']){ if(!$v['eqa_id']){ ?>
                                                <?=form_open('Evaluator_dashboard/evaluator_apply')?>
                                                <button type="submit" class="btn">Apply Now</button>
                                                <input type="hidden" name="question_answer_id" value="<?=$v['qa_id']?>"/>
                                                <?=form_close()?>
                                                <?php } }else{?>
                                                <font color="red">INACTIVE</fonr>
                                                <?php } ?>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="newfls-p smtdmartp-p">
                                                <a href="#" class="submitted_files_show" data-image="<?=implode(',',$submisions['images'][$v['id']])?>">Submitted Files</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php $i++;} 
                    if(empty($submisions['question']))
                echo "<p class='text-center'>No Data to display</p>";?>       
                </div><!-- Submission end -->

                <!--  under review  -->
                <div class="dlysurp-p assgnsec-p">
                    <h2>Under Review</h2>
                    <?php
                    $i = 1;
                    foreach ($get_under_review_evaluator['question'] as $k => $v) {
                        $class = "";
                        if ($i % 2 == 0)
                            $class = "greycolr";
                        ?>
                        <div class="backgrndwhtp-p <?= $class ?>">
                        <div class="row">
                            <div class="col-md-1 pppadrm-p">
                                <div class="questp-p dasevassgn-p">
                                    <h3>Q<?=$v['question_no']?></h3>
                                    <p>(<?=$v['question_alpha']?>)</p>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="contnt-p newcentrlg-p">
                                    <p class="p1"><?=$v['Question']?></p>
                                    <p class="col-md-3 p2">Under Review</p>
                                    <p class="col-md-3 p5">General Studies</p>
                                    <p class="col-md-3 p5"><i class="fa fa-rupee"></i> <?= intval($v['evaluation_charges'])?></p>
                                    <p class="col-md-3 p5"><?=date('d-m-Y', strtotime($v['submision_date']))?></p>
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
                                        <div class="undrrevtxt">
                                            <p>Interested</p>
                                            <p>Evaluators</p>
                                            <p>99</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php $i++;}?>
                </div><!-- Under Review end -->

                <!-- evaluator -->
                <div class="dlysurp-p assgnsec-p">
                    <h2>Evaluation</h2>
                    <?php
                    $i = 1;
                    foreach ($evaluation_questions['question'] as $k => $v) {
                        $class = "";
                        if ($i % 2 == 0)
                            $class = "greycolr";
                        ?>
                        <div class="backgrndwhtp-p <?= $class ?>">
                        <div class="row">
                            <div class="col-md-1 pppadrm-p">
                                <div class="questp-p dasevassgn-p">
                                    <h3>Q<?=$v['question_no']?></h3>
                                    <p>(<?=$v['question_alpha']?>)</p>
                                    <div class="tmmartp-p">
                                        <p>Your  </p>
                                        <p>Rating</p>
                                        <p>4.9</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="contnt-p newcentrlg-p">
                                    <p class="p1"><?=$v['Question']?></p>
                                    <p class="col-md-3 p2">Finished</p>
                                    <p class="col-md-3 p5">General Studies</p>
                                    <p class="col-md-3 p5"><i class="fa fa-rupee"></i> <?= intval($v['evaluation_charges'])?></p>
                                    <p class="col-md-3 p5"><?=date('d-m-Y', strtotime($v['created']))?></p>
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
                                        <div class="btnhist-p evlnw-p">
                                            <button class="btn">Check Review</button>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="newfls-p smtdmartp-p">
                                            <?=anchor('Evaluator_dashboard/evaluated_comments/'.$v['q_id'],'Evaluated Files')?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php  $i++; } 
                    if(empty($evaluation_questions['question']))
                echo "<p class='text-center'>No Data to display</p>";
                    ?>
                </div><!-- evaluator end -->
            </div>
        </div>
        
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

        
<?php require 'e_dash/e_info.php'; ?>
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
});
</script>