<?php

namespace Drupal\superdrupal\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\user\Entity\User;

/**
 * Class ProfileForm.
 *
 * @package Drupal\superdrupal\ProfileForm
 */
class ProfileForm extends FormBase
{
  const GENDER_MALE = 0;
  const GENDER_FEMALE = 1;

  /**
   * Returns a unique string identifying the form.
   *
   * @return string
   *   The unique string identifying the form.
   */
  public function getFormId() {
    return 'superdrupal_profile_form';
  }

  /**
   * Form constructor.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   *
   * @return array
   *   The form structure.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $entity = User::load($this->currentUser()->id());

    $form['full_name'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Full name'),
      '#default_value' => $entity->get('full_name')->getString(),
      '#required' => TRUE,
    );

    $form['role'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Role'),
      '#default_value' => $entity->get('role')->getString(),
    );

    $form['birth_date'] = array(
      '#type' => 'date',
      '#title' => $this->t('Date of Birth'),
      '#default_value' => $entity->get('birth_date')->getString(),
    );

    $form['sex'] = array(
      '#type' => 'select',
      '#title' => $this->t('Gender'),
      '#options' => static::genderArrayValues(),
      '#default_value' => $entity->get('sex')->getString(),
    );

    $form['note'] = array(
      '#type' => 'textarea',
      '#title' => $this->t('Notes'),
      '#default_value' => $entity->get('note')->getString(),
    );

    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Submit'),
    );

    return $form;
  }

  /**
   * Form submission handler.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $entity = User::load($this->currentUser()->id());
    $values = $form_state->getValues();

    foreach (_superdrupal_get_user_fields() as $field) {
      if (isset($values[$field])) {
        $entity->set($field, $values[$field]);
      }
    }

    $entity->save();
  }

  /**
   * Get values of gender field.
   *
   * @return array
   *   Return array of values of gender field.
   */
  public static function genderArrayValues() {
    return array(
      static::GENDER_MALE => t('Male'),
      static::GENDER_FEMALE => t('Female'),
    );
  }

}
