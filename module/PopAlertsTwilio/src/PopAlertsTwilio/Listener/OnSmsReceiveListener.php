<?php

namespace PopAlertsTwilio\Listener;

use Zend\EventManager\AbstractListenerAggregate;
use Zend\EventManager\EventManagerInterface;
use PopAlertsTwilio\Event\SmsEvent;

class OnSmsReceiveListener extends AbstractListenerAggregate
{
    
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
        $ev->getTwiml()->sms("Peace be with you.");
    }
    
}