<?php

namespace Smstrade\ClientBundle\SMS;

use \DateTime;

interface SMSInterface {
    
    public function setMessage($message);
    
    public function getMessage();
    
    public function setTo($number);
    
    public function getTo();
    
    public function setFrom($number);
    
    public function getFrom();
    
    public function setRoute($route);
    
    public function getRoute();
    
    public function setDebug($debug);
    
    public function isDebug();
    
    public function setGetCost($getCost);
    
    public function isGetCost();
    
    public function setMessageId($messageId);
    
    public function isMessageId();
    
    public function setGetCount($count);
    
    public function isGetCount();
    
    public function setCharset($charset);
    
    public function getCharset();
    
    public function setSendDate(DateTime $sendDate);
    
    public function getSendDate();
    
    public function getOptionalParameterArray();
    
}
