<?php

namespace Drupal\Tests\dependency_tree\Kernel;

use Drupal\Core\Form\FormState;
use Drupal\dependency_tree\Form\DependencyTreeForm;
use Drupal\KernelTests\KernelTestBase;

/**
 * Dependency tree test.
 */
class KernelTest extends KernelTestBase {

  /**
   * Enable the required modules.
   *
   * @var array
   */
  public static $modules = [
    'dependency_tree',
    'system',
  ];

  /**
   * The form object.
   *
   * @var \Drupal\dependency_tree\Form\DependencyTreeForm
   */
  private $form;

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();
    $this->form = DependencyTreeForm::create(\Drupal::getContainer());
  }

  public function testFormId() {
    static::assertEquals('dependency_tree_form', $this->form->getFormId());
  }

  public function testFormFields() {
    $form_build = \Drupal::formBuilder()->getForm('\Drupal\dependency_tree\Form\DependencyTreeForm');
    $expectation = [
      'select_module' => [
        '#type' => 'select',
        //'#title' => t('Select module'),
      ],
      'submit' => [
        '#type' => 'submit'
      ],
    ];
    static::assertArraySubset($expectation, $form_build);
  }

  public function testModuleSelectionField() {
    $form_build = \Drupal::formBuilder()->getForm('\Drupal\dependency_tree\Form\DependencyTreeForm');
    $expectation = [
      'select_module' => [
        '#options' => [
          'dependency_tree' => 'Dependency tree',
          'system' => 'System',
        ],
      ],
    ];
    static::assertArraySubset($expectation, $form_build);
  }

  public function testFormSelectModuleOptions() {
    $expected = [
      'dependency_tree' => 'Dependency tree',
      'system' => 'System',
    ];
    $modules = $this->form->getModuleOptions();
    static::assertEquals($expected, $modules);
  }

}
