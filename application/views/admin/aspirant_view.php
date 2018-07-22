<?php require 'common/admin_header.php'; ?>

<ol class="breadcrumb">
    <?=anchor('admin/Aspirants','<i class="fa fa-arrow-left btn btn-sm btn-success "></i>')?>
    <li class="breadcrumb-item active arrow">Aspirant Details</li>
</ol>

<div class="row">
	<div class="col-md-3">
		<label>Profile Pic</label>
                <img src="<?=base_url('uploads/Aspirantprofile/'.$aspirant['imagename'])?>" width="100%"/>
	</div>
	<div class="col-md-3">
		<label>First Name:</label>
                <?=$aspirant['firstname']?>
	</div>
	<div class="col-md-3">
		<label>Last Name:</label>
                <?=$aspirant['lastname']?>
	</div>
	<div class="col-md-3">
		<label>Nickname:</label>
                <?=$aspirant['nickname']?>
	</div>
	<div class="col-md-3">
		<label>Active Since:</label>
                <?=date('d-m-Y', strtotime($aspirant['created']))?>
	</div>
	<div class="col-md-3">
		<label>Phone Number:</label>
                <?=$aspirant['phone']?>
	</div>
	<div class="col-md-3">
		<label>Email ID:</label>
                <?=$aspirant['emailid']?>
	</div>
	<div class="col-md-3">
		<label>Optional:</label>
                <?=$aspirant['optional']?>
	</div>
</div>
<style>
	.arrow{
		padding-left: 5px;
	}
</style>

<?php require 'common/admin_footer.php'; ?>