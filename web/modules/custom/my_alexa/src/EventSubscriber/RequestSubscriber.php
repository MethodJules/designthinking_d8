<?php

namespace \Drupal\my_alexa\EventSubscriber;
use Drupal\alexa\AlexaEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class RequestSubscriber implements EventSubscriberInterface {
    /**
     * Gets the events
     */
    public static function getSubscribedEvents()
    {
        $events['alexaevent.request'][] = ['onRequest', 0];
        return $events;
    }

    /**
     * Called upon a request event
     */

     public function onRequest(AlexaEvent $event) {
         $request = $event->getRequest();
         $response = $event->getResponse();

         switch($request->intentName) {
             case 'AMAZON.HelpIntent':
                $response->respond('Du kann nach einer Methode fragen.');
                break;
             case 'Methode_abfragen':
                $response->respond('Die Methode lautet pffff.');
             default:
                $response->respond('Hallo Du. Ich kann dir Methoden vorstellen.');
                break;
         }
     }
}