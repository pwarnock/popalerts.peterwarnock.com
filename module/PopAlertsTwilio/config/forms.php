<?php

return [
    'TwilioRequestParamsForm' => [
        'object' => 'PopAlertsTwilio\Model\Twilio\RequestParams',
        'elements' => [
            [ 'spec' => [
                    'name' => 'SmsSid',
                ],
            ],
            [ 'spec' => [
                    'name' => 'AccountSid', //The 34 character id of the Account this message is associated with.
//                    'options' => null,
//                    'attributes' => null,
                ],
            ],
            [ 'spec' => [
                    'name' => 'From',
                ],
            ],
            [ 'spec' => [
                    'name' => 'Body',
                ],
            ],            
            [ 'spec' => [
                    'name' => 'To',
                ],
            ],
            [ 'spec' => [
                    'name' => 'FromCity',
                ],
            ],
            [ 'spec' => [
                    'name' => 'FromState',
                ],
            ],
            [ 'spec' => [
                    'name' => 'FromZip',
                ],
            ],
            [ 'spec' => [
                    'name' => 'FromCountry',
                ],
            ],
            [ 'spec' => [
                    'name' => 'ToCity',
                ],
            ],
            [ 'spec' => [
                    'name' => 'ToState',
                ],
            ],
            [ 'spec' => [
                    'name' => 'ToZip',
                ],
            ],
            [ 'spec' => [
                    'name' => 'ToCountry',
                ],
            ],
        ],
        'hydrator' => 'Reflection',
        'input_filter' => [
//    'type' => 'Zend\InputFilter\InputFilter',
//{{key}} => InputSpecification
            'SmsSid' => [//A 34 character unique identifier for the message. May be used to later retrieve this message from the REST API.
//        'type' => 'Zend\InputFilter\Input'
                'name' => '',
                'required' => true,
                'allow_empty' => false,
                'continue_if_empty' => true,
//        'error_message' => '',
//        'fallback_value' => '',
                'filters' => [],
                'validators' => [],
            ],
            'AccountSid' => [//The 34 character id of the Account this message is associated with.
//        'type' => 'Zend\InputFilter\Input'
                'name' => '',
                'required' => true,
                'allow_empty' => false,
                'continue_if_empty' => true,
//        'error_message' => '',
//        'fallback_value' => '',
                'filters' => [],
                'validators' => [],
            ],
            'From' => [//The phone number that sent this message.
//        'type' => 'Zend\InputFilter\Input'
                'name' => '',
                'required' => true,
                'allow_empty' => false,
                'continue_if_empty' => true,
//        'error_message' => '',
//        'fallback_value' => '',
                'filters' => [],
                'validators' => [],
            ],
            'To' => [//The phone number of the recipient.
//        'type' => 'Zend\InputFilter\Input'
                'name' => '',
                'required' => true,
                'allow_empty' => false,
                'continue_if_empty' => true,
//        'error_message' => '',
//        'fallback_value' => '',
                'filters' => [],
                'validators' => [],
            ],
            'Body' => [//The text body of the SMS message. Up to 160 characters long.
//        'type' => 'Zend\InputFilter\Input'
                'name' => '',
                'required' => true,
                'allow_empty' => false,
                'continue_if_empty' => true,
//        'error_message' => '',
//        'fallback_value' => '',
                'filters' => [],
                'validators' => [],
            ],
            //optional
            'FromCity' => [//The city of the sender
//        'type' => 'Zend\InputFilter\Input'
                'name' => '',
                'required' => false,
                'allow_empty' => true,
                'continue_if_empty' => true,
//        'error_message' => '',
//        'fallback_value' => '',
                'filters' => [],
                'validators' => [],
            ],
            'FromState' => [//The state or province of the sender.
//        'type' => 'Zend\InputFilter\Input'
                'name' => '',
                'required' => false,
                'allow_empty' => true,
                'continue_if_empty' => true,
//        'error_message' => '',
//        'fallback_value' => '',
                'filters' => [],
                'validators' => [],
            ],
            'FromZip' => [//The postal code of the called sender.
//        'type' => 'Zend\InputFilter\Input'
                'name' => '',
                'required' => false,
                'allow_empty' => true,
                'continue_if_empty' => true,
//        'error_message' => '',
//        'fallback_value' => '',
                'filters' => [],
                'validators' => [],
            ],
            'FromCountry' => [//The country of the called sender.
//        'type' => 'Zend\InputFilter\Input'
                'name' => '',
                'required' => false,
                'allow_empty' => true,
                'continue_if_empty' => true,
//        'error_message' => '',
//        'fallback_value' => '',
                'filters' => [],
                'validators' => [],
            ],
            'ToCity' => [//The city of the recipient.
//        'type' => 'Zend\InputFilter\Input'
                'name' => '',
                'required' => false,
                'allow_empty' => true,
                'continue_if_empty' => true,
//        'error_message' => '',
//        'fallback_value' => '',
                'filters' => [],
                'validators' => [],
            ],
            'ToState' => [//The state or province of the recipient.
//        'type' => 'Zend\InputFilter\Input'
                'name' => '',
                'required' => false,
                'allow_empty' => true,
                'continue_if_empty' => true,
//        'error_message' => '',
//        'fallback_value' => '',
                'filters' => [],
                'validators' => [],
            ],
            'ToZip' => [//The postal code of the recipient.
//        'type' => 'Zend\InputFilter\Input'
                'name' => '',
                'required' => false,
                'allow_empty' => true,
                'continue_if_empty' => true,
//        'error_message' => '',
//        'fallback_value' => '',
                'filters' => [],
                'validators' => [],
            ],
            'ToCountry' => [//The country of the recipient.'
//        'type' => 'Zend\InputFilter\Input'
                'name' => '',
                'required' => false,
                'allow_empty' => true,
                'continue_if_empty' => true,
//        'error_message' => '',
//        'fallback_value' => '',
                'filters' => [],
                'validators' => [],
            ],
        ],
    ],
];