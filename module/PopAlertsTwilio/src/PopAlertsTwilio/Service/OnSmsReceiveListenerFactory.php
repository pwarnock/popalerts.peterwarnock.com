<?php

namespace PopAlertsTwilio\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use PopAlertsTwilio\Listener\OnSmsReceiveListener;

class OnSmsReceiveListenerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $listener = new OnSmsReceiveListener();
        $listener->setSmsDistributionTable($serviceLocator->get('PopAlertsTwilio\SmsDistributionTableGateway'));
        return $listener;
    }
}