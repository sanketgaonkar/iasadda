<?php require 'templates/header.php'; ?>
<?php require 'templates/google_modal.php'; ?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-9 lgh2css-p">
            <div class="advertise-p">
                <img src="<?php echo base_url('assets/images/login/a1.jpg'); ?>">
            </div>
            <div class="proflp-p">
                <h2>Hi, <?php echo $firstname; ?> <?php echo $lastname; ?> – The Evaluator ... ! <?=anchor('Evaluator_dashboard','<i class="fa fa-2x fa-dashboard" aria-hidden="true"></i>')?></h2>
            </div>
            <div class="profilefrm-p">
                <div class="proedit-p">
                    <a href="javascript:void(0);" class="evaluedt-pp">Edit</a>
                </div>

                <?= form_open('Profilee/profile_validation', 'class="form-horizontal newevprof-p" enctype="multipart/form-data" method="post"') ?>
                <input type="hidden" name="id" value="<?php echo $ID; ?>">
                <div class="row pprwmrbtm-p">
                    <div class="col-md-4">
                        <label class="control-label ppboltxt-p col-md-5">First Name </label>
                        <label class="control-label col-md-5"><?php echo $firstname; ?></label>
                    </div>
                    <div class="col-md-4">
                        <label class="control-label ppboltxt-p col-md-5">Last Name </label>
                        <label class="control-label col-md-5"><?php echo $lastname; ?></label>
                    </div>
                    <div class="col-md-4">
                        <label class="control-label ppboltxt-p col-md-5">Nickname </label>
                        <label class="control-label clickhide-pevl-p col-md-5"><?php echo $shortname; ?></label>
                        <div class="col-md-7 ppclickshw-p">
                            <input type="text" class="form-control" name="shortname" value="<?php echo $shortname; ?>">
                        </div>
                    </div>
                </div>
                <div class="row pprwmrbtm-p">
                    <div class="col-md-6">
                        <label class="control-label ppboltxt-p col-md-12">My Info </label>
                        <label class="control-label clickhide-pevl-p col-md-5"><?php echo $myinfo; ?></label>
                        <div class="col-md-12 ppclickshw-p">
                            <textarea class="form-control" rows="9" cols="3" name="myinfo"><?php echo $myinfo; ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="control-label ppboltxt-p col-md-12">My Image</label>
                        <div class="upload-image ppevalprof-p">
                            <input type="hidden" name="imagename" value="<?php echo $imagename ?>"> 
                            <?php
                            if ($imagename != '') {
                                echo '<img style="height:200px;with200px;" src="' . base_url() . 'uploads/Evaluatorprofile/' . $imagename . '">';
                            } else
                              //  echo'<img src="' . base_url() . 'images/profile/p1.jpg." alt="">';
                            ?>
                        <!--  <img src="images/profile/p1.jpg" alt=""> -->
                            <!--  <button type="button" class="btn upld-p ppclickshw-p" data-toggle="modal">Upload</button> -->
                            <input class="btn upld-p ppclickshw-p" type="file" name="picture" />  
                        </div>
                    </div>
                </div>
                <div class="row pprwmrbtm-p">
                    <div class="col-md-12">
                        <div class="col-md-6 notep-p">
                            <p class="clickhide-pevl-p" style="text-align: left !important;"><span class="colrcng-p">Ph Number : +91 <?=$phone?></span></p>
                            <div class="ppclickshw-p col-md-7">
                            <input type="text" class="form-control" name="phone" value="<?=$phone?>">
                            <span class="text-danger"><?php echo form_error('phone'); ?></span>
                            </div>
                        </div>
                        <div class="col-md-6 notep-p">
                            <p><span class="cngctwp-p">(This number will be used for your Monthly Payment via BHIM / TEJ / PAYTM. Our team will not store your bank details in our database.)</span></p>
                        </div>
                    </div>
                </div>
                <div class="row pprwmrbtm-p">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 ppevproform-p">
                        <div class="col-md-12">
                            <div class="">
                                <input type="hidden" name="id" value="<?php echo $ID ?>">
                                <label class="control-label col-md-5">Email ID :</label>  
                                <p class="col-md-7"> <?php echo $emailid ?></p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="">
                                <label class="control-label col-md-5">Verified user :</label>  
                                <p class="col-md-7"><?=(($active == 1)?'<i class="fa fa-check-circle"></i>':'<i class="fa fa-times-circle text-danger"></i>')?>  </p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="">
                                <label class="control-label col-md-5">User Category :</label>
                                <p class="col-md-7"><?php echo $usercategory; ?></p>
                                <!-- <div class="col-md-7 ppclickshw-p pprwmrbtm-p">
                                    <input type="text" class="form-control" name="usercategory" value="<?= $usercategory ?>">
                                </div> -->
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="">
                                <label class="control-label col-md-5">User Rating :</label>
                                <p class="col-md-7"><?php echo $userrating; ?></p>
                                <!-- <div class="col-md-7 ppclickshw-p pprwmrbtm-p">
                                    <input type="text" class="form-control" name="userrating" value="<?= $userrating ?>">
                                </div> -->
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="">
                                <label class="control-label col-md-5">Active Since :</label>
                                <p class="col-md-7 clickhide-pevl-p"><?=date('d-m-Y', strtotime($activesince))?></p>
                                <div class="col-md-7 ppclickshw-p">
                                    <input type="text" class="form-control" value="<?= $activesince ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" value="Submit" class="btn pppprofbtn-p btn-primary mr-3 mb-2">Save</button>
                             
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        
                    </div>
                    
                </div>
                <?= form_close() ?>
                <hr/>
                <div class="row exmp-p">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <label class="control-label col-md-4">Exam Profile</label>
                        <div class="col-md-7">
                            <div class="seldrop-p">
                                <select class="form-control">
                                    <option selected="" value="UPSC">UPSC</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="frmselbx-p">
                            <div class="panel panel-default">
                                <div class="panel-heading">UPSC Experience (Mandatory)</div>
                                <div class="panel-body">
                                    <div class="clsdemsel-p">
                                        <?= ((isset($error) && isset($error['main_civil_save']) && $error['main_civil_save'] == 1) ? '<div class="alert alert-success">Successfully Saved Civil Exam Form</div>' : '') ?>
                                        <?= ((isset($error) && isset($error['main_civil_save']) && $error['main_civil_save'] == 0) ? '<div class="alert alert-danger">Error Saving Civil Exam Form</div>' : '') ?>
                                        <h3>Civil Exam</h3>
                                        <div class="row">
                                            <?= form_open('Profilee/UPSC', 'class="form-horizontal" enctype="multipart/form-data" method="post"') ?>
                                            <input type="hidden" name="type" value="1"/>
                                            <input type="hidden" name="user_id" value="<?php echo $ID; ?>">
                                            <input type="hidden" name="id" value="<?=(($civil['idcivil'])?$civil['idcivil']:"")?>">
                                            <div class="col-md-12">
                                                <div class="row pprwo-p">
                                                    <label for="" class="control-label col-lg-5 col-md-5 col-sm-12">Total Attempts</label>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <?=
                                                        form_dropdown('c_drop1', array(
                                                            "" => 'Select',
                                                            "0" => 'Zero',
                                                            "1" => 'One',
                                                            "2" => 'Two',
                                                            "3" => 'Three',
                                                                ), (($civil['totalattempts'])?$civil['totalattempts']:set_value('c_drop1')), 'class="form-control" required')
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="row pprwo-p">
                                                    <label for="" class="control-label col-lg-5 col-md-5 col-sm-12">Appeared in Mains</label>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <?=
                                                        form_dropdown('c_drop2', array(
                                                            "" => 'Select',
                                                            "0" => 'Zero',
                                                            "1" => 'One',
                                                            "2" => 'Two',
                                                            "3" => 'Three',
                                                                ), (($civil['appearedinmains'])?$civil['appearedinmains']:set_value('c_drop2')), 'class="form-control upload" data-hide="upload_1" required')
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="row pprwo-p upload_1">

                                                    <label for="" class="control-label col-lg-5 col-md-5 col-sm-12">Upload Latest DAF</label>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <input class="btn upld-p " type="file" name="c_drop2_picture" />
                                                        <!--<button type="button" class="btn btngrnupld-p">Upload</button>-->
                                                    </div>
                                                        <?= ((isset($error) && isset($error['img1'])) ? $error['img1'] : "") ?>
                                                </div>
                                                <div class="row pprwo-p">
                                                    <label for="" class="control-label col-lg-5 col-md-5 col-sm-12">Appeared in Interview</label>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <?=
                                                        form_dropdown('c_drop3', array(
                                                            "" => 'Select',
                                                            "0" => 'Zero',
                                                            "1" => 'One',
                                                            "2" => 'Two',
                                                            "3" => 'Three',
                                                                ), (($civil['appearedininterview'])?$civil['appearedininterview']:set_value('c_drop3')), 'class="form-control upload" data-hide="upload_2" required')
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="row pprwo-p upload_2">
                                                    <label for="" class="control-label col-lg-5 col-md-5 col-sm-12">Upload last interview  Admit Card</label>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <input class="btn upld-p " type="file" name="c_drop3_picture" />
                                                        <!--<button type="button" class="btn btngrnupld-p">Upload</button>-->
                                                    </div>
                                                        <?= ((isset($error) && isset($error['img2'])) ? $error['img2'] : "") ?>
                                                </div>
                                                <div class="row pprwo-p">
                                                    <label for="" class="control-label col-lg-5 col-md-5 col-sm-12">Final Selection</label>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <?=
                                                    form_dropdown('c_drop4', array(
                                                        "" => 'Select',
                                                        "Yes" => 'Yes',
                                                        "No" => 'No',
                                                            ), (($civil['finalselection'])?$civil['finalselection']:set_value('c_drop4')), 'class="form-control" required')
                                                    ?>
                                                    </div>
                                                </div>
                                                <div class="row pprwo-p">
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                     
                                                 </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                     <input type="submit" value="Submit" class="btn btn-success"/>
                                                 </div>
                                                </div>
                                            </div>
                                            <?= form_close() ?>
                                        </div>

                                        <hr/>


                                        <div class="row pprwo-p">
                                            <div class="col-md-12">
                                                <?= ((isset($error) && isset($error['main_ifos_save']) && $error['main_ifos_save'] ==1) ? '<div class="alert alert-success">Successfully Saved Civil Exam Form</div>' : '') ?>
                                                <?= ((isset($error) && isset($error['main_ifos_save']) && $error['main_ifos_save'] ==0) ? '<div class="alert alert-danger">Error Saving Civil Exam Form</div>' : '') ?>
                                                <h3>IFos Exam</h3>
                                                <div class="row">
                                                    <?= form_open('Profilee/UPSC', 'class="form-horizontal" enctype="multipart/form-data" method="post"') ?>
                                                    <input type="hidden" name="type" value="2"/>
                                                    <input type="hidden" name="id" value="<?=(($ifos['idifos'])?$ifos['idifos']:"")?>">
                                                    <input type="hidden" name="user_id" value="<?php echo $ID; ?>">
                                                    <div class="col-md-12">
                                                        <div class="row pprwo-p">
                                                            <label for="" class="control-label col-lg-5 col-md-5 col-sm-12">Total Attempts</label>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <?=
                                                            form_dropdown('i_drop1', array(
                                                                "" => 'Select',
                                                                "0" => 'Zero',
                                                                "1" => 'One',
                                                                "2" => 'Two',
                                                                "3" => 'Three',
                                                                    ), (($ifos['totalattempts'])?$ifos['totalattempts']:set_value('i_drop1')), 'class="form-control" required')
                                                            ?>
                                                            </div>
                                                        </div>
                                                        <div class="row pprwo-p">
                                                            <label for="" class="control-label col-lg-5 col-md-5 col-sm-12">Appeared in Mains</label>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <?=
                                                            form_dropdown('i_drop2', array(
                                                                "" => 'Select',
                                                                "0" => 'Zero',
                                                                "1" => 'One',
                                                                "2" => 'Two',
                                                                "3" => 'Three',
                                                                    ), (($ifos['appearedinmains'])?$ifos['appearedinmains']:set_value('i_drop2')), 'class="form-control upload" data-hide="upload_11" required')
                                                            ?>
                                                            </div>
                                                        </div>
                                                        <div class="row pprwo-p upload_11">
                                                            <label for="" class="control-label col-lg-5 col-md-5 col-sm-12">Upload Latest DAF</label>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <input class="btn upld-p " type="file" name="i_drop2_picture" />
                                                                <!--<button type="button" class="btn btngrnupld-p">Upload</button>-->
                                                            </div>
                                                            <?= ((isset($error) && isset($error['img11'])) ? $error['img11'] : "") ?>
                                                        </div>
                                                        <div class="row pprwo-p">
                                                            <label for="" class="control-label col-lg-5 col-md-5 col-sm-12">Appeared in Interview</label>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <?=
                                                            form_dropdown('i_drop3', array(
                                                                "" => 'Select',
                                                                "0" => 'Zero',
                                                                "1" => 'One',
                                                                "2" => 'Two',
                                                                "3" => 'Three',
                                                                    ), (($ifos['appearedininterview'])?$ifos['appearedininterview']:set_value('i_drop3')), 'class="form-control upload" data-hide="upload_22" required')
                                                            ?>
                                                            </div>
                                                        </div>
                                                        <div class="row pprwo-p upload_22">
                                                            <label for="" class="control-label col-lg-5 col-md-5 col-sm-12">Upload last interview  Admit Card</label>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <input class="btn upld-p " type="file" name="i_drop3_picture" />
                                                                <!--<button type="button" class="btn btngrnupld-p">Upload</button>-->
                                                            </div>
                                                            <?= ((isset($error) && isset($error['img22'])) ? $error['img22'] : "") ?>
                                                        </div>
                                                        <div class="row pprwo-p">
                                                            <label for="" class="control-label col-lg-5 col-md-5 col-sm-12">Final Selection</label>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <?=
                                                            form_dropdown('i_drop4', array(
                                                                "" => 'Select',
                                                                "Yes" => 'Yes',
                                                                "No" => 'No',
                                                                    ), (($ifos['finalselection'])?$ifos['finalselection']:set_value('i_drop4')), 'class="form-control" required')
                                                            ?>
                                                            </div>
                                                        </div>
                                                        <div class="row pprwo-p">
                                                            <div class="col-lg-6 col-md-6 col-sm-12"></div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <input type="submit" value="Submit" class="btn btn-success"/>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    
                            <?= form_close() ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="button-submit ppcentrp-pprof-p">
                            
                            <button type="button" class="btn btncanpri-p btn-outline-primary  mb-2">Cancel</button>
<?php echo $this->session->flashdata('success_msg'); ?>
<?php echo $this->session->flashdata('error_msg'); ?>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="col-md-3">
            <div class="mrbtmadvrt-p">
                <div class="ppfrstadvr-p">
                    <img src="<?php echo base_url('assets/images/login/a2.jpg'); ?>">
                </div>
                <div class="">
                    <img src="<?php echo base_url('assets/images/login/a3.jpg'); ?>">
                </div>
            </div>
        </div>
    </div>
</div>
<?php require 'templates/footer.php'; ?>
<script>

    $(document).ready(function () {
        $('select.upload').change(function () {
            if ($(this).val() > 0) {
                $('div.' + $(this).data('hide')).show();
                if(!$('div.' + $(this).data('hide')).parents('form').find('[name="id"]').val())
                    $('div.' + $(this).data('hide')).find('[type="file"]').attr('required', true);
                
            } else {
                $('div.' + $(this).data('hide')).hide();
                $('div.' + $(this).data('hide')).find('[type="file"]').attr('required', false);
            }
        });
    });

</script>