<?php session_start(); ?>
<?php include 'security_check.php'; ?>

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
                      <th><strong>Received date :</strong> <?php echo date("d M Y - G:i", $data['received_date']); ?> </th>
                    </tr>
                    <tr>
                      <td><strong>From :</strong> <?php echo $data['source'];?> </td>
                    </tr>
                   	<tr>
                      <td><strong>Subject:</strong> <?php echo $data['subject']; ?></th>
                    </tr>
                    <tr>
                      <td><?php echo $data['body']; ?> </td>
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

  </body>

</html>
