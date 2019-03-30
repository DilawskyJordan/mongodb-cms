<!DOCTYPE HTML>
<html>
	<head>
		<title><? echo $websitename; ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="icon" href="<? echo $this->url('src/app/views/images/superLight.png') ?>">
		<link rel="stylesheet" href="<? echo $this->url('src/app/views/assets/css/main.css'); ?>" />
	</head>
	<body>

		<!-- Header -->
			<header id="header" class="alt">
				<div class="inner">
					<h1><? echo $websitename; ?></h1>
					<p><? echo $description; ?></p>
				</div>
			</header>

		<!-- Wrapper -->
		<script type="text/javascript">
		</script>
			<div id="wrapper">
				<? if($posts !== 0): ?>
				<div class="items">
						<section class="main items">
								<? foreach($posts as $post): ?>
									<article class="item">
										<header>
											<a href="<? echo $this->url("b"); ?>/<? echo str_replace(" ", "-", $post->title); ?>"><img src="<? echo $this->url(""); ?>/<? echo $post->cover; ?>" alt="" /></a>
											<h3><? echo $post->title; ?></h3>
										</header>
										<ul class="actions">
											<li><a href="<? echo $this->url("b"); ?>/<? echo str_replace(" ", "-", $post->title); ?>" class="button">Read</a></li>
										</ul>
									</article>
							<? endforeach; ?>
						</section>
				</div>
				<style>
				.pagination {
				  display: inline-block;
				}

				.pagination a {
				  color: black;
				  float: left;
				  padding: 8px 16px;
				  text-decoration: none;
				}
				</style>
				<center>
					<div class="pagination">
						<? foreach($pages as $page): ?>
							<a href="<? echo $this->url("p"); ?>/<? echo $page; ?>"><? echo $page; ?></a>
					 <? endforeach; ?>
					</div>
				</center>
					<? else: ?>
						<center>
							<h3>No blogs yet ! clieck <a href="<? echo $this->url('addBlog'); ?>">here</a> to add something</h3>
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
