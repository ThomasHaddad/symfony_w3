<?php



namespace AppBundle\Event;


use Symfony\Component\EventDispatcher\Event;

class customEvent extends Event{

    private $message;

    function __construct($message)
    {
        $this->message=$message;
    }

}