<?php

namespace Drupal\dependency_tree\Form;

use Drupal\Console\Extension\Extension;
use Drupal\Core\Extension\ModuleHandler;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class DependencyTreeForm.
 *
 * @package Drupal\dependency_tree\Form
 */
class DependencyTreeForm extends FormBase {

  /**
   * The module handler.
   *
   * @var \Drupal\Core\Extension\ModuleHandler
   */
  private $moduleHandler;

  /**
   * DependencyTreeForm constructor.
   * @param \Drupal\Core\Extension\ModuleHandler $module_handler
   */
  public function __construct(ModuleHandler $module_handler) {
    $this->moduleHandler = $module_handler;
  }

  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('module_handler')
    );
  }

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
      '#options' => $this->getModuleOptions(),
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

  /**
   * Gets enabled modules.
   *
   * @return array
   *   The enabled modules.
   */
  public function getModuleOptions() {
    $modules = [];
    /** @var  Extension $module*/
    foreach ($this->moduleHandler->getModuleList() as $key => $module) {
      $modules += [
        $key => $this->moduleHandler->getName($module->getName()),
      ];
    }
    return $modules;
  }

}
