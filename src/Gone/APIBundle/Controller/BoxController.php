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

	    /**
		 * Create a Box from the submitted data.
		 *
		 * @ApiDoc(
		 *   resource = true,
		 *   description = "Creates a new box from the submitted data.",
		 *   input = "Gone\APIBundle\Form\BoxType",
		 *   statusCodes = {
		 *     200 = "Returned when successful",
		 *     400 = "Returned when the form has errors"
		 *   }
		 * )
		 *
		 * @Annotations\View(
		 *  template = "GoneAPIBundle:Box:newBox.html.twig",
		 *  statusCode = Codes::HTTP_BAD_REQUEST,
		 *  templateVar = "form"
		 * )
		 *
		 * @param Request $request the request object
		 *
		 * @return FormTypeInterface|View
		 */
		public function postBoxAction(Request $request)
		{
		   try {
		       // Hey Page handler create a new Page.
		       $newBox = $this->container->get('gone_api.box.handler')->post(
		           $request->request->all()
		       );

		       $routeOptions = array(
		           'id' => $newBox->getId(),
		           '_format' => $request->get('_format')
		       );

		       return $this->routeRedirectView('api_get_box', $routeOptions, Codes::HTTP_CREATED);
		   } catch (InvalidFormException $exception) {

		       return $exception->getForm();
		   }
		}
		/**
		 * Presents the form to use to create a new box.
		 *
		 * @ApiDoc(
		 *   resource = true,
		 *   statusCodes = {
		 *     200 = "Returned when successful"
		 *   }
		 * )
		 *
		 * @Annotations\View()
		 *
		 * @return FormTypeInterface
		 */
		public function newBoxAction()
		{
		    return $this->createForm(new BoxType());
		}
	}