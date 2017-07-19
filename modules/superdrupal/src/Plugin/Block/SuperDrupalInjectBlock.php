<?php

namespace Drupal\superdrupal\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'SuperDrupalInject' Block.
 *
 * @Block(
 *   id = "superdrupalinject",
 *   admin_label = @Translation("SuperDrupalInject block"),
 * )
 */
class SuperDrupalInjectBlock extends BlockBase implements BlockPluginInterface {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $config = $this->getConfiguration();
    $variables = '';

    $variables['css'] = $config['css'] ? $config['css'] : '';
    $variables['js'] = $config['js'] ? $config['js'] : '';
    $variables['description'] = $config['description'] ? $config['description'] : '';

    if (!empty($variables)) {
      $block = [
        '#theme' => 'superdrupalinject',
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

    $form['superdrupalinject_css'] = [
      '#type' => 'textfield',
      '#title' => $this->t('CSS URL'),
      '#description' => $this->t('Enter the CSS URL'),
      '#default_value' => isset($config['css']) ? $config['css'] : '',
    ];

    $form['superdrupalinject_js'] = [
      '#type' => 'textfield',
      '#title' => $this->t('JS URL'),
      '#description' => $this->t('Enter the JS URL'),
      '#default_value' => isset($config['js']) ? $config['js'] : '',
    ];

    $form['superdrupalinject_description'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Description'),
      '#description' => $this->t('Enter the description here'),
      '#default_value' => isset($config['description']) ? $config['description'] : '',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['css'] = $form_state->getValue('superdrupalinject_css');
    $this->configuration['js'] = $form_state->getValue('superdrupalinject_js');
    $this->configuration['description'] = $form_state->getValue('superdrupalinject_description');
  }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    $default_config = \Drupal::config('superdrupalinject.settings');
    return [
      'css' => $default_config->get('superdrupalinject.css'),
      'js' => $default_config->get('superdrupalinject.js'),
      'description' => $default_config->get('superdrupalinject.description'),
    ];
  }
}
