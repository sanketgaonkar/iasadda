<?php require 'admin/admin_header.php'; ?>
<ol class="breadcrumb">
        	<li>Evaluator's Info</li>
      	</ol>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Mobile No.</th>
                  <th>Email ID</th>
                  <th>Info</th>
                  <th>Nick Name</th>
                  <th>Password</th>
                  <th>User Category</th>
                  <th>Verification</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>3</td>
                  <td>9049406120</td>
                  <td>omkar.mahabadi@gmail.com</td>
                  <td>Hello</td>
                  <td>Omi</td>
                  <td>Test@123</td>
                  <td>
                    <select class="form-control">
                      <option>Select</option>
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                    </select>
                  </td>
                  <td>
                    <button class="btn btn-xs btn-success"><i class="fa fa-check-circle"></i></button>
                    <button class="btn btn-xs btn-danger"><i class="fa fa-times-circle"></i></button>
                  </td>
                </tr>
                
                
            </tbody>
        </table>

<?php require 'admin/admin_footer.php'; ?>