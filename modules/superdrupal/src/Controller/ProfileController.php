<?php

namespace Drupal\superdrupal\Controller;

use Drupal\user\Entity\User;
use Drupal;

/**
 * Class ProfileController.
 *
 * @package Drupal\superdrupal\Controller
 */
class ProfileController extends SuperDrupalControllerBase
{
  /**
   * Return theme array.
   *
   * @return array
   *   Return renderable page array.
   */
  public function getThemeArray() {
    /** @var User $user */
    $user = User::load(Drupal::currentUser()->id());
    $render = Drupal::service('entity_type.manager')->getViewBuilder($user->getEntityTypeId())->view($user, 'profile');

    $render['#theme'] = 'superdrupal_profile';

    return $render;
  }

}
