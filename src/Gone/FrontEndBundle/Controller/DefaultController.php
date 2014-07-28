<?php

namespace Gone\FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GoneFrontEndBundle:Default:index.html.php');
    }
}
