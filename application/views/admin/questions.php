<?php require 'common/admin_header.php'; ?>
<div class="container">
<div class="row">
    <?=anchor('admin/add_edit_question','<i class="fa fa-plus"></i>','class="btn btn-primary"')?>
</div>
<div class="row">
    <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Question No</th>
                <th>Subject</th>
                <th>Question Text</th>
                <th>Question Order</th>
                <th>Evaluation Charges</th>
                <th width='100px'>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($questions as $k => $v){ ?>
            <tr>
                <td><?=$v['question_no']?> <?=$v['question_alpha']?></td>
                <td><?=$v['subject']?></td>
                <td><?=$v['Question']?></td>
                <td><?=$v['question_order']?></td>
                <td><?=$v['evaluation_charges']?></td>
                <td>
                    <?=anchor('admin/view_question/'.$v['id'],'<i class="fa fa-eye"></i>','class="btn btn-sm btn-primary"')?>
                    <?=anchor('admin/add_edit_question/'.$v['id'],'<i class="fa fa-pencil"></i>','class="btn btn-sm btn-primary"')?>
                    <?=anchor('admin/delete_question/'.$v['id'],'<i class="fa fa-trash"></i>','class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure you want to delete?\')"')?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</div>
<?php require 'common/admin_footer.php'; ?>