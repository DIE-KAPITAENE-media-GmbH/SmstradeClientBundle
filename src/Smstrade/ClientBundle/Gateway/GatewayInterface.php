<?php

namespace Smstrade\ClientBundle\Gateway;

use Smstrade\ClientBundle\SMS\SMSInterface;

interface GatewayInterface {
    
    public function setKey($key);
    
    public function getKey();
    
    public function sendSMS(SMSInterface $sms);
    
    public function getLastResponse();
    
}
