<?php
namespace Application\Controllers;

use Tao\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class BaseController extends Controller
{
	/**
	 * Affichage page 401
	 */
	public function serve401()
	{
		$response = new Response();
		$response->setStatusCode(Response::HTTP_UNAUTHORIZED);

		return $this->render('Errors/401', [], $response);
	}

	/**
	 * Affichage page 404
	 */
	public function serve404()
	{
		$response = new Response();
		$response->setStatusCode(Response::HTTP_NOT_FOUND);

		return $this->render('Errors/404', [], $response);
	}

	/**
	 * Affichage page 503
	 */
	public function serve503()
	{
		$response = new Response();
		$response->setStatusCode(Response::HTTP_SERVICE_UNAVAILABLE);
		$response->headers->set('Retry-After', 3600);

		return $this->render('Errors/503', [], $response);
	}

	/**
	 * Remove trailing slash and redirect permanent
	 *
	 * @return \Symfony\Component\HttpFoundation\RedirectResponse
	 */
	public function removeTrailingSlash()
	{
		$pathInfo = $this->app['request']->getPathInfo();
		$requestUri = $this->app['request']->getRequestUri();

		$url = str_replace($pathInfo, rtrim($pathInfo, ' /'), $requestUri);

		return $this->redirect($url, Response::HTTP_MOVED_PERMANENTLY);
	}
}
