<?php require APPPATH.'views/templates/header.php'; ?>
<?=form_open()?>
<input type="hidden" name="id" value="<?=$question['question'][0]['id']?>"/>
<input type="hidden" name="q_id" value="<?=$question['question'][0]['q_id']?>"/>
<div class="container">
    <div class="evl-commts-p">
        <h2 class="evl">Evaluation & Comments</h2>
        <div class="dlysurp-p eval-commts-p">
            <div class="backgrndwhtp-p">
                <div class="row">
                    <div class="col-md-1 pppadrm-p">
                        <div class="questp-p">
                            <h3>Q.<?=$question['question'][0]['question_no']?></h3>
                            <p>(<?=$question['question'][0]['question_alpha']?>)</p>
                            <p class="rupsgn-p"><i class="fa fa-rupee"></i> <?=intval($question['question'][0]['evaluation_charges'])?></p>
                        </div>
                    </div>
                    <div class="col-md-11">
                        <div class="contnt-p">
                            <p class="p1 col-md-12"><?=$question['question'][0]['Question']?></p>
                            <div class="col-md-8">
                                <p class="col-md-3 p2">Under Review</p>
                                <p class="col-md-3 p3"><?=((!empty($question['question'][0]['model_answer']))?anchor('/uploads/question_model_ans/'.$question['question'][0]['model_answer'],'Model Answer','target="_new"'):"")?></p>
                                <p class="col-md-4 p4">Answer Submitted : 787</p>
                                <p class="col-md-2 p5"><?=date('d-m-Y', strtotime($question['question'][0]['created']))?></p>
                            </div>
                            <div class="col-md-4">
                                <div class="lnkspaper-p">
                                    <div class="col-md-6">
                                        <div class="txtonly-p">
                                            <p><?=$question['question'][0]['paper']?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="txtonly-p">
                                            <p><?=$question['question'][0]['subject']?></p>
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
                <p><i class="fa fa-circle"></i> <input type="text" name="key_point_1" class="form-control"></p>
            </div>
            <div class="col-md-5 pprightky-p">
                <p><i class="fa fa-circle"></i> <input type="text" name="key_point_2" class="form-control"></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 ppleftky-p">
                <p><i class="fa fa-circle"></i> <input type="text" name="key_point_3" class="form-control"></p>
            </div>
            <div class="col-md-5 pprightky-p">
                <p><i class="fa fa-circle"></i> <input type="text" name="key_point_4" class="form-control"></p>
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

    <!-- <div class="row">
    <div class="col-md-7">
    <div class="imgevcmt-p">
      <img src="images/eval_com.jpg">
    </div>
    </div>
    <div class="col-md-5">
      <div class="cmts-p">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed</p>
      </div>
    </div>
    </div> -->
</div>

<hr>

<!-- slider -->
<div class="container">
    <?php foreach($question['images'] as $v){ ?>
    
    <div class="row">
        <div class="col-md-7">
            <div class="imgsldrevcm-p">
                <img src="<?= base_url('uploads/aspirant_uploads/'.$v['image'])?>" style="width: 100%;max-height: 400px;">
            </div>
        </div>
        <div class="col-md-5">
            <div class="cmtdecrp-p">
                <p><textarea class="form-control" rows="10" name="image[<?=$v['id']?>]" required></textarea></p>
            </div>
        </div>
    </div>
    <?php }?>
</div>
</div>
<!--  end of slider  -->
<hr>
<div class="container ppmrbtmevcmt-p">
    <div class="row">
        <div class="col-md-5 pptxtcentr-p">
            <p>
                <span class="pplantxt-p col-md-7">Language & Grammar </span>
                <span class="ppratsys-p col-md-5">
                    <span class="fa fa-star" id="starl1" onclick="add(this, 1, 'starl', 'language_grammar')"></span>
                    <span class="fa fa-star" id="starl2" onclick="add(this, 2, 'starl', 'language_grammar')"></span>
                    <span class="fa fa-star" id="starl3" onclick="add(this, 3, 'starl', 'language_grammar')"></span>
                    <span class="fa fa-star" id="starl4" onclick="add(this, 4, 'starl', 'language_grammar')"></span>
                    <span class="fa fa-star" id="starl5" onclick="add(this, 5, 'starl', 'language_grammar')"></span>
                </span>
                <input type="hidden" name="language_grammar" value="0"/>
            </p>
            <p>
                <span class="pplantxt-p col-md-7">Relevant Content  </span>
                <span class="ppratsys-p col-md-5">
                    <span class="fa fa-star" id="starr1" onclick="add(this, 1, 'starr', 'relevant_content')"></span>
                    <span class="fa fa-star" id="starr2" onclick="add(this, 2, 'starr', 'relevant_content')"></span>
                    <span class="fa fa-star" id="starr3" onclick="add(this, 3, 'starr', 'relevant_content')"></span>
                    <span class="fa fa-star" id="starr4" onclick="add(this, 4, 'starr', 'relevant_content')"></span>
                    <span class="fa fa-star" id="starr5" onclick="add(this, 5, 'starr', 'relevant_content')"></span>
                </span>
                <input type="hidden" name="relevant_content" value="0"/>
            </p>
            <p>
                <span class="pplantxt-p col-md-7"> Intro, Ex , Conclusion  </span>
                <span class="ppratsys-p col-md-5">
                    <span class="fa fa-star" id="stari1" onclick="add(this, 1, 'stari', 'others')"></span>
                    <span class="fa fa-star" id="stari2" onclick="add(this, 2, 'stari', 'others')"></span>
                    <span class="fa fa-star" id="stari3" onclick="add(this, 3, 'stari', 'others')"></span>
                    <span class="fa fa-star" id="stari4" onclick="add(this, 4, 'stari', 'others')"></span>
                    <span class="fa fa-star" id="stari5" onclick="add(this, 5, 'stari', 'others')"></span>
                </span>
                <input type="hidden" name="others" value="0"/>
            </p>
            <p>
                <span class="pplantxt-p col-md-7"> Presentation   </span>
                <span class="ppratsys-p col-md-5">
                    <span class="fa fa-star" id="starp1" onclick="add(this, 1, 'starp', 'presentation')"></span>
                    <span class="fa fa-star" id="starp2" onclick="add(this, 2, 'starp', 'presentation')"></span>
                    <span class="fa fa-star" id="starp3" onclick="add(this, 3, 'starp', 'presentation')"></span>
                    <span class="fa fa-star" id="starp4" onclick="add(this, 4, 'starp', 'presentation')"></span>
                    <span class="fa fa-star" id="starp5" onclick="add(this, 5, 'starp', 'presentation')"></span>
                </span>
                <input type="hidden" name="presentation" value="0"/>
            </p>
        </div>

        <div class="col-md-7 ppfnlwrds-p">
            <label class="control-label col-md-12 col-sm-12 col-xs-12">
                Final Words
            </label>
            <div class="col-md-12">
                <textarea class="form-control" rows="4" name="final_words" required></textarea>
            </div>
        </div>
    </div>
</div>

<div class="container ppbtnsevlcmt-p">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <input type="submit" class="btn" value="Submit">
            <button  class="btn">Cancel</button>
        </div>
    </div>
</div>
<?=form_close()?>


<script>
    function add(ths, sno, name, field) {

        for (var i = 1; i <= 5; i++) {
            var cur = document.getElementById(name + i);
            cur.className = "fa fa-star";
        }

        for (var i = 1; i <= sno; i++) {
            var cur = document.getElementById(name + i);
            if (cur.className === "fa fa-star")
            {
                cur.className = "fa fa-star checked";
            }
        }
        
        $('[name="'+field+'"]').val(sno);
        
    }
</script>
<style>
    .checked {
        color: orange;
    }
</style>
<?php require APPPATH.'views/templates/footer.php'; ?>
