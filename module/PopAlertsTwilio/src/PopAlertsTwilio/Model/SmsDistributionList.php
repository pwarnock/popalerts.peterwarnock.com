<?php

namespace PopAlertsTwilio\Model;

use IteratorAggregate;
use IteratorIterator;
use Traversable;

class SmsDistributionList implements IteratorAggregate
{

    private $adapter;

    public function getIterator()
    {
        $iterator = new IteratorIterator($this->adapter);
        //@todo throw exception if adapter not set
        return $iterator;
    }
    
    /**
     * 
     * @param \Iterator $it
     * @return \PopAlertsTwilio\Model\SmsDistributionList
     */
    public function setIterator(Traversable $adapter)
    {
        $this->adapter = $adapter;
        return $this;
    }
}