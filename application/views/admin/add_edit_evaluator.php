<?php require 'common/admin_header.php'; ?>
<ol class="breadcrumb">
    <li class="breadcrumb-item active">Evaluator Active/Deactive</li>
</ol>

<?= form_open('','enctype="multipart/form-data"') ?>
<input type="hidden" name="id" value="<?= ((isset($evaluator['id'])) ? $evaluator['id'] : "") ?>">

<div class="row">
	<div class="col-md-2">
		<label><strong>First Name</strong></label>
        <input type="text" name="first_name" class="form-control" value="<?= ((isset($evaluator['first_name'])) ? $evaluator['first_name'] : set_value('first_name')) ?>" placeholder="First Name">
	</div>
	<div class="col-md-2">
		<label><strong>Last Name</strong></label>
        <input type="text" name="last_name" class="form-control" value="<?= ((isset($evaluator['last_name'])) ? $evaluator['last_name'] : set_value('last_name')) ?>" placeholder="Last Name">
	</div>
	<div class="col-md-4">
		<label><strong>My Info</strong></label>
        <textarea style="height: 80px;" class="form-control" name="myinfo" placeholder="Info" required><?= ((isset($evaluator['myinfo'])) ? $evaluator['myinfo'] : set_value('myinfo')) ?></textarea>
	</div>
	<div class="col-md-2">
		<label><strong>Nick Name</strong></label>
        <input type="text" name="nickname" class="form-control" value="<?= ((isset($evaluator['nickname'])) ? $evaluator['nickname'] : set_value('nickname')) ?>" placeholder="Nick Name">
	</div>
	<div class="col-md-2">
		<label><strong>Phone Number</strong></label>
        <input type="number" name="mobile" class="form-control" value="<?= ((isset($evaluator['mobile'])) ? $evaluator['mobile'] : set_value('mobile')) ?>" placeholder="Mobile Number">
	</div>
	<div class="col-md-2">
        <label><strong>User Category</strong></label>
            
      <?=form_dropdown('usercategory', array(
            "" => 'Select',
            "New" => 'New',
            "Bronze" => 'Bronze',
            "Silver" => 'Silver',
            "Gold" => 'Gold',
            ), (($evaluator['usercategory'])?$evaluator['usercategory']:set_value('usercategory')), 'class="form-control" required')
        ?> 
    </div>
    <div class="col-md-3">
		<label><strong>Email</strong></label>
        <input type="email" name="email" class="form-control" value="<?= ((isset($evaluator['email'])) ? $evaluator['email'] : set_value('email')) ?>" placeholder="Email">
	</div>
	<div class="col-md-4">
		<label><strong>Verify User</strong></label><br>
                <input type="radio" name="active" value="1" class="" <?= ((isset($evaluator['active']) && $evaluator['active'] == 1) ? "checked" : "") ?>> Active
                <input type="radio" name="active" value="0" class="" <?= ((isset($evaluator['active']) && $evaluator['active'] == 0) ? "checked" : "") ?>> DeActive
	</div>
</div>

<div class="row">
    <div class="col-md-12">
        <input type="submit" class="btn btn-success">
        <?= anchor('admin/Evaluators', '<input type="button" value="Cancel" class="btn btn-primary">') ?>
    </div>
</div>
<?= form_close() ?>

<?php require 'common/admin_footer.php'; ?>