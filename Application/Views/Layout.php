<?php

$view['titleTag']->add('Kalaho', true);

$view['breadcrumb']->add('Accueil', $view->generateUrl('index'), true);

?><!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php echo $view->escape($view['titleTag']->get(' - ')) ?></title>

	<link rel="stylesheet" type="text/css" href="/min/g=css">

	<!--[if lt IE 9]>
	<script src="<?php echo $view['assets']->getUrl('html5shiv/dist/html5shiv.min.js', 'components') ?>"></script>
	<script src="<?php echo $view['assets']->getUrl('respond/dest/respond.min.js', 'components') ?>"></script>
	<![endif]-->

	<?php $view['slots']->output('head') ?>
</head>
<body>
	<header id="main-header">
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">

				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu">
						<span class="sr-only">Menu</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo $view->generateUrl('index') ?>">Kalaho</a>
				</div>

				<div class="collapse navbar-collapse" id="main-menu">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="<?php echo $view->generateUrl('index') ?>" class="active">Accueil</a></li>
					</ul>
				</div><!-- #main-menu -->
			</div><!-- .container-fluid -->
		</nav>
		<div id="main-breadcrumb" class="container">
			<?php echo $view->render('Layout/Breadcrumb') ?>
		</div><!-- #main-breadcrumb -->
	</header><!-- #main-header -->

	<section id="content">

		<div id="main-messages">
		<?php # Affichage des éventuels messages
		echo $view->render('Common/messages') ?>
		</div><!-- #main-messages -->

		<?php # Affichage du contenu principal de la page
		$view['slots']->output('_content') ?>

	</section><!-- #content -->

	<footer id="main-footer">
		Copyright <?php echo date('Y') ?>
	</footer><!-- #main-footer -->

	<script type="text/javascript" charset="utf8" src="/min/g=js"></script>

	<?php $view['slots']->output('script') ?>

	<?php # Affichage log database
	if ($app['debug']) : ?>
		<?php echo $view->render('Layout/DebugInfos') ?>
	<?php endif ?>
</body>
</html>
