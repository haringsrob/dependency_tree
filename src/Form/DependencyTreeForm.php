<?php

namespace Drupal\dependency_tree\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class DependencyTreeForm.
 *
 * @package Drupal\dependency_tree\Form
 */
class DependencyTreeForm extends FormBase {


  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'dependency_tree_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['select_module'] = [
      '#type' => 'select',
      '#title' => $this->t('Select module'),
      '#options' => array('None' => $this->t('None')),
      '#size' => 1,
    ];

    $form['submit'] = [
        '#type' => 'submit',
        '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  /**
    * {@inheritdoc}
    */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Display result.
    foreach ($form_state->getValues() as $key => $value) {
        drupal_set_message($key . ': ' . $value);
    }

  }

}
