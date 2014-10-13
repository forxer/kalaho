<?php
namespace Application;

use Symfony\Component\Templating\Asset\PathPackage;
use Symfony\Component\Translation\Loader\PhpFileLoader;
use Tao\Application as TaoApplication;
use Tao\Database\DatabaseServiceProvider;
use Tao\Translator\TranslatorServiceProvider;

class Application extends TaoApplication
{
	public function __construct($loader, array $config = [])
	{
		parent::__construct($loader, $config);

		# Enregistrement des services additionnels
		$this->register(new DatabaseServiceProvider());
		$this->register(new TranslatorServiceProvider());

		# Chargement des fichiers de traduction
		$this['translator']->addLoader('php', new PhpFileLoader());
		$this['translator']->addResource('php', $this['translator.dir'] . '/fr/messages.php', 'fr');
		$this['translator']->addResource('php', $this['translator.dir'] . '/en/messages.php', 'en');

		# Définition de deux packages d'assets pour les templates :
		# /Assets et /Components
		$this['templating']->get('assets')->addPackage('assets',
			new PathPackage($this['app_url'] . $this['assets_url']));

		$this['templating']->get('assets')->addPackage('components',
			new PathPackage($this['app_url'] . $this['components_url']));
	}
}
