<?php

namespace PopAlertsTwilio\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use PopAlertsTwilio\Model\SmsDistributionList;
use SplFileObject;

class SmsDistributionListFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config')['pop_alerts_twilio'];
        $path = $config['sms_notify']['path'];
        
        $list = self::fromTextFile($path);
        
        return $list;
    }
    
    public static function fromTextFile($path)
    {
        $fo = new SplFileObject($path);
        
        $list = new SmsDistributionList;
        $list->setIterator($fo);
        
        return $list;
    }
}