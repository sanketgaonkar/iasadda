<?php require 'templates/header.php'; ?>

<div class="container-fluid">
    <div class="row">

        <div class="col-md-9 lgh2css-p">
            <div class="advertise-p"><img src="<?= base_url('assets/images/login/a1.jpg') ?>"></div>
            <div class="rgrelvt-p"><h2>Register</h2></div>
            <div class="regstrfrm-p">
                <div class="row pprwmrbtm-p">
                    <?= ((isset($success)) ? '<div class="alert alert-success">Registration Successfully <span style="pull-right">'.anchor('main/login','Login Here').'</span></div>' : '') ?>
                    <?= ((isset($fail)) ? '<div class="alert alert-success">Error Registring User</div>' : '') ?>
                </div>
                <?=form_open('main/register','class="form-horizontal"')?>
                    <div class="row pprwmrbtm-p">
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="fname" value="<?= set_value('fname')?>" placeholder="First Name" required>
                            <?=form_error('fname')?>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="lname" value="<?= set_value('lname')?>" placeholder="Last Name" required>
                            <?=form_error('lname')?>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="mobile" value="<?= set_value('mobile')?>" placeholder="Mobile Number" required>
                            <?=form_error('mobile')?>
                        </div>
                        <div class="col-md-12">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                            <?=form_error('password')?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p>OTP will be sent to your mobile number for validation</p>
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-md-12 ppsubmt-p">
                            <button type="submit" class="btn btn-default">Send</button>
                        </div>
                    </div>
                    <hr/>
                    <div class="row pptmrgtp-p"> 
                        <div class="col-md-7">
                            <input type="text" class="form-control" placeholder="Enter OTP">
                        </div>
                        <div class=" col-md-5 ppsgnup-p">
                            <a href="#registrpop-p" class="" data-toggle="modal" data-target="">Sign Up</a>
                        </div>
                    </div>
                <?=form_close()?>
            </div>
        </div>

        <div class="col-md-3">
            <div class="mrbtmadvrt-p">
                <div class="ppfrstadvr-p">
                    <img src="<?= base_url('assets/images/login/a2.jpg')?>">
                </div>
                <div class="">
                    <img src="<?= base_url('assets/images/login/a3.jpg')?>">
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Modal register -->
<div class="modal fade regsmodlfrm-p" id="registrpop-p" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Validation Done <i class="fa fa-check-circle" aria-hidden="true"></i></h4>
            </div>
            <div class="modal-body">
                <div class="row pprwmrbtm-p">
                    <div class="col-md-12">
                        <label class="control-label">Set Your Password</label>
                        <div class="">
                            <input type="text" class="form-control" placeholder="Enter Password">
                        </div>
                    </div>
                </div>
                <div class="row pprwmrbtm-p">
                    <div class="col-md-12">
                        <div class="">
                            <input type="text" class="form-control" placeholder="Re-Enter Password">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="ppsubmregstr-p">
                            <a href="" data-dismiss="modal" data-toggle="modal">Submit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- register end -->
<?php require 'templates/footer.php'; ?>




