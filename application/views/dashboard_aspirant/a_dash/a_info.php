<div class="hmicondashbrd-p">
    
    <?=anchor('profilee/','<i class="fa fa-home" aria-hidden="true"></i>')?>
</div>

<div class="dashbrdlogut-p-o">
        
        <?=anchor('main/profile/','<i class="fa fa-user" aria-hidden="true"></i>')?>
        
</div>
<div class="dashbrdlogut-p">
        
        
        <?=anchor('main/logout','Logout')?>
</div>
<div class="container-fluid">
<div class="row">
<div class="col-md-2">
<div class="leftmenusid-p">
<div class="usrimg-p">
<a href="">
    <img src="<?=base_url("uploads/Aspirantprofile/".$this->session->userdata('aspirant_data')->imagename)?>" width="80%">
</a>
<p><?=((trim($this->session->userdata('aspirant_data')->nickname))?$this->session->userdata('aspirant_data')->nickname:$this->session->userdata('aspirant_data')->firstname)?></p>
<hr/>
</div>
<div class="ppmenudash-p">
	<div class="centrdash-p">
	  <a href="" class="btn btnpurch-p">Purchase Plan</a>
    </div>
		<h3>Active Plan</h3>
		<p><span>Freebies : Save Money !</span></p>
		<p><span>Balance Amount : <i class="fa fa-rupee"></i> 99999</span></p>
		<p><span>Expiry : 31/08/2018</span></p>
		<h3>Performance</h3>
		<p><span>GS Answers : <i class="fa fa-rupee"></i> 99999</span></p>
		<p><span>Optional Answers : <i class="fa fa-rupee"></i> 99999</span></p>
		<p><span>Essay : <i class="fa fa-rupee"></i> 999</span></p>
		<p><span>For Year : 2018</span></p>
</div>
</div>
</div>