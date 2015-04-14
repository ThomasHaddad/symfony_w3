<?php



namespace AppBundle\Listener;


use AppBundle\Entity\Visit;

class TestListener
{
    protected $doctrine;
    function __construct($doctrine)
    {
        $this->doctrine=$doctrine;
    }

    public function yo($e)
    {

        if(!($e->isMasterRequest())){
            return false;
        }
        $request=$e->getRequest();

        $newVisit=new Visit();
        $newVisit->setDate(new \DateTime('now'));
        $newVisit->setIp($request->getClientIp());
        $newVisit->setUrl($request->getUri());

        $em=$this->doctrine->getManager();
        $em->persist($newVisit);
        $em->flush();
//        dump('yo called');
    }
}