
<?php

$execTime = $app->getExecutionTime();

$mem = $app->getMemoryUsage();

$iNumQueries = 0;

$fExec = 0;

$queries = $app['db']->getConfiguration()->getSQLLogger()->queries;

foreach ($queries as $dbLog) {
	$iNumQueries++;
	$fExec += $dbLog['executionMS'];
}


?>
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Informations sur l’exécution de l’application</h3>
		</div>
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
				Temps d’execution des requêtes à la base de données
				<strong class="pull-right <?php
				if ($fExec < 0.005) {
					echo 'text-success';
				}
				elseif ($fExec < 0.05) {
					echo 'text-info';
				}
				elseif ($fExec > 0.05 && $fExec < 0.1) {
					echo 'text-warning';
				}
				elseif ($fExec > 0.1) {
					echo 'text-danger';
				}
				?>"><?php echo $view['modifier']->number($fExec, 4) ?> s</strong>
			</li>
			<li class="list-group-item">
				Nombre total de requêtes à la base de données
				<strong class="pull-right <?php
				if ($fExec < 5) {
					echo 'text-success';
				}
				elseif ($fExec < 10) {
					echo 'text-info';
				}
				elseif ($fExec > 10 && $fExec < 20) {
					echo 'text-warning';
				}
				elseif ($fExec > 20) {
					echo 'text-danger';
				}
				?>"><?php echo $iNumQueries ?></strong>
			</li>
			<li class="list-group-item">
				Quantité de mémoire utilisée par l’application
				<strong class="pull-right <?php
				if ($fExec < 5) {
					echo 'text-success';
				}
				elseif ($fExec < 10) {
					echo 'text-info';
				}
				elseif ($fExec > 10 && $fExec < 20) {
					echo 'text-warning';
				}
				elseif ($fExec > 20) {
					echo 'text-danger';
				}
				?>"><?php echo $mem ?></strong>
			</li>
		</ul>
		<?php d($app['request']) ?>
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
	</div><!-- .panel debug -->
</div>
