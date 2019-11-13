<?php

namespace Drupal\hello_world\Form;

use Drupal\Core\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class TasksForm extends FormBase {

    public function getFormId()
    {
        return 'tasks_form';
    }

    public function buildForm(array $form, \Drupal\Core\Form\FormStateInterface $form_state)
    {
        $form['tasks']['table'] = [
            '#type' => 'table',
            '#header' => array('Header 1', 'Header 2'),
            '#rows' => array(array('dddd','ddjdjd'), array('ccccc', 'ddddd')),
        ];

        $form['tasks']['new_task'] = [
            '#type' => 'fieldset',
            '#title' => $this->t('Neue Aufgabe'),
        ];

        $form['tasks']['new_task']['description'] = [
            '#type' => 'text_format',
            '#title' => $this->t('Aufgabenbeschreibung'),
            '#format' => 'full_html',
        ];

        return $form;
    }

    public function submitForm(array $form, \Drupal\Core\Form\FormStateInterface $form_state)
    {

    }
}