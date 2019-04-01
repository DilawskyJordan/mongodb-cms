<!DOCTYPE HTML>
<html>
	<head>
		<title>Super Light CMS</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="icon" href="<? echo $this->url('src/app/views/images/superLight.png'); ?>">
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
				<!-- Banner -->
					<section id="intro" class="main">
						<span class="icon fa-diamond major"></span>
						<h2>Setup :</h2>
						<ul style="border: 1px solid black; padding: 2%; direction: ltr;">
							<h5>if you are using linus use the following commands : </h5>
							<ul>
								<li>sudo chmod 777 src/app/views/getInfo.php</li>
								<li>sudo chmod 777 src/app/views/</li>
								<li>sudo chmod 777 src/app/http/storage</li>
								<li>sudo chmod 777 src/app/views/images/<li>
								<li>sudo chmod 777 src/app/http/storage/visitors.json</li>
								<li>sudo chmod 777 src/app/http/logs.txt</li>
								<li>cd src/app/http/storage</li>
								<li>sudo chmod 777 /</li>
								
							</ul>
						</ul>
						<form method="POST" action="<? echo $this->url('postInfo'); ?>">
							<h4 style="color:red;">
								<? if(isset($errors)){if(is_array($errors)){ if(sizeof($errors) > 0) { if(array_key_exists("firstname", $errors)){ echo $errors["firstname"]; } } } } ?>
							</h4>
							<input type="text" name="firstname" placeholder="Your firstname">
							<br/>
							<h4 style="color:red;">
								<?if(isset($errors)){if(is_array($errors)){ if(sizeof(@$errors) > 0) { if(array_key_exists("lastname", $errors)){ echo $errors["lastname"]; } } } } ?>
							</h4>
							<input type="text" name="lastname" placeholder="Your lastname">
							<br/>
							<h4 style="color:red;">
								<?if(isset($errors)){if(is_array($errors)){ if(sizeof(@$errors) > 0) { if(array_key_exists("websitename", $errors)){ echo $errors["websitename"]; } } }}?>
							</h4>
							<input type="text" name="websitename" placeholder="Your website name">
							<br/>
							<h4 style="color:red;">
								<?if(isset($errors)){if(is_array($errors)){ if(sizeof(@$errors) > 0) { if(array_key_exists("email", $errors)){ echo $errors["email"]; } } }} ?>
							</h4>
							<input type="email" name="email" placeholder="Your email">
							<br/>
							<h4 style="color:red;">
								<?if(isset($errors)){if(is_array($errors)){ if(sizeof(@$errors) > 0) { if(array_key_exists("password", $errors)){ echo $errors["password"]; } } }}?>
							</h4>
							<input type="password" name="password" placeholder="Your password">
							<br/>
							<h4 style="color:red;">
								<?if(isset($errors)){if(is_array($errors)){ if(sizeof(@$errors) > 0) { if(array_key_exists("description", $errors)){ echo $errors["description"]; } } }}?>
							</h4>
							<textarea name="description" placeholder="description" style="max-width: 100%;"></textarea>
							<br/>
							<button type="submit">Install</button>
						</form>
					</section>

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
