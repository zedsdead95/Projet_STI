<?php session_start(); 

include 'security_check.php';

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

  </body>

</html>
