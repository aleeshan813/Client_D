<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>NOSCE</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url();?>assets/img/favicon.png" rel="icon">
  <link href="<?php echo base_url();?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block"> <img src="<?php echo base_url();?>assets/img/apple-touch-icon-2.png" alt=""></span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
           <?php 
            $arr = array();
            $current_date = date('Y-m-d');
            foreach($values as $n)
            {
              $my_date = $n->domain_expiry;
              $s = (strtotime($my_date)-strtotime($current_date));

              if(floor($s / (60*60*24)) <= 5 && floor($s / (60*60*24))>0)
              {
               array_push($arr,$n);
              }
            }
            $num = count($arr);
           ?>
           <span class="badge bg-primary badge-number"><?php echo $num ;?></span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have <?php echo $num ;?> new notifications
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
          <?php
          $current_date_1 = date('Y-m-d');
          foreach($values as $row)
          {
            $my_date = $row->domain_expiry;
            $diff = (strtotime($my_date)-strtotime($current_date_1));
            $res = $this->db->from("tb_client_details")->where("id",$row->id)->get();
            $row1 = $res->result();
            $status = $row1[0]->status;

            if(floor($diff / (60*60*24)) <= 5 && floor($diff / (60*60*24))>0)
            {
         ?>
            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
              <h4><?php echo $row->domain_name; ?></h4>
                <h5>This domain will expire within <?php echo floor($diff / (60*60*24)); ?> days</h5>
                <p class="text-danger">Expiring on <?php echo $row->domain_expiry; ?> </p>
              </div>
            </li>
          <?php
          }
          if(floor($diff / (60*60*24)) <= 5 && floor($diff / (60*60*24))>0 && $status==0)
          {
            redirect(base_url("index.php/main/send/$row->id"));
          }
          
// when domain updated while the status is one,change the status from 1 to 0 
          elseif(floor($diff / (60*60*24)) > 5 && $status==1)
          {
            $data = array(
              'status' =>0
            );
            $id_status_1 = $row->id;
            $Query = $this->db->where('id',$id_status_1);
            $this->db->update('tb_client_details',$data);
          }
        }
          ?>

          </ul><!-- End Notification of domain_expiring date -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="<?php echo base_url();?>index.php/Main/index">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url();?>index.php/Main/view_table">
          <i class="bi bi-menu-button-wide"></i><span>Client Details</span>
        </a>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url();?>index.php/Main/add_client">
          <i class="bi bi-person"></i>
          <span>Add New Client Details</span>
        </a>
      </li><!-- End Profile Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      
      <!-- Recent Sales -->
      <div class="col-12">
        <div class="card recent-sales overflow-auto">

          <div class="card-body">
            <h5 class="card-title">Expiry Dates</h5>

            <table class="table table-borderless datatable">
              <thead>
                <tr>
                  <th scope="col">Client Name</th>
                  <th scope="col">Client Project</th>
                  <th scope="col">Domain Name</th>
                  <th scope="col">Domain Expiring</th>

                </tr>
              </thead>
              <tbody>
              <?php
              
                foreach($values as $row)
                  {
              ?>
                <tr>
                  <td><?php echo $row->client_name; ?></td>
                  <td><?php echo $row->client_project; ?></td>
                  <td><?php echo $row->domain_name; ?></td>
                  <td><?php echo $row->domain_expiry; ?></td>
                </tr>

            <?php
                 }
            ?>
              </tbody>
            </table>

          </div>

        </div>
      </div><!-- End Recent Sales -->

    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NOSCE</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="http://noscetech.in/">NOSCE</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url();?>assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/chart.js/chart.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/echarts/echarts.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/quill/quill.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url('assets/js/main.js');?>"></script>

</body>

</html>