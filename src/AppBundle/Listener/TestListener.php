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

        $request=$e->getRequest();

        $newVisit=new Visit();
        $newVisit->setDate(new \DateTime('now'));
        $newVisit->setIp($request->getClientIp());
        $newVisit->setUrl($request->getUri());

        if(!$e->isMasterRequest() || strstr($newVisit->getUrl(),"_wdt") !== false || strstr($newVisit->getUrl(),"_wdt") !== false){
            return;
        }

        $em=$this->doctrine->getManager();
        $em->persist($newVisit);
        $em->flush();
//        dump('yo called');
    }
}