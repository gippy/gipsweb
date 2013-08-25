<?php

namespace Gips\WebBundle\Controller;

use Gips\WebBundle\Entity\Language;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class DefaultController extends Controller
{
	/**
	 * @ParamConverter("language", class="GipsWebBundle:Language")
	 */
    public function indexAction(Language $language)
    {
	    $sections = $language->getSections();
        return $this->render('GipsWebBundle:Default:index.html.twig', array(
	        'sections' => $sections
        ));
    }
}
