<?php

namespace Smstrade\ClientBundle\SMS;

use \DateTime;

class SMS implements SMSInterface {
    
    protected $message = null;
    
    protected $to = null;
    
    protected $from = null;
    
    protected $route = "basic";
    
    protected $debug = false;
    
    protected $getCost = false;
    
    protected $messageId = false;
    
    protected $getCount = false;
    
    protected $charset = null;
    
    protected $sendDate = null;

    /**
     * @return string
     */
    public function getMessage() {
        return $this->message;
    }
    
    public function setMessage($message) {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getTo() {
        return $this->to;
    }

    public function setTo($to) {
        $this->to = $to;
    }

    /**
     * @return string
     */
    public function getRoute() {
        return $this->route;
    }

    public function setRoute($route) {
        $this->route = $route;
    }

    /**
     * @return bool
     */
    public function isDebug() {
        return $this->debug;
    }

    public function setDebug($debug) {
        $this->debug = $debug;
    }

    /**
     * @return bool
     */
    public function isGetCost() {
        return $this->getCost;
    }

    public function setGetCost($getCost) {
        $this->getCost = $getCost;
    }

    /**
     * @return bool
     */
    public function isMessageId() {
        return $this->messageId;
    }

    public function setMessageId($messageId) {
        $this->messageId = $messageId;
    }

    /**
     * @return bool
     */
    public function isGetCount() {
        return $this->getCount;
    }

    public function setGetCount($getCount) {
        $this->getCount = $getCount;
    }

    /**
     * @return string
     */
    public function getCharset() {
        return $this->charset;
    }

    public function setCharset($charset) {
        $this->charset = $charset;
    }

    /**
     * @return \DateTime
     */
    public function getSendDate() {
        return $this->sendDate;
    }

    public function setSendDate(DateTime $sendDate) {
        $this->sendDate = $sendDate;
    }

    /**
     * @return string
     */
    public function getFrom() {
        return $this->from;
    }

    public function setFrom($from) {
        $this->from = $from;
    }
    
    /**
     * @return array
     */
    public function getOptionalParameterArray() {
        $parameter = array();
        
        if($this->isDebug()) {
            $parameter["debug"] = "1";
        }
        
        if($this->isGetCost()) {
            $parameter["cost"] = "1";
        }
        
        if($this->isMessageId()) {
            $parameter["message_id"] = "1";
        }
        
        if($this->isGetCount()) {
            $parameter["count"] = "1";
        }
        
        if($this->getCharset()) {
            $parameter["charset"] = $this->getCharset();
        }
        
        if($this->getSendDate()) {
            $datetime = $this->getSendDate();
            $parameter["sendtime"] = $datetime->getTimestamp();
        }
        
        return $parameter;
    }
    
}
