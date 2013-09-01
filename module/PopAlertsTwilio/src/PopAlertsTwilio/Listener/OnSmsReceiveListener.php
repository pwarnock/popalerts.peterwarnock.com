<?php

namespace PopAlertsTwilio\Listener;

use Zend\EventManager\AbstractListenerAggregate;
use Zend\EventManager\EventManagerInterface;
use PopAlertsTwilio\Event\SmsEvent;
use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Db\Adapter\Exception\InvalidQueryException;

class OnSmsReceiveListener extends AbstractListenerAggregate
{
    private $smsDistributionTable;
    
    public function setSmsDistributionTable(TableGatewayInterface $smsDistributionTable)
    {
        $this->smsDistributionTable = $smsDistributionTable;
        return $this;
    }
    
    public function attach(EventManagerInterface $events, $priority = 1) 
    {
        $this->listeners[] = $events->attach(SmsEvent::EVENT_SMS_RECEIVE, array($this, 'onSubscribe'), $priority);
        $this->listeners[] = $events->attach(SmsEvent::EVENT_SMS_RECEIVE, array($this, 'onUnSubscribe'), $priority);
        $this->listeners[] = $events->attach(SmsEvent::EVENT_SMS_RECEIVE, array($this, 'onWhitelist'), $priority);
        
    }
    
    public function onSubscribe($ev)
    {
        $requestParams = $ev->getTarget();    
        
        if (!preg_match('/START|YES/i', $requestParams->Body)) {
            return;
        }
                
        //sign user up
               
        try {    
            $this->smsDistributionTable->insert([
                'phone' => $requestParams->From,
            ]);
        } catch (InvalidQueryException $ex) {
            //@todo log exception
        }
   
        return $ev;
    }
    
    public function onUnsubscribe($ev)
    {
        $requestParams = $ev->getTarget();    
        
        if (!preg_match('/UNSUBSCRIBE|CANCEL|QUIT/i', $requestParams->Body)) {
            return;
        }
        
        //suppress user
        return $ev;
    }
    
    public function onWhitelist($ev)
    {   
        $requestParams = $ev->getTarget();    
        
        $ev->getTwiml()->sms("Thanks for signing up for POP Alerts! "
                           . "We'll send you an alert as soon as this service is ready. "
                           . "Regular text messaging rates apply. "
                           . "Peace be with you.");
    }
    
}