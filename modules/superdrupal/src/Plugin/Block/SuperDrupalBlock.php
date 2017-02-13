<?php

namespace Drupal\superdrupal\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'SuperDrupal' Block.
 *
 * @Block(
 *   id = "superdrupal",
 *   admin_label = @Translation("SuperDrupal block"),
 * )
 */
class SuperDrupalBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return array(
      '#markup' => $this->t('Hello, Foundation!'),
    );
  }

}
