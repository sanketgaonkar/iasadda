<?php require 'common/admin_header.php'; ?>
<ol class="breadcrumb">
    <li class="breadcrumb-item active">Aspirants Profile</li>
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
                <th width='100px'>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach($aspirants as $v){?>
            <tr>
            	<td><?=$i++?></td>
                <td><?=$v['firstname']?></td>
                <td><?=$v['lastname']?></td>
                <td><?=$v['phone']?></td>
                <td><?=$v['emailid']?></td>
                <td>
                    <?=anchor('admin/aspirant_view/'.$v['id'],'<i class="fa fa-eye btn btn-sm btn-info"></i>')?>
                    <?=anchor('admin/aspirant_add_edit/'.$v['id'],'<i class="fa fa-pencil btn btn-sm btn-primary"></i>')?>
                    <?=anchor('admin/aspirant_delete/'.$v['id'],'<i class="fa fa-trash btn btn-sm btn-danger"></i>')?>
                </td>
            </tr>
           <?php }?>
        </tbody>
    </table>
</div>

<?php require 'common/admin_footer.php'; ?>