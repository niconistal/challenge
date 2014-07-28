<?php

namespace Gone\FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BackboneController extends Controller
{
    public function indexAction()
    {
        return $this->render('GoneFrontEndBundle:Backbone:index.html.twig');
    }
}
