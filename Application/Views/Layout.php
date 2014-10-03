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

	<!--[if lt IE 9]>
	<script src="<?php echo $view['assets']->getUrl('html5shiv/dist/html5shiv.min.js', 'components') ?>"></script>
	<script src="<?php echo $view['assets']->getUrl('respond/dest/respond.min.js', 'components') ?>"></script>
	<![endif]-->

	<?php $view['slots']->output('head') ?>
</head>
<body>
	<header id="main-header">

		<h1>Kalaho</h1>

		<div id="main-breadcrumb">
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

	<?php $view['slots']->output('script') ?>

	<?php # Affichage log database
	if ($app['debug']) : ?>
		<?php echo $view->render('Layout/DebugInfos') ?>
	<?php endif ?>
</body>
</html>
