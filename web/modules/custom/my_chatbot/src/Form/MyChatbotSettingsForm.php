<?php

namespace Drupal\my_chatbot\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class MyChatbotSettingsForm extends ConfigFormBase {
    public function getFormId()
    {
        return 'my_chatbot_admin_settings';
    }

    protected function getEditableConfigNames()
    {
        return ['my_chatbot.settings'];
    }
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $config = $this->config('my_chatbot.settings');

        $form['my_chatbot_posturl'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Rasa http Url for sending data'),
	        '#description' => $this->t('If you use Docker it will be:  rasa:5004/webhooks/rest/webhook'),
            '#default_value' => $config->get('my_chatbot_posturl'),
	        '#required' => true
        ];

        return parent::buildForm($form, $form_state);
    }

    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        $this->configFactory('my_chatbot.settings')
            ->set('my_chatbot_posturl', $form_state->getValue('my_chatbot_posturl'))
            ->save();

        parent::submitForm($form, $form_state);
    }
}