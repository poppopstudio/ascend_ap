<?php

namespace Drupal\ascend_ap\Plugin\pathauto\AliasType;

use Drupal\pathauto\Plugin\pathauto\AliasType\EntityAliasTypeBase;

/**
 * Provides an alias type for Action Plan entities.
 *
 * @AliasType(
 *   id = "ap",
 *   label = @Translation("Action plan"),
 *   types = {"ap"},
 *   provider = "ascend_ap",
 *   context_definitions = {
 *     "ap" = @ContextDefinition("entity:ap", label = @Translation("Action Plan"))
 *   }
 * )
 */
class ApAliasType extends EntityAliasTypeBase {

  /**
   * {@inheritdoc}
   */
  protected function getEntityTypeId() {
    return 'ap';
  }
}
