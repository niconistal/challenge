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

		/**
	     * Get single Box.
	     *
	     * @ApiDoc(
	     *   resource = true,
	     *   description = "Gets a Box for a given id",
	     *   output = "Gone\APIBundle\Entity\Box",
	     *   statusCodes = {
	     *     200 = "Returned when successful",
	     *     404 = "Returned when the box is not found"
	     *   }
	     * )
	     *
	     * @Annotations\View(templateVar="box")
	     *
	     * @param int     $id      the box id
	     *
	     * @return array
	     *
	     * @throws NotFoundHttpException when box not exist
	     */
	    public function getBoxAction($id)
	    {
	        $box = $this->getOr404($id);

	        return $box;
	    }

		/**
	     * Fetch a Box or throw an 404 Exception.
	     *
	     * @param mixed $id
	     *
	     * @return BoxInterface
	     *
	     * @throws NotFoundHttpException
	     */
	    protected function getOr404($id)
	    {
	        if (!($box = $this->container->get('gone_api.box.handler')->get($id))) {
	            throw new NotFoundHttpException(sprintf('The resource \'%s\' was not found.',$id));
	        }

	        return $box;
	    }
	}