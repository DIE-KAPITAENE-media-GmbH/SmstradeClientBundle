<?php

namespace Smstrade\ClientBundle\Response;

use Smstrade\ClientBundle\Exception\ApiException;

class Response implements ResponseInterface {

    protected $responseCode;

    protected $messageId;

    protected $cost;

    protected $count;

    public function __construct($httpBody) {
        $this->parseHttpBody($httpBody);
    }

    protected function parseHttpBody($httpBody) {

        if( !$httpBody ) {
            throw new ApiException("Smstrade Api not available");
        }

        $response = explode("\n", $httpBody);

        if( isset($response[0]) ) {
            $this->responseCode = intval($response[0]);
        }

        if( isset($response[1]) ) {
            $this->messageId = intval($response[1]);
        }

        if( isset($response[2]) ) {
            $this->cost = floatval($response[2]);
        }

        if( isset($response[3]) ) {
            $this->count = intval($response[3]);
        }
    }

    public function check() {
        if( !$this->getResponseCode() != "100" ) {
            throw new ApiException("sending failed", $this->getResponseCode());
        }
        return true;
    }

    /**
     * gibt den responsecode zurück
     *
     * @return int
     */
    public function getResponseCode() {
        return (int)$this->responseCode;
    }

    /**
     * gibt die message id zurück
     *
     * @return int
     */
    public function getMessageId() {
        return (int)$this->messageId;
    }

    /**
     * gibt die kosten zurück
     *
     * @return float
     */
    public function getCost() {
        return (float)$this->cost;
    }

    /**
     * gibt die anzahl der sms
     *
     * @return int
     */
    public function getCount() {
        return (int)$this->count;
    }

}
