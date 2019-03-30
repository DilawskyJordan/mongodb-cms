<!DOCTYPE HTML>
<html>
	<head>
		<title><? echo $websitename; ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="icon" href="<? echo $this->url('src/app/views/images/superLight.png') ?>">
		<link rel="stylesheet" href="<? echo $this->url('src/app/views/assets/css/main.css'); ?>" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body>

		<!-- Header -->
			<header id="header" class="alt">
				<div class="inner">
					<h1><? echo $websitename; ?></h1>
					<p><? echo $description; ?></p>
				</div>
			</header>
      <style>
      code {
        background-color: #bdbdbd;
      }
      </style>
		<!-- Wrapper -->
			<div id="wrapper">
				<? if($post !== null): ?>
          <center>
            <div class="container" style="width: 100%; overflow: hidden; position:relative; text-align:left;">
                <h2><u><? echo $post->title; ?></u></h2>
                <br/>
                <? echo $post->post; ?>
            </div>
						<span class="badge badge-dark"><? echo $post->date; ?></span>
          </center>
				<? else: ?>
						<center>
							         <h3>Blog not found ! <a href="<? echo $this->url(''); ?>">Go back.</a></h3>

						</center>
					<? endif; ?>
				<!-- Footer -->
					<footer id="footer">
						<ul class="icons">
							<li><a href="<? echo $info->twitter; ?>" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="<? echo $info->facebook; ?>" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="<? echo $info->linkedin; ?>" class="icon fa-linkedin"><span class="label">LinkedIn</span></a></li>
							<li><a href="<? echo $info->email; ?>" class="icon fa-envelope"><span class="label">Email</span></a></li>
						</ul>
						<p class="copyright">&copy; <a>Create by : Laggoune walid</a>.</p>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="<? echo $this->url('src/app/views/assets/js/jquery.min.js'); ?>"></script>
			<script src="<? echo $this->url('src/app/views/assets/js/skel.min.js'); ?>"></script>
			<script src="<? echo $this->url('src/app/views/assets/js/util.js'); ?>"></script>
			<script src="<? echo $this->url('src/app/views/assets/js/main.js'); ?>"></script>

	</body>
</html>
