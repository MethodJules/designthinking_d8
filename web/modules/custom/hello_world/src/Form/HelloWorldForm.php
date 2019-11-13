<?php

namespace Drupal\hello_world\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class HelloWorldForm extends FormBase {

    public function getFormId()
    {
        return 'create_protocol';
    }

    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $form = array();

        $form['protocol']['protocol_type'] = [
            '#type' => 'select',
            '#title' => $this->t('Art des Treffens'),
            '#options' => ['Option 1', 'Option 2'],
        ];

        $form['protocol']['meeting_location'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Ort des Treffens'),
        ];

        $form['protocol']['meeting_members'] = [
            '#type' => 'checkboxes',
            '#options' => ['User 1', 'User 2', 'User 3'],
            '#title' => $this->t('Teilnehmer des Treffens')
        ];

        $form['protocol']['starttime'] = [
            '#type' => 'datetime',
            '#title' => $this->t('Startzeit'),
        ];

        $form['protocol']['rueckblick'] = [
            '#type' => 'text_format',
            '#title' => $this->t('Rückblick'),
            '#description' => $this->t('Was wurde im letzten Treffen gemacht?'),
            '#format' => 'full_html',
        ];

        $form['protocol']['planung'] = [
            '#type' => 'text_format',
            '#title' => $this->t('Planung'),
            '#description' => $this->t('Was ist in diesem Plan geplant?'),
            '#format' => 'full_html',
        ];

        $form['protocol']['endtime'] = [
            '#type' => 'datetime',
            '#title' => $this->t('Ende des Treffens'),
        ];

        $form['protocol']['tasks'] = [
            '#type' => 'table',
            '#header' => array('Header 1', 'Header 2'),
            '#rows' => array(array('dddd','ddjdjd'), array('ccccc', 'ddddd')),
        ];

        $form['protocol']['methods'] = [
            '#type' => 'table',
            '#header' => array('Methodenname', 'Bewertung'),
            '#rows' => array(array('dddd','ddjdjd'), array('ccccc', 'ddddd')),
        ];




        return $form;


    }

    public function submitForm(array &$form, FormStateInterface $form_state)
    {

    }

    public function getTeamMembers() {

    }
}