<?php

namespace Drupal\my_chatbot\Chatbot;

class MyChatbot {
    public function talkToChatbot($message) {
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

            $responseFromChatbot = json_decode($response);

            return $responseFromChatbot;

    }
}