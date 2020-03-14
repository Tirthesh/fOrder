<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HNSearchController extends AbstractController
{
    /**
     * @Route("/hnsearch", name="h_n_search")
     */
    public function index(){

		$url = "https://hn.algolia.com/api/v1/search_by_date?page=1&hitsPerPage=10";
		$response = \Httpful\Request::get($url)
			->expectsJson()
			->send();
		
		$responseArr = json_decode($response, true);
		
		return $this->render('hnsearch.html.twig', array(
			'data' => $responseArr['hits'],
		));
    }
}
