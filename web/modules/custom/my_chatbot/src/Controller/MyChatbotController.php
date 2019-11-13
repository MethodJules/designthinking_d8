<?php

namespace Drupal\my_chatbot\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\my_chatbot\Chatbot\MyChatbot;

use function GuzzleHttp\json_encode;

class MyChatbotController extends ControllerBase {

    public function content() {
        return ['#markup' => 'chatbot'];
    }

    public function talktochatbot() {
        //$client = \Drupal::httpClient();
        $post = json_encode(['sender' => 'Julien', 'message' => 'Hi']);
        $url = 'rasa:5005/webhooks/rest/webhook';
        $curlwaittime = 25;

        //$request = $client->post($uri, ['json' => [$json_data]]);
        //$response = json_decode($request->getBody());

        //Create curl post
        $ch = curl_init();
		    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
			curl_setopt($ch, CURLOPT_URL, $url);

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			# Return response instead of printing.
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,$curlwaittime);
			curl_setopt($ch, CURLOPT_TIMEOUT, $curlwaittime);
			# Send request.
			$response = curl_exec($ch);
			$err = curl_error($ch);
            curl_close($ch);

            dsm(json_decode($response));

        return ['#markup' => '<p>dhdhdhd</p>'];

    }

    public function chat() {
        $myChatbot = new MyChatbot();
        $reponseFromChatbot = $myChatbot->talkToChatbot('Hi!');

        foreach($reponseFromChatbot as $item) {
            $list[] = $item->text;
        }
        return [
            '#theme' => 'item_list',
            '#list_type' => 'ul',
            '#items' => $list,
            '#attributes' => ['class' => 'chat_message_list'],
        ];
    }




}