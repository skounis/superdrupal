<?php

namespace Drupal\superdrupal\Controller;

/**
 * Profile controller class.
 */
use Drupal\Core\Controller\ControllerBase;

/**
 * Class ProfileController.
 *
 * @package Drupal\superdrupal\Controller
 */
class ProfileController extends ControllerBase
{

  /**
   * Display profile page.
   *
   * @return array
   *   Return render array.
   */
  public function content() {
    return array(
      '#theme' => 'superdrupal_profile',
      '#profile' => _superdrupal_get_user_fields_view(),
    );
  }

}
