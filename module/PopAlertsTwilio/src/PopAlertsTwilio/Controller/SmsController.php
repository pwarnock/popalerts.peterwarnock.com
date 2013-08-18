<?php

namespace PopAlertsTwilio\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Log\LoggerAwareInterface;
use Zend\Http\Response;
use Zend\Http\Header\ContentType;
use PopAlertsTwilio\Exception;

class SmsController extends AbstractActionController implements LoggerAwareInterface
{

    use \Zend\Log\LoggerAwareTrait;

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
            
        $twiml = $this->serviceLocator->get('Services_Twilio_Twiml');

        $from = $smsNotify['From'];
        $msg = $requestParams->Body; //@todo process Body
        
        $toList = $this->serviceLocator->get('SmsDistributionList');
        
        foreach ($toList as $to) {
            $twiml->sms($msg, array(
                'to' => trim($to),
                'from' => $from,
            ));
        }
                
//        $twiml->redirect('http://somewhere.else');

        $response = new Response;
        $response->getHeaders()->addHeader(new ContentType('text/xml'));
        $response->setContent($twiml);

        return $response;
    }

}
