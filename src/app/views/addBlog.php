<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="<? echo $this->url('src/app/views/images/superLight.png') ?>">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><? echo $websitename; ?> - Write a blog</title>

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
          <li class="breadcrumb-item active">Write new blog</li>
        </ol>


      </div>
      <!-- /.container-fluid -->
    <div class="container">
        <? if(isset($errors)) : ?>
          <div class="alert alert-danger" role="alert">
          <? foreach($errors as $error): ?>
             <? echo($error); ?>
           <? endforeach; ?>
          </div
          <br/>
      <? endif; ?>
      <? if(isset($done)) : ?>
          <div class="alert alert-success" role="alert">
             <? echo($done); ?>
          </div
          <br/>
      <? endif; ?>
      <form method="POST" action="<? echo $this->url('postBlog'); ?>" enctype="multipart/form-data">
      <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>

      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Title:</label>
        <div class="col-sm-10">
          <input type="text" name="title" class="form-control" id="inputPassword" placeholder="Title" required="true">
        </div>
    </div>
    <br/>
      <input type="hidden" name="_token" value="<? echo $token; ?>">
      <input type="hidden" name="body">

        <!-- Create the editor container -->
         <textarea name="post" id="mytextarea"></textarea>


        <br/>
        <div class="form-group">
            <label for="exampleFormControlFile1">Upload Cover :</label>
            <input type="file" name="cover" class="form-control-file" id="exampleFormControlFile1" required="true">
          </div>
          <br/>
         <button type="submit" class="btn btn-secondary">Post !</button>
        <!-- Include the Quill library -->

    </form>

</div>
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
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>
 <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=uwvqhctevk0xrribgj09j516goa8ro71rf2qsk7jjw78uzz2"></script>
  <script>
  tinymce.init({
    selector: '#mytextarea',
  plugins: "image, media",
  });
  </script>
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

</body>

</html>
