<?php

namespace Smstrade\ClientBundle\Response;

use \SMSTrade\ClientBundle\Exception\ApiException;

class ResponseCodes {


    const NO_GATEWAY_CONNECTION = 0;
    const RECIVER_INCORRECT = 10;
    const LOGIN_ERROR = 50;
    const DELIVERY_OK = 100;

/*
        $response_code_arr[0] = "Keine Verbindung zum Gateway";
        $response_code_arr[10] = "Empfänger fehlerhaft";
        $response_code_arr[20] = "Absenderkennung zu lang";
        $response_code_arr[30] = "Nachrichtentext zu lang";
        $response_code_arr[31] = "Messagetyp nicht korrekt";
        $response_code_arr[40] = "Falscher SMS-Typ";
        $response_code_arr[50] = "Fehler bei Login";
        $response_code_arr[60] = "Guthaben zu gering";
        $response_code_arr[70] = "Netz wird von Route nicht unterstützt";
        $response_code_arr[71] = "Feature nicht über diese Route möglich";
        $response_code_arr[80] = "SMS konnte nicht versendet werden";
        $response_code_arr[90] = "Versand nicht möglich";
        $response_code_arr[100] = "SMS wurde erfolgreich versendet.";

        echo $response_code_arr[$response_code]; // Ausgabe Fehler oder Erfolg
*/

}
