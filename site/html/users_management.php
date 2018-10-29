<?php session_start(); ?>
<?php include 'security_check.php'; ?>
<?php include 'admin_check.php'; ?>
<!DOCTYPE html>
<html lang="en">
<?php include 'menu.php'; ?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Users management</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Username</th>
                      <th>isActive</th>
                      <th>Role</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $file_db = new PDO('sqlite:/usr/share/nginx/databases/database.sqlite');
                        // Set errormode to exceptions
                        $file_db->setAttribute(PDO::ATTR_ERRMODE, 
                            PDO::ERRMODE_EXCEPTION);
                        $sql = "SELECT * FROM user";
                        $result =  $file_db->query($sql);
 
                      foreach($result as $row) {

                      	if($row['isActive'] == 0) {
                      		$isActive = 'Not active';
                      	} else {
                      		$isActive = 'Active';
                      	}

                      	if($row['role'] == 0) {
                      		$role = 'Collaborater';
                      	} else {
                      		$role = 'Administrator';
                      	}

                        ?>
                        <tr>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $isActive ?></td>
						<td><?php echo $role ?></td>
                        <td><a href="edit_user.php?id=<?php echo $row['id']; ?>">Edit</a></td>
                        <td><a href="delete_user.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                        </tr>
                        <?php
                        }
                        ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © STI Mailbox 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>

  </body>

</html>
