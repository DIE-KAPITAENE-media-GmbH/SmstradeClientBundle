<?php

namespace Smstrade\ClientBundle\Sender;

use Smstrade\ClientBundle\SMS\SMS;
use Smstrade\ClientBundle\Gateway\GatewayInterface;
use Smstrade\ClientBundle\SMS\SMSInterface;

class Sender {

    protected $gateway;

    public function __construct(GatewayInterface $gateway) {
        $this->gateway = $gateway;
    }

    public function sendSMS(SMSInterface $sms) {
        return $this->gateway->sendSMS($sms);
    }

    public function createSMS() {
        return new SMS();
    }

    public function validateNumber($handynr, $ausgabe_format = 0) {

        if( preg_match('/^(?P<country>\+49)(?P<nr>[0-9]+)$/', $handynr, $regs) ) {
            // SUCCESS
        } else if( preg_match('/^(?P<country>0049)(?P<nr>[0-9]+)$/', $handynr, $regs) ) {
            // SUCCESS
        } else if( preg_match('/^(?P<country>49)(?P<nr>[0-9]+)$/', $handynr, $regs) ) {
            // SUCCESS
        } else if( preg_match('/^0(?P<nr>[1-9]{1}[0-9]+)$/', $handynr, $regs) ) {
            // SUCCESS
        } else if( preg_match('/^(?P<nr>[1-9]{1}[0-9]+)$/', $handynr, $regs) ) {
            // SUCCESS
        } else {
            // ERROR !!!
            return false;
        }
        ;

        if( strlen($regs["nr"]) < 10 OR strlen($regs["nr"]) > 11 ) {
            return false;
        }

        if( $regs ) {
            if( preg_match('/^(?P<provider>151|1511|160|170|171|175|152|1520|162|172|173|174|157|163|177|178|159|176|179)(?P<nr>[0-9]+)/', $regs['nr']) ) {
                switch( $ausgabe_format ) {
                    default:
                        return ($handynr);
                        break;
                    case 1:
                        return ('+49' . $regs['nr']);
                        break;
                    case 2:
                        return ('0049' . $regs['nr']);
                        break;
                    case 3:
                        return ('0' . $regs['nr']);
                        break;
                    case 4:
                        return ($regs['nr']);
                        break;
                    case 5:
                        return ('49' . $regs['nr']);
                        break;
                }
            }
        }
    }

}
