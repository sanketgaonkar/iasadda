<?php require 'common/admin_header.php'; ?>
<div class="row">
    <?=anchor('admin/add_edit_question','<i class="fa fa-plus"></i>','class="btn btn-primary"')?>
</div>
<div class="row">
    <table class="table table-bordered table-responsive" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Question No</th>
                <th>Subject</th>
                <th>Paper</th>
                <th>Question Text</th>
                <th>Question Order</th>
                <th>Date</th>
                <th>Model Answer</th>
                <th>Refer</th>
                <th>Word Limit</th>
                <th>Evaluation Charges</th>
                <th width='100px'>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($questions as $k => $v){ ?>
            <tr>
                <td><?=$v['question_no']?></td>
                <td><?=$v['subject']?></td>
                <td><?=$v['paper']?></td>
                <td><?=$v['Question']?></td>
                <td><?=$v['question_order']?></td>
                <td><?=date('d-m-Y', strtotime($v['Date']))?></td>
                <td><?=$v['model_answer']?></td>
                <td><?=$v['refer']?></td>
                <td><?=$v['word_limit']?></td>
                <td><?=$v['evaluation_charges']?></td>
                <td>
                    <?=anchor('admin/add_edit_question/'.$v['id'],'<i class="fa fa-pencil"></i>','class="btn btn-primary"')?>
                    <?=anchor('admin/delete_question/'.$v['id'],'<i class="fa fa-trash"></i>','class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete?\')"')?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php require 'common/admin_footer.php'; ?>