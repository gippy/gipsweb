<?php

namespace Gips\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminNavigationController extends Controller {
	public function indexAction() {
	    $repository = $this->getDoctrine()
		    ->getRepository('GipsWebBundle:Language');

		$czechSections = $repository->findOneById('cs')->getSections();
		$englishSections = $repository->findOneById('en')->getSections();

        return $this->render('GipsWebBundle:Admin:navigation.html.twig', array(
	        'czechSections' => $czechSections,
	        'englishSections' => $englishSections,
        ));
    }
}
