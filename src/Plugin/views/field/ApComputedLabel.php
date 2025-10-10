<?php

namespace Drupal\ascend_ap\Plugin\views\field;

use Drupal\views\Plugin\views\field\FieldPluginBase;
use Drupal\views\ResultRow;

/**
 * Field handler for computed Action Plan label.
 *
 * @ViewsField("ap_computed_label")
 */
class ApComputedLabel extends FieldPluginBase {

  /**
   * {@inheritdoc}
   */
  public function query() {
    // No query needed since we compute on the fly.
  }

  /**
   * {@inheritdoc}
   */
  public function render(ResultRow $values) {
    $entity = $this->getEntity($values);
    return ['#markup' => $entity->label()];
  }
}
