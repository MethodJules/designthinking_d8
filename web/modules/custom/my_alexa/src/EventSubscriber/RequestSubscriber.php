<?php

namespace Drupal\my_alexa\EventSubscriber;
use Drupal\alexa\AlexaEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class RequestSubscriber implements EventSubscriberInterface {
    /**
     * Gets the events
     */
    public static function getSubscribedEvents()
    {
	$message = 'ddhdhdhd';
	\Drupal::logger('my_alexa')->notice($message);
        $events['alexaevent.request'][] = ['onRequest', 0];
        return $events;
    }

    /**
     * Called upon a request event
     */

     public function onRequest(AlexaEvent $event) {
         $request = $event->getRequest();
         $response = $event->getResponse();
	//\Drupal::logger('my_alexa')->notice('geht in die Methode on Request');
         switch($request->intentName) {
             case 'AMAZON.HelpIntent':
                $response->respond('Du kann nach einer Methode fragen.');
                break;
             case 'Methode_abfragen':
                $response->respond('Die Methode lautet pffff.');
		\Drupal::logger('my_alexa')->notice('Alexa Aufruf');
		break;
             default:
                $response->respond('Hallo Du. Ich kann dir Methoden vorstellen.');
                \Drupal::logger('my_alexa')->notice('ddddsdssssssssss');
		break;
         }
     }
}
