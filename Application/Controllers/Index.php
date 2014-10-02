<?php
namespace Application\Controllers;

class Index extends BaseController
{
	public function home()
	{
		return $this->render('Home');
	}
}
