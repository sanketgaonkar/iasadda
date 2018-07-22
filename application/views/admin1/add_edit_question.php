<?php require 'common/admin_header.php'; ?>
<ol class="breadcrumb">
    <li class="breadcrumb-item active">Add GS Questions</li>
</ol>
<?= form_open('','enctype="multipart/form-data"') ?>
<input type="hidden" name="id" value="<?= ((isset($question['id'])) ? $question['id'] : "") ?>">
<div class="row">
    <div class="col-md-2">
        <label><strong>Question No.</strong></label>
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
            ), (($question['subject'])?$question['subject']:set_value('subject')), 'class="form-control" required')
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
            ), (($question['paper'])?$question['paper']:set_value('paper')), 'class="form-control" required')
        ?>
        
<!--        <select class="form-control" name="paper" required>
            <option value="">Select</option>
            <option value="GS 1">GS 1</option>
            <option value="GS 2">GS 2</option>
            <option value="GS 3">GS 3</option>
            <option value="GS 4">GS 4</option>
        </select>-->
    </div>
    <div class="col-md-6">
        <label><strong>Question Text</strong></label>
        <textarea style="height: 100px;" class="form-control" name="Question" placeholder="Question" required><?= ((isset($question['Question'])) ? $question['Question'] : "") ?></textarea>
    </div>
    <div class="col-md-2">
        <label><strong>Order</strong></label>
        <select class="form-control" name="question_order" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>10</option>
            <option>11</option>
            <option>12</option>
            <option>13</option>
            <option>14</option>
            <option>15</option>
            <option>16</option>
            <option>17</option>
            <option>18</option>
            <option>19</option>
            <option>20</option>
        </select>
    </div>
    <div class="col-md-2">
        <label><strong>Date</strong></label>
        <input type="text" class="form-control" value="<?= ((isset($question['Date'])) ? $question['Date'] : date('d-m-Y')) ?>" disabled>
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
        <select class="form-control" name="word_limit" required>
            <option value="250">250</option>
            <option value="150">150</option>
            <option value="200">200</option>
            <option value="300">300</option>
            <option value="350">350</option>
        </select>
    </div>
    <div class="col-md-3">
        <label><strong>Evaluation Charges</strong></label>
        <select class="form-control" name="evaluation_charges" required>
            <option value="0">0</option>
            <option value="25">25</option>
            <option value="35">35</option>
            <option value="45">45</option>
            <option value="55">55</option>
            <option value="65">65</option>
        </select>
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