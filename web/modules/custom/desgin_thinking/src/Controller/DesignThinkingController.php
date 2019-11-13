<?php

namespace Drupal\design_thinking\Controller;

use Drupal\Component\Render\FormattableMarkup;
use Drupal\Core\Controller\ControllerBase;
use Drupal\design_thinking\Helper;
use Drupal\design_thinking\Helper\DesignThinkingHelper;

class DesignThinkingController extends ControllerBase {

    public function showProtocol() {

        $header = ['Nr.', 'Datum', 'Methoden', 'Fazit', 'Raum', 'Phase'];
        $rows = [
            ['1','Heute', 'Walt-Disyney', 'Kein Fazit', 'Problemraum', 'divergent']
        ];

        $table = [
            '#type' => 'table',
            '#header' => $header,
            '#rows' => $rows,
        ];

        return $table;


    }

    public function showMethods() {
        $header = ['Nr.', 'Datum', 'Methodenname', 'Raum', 'Phase', 'Bewertung'];
        $rows = [
            ['1','Heute', 'Walt-Disyney', 'Problemraum', 'divergent', 2]
        ];

        $table = [
            '#type' => 'table',
            '#header' => $header,
            '#rows' => $rows,
        ];

        return $table;
    }

    public function showProjects() {
        $header = ['Projektname', 'Gruppe', 'Mitglieder', 'T-Shape'];
        $rows = [
            ['Projekt XYZ','Die Fantastischen Vier', 'Susanne, Erik, Walter', 'Bild vom T-Shape'],
        ];

        $table = [
            '#type' => 'table',
            '#header' => $header,
            '#rows' => $rows,
        ];

        return $table;
    }

    public function showTeammembers() {
        //Hole die aktuelle User ID
        $uid = \Drupal::currentUser()->id();

        $helper = new DesignThinkingHelper();
        $teammmembers = $helper->getTeammembers($uid);

        $list = [
            '#theme' => 'item_list',
            '#list_type' => 'ul',
            '#title' => $this->t('Meine Teammitglieder'),
            '#items' => $teammmembers,
        ];

        return $list;

    }

    public function showGraphic() {
        global $base_url;
        $data = [
                'nodes' => [
                        [
                            'x' => 245,
                            'y' => 240,
                            'fixed' => TRUE,
                            'color' => 'red',
                        ],
                        [
                            'x' => 285,
                            'y' => 240,
                            'fixed' => TRUE,
                            'color' => 'red',
                        ],
                        [
                            'x' => 325,
                            'y' => 240,
                            'fixed' => TRUE,
                            'color' => 'yellow',
                        ]
                ],
                'links' => [
                    [
                    'source' => 0,
                    'target' => 1
                    ],
                    [
                    'source' => 1,
                    'target' => 2
                    ],
                ],
        ];



        $render_html = ['#markup' => '<div id="dt_graphic"></div>'];
        $render_html['#attached']['library'][] = 'design_thinking/designthinking_protocol_overview';
        $render_html['#attached']['drupalSettings']['baseUrl'] = $base_url;
        $render_html['#attached']['drupalSettings']['data'] = $data;

        return $render_html;



    }
}