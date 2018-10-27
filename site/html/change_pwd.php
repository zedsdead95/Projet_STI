<?php session_start(); 

if (!empty($_POST)){

  $file_db = new PDO('sqlite:/usr/share/nginx/databases/database.sqlite');
  // Set errormode to exceptions
  $file_db->setAttribute(PDO::ATTR_ERRMODE, 
      PDO::ERRMODE_EXCEPTION);

  $req = $file_db->prepare('
       UPDATE user 
       SET password = :new_pwd
       WHERE username = :username
   ');
   
  $req->execute(array(
      'new_pwd' => $_POST['new_pwd'],
      'username' => $_SESSION['username']
  ));

  $_SESSION['password'] = $_POST['new_pwd'];
  }

?>
<!DOCTYPE html>
<html lang="en">

  <?php include 'menu.php'; ?>

      <div id="content-wrapper">

        <div class="container-fluid">
          <form action="change_pwd.php" method="post" class="form-horizontal form-material">

              <div class="form-group">
                  <label>Enter new password :</label>
                  <div>
                      <input type="password" name="new_pwd" class="form-control form-control-line" required> </div>
              </div>
              <div class="form-group">
                  <div>
                      <input type="submit" value="Change password" class="btn btn-success" />
                  </div>
              </div>
          </form>

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
