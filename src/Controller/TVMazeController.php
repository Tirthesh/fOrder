<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TVMazeController extends AbstractController
{
    /**
     * @Route("/tvmaze", name="tvmaze")
     */
    public function index(){

		$url = "http://api.tvmaze.com/schedule/?country=US&date=".date('Y-m-d');
		$response = \Httpful\Request::get($url)
			->expectsJson()
			->send();
		
		$responseArr = json_decode($response, true, 512);
		
		return $this->render('tvmaze.html.twig', array(
			'data' => $responseArr,
		));
    }
	
	/**
	* @Route("/tvmaze/showMeta/{id}", name="tvmaze_show_meta")
	*/
	
	public function showMeta($id){
		$url = "http://api.tvmaze.com/shows/".$id;
		$response = \Httpful\Request::get($url)
			->expectsJson()
			->send();
		
		$responseArr = json_decode($response, true, 512);
		
		return $this->render('tvmazeShow.html.twig', array(
			'data' => $responseArr,
		));
	}
}
