<?php session_start(); ?>
<?php include 'security_check.php'; ?>
<!DOCTYPE html>
<html lang="en">
<?php include 'menu.php'; ?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Messages</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Received date</th>
                      <th>From</th>
                      <th>Subject</th>
                      <th></th>
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
                        $sql = "SELECT * FROM mail WHERE destination = '" . $_SESSION['username'] . "' ORDER BY received_date DESC";
                        $result =  $file_db->query($sql);
 
                      foreach($result as $row) {
                        ?>
                        <tr>
                        <td><?php echo date("d M Y - G:i", $row['received_date']); ?></td>
                        <td><?php echo $row['source']; ?></td>
                        <td><?php echo $row['subject']; ?></td>
                        <td><a href="read_mail.php?id=<?php echo $row['id']; ?>">Read</a></td>
                        <td><a href="new_mail.php?id=<?php echo $row['id']; ?>">Answer</a></td>
                        <td><a href="delete_mail.php?id=<?php echo $row['id']; ?>">Delete</a></td>
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
  </body>

</html>
