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

    // Add the filter for "AP has category".
    $data['ap']['category']['group'] = $this->t('Action plan');
    $data['ap']['category']['title'] = $this->t('Action plan has category');
    $data['ap']['category']['help'] = $this->t('Action plan has the selected category terms.');

    $data['ap']['category']['filter'] = [
      'title' => $this->t('AP has category'),
      'id' => 'taxonomy_index_tid',
      'field' => 'category',
      'numeric' => TRUE,
      'allow empty' => TRUE,
    ];

    // Add the relationship for "Audit has category".
    $data['ap']['category']['relationship'] = [
      'title' => $this->t('Action plan has category'), // is this right??
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
