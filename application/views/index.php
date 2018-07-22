<?php require 'templates/header.php'; ?>
<?php require 'templates/menu.php'; ?>
<?php require 'templates/google_modal.php'; ?>

<!--  slider -->
<div class="homeslider-p">
    <div id="myhmslide" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">
                <img src="<?= base_url('assets/images/slider/3.jpg') ?>">
                <div class="carousel-caption">
                    <h3 class="h3p1">You can't execute if you are not willing to take action.</h3>
                    <h3> Decide to take off now!”</h3>
                    <p> ― Israelmore Ayivor</p>
                </div>
            </div>

            <div class="item">
                <img src="<?= base_url('assets/images/slider/2.jpg') ?>">
                <div class="carousel-caption">
                    <h3 class="h3p1">You can't execute if you are not willing to take action.</h3>
                    <h3> Decide to take off now!”</h3>
                    <p> ― Israelmore Ayivor</p>
                </div>
            </div>

            <div class="item">
                <img src="<?= base_url('assets/images/slider/1.jpg') ?>">
                <div class="carousel-caption">
                    <h3 class="h3p1">You can't execute if you are not willing to take action.</h3>
                    <h3> Decide to take off now!”</h3>
                    <p> ― Israelmore Ayivor</p>
                </div>
            </div>

        </div>

        <!-- Left and right controls -->

        <a class="left carousel-control" href="#myhmslide" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myhmslide" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<!--  slider end  -->

<!--  notice board  -->
<div class="noticebord-p">
    <div class="container">
        <h2>Notice Board</h2>
        <div id="mynoticeborad-p" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    <div class="contentdivslid-p">
                        <h3>Los Angeles</h3>
                        <p><a href="">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean scetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</a></p>
                    </div>
                </div>

                <div class="item">
                    <div class="contentdivslid-p">
                        <h3>Chicago</h3>
                        <p><a href="">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean scetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</a></p>
                    </div>
                </div>

                <div class="item">
                    <div class="contentdivslid-p">
                        <h3>New York</h3>
                        <p><a href="">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean scetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</a></p>
                    </div>
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#mynoticeborad-p" data-slide="prev">
                <i class="fa fa-angle-left"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#mynoticeborad-p" data-slide="next">
                <i class="fa fa-angle-right"></i>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
<!--  notice board end -->


<!--  Daily Surprise -->
<div class="secdlysurp-p">
    <div class="container-fluid">
        <div class="row">

            <!--  col-md-9 dialy surprise start -->
            <div class="col-md-9 col-sm-12 col-xs-12">
                <h2 class="hdngsurp-p">Daily Surprise</h2>
                <div class="dlysurp-p">
                    <h2>General Studies</h2>
                    <?=(($this->session->flashdata('success_upload'))?"<div class='alert alert-success'>".$this->session->flashdata('success_upload')."</div>":"")?>
                    <?=(($this->session->flashdata('error_upload'))?"<div class='alert alert-danger'>".$this->session->flashdata('error_upload')."</div>":"")?>
                    <?php $i=1; foreach($questions as $k => $v){ 
                        $class="";
                        if($i%2 == 0)$class="greycolr";?>
                        <div class="backgrndwhtp-p <?=$class?>">
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
                                        <p class="col-md-3 p2">Under Review</p>
                                        <p class="col-md-3 p3"><?=((!empty($v['model_answer']))?anchor('/uploads/question_model_ans/'.$v['model_answer'],'Model Answer','target="_new"'):"")?></p>
                                        <p class="col-md-4 p4">Answer Submitted : 111</p>
                                        <p class="col-md-2 p5"><?=date('d-m-Y',strtotime($v['Date']))?></p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <?php if($this->session->userdata('aspirant_id') !== null){
                                        if($v['aspirant_id'] !== $this->session->userdata('aspirant_id')){
                                        echo form_open('Questions/submit','enctype="multipart/form-data" ')?>
                                        <div class="lnkspaper-p">
                                            <div class="col-md-6">
                                                <p><?=$v['paper']?></p>
                                                <div class="btnpapr-p">
                                                    <?php if($this->session->userdata('aspirant_id') !== null){
                                        if($v['aspirant_id'] !== $this->session->userdata('aspirant_id')){?>
                                                    <input type="file" name="submit_ans[]" multiple required>
                                                    <?php }} ?>
                                                    <div class="submtfl-p"><?=anchor($v['refer'],'Refer','target="_new"')?></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?=$v['subject']?></p>
                                                <div class="btnhist-p">
                                                    
                                        <input type="hidden" name="question" value="Q.<?=$v['question_no']?> (<?=$v['question_alpha']?>)">
                                        <input type="hidden" name="page" value="Profilee/">
                                        <input type="hidden" name="id" value="<?=$v['id']?>">
                                        <input type="hidden" name="user_id" value="<?=$this->session->userdata('aspirant_id')?>">
                                                    <button class="btn">Submit</button>
                                                    <div class="submtfl-p"><a href="">Files</a></div>
                                                </div>
                                            </div>
                                        </div> 
                                            <?php echo form_close();}else{
                                                    echo '<input type="button" value="Submited"/>';
                                                    }
                                                    }else{ ?>
                                        <?=anchor('main/login','<input type="button" value="Login To Submit"/>')?>
                                    <?php } ?>
                                        
                                        
                                </div>
                            </div>
                        </div>
                    <?php $i++; } ?>
                </div><!-- general studies end -->

                <!--  optional  -->
                <div class="dlysurp-p hide">
                    <h2>Optional</h2>
                    <div class="backgrndwhtp-p">
                        <div class="row">
                            <div class="col-md-1 pppadrm-p">
                                <div class="questp-p">
                                    <h3>Q.1</h3>
                                    <p>(a)</p>
                                    <p class="rupsgn-p"><i class="fa fa-rupee"></i> 999</p>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="contnt-p">
                                    <p class="p1">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam pretium ligula elementum risus varius, nec pharetraLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam pretium ligula elementum risus varius, nec pharetra</p>
                                    <p class="col-md-3 p2">Under Review</p>
                                    <p class="col-md-3 p3">Model Answer</p>
                                    <p class="col-md-4 p4">Answer Submitted : 787</p>
                                    <p class="col-md-2 p5">DD-MM-YY</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="lnkspaper-p">
                                    <div class="col-md-6">
                                        <p>Paper 1</p>
                                        <div class="btnpapr-p">
                                            <button class="btn">Upload</button>
                                            <div class="submtfl-p">
                                                <a href="">Refer</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <p>History</p>
                                        <div class="btnhist-p">
                                            <button class="btn">Submit</button>
                                            <div class="submtfl-p">
                                                <a href="">Files</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- white background end-->

                    <!-- grey background -->
                    <div class="backgrndwhtp-p greycolr">
                        <div class="row">
                            <div class="col-md-1 pppadrm-p">
                                <div class="questp-p">
                                    <h3>Q.1</h3>
                                    <p>(a)</p>
                                    <p class="rupsgn-p"><i class="fa fa-rupee"></i> 999</p>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="contnt-p">
                                    <p class="p1">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam pretium ligula elementum risus varius, nec pharetraLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam pretium ligula elementum risus varius, nec pharetra</p>
                                    <p class="col-md-3 p2">Under Review</p>
                                    <p class="col-md-3 p3">Model Answer</p>
                                    <p class="col-md-4 p4">Answer Submitted : 787</p>
                                    <p class="col-md-2 p5">DD-MM-YY</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="lnkspaper-p">
                                    <div class="col-md-6">
                                        <p>Paper 1</p>
                                        <div class="btnpapr-p">
                                            <button class="btn">Upload</button>
                                            <div class="submtfl-p">
                                                <a href="">Refer</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <p>History</p>
                                        <div class="btnhist-p">
                                            <button class="btn">Submit</button>
                                            <div class="submtfl-p">
                                                <a href="">Files</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div><!-- grey background end -->
                </div><!--  optional end-->

                <!--  Essay  -->
                <div class="dlysurp-p hide">
                    <h2>Essay</h2>
                    <div class="backgrndwhtp-p">
                        <div class="row">
                            <div class="col-md-1 pppadrm-p">
                                <div class="questp-p">
                                    <h3>Q.1</h3>
                                    <p>(a)</p>
                                    <p class="rupsgn-p"><i class="fa fa-rupee"></i> 999</p>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="contnt-p">
                                    <p class="p1">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam pretium ligula elementum risus varius, nec pharetraLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam pretium ligula elementum risus varius, nec pharetra</p>
                                    <p class="col-md-3 p2">Under Review</p>
                                    <p class="col-md-3 p3">Model Answer</p>
                                    <p class="col-md-4 p4">Answer Submitted : 787</p>
                                    <p class="col-md-2 p5">DD-MM-YY</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="lnkspaper-p">
                                    <div class="col-md-6">
                                        <p>Paper 1</p>
                                        <div class="btnpapr-p">
                                            <button class="btn">Upload</button>
                                            <div class="submtfl-p">
                                                <a href="">Refer</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <p>History</p>
                                        <div class="btnhist-p">
                                            <button class="btn">Submit</button>
                                            <div class="submtfl-p">
                                                <a href="">Files</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- white background end-->

                    <!-- grey background -->
                    <div class="backgrndwhtp-p greycolr">
                        <div class="row">
                            <div class="col-md-1 pppadrm-p">
                                <div class="questp-p">
                                    <h3>Q.1</h3>
                                    <p>(a)</p>
                                    <p class="rupsgn-p"><i class="fa fa-rupee"></i> 999</p>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="contnt-p">
                                    <p class="p1">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam pretium ligula elementum risus varius, nec pharetraLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam pretium ligula elementum risus varius, nec pharetra</p>
                                    <p class="col-md-3 p2">Under Review</p>
                                    <p class="col-md-3 p3">Model Answer</p>
                                    <p class="col-md-4 p4">Answer Submitted : 787</p>
                                    <p class="col-md-2 p5">DD-MM-YY</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="lnkspaper-p">
                                    <div class="col-md-6">
                                        <p>Paper 1</p>
                                        <div class="btnpapr-p">
                                            <button class="btn">Upload</button>
                                            <div class="submtfl-p">
                                                <a href="">Refer</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <p>History</p>
                                        <div class="btnhist-p">
                                            <button class="btn">Submit</button>
                                            <div class="submtfl-p">
                                                <a href="">Files</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- grey background end -->
                </div><!--  Essay end-->
            </div><!-- daily suprise col-md-9 end -->
            <!--  Recent Answers -->
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="recntans-p">
                    <h2>Recent Answers</h2>
                    <div class="row">
                        <div class="contentfrstp-p">
                            <div class="col-md-1">
                                <div class="sercnicnt-p">
                                    <i class="fa fa-search"></i>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="ddescrp-p">
                                    <h3>GS-Geography</h3>
                                    <p>Lorem ipsum dolor sit amet, enim sit consectetur adipiscing elit.Lorem ipsum dolor sit amet, enim sit consectetur adipiscing elit.Lorem ipsum dolor sit <a href="">More ...</a> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="contentfrstp-p">
                            <div class="col-md-1">
                                <div class="sercnicnt-p">
                                    <i class="fa fa-search"></i>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="ddescrp-p">
                                    <h3>GS-Geography</h3>
                                    <p>Lorem ipsum dolor sit amet, enim sit consectetur adipiscing elit.Lorem ipsum dolor sit amet, enim sit consectetur adipiscing elit.Lorem ipsum dolor sit <a href="">More ...</a> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="contentfrstp-p">
                            <div class="col-md-1">
                                <div class="sercnicnt-p">
                                    <i class="fa fa-search"></i>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="ddescrp-p">
                                    <h3>GS-Geography</h3>
                                    <p>Lorem ipsum dolor sit amet, enim sit consectetur adipiscing elit.Lorem ipsum dolor sit amet, enim sit consectetur adipiscing elit.Lorem ipsum dolor sit <a href="">More ...</a> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="contentfrstp-p">
                            <div class="col-md-1">
                                <div class="sercnicnt-p">
                                    <i class="fa fa-search"></i>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="ddescrp-p">
                                    <h3>GS-Geography</h3>
                                    <p>Lorem ipsum dolor sit amet, enim sit consectetur adipiscing elit.Lorem ipsum dolor sit amet, enim sit consectetur adipiscing elit.Lorem ipsum dolor sit <a href="">More ...</a> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="contentfrstp-p">
                            <div class="col-md-1">
                                <div class="sercnicnt-p">
                                    <i class="fa fa-search"></i>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="ddescrp-p">
                                    <h3>GS-Geography</h3>
                                    <p>Lorem ipsum dolor sit amet, enim sit consectetur adipiscing elit.Lorem ipsum dolor sit amet, enim sit consectetur adipiscing elit.Lorem ipsum dolor sit <a href="">More ...</a> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--  Recent Answers end-->
        </div>
    </div>
</div><!--  Daily Surprise end-->




<!-- evaluator  -->

<div class="container">
    <h2 class="tstevl-p">Know Your Evaluator</h2>
    <div id="myknweval-p" class="carousel slide ppevlutrslider-p" data-ride="carousel">
        <div class="carousel-inner">
            <?php
            $i = 0;$main_cnt = 0;
            foreach ($evaluators['evaluator'] as $k => $v) {
                if ($i == 0)
                    echo '<div class="item '.(($main_cnt == 0)?'active':'').'"><div class="row">';
                $main_cnt++;
                echo '<div class="col-md-4">
                        <div class="evlurimg-p">
                            <p class="nick-p">' . $v['first_name'] . ' ' . $v['last_name'] . '</p>
                            <p class="ratpcls-p">
                                <!--<i class="fa fa-star"></i> -->
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </p>
                            <p class="nw-p hide">New</p>
                            <div class="evimgcss-p"><img src="' . $v['picture_url'] . '"></div>
                            <div class="ppdescrptn-p">
                                <p><span>Mains : </span><span>' . intval($v['appearedinmains']) . '</span></p>
                                <p><span>Interview : </span><span>' . intval($v['appearedininterview']) . '</span></p>
                                <p><span>Answers :</span><span>'.$evaluators['answers'][$v['id']].'</span></p>     
                                <p><span>Since : </span><span>' . date('d-m-Y', strtotime($v['created'])) . '</span></p>             
                            </div>
                            <div class="ppoptnl-p"><p>Opt : </p></div> 
                        </div>
                    </div>';
                $i++;
                if ($i == 3) {
                    echo '</div></div>';
                    $i = 0;
                }
            }
            if ($i > 0 && $i < 3)
                echo '</div></div>';
            ?>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myknweval-p" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myknweval-p" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<!-- evaluator end  -->

</div>
<!-- evaluator end  -->
<?php require 'templates/footer.php'; ?>
