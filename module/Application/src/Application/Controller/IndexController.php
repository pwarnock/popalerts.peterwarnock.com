<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Log\LoggerAwareInterface;

class IndexController extends AbstractActionController implements LoggerAwareInterface
{
    use \Zend\Log\LoggerAwareTrait;

    public function indexAction()
    {
        $this->logger && $this->logger->debug('Enter ' . __METHOD__);     
        return new ViewModel();
    }
}
