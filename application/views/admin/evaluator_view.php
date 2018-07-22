<?php require 'common/admin_header.php'; ?>
<ol class="breadcrumb">
    <li class="breadcrumb-item active">Evaluators Information <?=anchor('admin/evaluator_add_edit/'.$evaluator['id'],'<i class="fa fa-pencil btn btn-sm btn-info"></i>')?></li>
</ol>
<div class="row">
	<div class="col-md-2">
		<label>Profile Pic</label>
                <img src="<?=$evaluator['picture_url']?>" width='100%'>
	</div>
	<div class="col-md-3">
		<label>First Name:</label>
		<?=$evaluator['first_name']?>
	</div>
	<div class="col-md-3">
		<label>Last Name:</label>
		<?=$evaluator['last_name']?>
	</div>
	<div class="col-md-4">
		<label>Info:</label>
		<?=$evaluator['myinfo']?>
	</div>
	<div class="col-md-3">
		<label>Nickname:</label>
		<?=$evaluator['nickname']?>
	</div>
	<div class="col-md-3">
		<label>Ph Number:</label>
		<?=$evaluator['mobile']?>
	</div>
	<div class="col-md-3">
		<label>Verified User:</label>
                <?=(($evaluator['active'])?'<i class="fa fa-check-circle btn btn-sm btn-success"></i>':'<i class="fa fa-times-circle btn btn-sm btn-danger"></i>')?>
	</div>
	<div class="col-md-3">
		<label>User Category:</label>
		<?=$evaluator['usercategory']?>
	</div>
	<div class="col-md-3">
		<label>User Rating:</label>
		Star
	</div>
	<div class="col-md-3">
		<label>Active since:</label>
		<?=date('d-m-Y', strtotime($evaluator['created']))?>
	</div>
	<div class="col-md-3">
		<label>Email:</label>
		<?=$evaluator['email']?>
	</div>
	<div class="col-md-3">
		<label>Optional:</label>
		-----
	</div>
</div>
<ol class="breadcrumb">
    <li class="breadcrumb-item active">Civil Exam</li>
</ol>
<div class="row">
	<div class="col-md-4"><label>Total Attempts:</label> <?=$evaluator['totalattempts']?></div>
	<div class="col-md-4"><label>Appeared in Mains:</label> <?=$evaluator['appearedinmains']?></div>
	<div class="col-md-4">
		<label>Latest DAF:</label>
                <?=(($evaluator['uploadlatestDAF'])?anchor('uploads/Evaluatorprofile/'.$evaluator['uploadlatestDAF'],'<i class="fa fa-file btn btn-sm btn-info"></i>','target="_new"'):'--')?>
	</div>
	<div class="col-md-4"><label>Appeared in Interview:</label> <?=$evaluator['appearedininterview']?></div>
	<div class="col-md-4">
		<label>Interview Admit Card:</label>
		<?=(($evaluator['interviewAdmitCard'])?anchor('uploads/Evaluatorprofile/'.$evaluator['interviewAdmitCard'],'<i class="fa fa-file btn btn-sm btn-info"></i>','target="_new"'):'--')?>
	</div>
	<div class="col-md-4"><label>Final Selection:</label> <?=$evaluator['finalselection']?></div>
</div>

<ol class="breadcrumb">
    <li class="breadcrumb-item active">IFos Exam</li>
</ol>
<div class="row">
	<div class="col-md-4"><label>Total Attempts:</label> <?=$evaluator['ta']?></div>
	<div class="col-md-4"><label>Appeared in Mains:</label> <?=$evaluator['am']?></div>
	<div class="col-md-4">
		<label>Latest DAF:</label>
		<?=(($evaluator['uldaf'])?anchor('uploads/EvaluatorIFosDAF/'.$evaluator['uldaf'],'<i class="fa fa-file btn btn-sm btn-info"></i>','target="_new"'):'--')?>
	</div>
	<div class="col-md-4"><label>Appeared in Interview:</label> <?=$evaluator['ai']?></div>
	<div class="col-md-4">
		<label>Interview Admit Card:</label>
		<?=(($evaluator['iac'])?anchor('uploads/EvaluatorIFosDAF/'.$evaluator['iac'],'<i class="fa fa-file btn btn-sm btn-info"></i>','target="_new"'):'--')?>
	</div>
	<div class="col-md-4"><label>Final Selection:</label> <?=$evaluator['fs']?></div>
</div>


<?php require 'common/admin_footer.php'; ?>