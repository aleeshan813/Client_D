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
      <a href="<?php echo base_url();?>index.php/Main/index" class="logo d-flex align-items-center">
        <img src="<?php echo base_url();?>assets/img/apple-touch-icon-2.png" alt="">
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>index.php/Main/index">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url();?>index.php/main/view_table">
          <i class="bi bi-menu-button-wide"></i><span>Client Details</span>
        </a>
      </li>

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
      <h1>Client Details</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url();?>index.php/Main/index">Home</a></li>
          <li class="breadcrumb-item">Client Details</li> 
        </ol>
      </nav>
      <div class="p-2">
        <div class="p-1" role="group" aria-label="Basic example">
          <a class="btn btn-primary w-30 p-2" href="<?php echo base_url();?>index.php/Main/add_client">Add Details</a>
          <a class="btn btn-success w-30 p-2" href="<?php echo base_url();?>index.php/Main/select_client">Select Client</a>
        </div>
      </div>
      <form action="<?php echo base_url();?>index.php/Main/search_client_view" method="post">
        <div class="input-group">
          <div class="form-outline p-1 d-flex">
              <div class="ms-1">
                  <input type="search" name="search_data"  class="form-control" placeholder="Search here ............" required>
              </div> 
              <div class="ms-2">
                <select class="form-select" name="drop" required>
                  <option></option>
                  <option value="client_name">Client Name</option>
                  <option value="client_project">Client Project</option>
                  <option value="domain_name">Domain Nme</option>
                </select>
              </div>
              <div>
                <button type="submit" class="btn btn-primary btn ms-2"><i class="bi bi-search"></i></button>
              </div>
          </div>
        </div>
      </form>
    </div><!-- End Page Title -->
    
    <section class="section">
    <div>
      <?php if($this->uri->segment(2) == 'Client_Details_Added')
        {
      ?>
          <div class="alert alert-success d-flex justify-content-between">
              <?php echo '<p>Successfully Client Details Added</p>';?>
              <a class="btn-close w-30 p-2" href="<?php echo base_url();?>index.php/main/view_table"></a>
          </div>
      <?php
        }
      ?>
    </div>
    <div>
      <?php if($this->uri->segment(2) == 'Client_Details_updated')
        {
      ?>
          <div class="alert alert-success d-flex justify-content-between">
              <?php echo '<p>Client Details Updated Successfully</p>';?>
              <a class="btn-close w-30 p-2" href="<?php echo base_url();?>index.php/main/view_table"></a>
          </div>
      <?php
        }
      ?>
    </div>
    <div>
      <?php if($this->uri->segment(2) == 'Client_Details_deleted')
        {
      ?>
          <div class="alert alert-success d-flex justify-content-between">
              <?php echo '<p>Client Details Deleted From The Table Successfully</p>';?>
              <a class="btn-close w-30 p-2" href="<?php echo base_url();?>index.php/main/view_table"></a>
          </div>
      <?php
        }
      ?>
    </div>
      <div class="row">
        <div class="col-lg-6">
          <div>
            <div>
               <!-- Client Drtails Table -->
              <table class="table table-bordered text-center" style="background-color: white;">

                <thead>
                  <tr class="text-center tr-client">
                    <th scope="col">#</th>
                    <th scope="col">Client Name</th>
                    <th scope="col">Client Project</th>
                    <th scope="col">About Project</th>
                    <th scope="col">Project Theam</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Domain Name</th>
                    <th scope="col">Domain Expiry</th>
                    <th scope="col">Cpanel Username</th>
                    <th scope="col">Cpanel Password</th>
                    <th scope="col">Database Username</th>
                    <th scope="col">Database Password</th>
                    <th scope="col" colspan="2">
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <a class="btn btn-primary" href="<?php echo base_url();?>index.php/main/add_client" style="color:white;">Add</a>
                          <a class="btn btn-success" href="<?php echo base_url();?>index.php/main/select_client" style="color:white;">Select</a>
                        </div>
                    </th>
                  </tr>
                </thead>

                <tbody>

                <?php
                    if(isset($values))
                    {  
                    foreach($values as $row)
                    {
                ?>

                      <tr>
                        <th scope="row" class="clint_id"><?php echo $row->id; ?></th>
                        <td><?php echo $row->client_name; ?></td>
                        <td><?php echo $row->client_project; ?></td>
                        <td><?php echo $row->about_project; ?></td>
                        <td><?php echo $row->project_theam; ?></td>
                        <td><?php echo $row->start_date; ?></td>
                        <td><?php echo $row->end_date; ?></td>
                        <td><?php echo $row->domain_name; ?></td>
                        <td><?php echo $row->domain_expiry; ?></td>
                        <td><?php echo $row->cuname; ?></td>
                        <td><?php echo $row->cpassword; ?></td>
                        <td><?php echo $row->duname; ?></td>
                        <td><?php echo $row->dpassword; ?></td>
                        
                        <td><a href="<?php echo base_url();?>index.php/main/edit/<?php echo $row->id; ?>"><img src="<?php echo base_url();?>assets/img/update-icon.png" alt="" style="width: auto; height: 20px;"></a></td>
                        <td><a href="<?php echo base_url();?>index.php/main/delete/<?php echo $row->id; ?>"><img src="<?php echo base_url();?>assets/img/delete-icon.jfif" alt="" style="width: auto; height: 20px;" onclick="return checkdelete()"></a></td>
                      </tr>

                <?php
                    }
                    }
                    elseif(isset($result))
                    {
                      foreach($result as $row)
                      {
                    ?>
                        
                      <tr>
                      <th scope="row" class="clint_id"><?php echo $row->id; ?></th>
                      <td><?php echo $row->client_name; ?></td>
                      <td><?php echo $row->client_project; ?></td>
                      <td><?php echo $row->about_project; ?></td>
                      <td><?php echo $row->project_theam; ?></td>
                      <td><?php echo $row->start_date; ?></td>
                      <td><?php echo $row->end_date; ?></td>
                      <td><?php echo $row->domain_name; ?></td>
                      <td><?php echo $row->domain_expiry; ?></td>
                      <td><?php echo $row->cuname; ?></td>
                      <td><?php echo $row->cpassword; ?></td>
                      <td><?php echo $row->duname; ?></td>
                      <td><?php echo $row->dpassword; ?></td>
                      
                      <td><a href="<?php echo base_url();?>index.php/main/edit/<?php echo $row->id; ?>"><img src="<?php echo base_url();?>assets/img/update-icon.png" alt="" style="width: auto; height: 20px;"></a></td>
                      <td><a href="<?php echo base_url();?>index.php/main/delete/<?php echo $row->id; ?>"><img src="<?php echo base_url();?>assets/img/delete-icon.jfif" alt="" style="width: auto; height: 20px;" onclick="return checkdelete()"></a></td>
                    </tr>
                <?php
                      }
                    }
                ?>

                </tbody>
                  
              </table>
              
              <!-- End Client Details Table -->
            </div>
          </div>
        </div>
      </div>

    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer-view-table">
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

  <!-- Delete Alert -->
  <script>
    function checkdelete()
    {
      return confirm('Are you sure you want to delete this client details');
    }
  </script>
  <!-- Template Main JS File -->
  <script src="<?php echo base_url('assets/js/main.js');?>"></script>

</body>

</html>