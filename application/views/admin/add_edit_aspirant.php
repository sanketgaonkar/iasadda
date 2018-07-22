<?php require 'common/admin_header.php'; ?>

<ol class="breadcrumb">
    <?=anchor('admin/Aspirants','<i class="fa fa-arrow-left btn btn-sm btn-success "></i>')?>
    <li class="breadcrumb-item active arrow">Edit Aspirant</li>
</ol>
<?= form_open('', 'enctype="multipart/form-data" id="assp_form"') ?>
<input type="hidden" name="id" value="<?= ((isset($aspirant['id'])) ? $aspirant['id'] : "") ?>">
<div class="row">
    <div class="col-md-3">
        <label>First Name</label>
        <input type="text" name="firstname" class="form-control" value="<?= ((isset($aspirant['firstname'])) ? $aspirant['firstname'] : set_value('firstname')) ?>">
    </div>
    <div class="col-md-3">
        <label>Last Name</label>
        <input type="text" name="lastname" class="form-control" value="<?= ((isset($aspirant['lastname'])) ? $aspirant['lastname'] : set_value('lastname')) ?>">
    </div>
    <div class="col-md-3">
        <label>Nickname:</label>
        <input type="text" name="nickname" class="form-control"value="<?= ((isset($aspirant['nickname'])) ? $aspirant['nickname'] : set_value('nickname')) ?>">
    </div>
    <div class="col-md-3">
        <label>Phone Number:</label>
        <input type="number" name="phone" class="form-control" value="<?= ((isset($aspirant['phone'])) ? $aspirant['phone'] : set_value('phone')) ?>">
    </div>
    <div class="col-md-3">
        <label>Email ID:</label>
        <input type="email" name="emailid" class="form-control" value="<?= ((isset($aspirant['emailid'])) ? $aspirant['emailid'] : set_value('emailid')) ?>">
    </div>
    <div class="col-md-3">
        <label>Password:</label>
        <input type="password" name="Password" id="pass" class="form-control">
    </div>
    <div class="col-md-3">
        <label>Confirm Password:</label>
        <input type="password" name="cPassword" id="cpass" class="form-control">
        <span id="cpass_error" style="color: red;"></span>
    </div>
    <div class="col-md-3">
        <label>Optional:</label>
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
    <div class="col-md-3">
        <label>Photo:</label>
        <input type="file" name="image" class="form-control">
        <?=((isset($error_img)?$error_img:""))?>
    </div><br>

</div><br>

<div class="row">
    <div class="col-md-12">
        <input type="submit" class="btn btn-success">
        <?= anchor('admin/Aspirants', '<input type="button" value="Cancel" class="btn btn-primary">') ?>
    </div>
</div>
<?= form_close() ?>
<style>
    .arrow{
        padding-left: 5px;
    }
</style>

<?php require 'common/admin_footer.php'; ?>
<script>
$(document).ready(function (){
    $('#assp_form').submit(function (){
        var pass = $('#pass').val();
        var cpass = $('#cpass').val();
        $('#cpass_error').html("");
        if(pass.length){
            if(pass !== cpass){
                $('#cpass_error').html("Password dosnt match");
                return false;
            }
        }
        
    });
});
</script>