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

        } 

        public function deleteProductAction($slug, $id){
            // "delete_box_product" [DELETE] /box/{slug}/products/{id}

        } 

        public function newProductAction($slug){

        } // "new_box_comments"   [GET] /users/{slug}/comments/new

        public function editCommentAction($slug, $id)
        {} // "edit_user_comment"   [GET] /users/{slug}/comments/{id}/edit

        public function removeCommentAction($slug, $id)
        {} // "remove_user_comment" [GET] /users/{slug}/comments/{id}/remove
    }