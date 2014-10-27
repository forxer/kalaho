<?php

$execTime = $app->utilities->getExecutionTime();

list($memoryUsageValue, $memoryUsageUnit) = $app->utilities->getMemoryUsageData();


$iNumQueries = 0;

$dbExecTime = 0;

$queries = $app['db']->getConfiguration()->getSQLLogger()->queries;

foreach ($queries as $dbLog) {
	$iNumQueries++;
	$dbExecTime += $dbLog['executionMS'];
}

?>

<div class="container">
	<div id="debug-panel" class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title" data-toggle="collapse" data-target="#debug">
				<a class="collapsed" data-toggle="collapse" href="#debug-body">Informations sur l’exécution de l’application</a>
				<span class="pull-right"><?php echo $view['modifier']->number($execTime, 4) ?> s -
				<?php echo $view['modifier']->number($memoryUsageValue, 2) ?> <?php echo $memoryUsageUnit ?></span>
			</h3>
		</div>
		<div class="panel-body collapse" id="debug-body">
			<ul class="list-group">
				<li class="list-group-item">
					Temps d’exécution de l’application
					<strong class="pull-right <?php
					if ($execTime < 0.05) {
						echo 'text-success';
					}
					elseif ($execTime < 0.5) {
						echo 'text-info';
					}
					elseif ($execTime > 0.5 && $execTime < 1) {
						echo 'text-warning';
					}
					elseif ($execTime > 1) {
						echo 'text-danger';
					}
					?>"><?php echo $view['modifier']->number($execTime, 4) ?> s</strong>
				</li>
				<li class="list-group-item">
					Nombre total de requêtes à la base de données
					<strong class="pull-right <?php
					if ($iNumQueries < 5) {
						echo 'text-success';
					}
					elseif ($iNumQueries < 10) {
						echo 'text-info';
					}
					elseif ($iNumQueries > 10 && $iNumQueries < 20) {
						echo 'text-warning';
					}
					elseif ($iNumQueries > 20) {
						echo 'text-danger';
					}
					?>"><?php echo $iNumQueries ?></strong>
				</li>
				<?php if ($iNumQueries > 0) : ?>
				<li class="list-group-item">
					Temps d’execution des requêtes à la base de données
					<strong class="pull-right <?php
					if ($dbExecTime < 0.005) {
						echo 'text-success';
					}
					elseif ($dbExecTime < 0.05) {
						echo 'text-info';
					}
					elseif ($dbExecTime > 0.05 && $dbExecTime < 0.1) {
						echo 'text-warning';
					}
					elseif ($dbExecTime > 0.1) {
						echo 'text-danger';
					}
					?>"><?php echo $view['modifier']->number($dbExecTime, 4) ?> s</strong>
				</li>
				<?php endif ?>
				<li class="list-group-item">
					Quantité de mémoire utilisée par l’application
					<strong class="pull-right <?php
					if ($memoryUsageValue < 5) {
						echo 'text-success';
					}
					elseif ($memoryUsageValue < 10) {
						echo 'text-info';
					}
					elseif ($memoryUsageValue > 10 && $dbExecTime < 20) {
						echo 'text-warning';
					}
					elseif ($memoryUsageValue > 20) {
						echo 'text-danger';
					}
					?>"><?php echo $view['modifier']->number($memoryUsageValue, 2) ?> <?php echo $memoryUsageUnit ?></strong>
				</li>
				<li class="list-group-item">
					Version PHP <strong class="pull-right"><?php echo PHP_VERSION ?></strong></li>
				</li>
			</ul>

			<ul class="list-group">
				<li class="list-group-item">
					Route <code>$app['request']->attributes->get('_route')</code>
					<strong class="pull-right"><?php echo $app['request']->attributes->get('_route') ?></strong>
				</li>
				<li class="list-group-item">
					Controller <code>$app['request']->attributes->get('_controller')</code>
					<strong class="pull-right"><?php echo $app['request']->attributes->get('_controller') ?></strong>
				</li>
				<li class="list-group-item">
					Controller class <code>$app['request']->attributes->get('controller_class')</code>
					<strong class="pull-right"><?php echo $app['request']->attributes->get('controller_class') ?></strong>
				</li>
				<li class="list-group-item">
					Controller method <code>$app['request']->attributes->get('controller_method')</code>
					<strong class="pull-right"><?php echo $app['request']->attributes->get('controller_method') ?></strong>
				</li>
			</ul>

			<?php if ($iNumQueries > 0) : ?>
			<table class="table table-striped" role="grid">
				<thead>
					<tr>
						<th scope="col">Requête</th>
						<th scope="col">Temps d’execution</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($queries as $dbLog) : ?>
					<tr>
						<td><?php echo SqlFormatter::format($dbLog['sql']) ?></td>
						<td><?php echo $view['modifier']->number($dbLog['executionMS'], 4) ?> s</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
			<?php endif ?>
		</div><!-- .panel-body -->
	</div><!-- .panel -->
</div>
