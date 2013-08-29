<?php

namespace PopAlertsTwilio\Event;

use Zend\EventManager\Event;
use Services_Twilio_Twiml;

class SmsEvent extends Event
{
    const EVENT_SMS_RECEIVE = 'sms.receive';

    private $twiml;
    
    public function getTwiml()
    {
        return $this->twiml;
    }

    public function setTwiml(Services_Twilio_Twiml $twiml)
    {
        $this->twiml = $twiml;
        return $this;
    }

}
