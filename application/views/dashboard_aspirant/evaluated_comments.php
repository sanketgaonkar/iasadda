<?php require APPPATH.'views/templates/header.php'; ?>
<div class="container">
    <div class="evl-commts-p">
        <h2 class="evl">Evaluation & Comments</h2>
        <div class="dlysurp-p eval-commts-p">
            <div class="backgrndwhtp-p">
                <div class="row">
                    <div class="col-md-1 pppadrm-p">
                        <div class="questp-p">
                            <h3>Q.<?=$question['question_no']?></h3>
                            <p>(<?=$question['question_alpha']?>)</p>
                            <p class="rupsgn-p"><i class="fa fa-rupee"></i> <?=intval($question['evaluation_charges'])?></p>
                        </div>
                    </div>
                    <div class="col-md-11">
                        <div class="contnt-p">
                            <p class="p1 col-md-12"><?=$question['Question']?></p>
                            <div class="col-md-8">
                                <p class="col-md-3 p2">Evaluated</p>
                                <p class="col-md-3 p3"><?=anchor('uploads/question_model_ans/'.$question['model_answer'],'Model Answer','target="_new"')?></p>
                                <p class="col-md-4 p4">Answer Submitted : 787</p>
                                <p class="col-md-2 p5"><?=date('d-m-Y', strtotime($question['created']))?></p>
                            </div>
                            <div class="col-md-4">
                                <div class="lnkspaper-p">
                                    <div class="col-md-6">
                                        <div class="txtonly-p">
                                            <p><?=$question['paper']?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="txtonly-p">
                                            <p><?=$question['subject']?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="keypnts-p">
        <h2>Key Points</h2>
        <div class="row">
            <div class="col-md-7 ppleftky-p">
                <p><i class="fa fa-circle"></i> <?=$question['key_point_1']?></p>
            </div>
            <div class="col-md-5 pprightky-p">
                <p><i class="fa fa-circle"></i> <?=$question['key_point_2']?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 ppleftky-p">
                <p><i class="fa fa-circle"></i> <?=$question['key_point_3']?></p>
            </div>
            <div class="col-md-5 pprightky-p">
                <p><i class="fa fa-circle"></i> <?=$question['key_point_4']?></p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="iconsevlcm-p">
                <span><a href="javascript:void(0);"><i class="fa fa-circle"></i></a></span>
                <span><a href="javascript:void(0);"><i class="fa fa-check"></i></a></span>
                <span><a href="javascript:void(0);"><i class="fa fa-close"></i></a></span>
                <span><a href="javascript:void(0);">T</a></span>
                <span><a href="javascript:void(0);"><i class="fa fa-trash"></i></a></span>
            </div>              
        </div>
    </div>
</div>

<!-- slider -->
<div class="container">
    <div id="eval-commts-slider-p" class="carousel slide sldrevalcmt-p" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            
            <?php $cnt=0; foreach($images as $v){
                echo '<div class="item '.(($cnt==0)?"active":"").'">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="imgsldrevcm-p">
                                <img src="'. base_url("uploads/aspirant_uploads/".$v['image']).'">
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <div class="cmtdecrp-p">
                                <p>'.$v['comment'].'</p>
                            </div>
                        </div>
                    </div>
                </div>';
            $cnt++; }
            ?>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#eval-commts-slider-p" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#eval-commts-slider-p" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<!--  end of slider  -->

<div class="container ppmrbtmevcmt-p">
    <div class="row">
        <div class="col-md-5 pptxtcentr-p">
            <p>
                <span class="pplantxt-p col-md-7">Language & Grammar </span>
                <span class="ppratsys-p col-md-5">
                    <?php 
                        for($i=0;$i<5;$i++){
                            if($i<$question['language_grammar'])
                                echo '<i class="fa fa-star"></i> ';
                            else
                                echo '<i class="fa fa-star-o"></i> ';
                        }
                    ?>
                </span>
            </p>
            <p>
                <span class="pplantxt-p col-md-7">Relevant Content  </span>
                <span class="ppratsys-p col-md-5">
                    <?php 
                        for($i=0;$i<5;$i++){
                            if($i<$question['relevant_content'])
                                echo '<i class="fa fa-star"></i> ';
                            else
                                echo '<i class="fa fa-star-o"></i> ';
                        }
                    ?>
                </span>
            </p>
            <p>
                <span class="pplantxt-p col-md-7"> Intro, Ex , Conclusion  </span>
                <span class="ppratsys-p col-md-5">
                    <?php 
                        for($i=0;$i<5;$i++){
                            if($i<$question['others'])
                                echo '<i class="fa fa-star"></i> ';
                            else
                                echo '<i class="fa fa-star-o"></i> ';
                        }
                    ?>
                </span>
            </p>
            <p>
                <span class="pplantxt-p col-md-7"> Presentation   </span>
                <span class="ppratsys-p col-md-5">
                    <?php 
                        for($i=0;$i<5;$i++){
                            if($i<$question['presentation'])
                                echo '<i class="fa fa-star"></i> ';
                            else
                                echo '<i class="fa fa-star-o"></i> ';
                        }
                    ?>
                </span>
            </p>
        </div>

        <div class="col-md-7 ppfnlwrds-p">
            <label class="control-label col-md-12 col-sm-12 col-xs-12">
                Final Words
            </label>
            <div class="col-md-12">
                <div class="cmtdecrp-p">
                    <p><?=$question['final_words']?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require APPPATH.'views/templates/footer.php'; ?>
