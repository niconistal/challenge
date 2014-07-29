<?php

    namespace Gone\APIBundle\Controller;

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

    use FOS\RestBundle\Controller\FOSRestController;
    use FOS\RestBundle\Util\Codes;
    use FOS\RestBundle\Controller\Annotations;
    use FOS\RestBundle\View\View;
    use FOS\RestBundle\Request\ParamFetcherInterface;

    use Symfony\Component\Form\FormTypeInterface;
    use Nelmio\ApiDocBundle\Annotation\ApiDoc;

    use Gone\APIBundle\Exception\InvalidFormException;
    use Gone\APIBundle\Form\BoxType;
    use Gone\APIBundle\Model\BoxInterface;

    class BoxController extends FOSRestController{
        
    }