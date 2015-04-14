<?php



namespace AppBundle\Listener;


class CustomListener
{

    function __construct()
    {
    }

    public function customHandler($event)
    {
        dump($event);
        dump('customHandler called');

    }
}