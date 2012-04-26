<?php

namespace Smstrade\ClientBundle\Gateway;

use Smstrade\ClientBundle\Exception\SMSException;
use Smstrade\ClientBundle\Response\Response;
use Smstrade\ClientBundle\SMS\SMSInterface;

class HttpGateway implements GatewayInterface {

    protected $key;

    public $gatewayUrl = "http://gateway.smstrade.de";

    protected $lastResponse;

    public function __construct($key) {
        $this->setKey($key);
    }

    public function setKey($key) {
        $this->key = $key;
    }

    public function getKey() {
        return $this->key;
    }

    protected function validateSMS(SMSInterface $sms) {
        if( !$sms->getMessage() ) {
            throw new SMSException("missing message");
        }
        if( !$sms->getTo() ) {
            throw new SMSException("missing to");
        }
        if( !$sms->getRoute() ) {
            throw new SMSException("missing route");
        }
    }

    public function sendSMS(SMSInterface $sms) {
        $parameter = array( "key" => $this->key, 
                            "message" => $sms->getMessage(), 
                            "to" => $sms->getTo(),
                            "route" => $sms->getRoute(), );

        if( in_array($sms->getRoute(), array( "direct", "gold" )) ) {
            if( $sms->getFrom() ) {
                $parameter["from"] = $sms->getFrom();
            }
        }

        $optionalParameter = $sms->getOptionalParameterArray();
        $parameter = array_merge($parameter, $optionalParameter);

        $urlParameter = http_build_query($parameter);
        $url = $this->gatewayUrl . "?" . $urlParameter;

        $responseText = $this->doRequest($url);

        $response = new Response($responseText);
        return $response;
    }

    public function getLastResponse() {
        return $this->lastResponse;
    }

    protected function doRequest($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}
