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
    use Gone\APIBundle\Form\ProductType;
    use Gone\APIBundle\Model\ProductInterface;

    class ProductController extends FOSRestController {
        /**
         * List all products for a given box.
         *
         * @ApiDoc(
         *   resource = true,
         *   statusCodes = {
         *     200 = "Returned when successful"
         *   }
         * )
         *
         * @Annotations\View(
         *  templateVar="products"
         * )
         *
         * @param Request               $request      the request object
         * @param int $slug id of the box
         *
         * @return array
         */
        public function getProductsAction(Request $request, $slug){
            // "get_box_products"   [GET] /box/{slug}/products

            return $this->container->get('gone_api.products.handler')->getByAttr(array('box' => $slug));


        } 

        public function getProductAction($slug, $id){
            // "get_box_product"    [GET] /box/{slug}/products/{id}

            return $this->container->get('gone_api.products.handler')->getByAttr(array('id' => $id, 'box' => $slug));

        } 

        public function putProductAction($slug, $id) {
            // "edit_box_product"   [PUT] /users/{slug}/comments/{id}/edit
            try {
                if (!($product = $this->container->get('gone_api.product.handler')->getByAttr(array('id' => $id, 'box' => $slug)))) {
                    $statusCode = Codes::HTTP_CREATED;
                    $product = $this->container->get('gone_api.product.handler')->post(
                        $request->request->all()
                    );
                } else {
                    $statusCode = Codes::HTTP_NO_CONTENT;
                    $product = $this->container->get('gone_api.product.handler')->put(
                        $product,
                        $request->request->all()
                    );
                }

                $routeOptions = array(
                    'id' => $product->getId(),
                    'slug' => $product->getBox()->getId(),
                    '_format' => $request->get('_format')
                );

                return $this->routeRedirectView('api_get_box_product', $routeOptions, $statusCode);

            } catch (InvalidFormException $exception) {

                return $exception->getForm();
            }

        } 

        public function patchProductAction(Request $request, $id){
            try {
                $product = $this->container->get('gone_api.product.handler')->patch(
                    $this->getOr404($id),
                    $request->request->all()
                );

                $routeOptions = array(
                    'id' => $product->getId(),
                    'slug' => $product->getBox()->getId(),
                    '_format' => $request->get('_format')
                );

                return $this->routeRedirectView('api_get_box_product', $routeOptions, Codes::HTTP_NO_CONTENT);

            } catch (InvalidFormException $exception) {

                return $exception->getForm();
            }
        }

        protected function getOr404($id)
        {
            if (!($product = $this->container->get('gone_api.product.handler')->get($id))) {
                throw new NotFoundHttpException(sprintf('The resource \'%s\' was not found.',$id));
            }

            return $product;
        }
    }