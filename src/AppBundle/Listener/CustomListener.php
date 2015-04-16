<?php



namespace AppBundle\Listener;


use AppBundle\Event\customEvent;

class CustomListener
{

    function __construct()
    {
    }

    public function customHandler(customEvent $event)
    {
//        dump($event);
//        dump('customHandler called');

    }
}