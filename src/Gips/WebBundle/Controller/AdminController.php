<?php

namespace Gips\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function indexAction()
    {
        return $this->render('GipsWebBundle:Admin:index.html.twig');
    }
}
