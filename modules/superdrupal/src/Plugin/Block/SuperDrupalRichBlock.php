<?php

namespace Drupal\superdrupal\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'SuperDrupalReach' Block.
 *
 * @Block(
 *   id = "superdrupalreach",
 *   admin_label = @Translation("SuperDrupalReach block"),
 * )
 */
class SuperDrupalRichBlock extends BlockBase implements BlockPluginInterface {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $config = $this->getConfiguration();
    $variables = '';

    if (!empty($config['name'])) {
      $variables['name'] = $config['name'];
    }
    else {
      $variables['name'] = $this->t('to no one');
    }

    if (!empty($variables)) {
      $block = [
        '#theme' => 'superdrupalreach',
        '#data' => $variables,
      ];
    }

    return $block;
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);

    $config = $this->getConfiguration();

    $form['superdrupalreach_block'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Who'),
      '#description' => $this->t('Who do you want to say hello to?'),
      '#default_value' => isset($config['name']) ? $config['name'] : '',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['name'] = $form_state->getValue('superdrupalreach_block');
  }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    $default_config = \Drupal::config('superdrupalreach.settings');
    return [
      'name' => $default_config->get('superdrupalreach.name'),
    ];
  }

}
