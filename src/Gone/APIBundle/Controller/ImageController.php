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
    use Gone\APIBundle\Form\ImageType;
    use Gone\APIBundle\Model\ImageInterface;

    class ImageController extends FOSRestController {

        public function getImagesAction(Request $request, $slug, $slug1){
            // "api_get_box_product_images"   [GET] /box/{slug}/products/{slug1}/images.{_format}

            return $this->container->get('gone_api.images.handler')->getByAttr(array('product' => $slug1));


        }

        public function getImageAction(Request $request,$slug, $slug1, $id){
            //  "api_get_box_product_image"    [GET] /box/{slug}/products/{slug1}/images/{id}.{_format}

            return $this->container->get('gone_api.images.handler')->find($id);
        }

        public function deleteImageAction(Request $request,$slug, $slug1, $id){
            // api_delete_box_product_image   [DELETE]  /box/{slug}/products/{slug1}/images/{id}

            return $this->container->get('gone_api.images.handler')->delete($id);

        }

        public function postImageAction(Request $request, $slug, $slug1){
            // api_post_box_product_image     [POST] /box/{slug}/products/{slug1}/images.{_format}

            try {
               // Hey Page handler create a new Page.
               $product = $this->container->get('gone_api.products.handler')->get($slug1);
               $newImage = $this->container->get('gone_api.images.handler')->post(
                   $request->request->all(),
                   $product
               );

               $routeOptions = array(
                   'id' => $newImage->getId(),
                   '_format' => $request->get('_format'),
                   'slug' => $slug,
                   'slug1' => $slug1
               );

               return $this->routeRedirectView('api_get_box_product_image', $routeOptions, Codes::HTTP_OK);
            } catch (InvalidFormException $exception) {

               return $exception->getForm();
            }
        }

    }