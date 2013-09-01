<?php

namespace PopAlertsTwilio\Controller;

use ZfcUser\Controller\UserController as ZfcUserController;
use Zend\View\Model\ViewModel;
use Zend\Log\LoggerAwareInterface;
use Zend\Mvc\MvcEvent;

class UserController extends ZfcUserController implements LoggerAwareInterface
{

    use \Zend\Log\LoggerAwareTrait;

    public function onDispatch(MvcEvent $e)
    {
        $logger = $this->logger;

        $this->getEventManager()->attach('*', function () use ($logger) {
                    $logger->debug(func_get_args());
                });
                
        $config = $this->serviceLocator->get('Config')['pop_alerts_twilio'];

        $this->getEventManager()->attach('indexAction.post', function ($ev) use (&$config) {
                    $viewModel = $ev->getTarget();
                    $viewModel->authorize_link = $config['authorize_link'];
                    return $viewModel;
                });
        return parent::onDispatchst($e);
    }

    public function indexAction()
    {
        $viewModelOrResponse = parent::indexAction();
        if (!$viewModelOrResponse instanceof ViewModel) {
            return $viewModelOrResponse;
        }

        $this->getEventManager()->trigger(__FUNCTION__ . '.post', $viewModelOrResponse);
        return $viewModelOrResponse;
    }

}
