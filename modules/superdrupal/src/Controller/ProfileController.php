<?php

namespace Drupal\superdrupal\Controller;

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
    return array(
      '#theme' => 'superdrupal_' . $this->getThemeName(),
      '#profile' => $this->getTemplateData(),
    );
  }

  /**
   * Return template theme data.
   *
   * @return mixed
   *   Can be single variable, array of collection.
   */
  public function getTemplateData()
  {
    return _superdrupal_get_user_fields_view();
  }

  /**
   * Return theme name.
   *
   * @return string
   *   Theme name.
   */
  public function getThemeName() {
    return 'profile';
  }
}
