<?php

namespace Drupal\design_thinking\Form;

use Drupal\Core\Form\FormBase;

class DesignThinkingMethodExecutionForm extends FormBase {

    public function getFormId()
    {
        return 'design_thinking_method_execution';
    }

    public function buildForm(array $form, \Drupal\Core\Form\FormStateInterface $form_state)
    {
        $form = array();

        $form['method_execution']['room'] = [
            '#type' => 'select',
            '#title' => $this->t('Raum'),
            '#description' => $this->t('Bitte wählen Sie einen passenden Raum'),
            '#options' => [
                'Vorbereitung',
                'Problemraum',
                'Lösungsraum',
                'Implementierungsraum',
            ]
        ];

        $form['method_execution']['phase'] = [
            '#type' => 'select',
            '#title' => $this->t('Phase'),
            '#description' => $this->t('Bitte wählen Sei eine passende Phase'),
            '#options' => ['divergent', 'konvergent'],
        ];

        $form['method_execution']['methods'] = [
            '#type' => 'markup',
            '#markup' => '<p>Hier stehen die Methoden aus der Auswahl</p>',
        ];

        $form['method_execution']['file'] = [
            '#type' =>'managed_file',
            '#title' => 'File',
            '#multiple' => TRUE,
            '#upload_location' => 'public//file',
            '#upload_validators' => [
                'file_validate_extensions' => ['pdf'],
              ],
            '#default_value' => array(2)
            ];




        return $form;

    }

    public function submitForm(array &$form, \Drupal\Core\Form\FormStateInterface $form_state)
    {

    }
}