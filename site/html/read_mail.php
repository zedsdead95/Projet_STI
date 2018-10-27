<?php session_start(); ?>

<?php
if (isset($_GET['id']) ) {

	$file_db = new PDO('sqlite:/usr/share/nginx/databases/database.sqlite');
    // Set errormode to exceptions
    $file_db->setAttribute(PDO::ATTR_ERRMODE, 
                            PDO::ERRMODE_EXCEPTION);

    $req = $file_db->prepare('
        SELECT *
        FROM mail
        WHERE id = :id AND destination = :username
    ');

    $req->execute( array(
        'id' => $_GET['id'],
        'username' => $_SESSION['username']

    ));

    $data = $req->fetch();
}
?>
<!DOCTYPE html>
<html lang="en">

  <?php include 'menu.php'; ?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Message</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Received date : <?php echo date("d M Y - G:i", $data['received_date']); ?> </th>
                    </tr>
                    <tr>
                      <th>From : <?php echo $data['source'];?> </th>
                    </tr>
                   	<tr>
                      <th>Subject: <?php echo $data['subject']; ?></th>
                    </tr>
                    <tr>
                      <th>Message : <br><?php echo $data['body']; ?> </th>
                    </tr>
                    <tr>
						<th>
							<a href="new_mail.php?id=<?php echo $_GET['id']; ?>">Answer </a>
                        	<a href="delete_mail.php?id=<?php echo $_GET['id']; ?>">Delete</a>
                        </th>
                    </tr>
                  </thead>
                  <tbody>
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
