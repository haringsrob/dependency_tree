<?php

namespace Drupal\Tests\dependency_tree\Kernel;

use Drupal\KernelTests\Core\Entity\EntityKernelTestBase;

/**
 * Dependency tree test.
 */
class KernelTest extends EntityKernelTestBase {

  /**
   * Enable the required modules.
   *
   * @var array
   */
  public static $modules = [
    'dependency_tree',
  ];

}
