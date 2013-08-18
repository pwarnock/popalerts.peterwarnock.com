<?php

namespace PopAlertsTwilio\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Input;
use PopAlertsTwilio\Exception;

/**
 * Description of TwilioRequestParams
 *
 * @author peter
 */
class TwilioRequestParams extends AbstractPlugin
{

    public function __invoke()
    {
        return $this->getRequestParams();
    }

    public function getRequestParams()
    {
        $controller = $this->getController();
                
        $params = $controller->getRequest()
                             ->getQuery();
        
        $serviceLocator = $controller->getServiceLocator();

        $form = $serviceLocator->get('TwilioRequestParamsForm');
        $form->setData($params);
                
        if (!$form->isValid()) {
            throw new Exception\InvalidArgumentException('Bad Request', 400);
        }

        //bound object
        return $form->getData();
    }

}
