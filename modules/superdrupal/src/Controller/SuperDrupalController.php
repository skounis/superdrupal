<?php

namespace Drupal\superdrupal\Controller;

use Drupal\Core\Controller\ControllerBase;

class SuperDrupalController extends ControllerBase {

  public function content() {
    return array(
      '#type' => 'markup',
      '#markup' => $this->t('So Long, and Thanks for All the Fish!'),
    );
  }

}
