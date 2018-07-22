<?php if($this->session->userdata('evaluator_id') !== null){ ?>

<!-- menu -->
<div class="menumid-p">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar-pp">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
    </div>
    <div class="collapse navbar-collapse mnenavbr-p" id="myNavbar-pp">
      <ul class="nav navbar-nav">
        <li><a href="#">My Q & A</a></li>
        <li><?=anchor('Evaluator_dashboard/','Dashboard')?></li>
        <li><?=anchor('Main/profile','My Profile')?></li> 
        <li><a href="#">Payment</a></li> 
        <li><a href="#">Plans</a></li> 
     <!--  <li><?=anchor('profileA/profile','Sanket','class=""')?></li>-->
      </ul>
    </div>
  </div>
</nav>
</div>
<!-- menu end -->

<?php }else if($this->session->userdata('aspirant_id') !== null){ ?>
<!-- menu -->
<div class="menumid-p">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar-pp">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
    </div>
    <div class="collapse navbar-collapse mnenavbr-p" id="myNavbar-pp">
      <ul class="nav navbar-nav">
        <li><a href="my_q_a.html">My Q & A</a></li>
        <li><?=anchor('Aspirant_dashboard/','Dashboard')?></li>
        <li><?=anchor('Profilee/','My Profile')?></li> 
        <li><a href="#">Payment</a></li> 
        <li><a href="#">Plans</a></li> 
     <!--  <li><?=anchor('profileA/profile','Sanket','class=""')?></li>-->
      </ul>
    </div>
  </div>
</nav>
</div>
<!-- menu end -->
<?php }else{ ?>


<?php } ?>
