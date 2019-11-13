<?php

namespace Drupal\hello_world\Table;

class HelloWorldTable {

    public function showTasks() {
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