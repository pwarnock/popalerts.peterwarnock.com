<?php

namespace PopAlertsTwilio\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Authentication\Adapter\Http;
use Zend\Authentication\Adapter\Http\FileResolver;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Storage\NonPersistent;

class AuthenticationServiceFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config')['pop_alerts_twilio'];
        $adapter = new Http($config['http_config']);
        $adapter->setRequest($serviceLocator->get('request'));
        $adapter->setResponse($serviceLocator->get('response'));
        $adapter->setDigestResolver(new FileResolver($config['passwd-digest']));
        $service = new AuthenticationService(new NonPersistent(), $adapter);
        return $service;
    }

}