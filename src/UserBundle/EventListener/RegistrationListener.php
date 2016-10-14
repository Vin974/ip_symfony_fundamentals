<?php
/**
 * Created by PhpStorm.
 * User: vin
 * Date: 14/10/2016
 * Time: 15:29
 */

namespace UserBundle\EventListener;


use FOS\UserBundle\Event\FormEvent;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class RegistrationListener
{
    /**
     * @var UrlGeneratorInterface
     */
    private $router;


    /**
     * RegistrationListener constructor.
     * @param UrlGeneratorInterface $router
     */
    public function __construct(UrlGeneratorInterface $router)
    {
        $this->router = $router;
    }

    public function onRegistrationSuccess(FormEvent $event)
    {
        $event->setResponse(
            new RedirectResponse($this->router->generate('homepage'))
        );
    }
}