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

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="<?php echo base_url();?>index.php/Main/dashboard" class="logo d-flex align-items-center w-auto">
                  <img src="<?php echo base_url()?>assets/img/apple-touch-icon-2.png" alt="">
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="p-1">
                  <a href="<?php echo base_url();?>index.php/main/view_table"><img src="<?php echo base_url();?>assets/img/back-icon.png" alt="back" style="width: auto; height: 20px;"></a>
              </div>

                <div class="card-body">
                 
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Client Details</h5>
                  </div>

                  <form class="row g-3" action="<?php echo base_url(); ?>index.php/main/update_client/<?php echo $user['id']; ?>" method="POST">

                    <div class="col-12">
                      <label for="Clientname" class="form-label">Client Name</label>
                      <div class="input-group">
                        <input type="text" name="cname" class="form-control" id="yourUsername" value="<?php echo $user['client_name']; ?>">
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="cproject" class="form-label">Client Project</label>
                      <input type="text" name="cproject" class="form-control" id="cproject" value="<?php echo $user['client_project']; ?>">
                    </div>

                    <div class="col-12">
                      <label for="aproject" class="form-label">About Project</label>
                      <textarea name="aproject" id="aproject" cols="30" rows="2" class="form-control"><?php echo $user['about_project']; ?></textarea>
                    </div>

                    <div class="col-12">
                      <label for="ptheam" class="form-label">Project Theam</label>
                      <textarea name="ptheam" id="ptheam" cols="30" rows="2" class="form-control"><?php echo $user['project_theam']; ?></textarea>
                    </div>

                    <div class="col-12">
                      <label for="Clientname" class="form-label">Start Date</label>
                      <div class="input-group has-validation">
                        <input type="date" name="sdate" class="form-control" id="startdate" value="<?php echo $user['start_date']; ?>">
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="Clientname" class="form-label">End Date</label>
                      <div class="input-group has-validation">
                        <input type="date" name="edate" class="form-control" id="startdate" value="<?php echo $user['end_date']; ?>">
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="Clientname" class="form-label">Domain Name</label>
                      <div class="input-group">
                        <input type="text" name="dname" class="form-control" id="domainname" value="<?php echo $user['domain_name']; ?>">
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="domainexpiry" class="form-label">Domain Expiry</label>
                      <div class="input-group">
                        <input type="date" name="dexpiry" class="form-control" id="domainexpiry" value="<?php echo $user['domain_expiry']; ?>">
                      </div>
                    </div>

                    <div class="col-12">
                      <div class="pt-1">
                        <h5 class="text-center">Cpanel</h5>
                      </div>
                      <label for="Clientname" class="form-label">Username</label>
                      <div class="input-group">
                        <input type="text" name="cuname" class="form-control" id="domainname" value="<?php echo $user['cuname']; ?>">
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="domainexpiry" class="form-label">Password</label>
                      <div class="input-group">
                        <input type="text" name="cpassword" class="form-control" id="domainexpiry" value="<?php echo $user['cpassword']; ?>">
                      </div>
                    </div>

                    <div class="col-12">
                      <div class="pt-1">
                        <h5 class="text-center">Database</h5>
                      </div>
                      <label for="Clientname" class="form-label">Username</label>
                      <div class="input-group">
                        <input type="text" name="duname" class="form-control" id="domainname"value="<?php echo $user['duname']; ?>">
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="domainexpiry" class="form-label">Password</label>
                      <div class="input-group">
                        <input type="text" name="dpassword" class="form-control" id="domainexpiry" value="<?php echo $user['dpassword']; ?>">
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="p-2">
                        <button class="btn btn-primary w-100" type="submit">Update Details</button>
                      </div>
                    </div>

                  </form>

                </div>
              </div>

              <div class="credits">
                Designed by <a href="http://noscetech.in/">NOSCE</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

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
  <script src="<?php echo base_url();?>assets/js/main.js"></script>

</body>

</html>