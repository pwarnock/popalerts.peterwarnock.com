<?php

namespace PopAlertsTwilio\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\TableGateway\TableGateway;

class SmsDistributionTableGatewayFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $adapter = $serviceLocator->get('PopAlertsDbAdapterFactory');
        return new TableGateway('sms_distribution', $adapter);
    }
}
