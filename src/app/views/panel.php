
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="<? echo $this->url('src/app/views/images/superLight.png') ?>">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><? echo $websitename; ?> - Panel</title>

  <!-- Custom fonts for this template-->
  <link href="<? echo $this->url('src/app/views/assets/vendor/fontawesome-free/css/all.min.css');?>" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="<? echo $this->url('src/app/views/assets/vendor/datatables/dataTables.bootstrap4.css');?>" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<? echo $this->url('src/app/views/assets/css/sb-admin.css');?>" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html"><? echo $websitename; ?></a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">

    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="<? echo $this->url("showLog"); ?>">Show Log file</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<? echo $this->url("logout"); ?>" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<? echo $this->url('panel'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<? echo $this->url('tasks'); ?>">
          <i class="fas fa-fw fa-tasks"></i>
          <span>Your tasks</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<? echo $this->url('addBlog'); ?>">
          <i class="fas fa-fw fa-pen-square"></i>
          <span>Write a blog</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<? echo $this->url('showBlogs'); ?>">
          <i class="fas fa-fw fa-eye "></i>
          <span>Show All blogs</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<? echo $this->url('changeCover'); ?>">
          <i class="fas fa-fw fa-edit"></i>
          <span>Change the cover and favicon</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<? echo $this->url('editDotenv'); ?>">
          <i class="fas fa-fw fa-cog "></i>
          <span>Edit .env file</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<? echo $this->url('aboutMe'); ?>">
          <i class="fas fa-fw fa-user-circle  "></i>
          <span>About you page.</span>
        </a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-blog"></i>
                </div>
                <div class="mr-5"><? echo $posts; ?> Blogs!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="<? echo $this->url("/showBlogs"); ?>">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>

        <!-- Area Chart Example-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            <? echo $websitename ?> vistors in every single month [1;12]</div>
          <div class="card-body">
            <canvas id="myAreaChart" width="100%" height="30"></canvas>
          </div>
        </div>

        <br/>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Hydrogen framework - Laggoune Walid 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->
  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<? echo $this->url("logout"); ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<? echo $this->url('src/app/views/assets/vendor/jquery/jquery.min.js');?>"></script>
  <script src="<? echo $this->url('src/app/views/assets/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<? echo $this->url('src/app/views/assets/vendor/jquery-easing/jquery.easing.min.js');?>"></script>

  <!-- Page level plugin JavaScript-->
  <script src="<? echo $this->url('src/app/views/assets/vendor/chart.js/Chart.min.js');?>"></script>
  <script src="<? echo $this->url('src/app/views/assets/vendor/datatables/jquery.dataTables.js');?>"></script>
  <script src="<? echo $this->url('src/app/views/assets/vendor/datatables/dataTables.bootstrap4.js');?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<? echo $this->url('src/app/views/assets/js/sb-admin.min.js');?>"></script>

  <!-- Demo scripts for this page-->
  <script src="<? echo $this->url('src/app/views/assets/js/demo/datatables-demo.js'); ?>"></script>
  <script type="text/javascript">
    // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["01/<?echo $v->year;?>", "02/<?echo $v->year;?>", "03/<?echo $v->year;?>", "04/<?echo $v->year;?>", "05/<?echo $v->year;?>", "06/<?echo $v->year;?>", "07/<?echo $v->year;?>", "08/<?echo $v->year;?>", "09/<?echo $v->year;?>", "10/<?echo $v->year;?>", "11/<?echo $v->year;?>", "12/<?echo $v->year;?>"],
    datasets: [{
      label: "Visitors in months",
      lineTension: 0.3,
      backgroundColor: "rgba(2,117,216,0.2)",
      borderColor: "rgba(2,117,216,1)",
      pointRadius: 5,
      pointBackgroundColor: "rgba(2,117,216,1)",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(2,117,216,1)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
      data: [
        <? for($i=1; $i<=12; $i++): ?>
          <? if($i == $v->month): ?>
            <? echo $v->visits; ?>,
          <? else: ?>
            <? echo "0"; ?>,
          <? endif; ?>
        <? endfor; ?>
      ],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: true
        },
      }],
      yAxes: [{
        ticks: {
          min: 0,
          maxTicksLimit: 5
        },
        gridLines: {
          color: "rgba(0, 0, 0, .125)",
        }
      }],
    },
    legend: {
      display: true
    }
  }
});

  </script>
</body>

</html>
