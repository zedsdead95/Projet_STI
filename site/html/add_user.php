<?php session_start(); ?>
<?php include 'security_check.php'; ?>
<?php include 'admin_check.php'; ?>
<?php

$file_db = new PDO('sqlite:/usr/share/nginx/databases/database.sqlite');
  // Set errormode to exceptions
  $file_db->setAttribute(PDO::ATTR_ERRMODE, 
                          PDO::ERRMODE_EXCEPTION);

if (!empty($_POST)){

    $req = $file_db->prepare('
        INSERT INTO user (username,password,isActive,role)
        VALUES (:username, :password, :isActive, :role)
    ');

    $req->execute( array(
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'isActive' => $_POST['isActive'],
        'role' => $_POST['role']
    ));
    header('Location: users_management.php');
  }
?>

<!DOCTYPE html>
<html lang="en">

<?php include 'menu.php'; ?>

      <div id="content-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <div class="white-box">
                        <form method="post" action="add_user.php" class="form-horizontal form-material">
                            <div class="form-group">
                                <label for="to" class="col-md-10">Username</label>
                                <div class="col-md-6">
                                    <input type="text" name="username" placeholder="Username" class="form-control form-control-line" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-10">Password</label>
                                <div class="col-md-6">
                                    <input type="text" name="password" placeholder="Password" class="form-control form-control-line" required> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-10">Active</label>
                                <div class="col-md-2">
                                    <select name="isActive" class="form-control form-control-line">
                                        <option selected value="1">Active</option>
                                        <option value="0">Not active</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-10">Role</label>
                                <div class="col-md-2">
                                    <select name="role" class="form-control form-control-line">
                                        <option selected value="0">Collaborater</option>
                                        <option value="1">Administrator</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-10">
                                    <input type="submit" value="Add user" class="btn btn-success" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
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
