<?php require 'common/admin_header.php'; ?>
<ol class="breadcrumb">
    <li class="breadcrumb-item active">Evaluators Profile</li>
</ol>

<div class="row">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Sr.No.</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Ph Number</th>
                <th>Email ID</th>
                <th>Status</th>
                <th width='100px'>Action</th>
            </tr>
        </thead>
        <tbody>
           <?php $i=1; foreach($evaluators as $v){?>
            <tr>
            	<td><?=$i++?></td>
                <td><?=$v['first_name']?></td>
                <td><?=$v['last_name']?></td>
                <td><?=$v['mobile']?></td>
                <td><?=$v['email']?></td>
                <td><?=(($v['active'])?'<i class="fa fa-check-circle btn btn-sm btn-success"></i>':'<i class="fa fa-times-circle btn btn-sm btn-danger"></i>')?></td>
                <td>
                    <?=anchor('admin/evaluator_view/'.$v['id'],'<i class="fa fa-eye btn btn-sm btn-info"></i>')?>
                    <?=anchor('admin/evaluator_add_edit/'.$v['id'],'<i class="fa fa-pencil btn btn-sm btn-primary"></i>')?>
                    <?=anchor('admin/evaluator_delete/'.$v['id'],'<i class="fa fa-trash btn btn-sm btn-danger"></i>')?>
                </td>
            </tr>
           <?php }?>
        </tbody>
    </table>
</div>

<?php require 'common/admin_footer.php'; ?>