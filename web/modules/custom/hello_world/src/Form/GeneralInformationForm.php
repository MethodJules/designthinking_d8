<?php

namespace Drupal\hello_world\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class GeneralInformationForm extends FormBase {

    public function getFormId()
    {
        return 'gerneral_information_form';
    }

    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $form['general_information'] = array();

        $form['general_information']['protocol_type'] = [
            '#type' => 'select',
            '#title' => $this->t('Art des Treffens'),
            '#options' => ['Option 1', 'Option 2'],
        ];

        $form['general_information']['meeting_location'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Ort des Treffens'),
        ];

        $form['general_information']['meeting_members'] = [
            '#type' => 'checkboxes',
            '#options' => ['User 1', 'User 2', 'User 3'],
            '#title' => $this->t('Teilnehmer des Treffens')
        ];

        $form['general_information']['starttime'] = [
            '#type' => 'datetime',
            '#title' => $this->t('Startzeit'),
        ];

        $form['general_information']['rueckblick'] = [
            '#type' => 'text_format',
            '#title' => $this->t('Rückblick'),
            '#description' => $this->t('Was wurde im letzten Treffen gemacht?'),
            '#format' => 'full_html',
        ];

        $form['general_information']['planung'] = [
            '#type' => 'text_format',
            '#title' => $this->t('Planung'),
            '#description' => $this->t('Was ist in diesem Plan geplant?'),
            '#format' => 'full_html',
        ];

        $form['general_information']['endtime'] = [
            '#type' => 'datetime',
            '#title' => $this->t('Ende des Treffens'),
        ];

        return $form;

    }

    public function submitForm(array &$form, FormStateInterface $form_state)
    {

    }
}