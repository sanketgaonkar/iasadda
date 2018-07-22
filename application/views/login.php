<?php require 'templates/header.php'; ?>
<?php require 'templates/google_modal.php'; ?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-9 lgh2css-p">
            <div class="advertise-p">
                <img src="<?php echo base_url(); ?>images/login/a1.jpg">
            </div>
            <div class="lgrelvt-p">
                <h2>Login</h2>
            </div>
            <div class="lognfrm-p">
                <form class="form-horizontal" method="post" action="<?php echo base_url("Main/login_validation"); ?>">
                    <div class="row pprwmrbtm-p">
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="username" placeholder="Mobile Number" value="9156745364">
                            <span class="text-danger"><?php echo form_error('username'); ?></span>

                        </div>
                    </div>
                    <div class="row pprwmrbtm-p">
                        <div class="col-md-12">
                            <input type="password" class="form-control" name="password" placeholder="Password" value="sanket">
                            <span class="text-danger"><?php echo form_error('password'); ?></span>
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-md-12 ppsubmt-p">
                            <button type="submit" class="btn btn-default">Login</button>
                            <?php
                            echo $this->session->flashdata('error');
                            ?>
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-md-6 ppleftplog-p">
                            <a href="" class="">Forget Password ?</a>
                        </div>
                        <div class="col-md-6 pprightplog-p">
                            <?= anchor('main/register', 'Register') ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-3">
            <div class="mrbtmadvrt-p">
                <div class="ppfrstadvr-p">
                    <img src="<?php echo base_url(); ?>images/login/a2.jpg">
                </div>
                <div class="">
                    <img src="<?php echo base_url(); ?>images/login/a3.jpg">
                </div>
            </div>
        </div>
    </div>
</div>

<?php require 'templates/footer.php'; ?>