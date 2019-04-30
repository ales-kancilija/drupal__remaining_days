<?php

namespace Drupal\remaining_days\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'RemainingDays' Block
 *
 * @Block(
 *   id = "remaining_days_block",
 *   admin_label = @Translation("Remaining Days block"),
 * )
 */
class RemainingDaysBlock extends BlockBase {

    public function build() {
        // get current node
        $node = \Drupal::routeMatch()->getParameter('node');

        // get our service
        $service = \Drupal::service('remaining_days');

        // get the text to display
        $text = $service->getMessage($node->field_event_date->value);

        return array(
            '#markup' => $text,
            '#cache' => array( // Set block to non caching value
                'max-age' => 0,
            ),
        );
    }

}