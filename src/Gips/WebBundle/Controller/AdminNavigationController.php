<?php

namespace Gips\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminNavigationController extends Controller {
	public function indexAction() {
	    $repository = $this->getDoctrine()
		    ->getRepository('GipsWebBundle:CVSection');

		$sections = $repository->findAll();

        return $this->render('GipsWebBundle:Admin:navigation.html.twig', array(
	        'sections' => $sections
        ));
    }
}
