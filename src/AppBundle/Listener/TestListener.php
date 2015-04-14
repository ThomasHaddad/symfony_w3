<?php



namespace AppBundle\Listener;


class TestListener
{

    function __construct()
    {
    }

    public function yo($e)
    {
        dump($e->getResponse());
//        dump(get_class($e));
//        dump(get_class_methods($e));
        dump('yo called');
    }
}