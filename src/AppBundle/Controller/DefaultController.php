<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Image;
use AppBundle\Form\ImageType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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
    public function uploadImageAction(Request $request){
        $image = new Image();
        $imageForm = $this->createForm( new ImageType(), $image);
        $imageForm->handleRequest($request);
        if($imageForm->isValid()){
            dump($image);

            $em=$this->getDoctrine()->getManager();
            $em->persist($image);

            $em->flush();
        }
        $params = [
          'imageForm'=>$imageForm->createView()
        ];
        return $this->render('upload/upload-image.html.twig',$params);
    }
}
