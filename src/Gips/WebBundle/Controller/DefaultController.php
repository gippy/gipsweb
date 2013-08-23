<?php

namespace Gips\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GipsWebBundle:Default:index.html.twig', array('name' => 'Jardo'));
    }
}
