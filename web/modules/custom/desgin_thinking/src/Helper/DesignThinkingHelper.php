<?php

namespace Drupal\design_thinking\Helper;

class DesignThinkingHelper {
    public function getTeammembers($uid) {
        $query = \Drupal::entityQuery('node')
            ->condition('type', 'projektgruppe')
            ->condition('field_teammitglieder', $uid);
        $nids = $query->execute();

        //ksm($nids);


        $node_storage = \Drupal::entityTypeManager()->getStorage('node');
        $nodes = $node_storage->loadMultiple($nids);
        foreach($nodes as $node) {
            foreach($node->field_teammitglieder as $reference) {
                $uid = $reference->target_id;
                $account = \Drupal\user\Entity\User::load($uid);
                $userName = $account->getUsername();
                $teammmembers[$uid] = $userName;
            }
        }

        return $teammmembers;
    }

    public function getMeetingTypes(){
        $query = \Drupal::entityQuery('taxonomy_term');
        $query->condition('vid', "tags");
        $tids = $query->execute();
        $terms = \Drupal\taxonomy\Entity\Term::loadMultiple($tids);
    }
}