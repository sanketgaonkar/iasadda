<?php require 'templates/header.php'; ?>
<?php require 'templates/google_modal.php'; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-9 lgh2css-p">
            <div class="advertise-p">
                <img src="<?php echo base_url(); ?>images/login/a1.jpg">
            </div>
            <div class="proflp-p">
                <h2>Hi, <?php echo $firstname; ?> – The Aspirant ... !  <?=anchor('Aspirant_dashboard','<i class="fa fa-2x fa-dashboard" aria-hidden="true"></i>')?></h2>
            </div>
            <div class="profilefrm-p">
                <div class="proedit-p">
                    <a href="javascript:void(0);" class="edtpjs-p">Edit</a>
                </div>
                <h2>My Profile</h2>
                <?= form_open('main/profile', 'class="form-horizontal" enctype="multipart/form-data" method="post"') ?>
                <div class="row pprwmrbtm-p">
                    <div class="col-md-6">
                        <input type="hidden" name="id" value="<?php echo $ID; ?>">
                        <label class="control-label ppboltxt-p col-md-5">First Name </label>
                        <label class="control-label col-md-5" name="name"><?php echo $firstname; ?></label>
                    </div>
                    <div class="col-md-6">
                        <label class="control-label ppboltxt-p col-md-5">Last Name </label>
                        <label class="control-label  col-md-5" name="lastname"><?php echo $lastname ?></label>
                    </div>
                </div>

                <div class="row pprwmrbtm-p">
                    <div class="col-md-6">
                        <label class="control-label ppboltxt-p col-md-5">Nickname </label>
                        <label class="control-label onclckdspnone-p col-md-5" name="shortname"><?php echo $shortname ?></label>
                        <div class="text-danger"><?php echo form_error('shortname1'); ?></div>
                        <div class="onclickopen-p col-md-7">
                            <input type="text" class="form-control" name="shortname1" value="<?php echo $shortname ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="control-label ppboltxt-p col-sm-5">Password  </label>
                        <label class="control-label onclckdspnone-p col-sm-5" name="Password">******</label>
                        <div class="onclickopen-p col-md-7">
                            <input type="text" class="form-control" name="Password1" value="<?php echo $password ?>">
                            <span class="text-danger"><?php echo form_error('Password1'); ?></span>
                        </div>
                    </div>
                </div>
                <div class="row pprwmrbtm-p">
                    <div class="col-md-6">
                        <label class="control-label ppboltxt-p col-md-5">Phone No </label>
                        <label class="control-label col-md-5" name="number"><?php echo $phone ?></label>
                    </div>
                    <div class="col-md-6">
                        <label class="control-label ppboltxt-p col-sm-5">Active since </label>
                        <label class="control-label col-sm-5" name="activesince"><?=date('d-m-Y', strtotime($activesince))?></label>
                    </div>
                </div>
                <div class="row pprwmrbtm-p ppedtsel-p">
                    <div class="col-md-6">
                        <label class="control-label  ppboltxt-p col-md-5">E-Mail</label>
                        <label class="control-label onclckdspnone-p col-sm-5" name="email"><?php echo $emailid ?></label>
                        <div class="text-danger"><?php echo form_error('email1'); ?></div>
                        <div class="onclickopen-p col-md-7">
                            <input type="email" class="form-control" name="email1" value="<?php echo $emailid ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="control-label ppboltxt-p col-md-7">Optional--<?php echo $optional ?></label>
                        <div class="text-danger"><?php echo form_error('option'); ?></div>
                        <div class="onclickopen-p col-md-5">
                            <select class="form-control" name="optional">
                                <option selected value='0'>Optional</option>
<option value='Anthropology'>Anthropology</option>
<option value='Geography'>Geography</option>
<option value='History'>Geography</option>
<option value='Public Administration'>Public Administration</option>
<option value='Political Science & IR'>Political Science & IR</option>
<option value='Philosophy'>Philosophy</option>
<option value='Sociology'>Sociology</option>
<option value='Psychology'>Psychology</option>
<option value='Agriculture'>Agriculture</option>
<option value='Animal Hus & Vet. Sc.'>Animal Hus & Vet. Sc.</option>
<option value='Agricultural Engineering'>Agricultural Engineering</option>
<option value='Botany'>Botany</option>
<option value='Chemistry'>Chemistry</option>
<option value='Chemical Engineering'>Chemical Engineering</option>
<option value='Civil Engineering'>Civil Engineering</option>
<option value='Commerce & Accountancy'>Commerce & Accountancy</option>
<option value='Economics'>Economics</option>
<option value='Electrical Engineering'>Electrical Engineering</option>
<option value='Forestry'>Forestry</option>
<option value='Geology'>Geology</option>
<option value='Law'>Law</option>
<option value='Management'>Management</option>
<option value='Mathematics'>Mathematics</option>
<option value='Mechanical Engineering'>Mechanical Engineering</option>
<option value='Medical Science'>Medical Science</option>
<option value='Physics'>Physics</option>
<option value='Statistics'>Statistics</option>
<option value='Zoology'>Zoology</option>

                            </select>
                        </div>  
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="brdr-p">
                            <div class="">
                                <label class="control-label ppboltxt-p1 col-md-12">My Photo  </label>
                            </div>
                            <div class="upload-image">
                                <input type="hidden" name="imagename" value="<?php echo $imagename ?>">
                                <?php
                                if ($imagename != '') {
                                    echo '<img style="height:200px;with200px;" src="' . base_url() . 'uploads/Aspirantprofile/' . $imagename . '">';
                                } else
                                    echo'<img src="' . base_url() . 'images/profile/p1.jpg." alt="">';
                                ?>

                                <!-- <button type="button" class="btn upld-p btn-primary mr-3 onclickopen-p custom-btn">Upload</button> -->
                                <input class="btn upld-p btn-primary mr-3 onclickopen-p custom-btn" type="file" name="picture" />  
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="button-submit ppcentrp-pprof-p">
                            <button type="submit" value="Submit" class="btn pppprofbtn-p btn-primary mr-3 mb-2">Save</button>
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
                    <img src="<?php echo base_url(); ?>assets/images/login/a2.jpg">
                </div>
                <div class="">
                    <img src="<?php echo base_url(); ?>assets/images/login/a3.jpg">
                </div>
            </div>
        </div>
    </div>
</div>

<?php require 'templates/footer.php'; ?>
<script>
$(document).ready(function(){
    <?php
    if(validation_errors())
        echo "$('.edtpjs-p').click();";
    ?>
});
</script>