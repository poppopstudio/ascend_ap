<?php

namespace Drupal\ascend_ap\Entity\Handler;

use Drupal\views\EntityViewsData;

/**
 * Provides the Views data handler for the Resource entity.
 */
class ApViewsData extends EntityViewsData {
  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    // Fetch a computed value for the title/label/whatever.
    $data['ap']['computed_label'] = [
      'title' => $this->t('Action Plan Label'),
      'help' => $this->t('The computed label (ap:sX.cX.yX)'),
      'field' => [
        'id' => 'ap_computed_label',
      ],
    ];

    // Add the filter for "AP has category".
    $data['ap']['category']['filter'] = [
      'title' => $this->t('Action plan has category'),
      'id' => 'taxonomy_index_tid',
      'field' => 'category',
      'numeric' => TRUE,
      'allow empty' => TRUE,
    ];

    // Add the relationship for "AP has category".
    $data['ap']['category']['relationship'] = [
      'title' => $this->t('Action plan has category'),
      'help' => $this->t('Category referenced by action plan.'),
      'id' => 'standard',
      'base' => 'taxonomy_term_field_data',
      'base field' => 'tid',
      'field' => 'category',
      'label' => $this->t('Category'),
    ];

    return $data;
  }

}
