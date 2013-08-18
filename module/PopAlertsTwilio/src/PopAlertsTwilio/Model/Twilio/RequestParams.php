<?php

namespace PopAlertsTwilio\Model\Twilio;

/**
 * Description of RequestParams
 *
 * @author peter
 */
final class RequestParams
{
    public $SmsSid = ''; //A 34 character unique identifier for the message. May be used to later retrieve this message from the REST API.
    public $AccountSid = ''; //The 34 character id of the Account this message is associated with.
    public $From = ''; //The phone number that sent this message.
    public $To = ''; //The phone number of the recipient.
    public $Body = ''; //The text body of the SMS message. Up to 160 characters long.

    //optional
    public $FromCity; //The city of the sender
    public $FromState; //The state or province of the sender.
    public $FromZip; //The postal code of the called sender.
    public $FromCountry; //The country of the called sender.
    public $ToCity; //The city of the recipient.
    public $ToState; //The state or province of the recipient.
    public $ToZip; //The postal code of the recipient.
    public $ToCountry; //The country of the recipient.
}
