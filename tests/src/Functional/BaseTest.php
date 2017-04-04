<?php

namespace Drupal\Tests\dependency_tree\Functional;

use Drupal\Tests\BrowserTestBase;

/**
 * Tests dependency tree settings page.
 */
class BaseTest extends BrowserTestBase {

  /**
   * Modules to enable.
   *
   * @var array
   */
  public static $modules = [
    'dependency_tree',
  ];

  /**
   * A test user with administrative privileges.
   *
   * @var \Drupal\user\UserInterface
   */
  protected $adminUser;

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();
  }

}
