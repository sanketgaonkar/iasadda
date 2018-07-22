<?php require 'common/admin_header.php'; ?>
<ol class="breadcrumb">
    <li class="breadcrumb-item active">Questions Details</li>
</ol>

<div class="row">
	<div class="col-md-4">
		<label>Question No:</label>
		Q.<?=$question['question_no']?> <?=$question['question_alpha']?>
	</div>
	<div class="col-md-4">
		<label>Subject:</label>
		<?=$question['subject']?>
	</div>
	<div class="col-md-4">
		<label>Paper:</label>
		<?=$question['paper']?>
	</div>
	<div class="col-md-12">
		<label>Question Text:</label>
		<?=$question['Question']?>
	</div>
	<div class="col-md-4">
		<label>Order:</label>
		<?=$question['question_order']?>
	</div>
	<div class="col-md-4">
		<label>Date:</label>
		<?=date('d-m-Y', strtotime($question['Date']))?>
	</div>
	<div class="col-md-4">
		<label>Word Limit:</label>
		<?=$question['word_limit']?>
	</div>
	<div class="col-md-4">
		<label>Refer:</label>
		<?=$question['refer']?>
	</div>
	<div class="col-md-4">
		<label>Model Answer:</label>
		<?=anchor('uploads/question_model_ans/'.$question['model_answer'],'<i class="fa fa-file btn btn-danger"></i>','target="_new"')?>
	</div>
	<div class="col-md-4">
		<label>Evaluation Charges:</label>
		<?=$question['evaluation_charges']?>
	</div>
</div>

<?php require 'common/admin_footer.php'; ?>