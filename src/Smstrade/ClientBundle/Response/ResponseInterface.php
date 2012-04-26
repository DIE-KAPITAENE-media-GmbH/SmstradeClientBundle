<?php

namespace Smstrade\ClientBundle\Response;

interface ResponseInterface {
    
    public function __construct($httpBody);
    
    public function getResponseCode();
    
    public function getMessageId();
    
    public function getCost();
    
    public function getCount();
    
}
