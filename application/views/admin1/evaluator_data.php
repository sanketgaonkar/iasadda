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
           
            <tr>
            	<td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>6</td>
                <td><i class="fa fa-check-circle btn btn-sm btn-success"></i><i class="fa fa-times-circle btn btn-sm btn-danger"></i></td>
                <td><i class="fa fa-eye btn btn-sm btn-info"></i> <i class="fa fa-pencil btn btn-sm btn-primary"></i> <i class="fa fa-trash btn btn-sm btn-danger"></i></td>
            </tr>
        </tbody>
    </table>
</div>

<?php require 'common/admin_footer.php'; ?>