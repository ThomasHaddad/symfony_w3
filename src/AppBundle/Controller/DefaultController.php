<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Image;
use AppBundle\Form\ImageType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
    public function uploadImageAction(){
        $image = new Image();
        $imageForm = $this->createForm( new ImageType(), $image);
        $params = [
          'imageForm'=>$imageForm->createView()
        ];
        return $this->render('upload/upload-image.html.twig',$params);
    }
}
