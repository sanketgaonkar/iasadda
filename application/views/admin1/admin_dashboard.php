
<?php require 'common/admin_header.php'; ?>

		<ol class="breadcrumb">
        	<li>Hello, Omkar</li>
      	</ol>
      <!-- Icon Cards-->
      

      <form>
      	<div class="row">
      		<div class="col-md-6">
      			<textarea class="form-control">Question</textarea>
		      	
      		</div>
      		<div class="col-md-6">
      			<a class="btn btn-success" href="#" id="">Add</a>
		      	<a class="btn btn-primary" href="#" id="">Update</a>
		      	<a class="btn btn-danger" href="#" id="">Delete</a>
      		</div>
      	</div>
      </form><br>
      <div class="row">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Sr. No</th>
                  <th>Question</th>
                  
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam pretium ligula elementum risus varius, nec pharetraLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam pretium ligula elementum risus varius, nec pharetra</td>
                </tr>
            </tbody>
        </table>
    </div>





      <!-- Area Chart Example-->
      <?php require 'common/admin_footer.php'; ?>