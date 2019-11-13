<?php

namespace Drupal\my_chatbot\Form;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;
use Drupal\Core\Form\FormBase;
use Drupal\my_chatbot\Chatbot\MyChatbot;



class MyChatbotChatForm extends FormBase {

    public function getFormId()
    {
        return 'my_chabot_chat_form';
    }

    public function buildForm(array $form, \Drupal\Core\Form\FormStateInterface $form_state)
    {
        $form = array();

        $form['message'] = [
            '#type' => 'markup',
            '#markup' => '<div id="chatbot_message"></div>',
        ];

        $form['input'] = [
            '#type' => 'textfield',
            '#title' => 'Enter your text',
        ];

        $form['actions'] = [
            '#type' => 'button',
            '#value' => 'SUbmit',
            '#ajax' => [
                'callback' => '::setMessage',
            ],
        ];

        return $form;


    }

    public function setMessage(array $form, \Drupal\Core\Form\FormStateInterface $form_state) {
        //Talk with chatbot
        $myChatbot = new MyChatbot();
        $message = $form_state->getValue('input');
        $reponseFromChatbot = $myChatbot->talkToChatbot($message);

        $markup = '<ul>';
        $markup .= '<li>' . $message . '<li>';
        foreach($reponseFromChatbot as $item) {
            $markup .= '<li>' . $item->text . '</li>';
        }

        $markup .= '</ul>';


        //dsm(\Drupal::service('renderer')->renderElement($list_array));



        $response = new AjaxResponse();
        $response->addCommand(
            new HtmlCommand(
                '#chatbot_message', '<div>' . $markup . '</div>'
                )
            );

        return $response;
    }

    public function submitForm(array &$form, \Drupal\Core\Form\FormStateInterface $form_state)
    {

    }
}