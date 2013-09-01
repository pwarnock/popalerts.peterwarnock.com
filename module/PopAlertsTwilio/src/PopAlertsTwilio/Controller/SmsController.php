<?php

namespace PopAlertsTwilio\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Log\LoggerAwareInterface;
use Zend\Http\Response;
use Zend\Http\Header\ContentType;
use PopAlertsTwilio\Exception;
use Zend\Mvc\MvcEvent;
use PopAlertsTwilio\Event\SmsEvent;

class SmsController extends AbstractActionController 
                    implements LoggerAwareInterface
{

    use \Zend\Log\LoggerAwareTrait;

    public function onDispatch(MvcEvent $e)
    {
        $result = $this->getServiceLocator()
                       ->get('PopAlertsTwilio\AuthenticationService')
                       ->authenticate();

        if ($result->isValid()) {
            $this->getEventManager()
                 ->attach($this->serviceLocator->get('PopAlertsTwilio\OnSmsReceiveListener'));
            
            $logger = $this->logger;
            
            $this->getEventManager()->attach('*', function () use ($logger) {
                $logger->debug(func_get_args());
            });
            return parent::onDispatch($e);
        }
        
        return $result;
    }
    
    public function notifyAction()
    {
        $this->logger && $this->logger->debug('Enter ' . __METHOD__);
  
        $config = $this->getServiceLocator()->get('Config')['pop_alerts_twilio'];
        $accountParams = $config['account_params'];
        $smsNotify = $config['sms_notify'];

        try {
            $requestParams = $this->twilioRequestParams();
        } catch (Exception\InvalidArgumentException $ex) {
            $response = new Response;
            $response->setStatusCode(400);
            $response->setContent('Bad Request');
            return $response;
        }
        
        $e = new SmsEvent(SmsEvent::EVENT_SMS_RECEIVE, $requestParams);
        $e->setTwiml($this->serviceLocator->get('Services_Twilio_Twiml'));
        
        $result = $this->getEventManager()
                       ->trigger($e);
        
//        $twiml = $this->serviceLocator->get('Services_Twilio_Twiml');

//        $from = $smsNotify['From'];
//        $msg = $requestParams->Body; //@todo process Body
//
//        $toList = $this->serviceLocator->get('SmsDistributionList');
//
//        foreach ($toList as $to) {
//            $twiml->sms($msg, array(
//                'to' => trim($to),
//                'from' => $from,
//            ));
//        }
//        
//        $twiml->redirect('http://somewhere.else');
        
        $response = new Response;
        $response->getHeaders()
                 ->addHeaderLine('content-type', 'text/xml');
        $response->setContent($e->getTwiml());

        return $response;
    }

}
