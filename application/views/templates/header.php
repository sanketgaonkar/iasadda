<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Get Review</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/font-awesome.min.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
        <!-- font family -->
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Special+Elite" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montez" rel="stylesheet">
        <!-- font family end-->
    </head>
    <body>
        <!-- top section -->
        <div class="header-top">
            <div class="hmiconhome-p1">
                <?= anchor('/', '<i class="fa fa-home" aria-hidden="true"></i>') ?>
            </div>
            <div class="container-fluid ppfluidwid-p">
                <div class="row">
                    <div class="col-md-4">
                        <div class="menulog-p">
                            <a href="javascript:void(0)" class="" onclick="openNavleft()">
                                <img id="toggle" class="" src="<?= base_url('assets/images/logo/list-menu.png') ?>" alt="">
                            </a>
                            <a href=""><i class="fa fa-search"></i></a>
                            <div class="usrtxt-p">
                                <p>
                                    <?php if ($this->session->userdata('user_display_name') !== null) {?>
                                        Hi. <?=$this->session->userdata('user_display_name')?> <a href="javascript:void(0);"><img src="<?= base_url('assets/images/login/logodwn.png') ?>"></a>
                                    <?php }?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="imglog-p">
                             <?= anchor('profilee/', '<img  src="'.base_url('assets/images/logo/a1.png').'    ">') ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="lknkslogreg-p">
                            <?php if ($this->session->userdata('userData') == null) {
                                if ($this->session->userdata('username') == null) {
                                    ?>
                                    <?= anchor('main/register', 'Register') ?>
                                    <?= anchor('main/Login', 'Login') ?>
                                <?php } else { ?>
                                    <?= anchor('main/logout', 'Logout') ?>
    <?php }
} ?>
                        </div>
                        <div class="btngrnp-p">
                            <?php if ($this->session->userdata('username') == null) {
                                if ($this->session->userdata('userData') !== null) {
                                    ?>
                                    <?= anchor('profilee/logout_google', '<button type="button" class="btn btn-link" >Logout</button>') ?>
    <?php } else { ?>
                                    <button type="button" class="btn" data-toggle="modal" data-target="#loginpop-p">I am an Evaluator</button>
    <?php }
} ?>
                        </div>
                    </div>
                </div>


                <!--  left menu overlay  -->
                <div id="mySidenavleft" class="sidenavleft">
                    <div class="seclogolog-p">

                        <a href="index.html"> <img  src="<?= base_url('assets/images/logo/a3.png') ?>"> </a>
                    </div>
                    <div class="seclogolog-p1">
                        <a href="index.html"> <img  src="<?= base_url('assets/images/logo/a2.png') ?>"> </a>
                    </div>
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNavleft()">&times;</a>
                    <ul class="pptpmargn-p">
                        <li><a href="subject.html">Art &amp; Culture</a></li>
                        <li><a href="subject.html">Current Affairs</a></li>
                        <li><a href="subject.html">Economics</a></li>
                        <li><a href="subject.html">Ecology</a></li>
                        <li><a href="subject.html">Geography</a></li>
                        <li><a href="subject.html">Polity</a></li>
                        <li><a href="subject.html">Science</a></li>
                        <li><a href="subject.html">Ancient  History</a></li>
                        <li><a href="subject.html">Medieval History</a></li>
                        <li><a href="subject.html">Modern History</a></li>
                        <li><a href="subject.html">Social Issues</a></li>
                        <li><a href="subject.html">International Relations</a></li>
                        <li><a href="subject.html">Quantitative Aptitude</a></li>
                        <li><a href="subject.html">Reasoning</a></li>
                        <li><a href="subject.html">Comprehension</a></li>
                        <li><a href="javascript:void(0)" onclick="openNavright()">Optional</a>
                    </ul>
                    <div class="social-linkmenu-p">
                        <ul>
                            <li><a href="#"><img src="<?= base_url('assets/images/svg/facebook-letter-logo.svg') ?>" alt=""></a></li>
                            <li><a href="#"><img src="<?= base_url('assets/images/svg/ftwitter-logo-silhouette.svg') ?>" alt=""></a></li>
                            <li><a href="#"><img src="<?= base_url('assets/images/svg/youtube-logo.svg') ?>" alt=""></a></li>
                            <li><a href="#"><img src="<?= base_url('assets/images/svg/telegram.svg') ?>" alt=""></a></li>
                        </ul>
                    </div>
                </div>
                <!--  left menu overlay  -->

                <!-- right menu overlay  -->
                <div id="mySidenavright" class="sidenavright">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNavright()">&times;</a>
                    <ul class="col-md-4">
                        <li><a href="subject.html">Agriculture</a></li>
                        <li><a href="subject.html">Animal Hus & Vet. Sc.</a></li>
                        <li><a href="subject.html">Agricultural Engineering</a></li>
                        <li><a href="subject.html">Anthropology</a></li>
                        <li><a href="subject.html">Botany</a></li>
                        <li><a href="subject.html">Chemistry</a></li>
                        <li><a href="subject.html">Chemical Engineering</a></li>
                        <li><a href="subject.html">Civil Engineering</a></li>
                        <li><a href="subject.html">Commerce & Accountancy</a></li>
                    </ul>
                    <ul class="col-md-4">
                        <li><a href="subject.html">Economics</a></li>
                        <li><a href="subject.html">Electrical Engineering</a></li>
                        <li><a href="subject.html">Forestry</a></li>
                        <li><a href="subject.html">Geography</a></li>
                        <li><a href="subject.html">Geology</a></li>
                        <li><a href="subject.html">History</a></li> 
                        <li><a href="subject.html">Law</a></li>
                        <li><a href="subject.html">Management</a></li>
                        <li><a href="subject.html">Mathematics</a></li>
                    </ul>
                    <ul class="col-md-4">
                        <li><a href="subject.html">Mechanical Engineering</a></li>
                        <li><a href="subject.html">Medical Science</a></li>                                 
                        <li><a href="subject.html">Public Administration</a></li>
                        <li><a href="subject.html">Philosophy</a></li>
                        <li><a href="subject.html">Physics</a></li>
                        <li><a href="subject.html">Political Science & IR</a></li>
                        <li><a href="subject.html">Psychology</a></li>
                        <li><a href="subject.html">Sociology</a></li>
                        <li><a href="subject.html">Statistics</a></li>
                        <li><a href="subject.html">Zoology</a></li>
                    </ul>
                </div>
                <!-- right menu overlay -->
            </div>
        </div><!-- top section end-->

