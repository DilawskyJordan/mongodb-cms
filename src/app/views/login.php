<!DOCTYPE HTML>
<html>
	<head>
		<title>Super Light CMS</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="icon" href="<? echo $this->url('src/app/views/images/superLight.png') ?>">
		<link rel="stylesheet" href="<? echo $this->url('src/app/views/assets/css/main.css'); ?>" />
	</head>
	<body>

		<!-- Header -->
			<header id="header" class="alt">
				<div class="inner">
					<h1>Super Light</h1>
					<p>A free content management system by <a href="https://github.com/DilawskyJordan">Walid Laggoune</a></p>
				</div>
			</header>

		<!-- Wrapper -->
			<div id="wrapper">
				<form method="POST" action="<? echo $this->url('checkLogin'); ?>">
					<input name="_token" value="<? echo $token; ?>" hidden>
					<? if(isset($errors)): ?>
					<h4 style="color : red;"><? print_r($errors); ?></h4>
				<? endif; ?>
							</h4>
							<input type="email" name="email" placeholder="Email" required="true">
							<br/>
							<input type="password" name="password" placeholder="Password" required="true">
							<br/>
							<button type="submit">Login !</button>
				</form>
				<!-- Footer -->
					<footer id="footer">
						<ul class="icons">
							<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="#" class="icon fa-linkedin"><span class="label">LinkedIn</span></a></li>
							<li><a href="#" class="icon fa-envelope"><span class="label">Email</span></a></li>
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