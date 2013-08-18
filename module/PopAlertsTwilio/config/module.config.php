<?php

return array(
    'router' => array(
        'routes' => array(
            'notify' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/notify',
                    'defaults' => array(
                        '__NAMESPACE__' => 'PopAlertsTwilio\Controller',
                        'controller' => 'Sms',
                        'action' => 'notify',
                    ),
                ),
                'may_terminate' => true,
            ),
        ),
    ),
    'service_manager' => array(
        'factories' => array(
          'SmsDistributionList' => 'PopAlertsTwilio\Service\SmsDistributionListFactory',  
        ),
        'abstract_factories' => array(
            'Zend\Form\FormAbstractServiceFactory'
        ),
        'aliases' => array(
        ),
        'invokables' => array(
            'Services_Twilio_Twiml' => 'Services_Twilio_Twiml',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type' => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern' => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'PopAlertsTwilio\Controller\Sms' => 'PopAlertsTwilio\Controller\SmsController',
        ),
    ),
    'controller_plugins' => array(
        'invokables' => array(
            'TwilioRequestParams' => 'PopAlertsTwilio\Controller\Plugin\TwilioRequestParams',
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'pop-alerts-twilio/index/index' => __DIR__ . '/../view/pop-alerts-twilio/index/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
    'pop_alerts_twilio' => array(
        'account_params' => array(
            'AccountSid' => '', //Represents the unique id of the Account.
            'AuthToken' => '{{ auth_token }}',
        ),
        'sms_notify' => array(
            'From' => '', //A Twilio number enabled for SMS. Only phone numbers purchased from Twilio work here; you cannot (for example) spoof SMS messages from your own cell phone number. 
            'path' => 'data/pop-alerts/lists/sms_notify.txt.dist',
        ),
        'path_sms_notify'
    ),
    'forms' => include __DIR__ . '/forms.php',
);
