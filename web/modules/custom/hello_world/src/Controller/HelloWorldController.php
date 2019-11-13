<?php

namespace Drupal\hello_world\Controller;
use Drupal\Core\Controller\ControllerBase;

/**
 * Undocumented class
 */
class HelloWorldController extends ControllerBase {
    /**
     * Undocumented function
     *
     * @return void
     */
    public function content()
    {
        return ['#markup' => 'Hello World!'];
    }

    public function generalInformation() {

        $form_class = 'Drupal\hello_world\Form\GeneralInformationForm';

        return \Drupal::formBuilder()->getForm($form_class);
    }

    public function showTasks()
    {
        $task_table = [
            '#type' => 'table',
            '#header' => ['ddd', 'fff','ddd'],
            '#rows' => [
                    ['ddd1', 'fff1','ddd1'],
                    ['ddd1', 'fff1','ddd1'],
                    ['ddd1', 'fff1','ddd1'],
            ],
        ];

        return $task_table;
    }
}