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
        <div class="card">
        <div class="p-1" id="back-img">
          <a href="<?php echo base_url();?>index.php/main/select_client"><img src="<?php echo base_url();?>assets/img/back-icon.png" alt="back" style="width: auto; height: 20px;"></a>
        </div>
          <div class="col-md-12 pt-5">
            <div class="text-center">
                <h3>Client Details</h3>
            </div>
          </div> 
          <?php       
          foreach($values as $row)
          {
          ?>
            <div class="card-body">
              <div class="container mb-5 mt-3">
                <div class="container">                
                  <div class="row">
                    <div class="col-xl-8">
                      <ul class="list-unstyled">
                        <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                              class="fw-bold">* Client Name :</span><?php echo $row->client_name; ?></li>
                        <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                              class="fw-bold">* Client Project : </span><?php echo $row->client_project; ?></li>
                      </ul>
                    </div>

                    <div class="col-xl-4">
                      <ul class="list-unstyled">
                        <li class="text-muted"><i class="fas fa-circle"></i> <span
                            class="fw-bold">* Domain Name :</span><?php echo $row->domain_name; ?></li>
                        <li class="text-muted"><i class="fas fa-circle"></i> <span
                            class="fw-bold">* Domain Expiring :</span><?php echo $row->domain_expiry; ?></li>
                      </ul>
                    </div>
                  </div>

                  <div class="row my-2 mx-1 justify-content-center">
                    <table border="1" class="table table-striped table-borderless">
                      <thead style="background-color:#84B0CA ;" class="text-white">
                        <tr>
                          <th scope="col">Cpanel Username</th>
                          <th scope="col">Cpanel Password</th>
                          <th scope="col">Database Username</th>
                          <th scope="col">Database Password</th>
                          <th scope="col">Start Date</th>
                          <th scope="col">End Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><?php echo $row->cuname; ?></td>
                          <td><?php echo $row->cpassword; ?></td>
                          <td><?php echo $row->duname; ?></td>
                          <td><?php echo $row->dpassword; ?></td>
                          <td><?php echo $row->start_date; ?></td>
                          <td><?php echo $row->end_date; ?></td>
                        </tr>
                      </tbody>                
                    </table>
                  </div>

                  <div class="row">
                    <div class="col-xl-8">
                      <ul class="list-unstyled">
                        <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                              class="fw-bold">* About Project :</span><?php echo $row->about_project; ?></li>
                        <li class="text-muted"><i class="fas fa-circle"></i> <span
                            class="fw-bold">* Project Theam :</span><?php echo $row->project_theam; ?></li>
                      </ul>
                        <p>-----------------------------------------------------------------------------------------------------------------</p>
                    </div>

                    <div class="col-xl-4">
                      <ul class="list-unstyled">
                         
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
             }
             ?>
              <div class="text-center mb-5">
                <button class="btn btn-secondary" id="btn-print" onclick="prints()">Create PDF</button></a> 
              </div>
          </div>
        </div>
    </section>
    </div>
  </main><!-- End #main -->

  <script>
    var b = document.getElementById('btn-print');
    var c = document.getElementById('back-img');

    function prints()
    {
      b.style.visibility="hidden";
      c.style.visibility="hidden";
          window.print();
    }
  </script>
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