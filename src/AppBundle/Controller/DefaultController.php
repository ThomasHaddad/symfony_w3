<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Image;
use AppBundle\Form\ImageType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use abeautifulsite\SimpleImage;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/upload-image", name="uploadImage")
     */
    public function uploadImageAction(Request $request)
    {
        $image = new Image();
        $imageForm = $this->createForm(new ImageType(), $image);
        $imageForm->handleRequest($request);
        if ($imageForm->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($image);

            $em->flush();

            $this->get('image_resizer')->generateSmallerImages($image);

        }
        $params = [
            'imageForm' => $imageForm->createView()
        ];
        return $this->render('upload/upload-image.html.twig', $params);
    }

    /**
     * @Route("/images", name="showImages")
     */
    public function showImagesAction(Request $request)
    {
        $image = new Image();
        $imageForm = $this->createForm(new ImageType(), $image);
        $imageForm->handleRequest($request);
        if ($imageForm->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($image);

            $em->flush();

            $this->get('image_resizer')->generateSmallerImages($image);

        }
        $params = [
            'imageForm' => $imageForm->createView()
        ];
        return $this->render('upload/upload-image.html.twig', $params);
    }

    /**
     * @Route("/trad", name="trad")
     */
    public function tradAction(){
        return $this->render("trad/trad.html.twig");
    }
}
