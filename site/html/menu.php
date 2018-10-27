<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Tables</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index.html">Mail application</a>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="new_mail.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>New message</span>
          </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="tables.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Messages</span></a>
        </li>

        <?php if ($_SESSION['role'] == 1) { ?>
        <li class="nav-item">
          <a class="nav-link" href="add_user.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Add user</span>
          </a>
        </li>
          <li class="nav-item">
            <a class="nav-link" href="users_management.php">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Users management</span>
            </a>
          </li>
        <?php } ?>

        <li class="nav-item">
          <a class="nav-link" href="change_pwd.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Change password</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Logout</span>
          </a>
        </li>
      </ul>