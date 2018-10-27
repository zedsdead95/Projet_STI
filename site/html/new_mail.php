<?php session_start(); ?>
<?php


$file_db = new PDO('sqlite:/usr/share/nginx/databases/database.sqlite');
  // Set errormode to exceptions
  $file_db->setAttribute(PDO::ATTR_ERRMODE, 
                          PDO::ERRMODE_EXCEPTION);
if (isset($_GET['id']) ) {

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

    $source = $data['source'];
    $subject = $data['subject'];
  }

if (!empty($_POST)){

    $req = $file_db->prepare('
        INSERT INTO mail (source,subject,body,received_date,destination)
        VALUES (:source, :subject, :body, :received_date, :destination)
    ');

    $req->execute( array(
        'source' => $_SESSION['username'],
        'subject' => $_POST['subject'],
        'body' => $_POST['body'],
        'received_date' => time(),
        'destination' => $_POST['to']
    ));
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
                        <form method="post" action="new_mail.php" class="form-horizontal form-material">
                            <div class="form-group">
                                <label for="to" class="col-md-10">To</label>
                                <div class="col-md-10">
                                    <input type="text" name="to" <?php if(isset($_GET['id'])) { echo "value=" . $source; } ?> placeholder="Username" class="form-control form-control-line" id="to" required> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-10">Subject</label>
                                <div class="col-md-10">
                                    <input type="text" name="subject" <?php if(isset($_GET['id'])) { echo "value=RE:" . $subject; } ?> class="form-control form-control-line" required> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-10">Message</label>
                                <div class="col-md-10">
                                    <textarea rows="12" name="body" class="form-control form-control-line" required></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-10">
                                    <input type="submit" value="Send" class="btn btn-success" />
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
