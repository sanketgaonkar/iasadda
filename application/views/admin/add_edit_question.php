<?php require 'common/admin_header.php'; ?>
<ol class="breadcrumb">
    <li class="breadcrumb-item active">Add GS Questions</li>
</ol>
<?= form_open('','enctype="multipart/form-data"') ?>
<input type="hidden" name="id" value="<?= ((isset($question['id'])) ? $question['id'] : "") ?>">
<div class="row">
    <div class="col-md-2">
        <label><strong>Q No.</strong></label>
        <input type="number" min="1" max="99" name="question_no" class="form-control" value="<?= ((isset($question['question_no'])) ? $question['question_no'] : "") ?>" placeholder="1">
        <input type="text" name="question_alpha" class="form-control" value="<?= ((isset($question['question_alpha'])) ? $question['question_alpha'] : "") ?>" placeholder="a">
    </div>
    <div class="col-md-2">
        <label><strong> Subject</strong></label>
        
        <?=form_dropdown('subject', array(
            "" => 'Select',
            "History" => 'History',
            "Geography" => 'Geography',
            "Anthropology" => 'Anthropology',
            ), ((isset($question['subject']))?$question['subject']:set_value('subject')), 'class="form-control" required')
        ?>
<!--        <select class="form-control" name="subject" required>
            <option value="">Select</option>
            <option value="History">History</option>
            <option value="Geography">Geography</option>
            <option value="Anthropology">Anthropology</option>
        </select>-->
    </div>
    <div class="col-md-2">
        <label><strong>Paper</strong></label>
        
        <?=form_dropdown('paper', array(
            "" => 'Select',
            "GS 1" => 'GS 1',
            "GS 2" => 'GS 2',
            "GS 3" => 'GS 3',
            "GS 4" => 'GS 4',
            ), ((isset($question['paper']))?$question['paper']:set_value('paper')), 'class="form-control" required')
        ?>
    </div>
    <div class="col-md-6">
        <label><strong>Question Text</strong></label>
        <textarea style="height: 100px;" class="form-control" name="Question" placeholder="Question" required><?= ((isset($question['Question'])) ? $question['Question'] : "") ?></textarea>
    </div>

    <div class="col-md-2">
        <label><strong>Order</strong></label>
        <?=form_dropdown('question_order', array(
            "" => 'Select',
            "1" => '1',
            "2" => '2',
            "3" => '3',
            "4" => '4',
            "5" => '5',
            "6" => '6',
            "7" => '7',
            "8" => '8',
            "9" => '9',
            "10" => '10',
            "11" => '11',
            "12" => '12',
            "13" => '13',
            "14" => '14',
            "15" => '15',
            "16" => '16',
            "17" => '17',
            "18" => '18',
            "19" => '19',
            "20" => '20',
            ), ((isset($question['question_order']))?$question['question_order']:set_value('question_order')), 'class="form-control" required')
        ?>
        
    </div>
    <div class="col-md-2">
        <label><strong>Date</strong></label>
        <input type="text" class="form-control date" value="<?= ((isset($question['Date'])) ? $question['Date'] : date('Y-m-d')) ?>" readonly>
    </div>
    <div class="col-md-3">
        <label><strong>Model Answer</strong></label>
        <input type="file" name="model_answer" class="form-control">
        <?=((isset($error) && !empty($error))?"<div class='alert alert-danger'>".$error."</div>":"")?>
    </div>
    <div class="col-md-5">
        <label><strong>Refer</strong></label>
        <input type="text" name="refer" class="form-control" value="<?= ((isset($question['refer'])) ? $question['refer'] : "") ?>" required>
    </div>
    <div class="col-md-3">
        <label><strong>Word Limit</strong></label>
        <?=form_dropdown('word_limit', array(
            "250" => '250',
            "150" => '150',
            "200" => '200',
            "300" => '300',
            "350" => '350',
            ), ((isset($question['word_limit']))?$question['word_limit']:set_value('word_limit')), 'class="form-control" required')
        ?>
    </div>
    <div class="col-md-3">
        <label><strong>Evaluation Charges</strong></label>
        <?=form_dropdown('evaluation_charges', array(
            "0" => '0',
            "25" => '25',
            "35" => '35',
            "45" => '45',
            "55" => '55',
            "65" => '65',
            ), ((isset($question['evaluation_charges']))?$question['evaluation_charges']:set_value('evaluation_charges')), 'class="form-control" required')
        ?>
    </div><br>

</div>  <br>
<div class="row">
    <div class="col-md-12">
        <input type="submit" class="btn btn-success">
        <?= anchor('admin/questions', '<input type="button" value="Cancel" class="btn btn-primary">') ?>
    </div>
</div>
<?= form_close() ?>
<?php require 'common/admin_footer.php'; ?>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.min.js"></script>
<script>
$(document).ready(function(){
    $('.date').datepicker({format: "yyyy-mm-dd"}); 
});
</script>