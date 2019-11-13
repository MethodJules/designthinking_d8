<?php

namespace Drupal\design_thinking\Form;

use Drupal\Core\Form\FormBase;
use Drupal\design_thinking\Helper;
use Drupal\design_thinking\Helper\DesignThinkingHelper;

class DesignThinkingCreateProtocolForm extends FormBase {

    public function getFormId()
    {
        return 'design_thinking_create_protocol_form';
    }

    public function buildForm(array $form, \Drupal\Core\Form\FormStateInterface $form_state)
    {
        $form = array();
        $helper = new DesignThinkingHelper();
        $uid = \Drupal::currentUser()->id();
        $form['protocol']['protocol_type'] = [
            '#type' => 'select',
            '#title' => $this->t('Art des Treffens'),
            '#options' => ['Gruppenintern', 'Gesamter Kurs', 'Präsentation'],
        ];

        $form['protocol']['meeting_location'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Ort des Treffens'),
        ];

        $form['protocol']['meeting_members'] = [
            '#type' => 'checkboxes',
            '#options' => $helper->getTeammembers($uid), //uid ist der Key in dem Array
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

        $form['protocol']['tasktable'] = [
            '#type' => 'fieldset',
            '#title' => $this->t('Überischt über Aufgaben aus dem letzen Treffen'),
            '#description' => $this->t('In dieser Tabelle werden alle Aufgaben angezeigt,
                die innerhalb des letzten Gruppentreffens angelegt wurden.'),
        ];

        $form['protocol']['tasktable_lastmeeting']['tasks'] = [
            '#type' => 'table',
            '#header' => array('Kurzbezeichnung', 'zugehöriger Benutzer (Wer?)', 'Aufgabe (Was?)', 'Deadline (Wann?)', 'Status', 'Aktionen'),
            '#rows' => array(array('dddd','ddjdjd'), array('ccccc', 'ddddd')),
        ];



        $form['protocol']['tasktable_opentasks'] = [
            '#type' => 'fieldset',
            '#title' => $this->t('Überischt über alle noch offenen Aufgaben'),
            '#description' => $this->t('In dieser Tabelle werden alle Aufgaben angezeigt,
            die bis zu diesem Zeitpunkt noch nicht erledigt wurden.'),
        ];

        $form['protocol']['tasktable_opentasks']['tasks'] = [
            '#type' => 'table',
            '#header' => array('Kurzbezeichnung', 'zugehöriger Benutzer (Wer?)', 'Aufgabe (Was?)', 'Deadline (Wann?)', 'Status', 'Aktionen'),
            '#rows' => array(array('dddd','ddjdjd'), array('ccccc', 'ddddd')),
        ];

        $form['protocol']['methods'] = [
            '#type' => 'table',
            '#header' => array('Methodenname', 'Bewertung'),
            '#rows' => array(array('dddd','ddjdjd'), array('ccccc', 'ddddd')),
        ];

        return $form;

    }

    public function submitForm(array &$form, \Drupal\Core\Form\FormStateInterface $form_state)
    {

    }


}