<?php

namespace Drupal\ascend_ap\Plugin\views_add_button;

use Drupal\Core\Url;
use Drupal\views_add_button\Plugin\views_add_button\ViewsAddButtonDefault;

/**
 * @ViewsAddButton(
 *   id = "ascend_ap_ap",
 *   label = @Translation("Action plan"),
 *   category = @Translation("Views add button: Add AP"),
 * )
 */
class ViewsAddButtonAp extends ViewsAddButtonDefault {

  /**
   * {@inheritdoc}
   */
  public function description() {
    return $this->t('Views Add Button URL Generator for AP items');
  }

  /**
   * {@inheritdoc}
   */
  public static function generateUrl($entity_type, $bundle, array $options, $context = '') {

    if (\Drupal::service('current_user')->hasPermission('use ap.default form mode')) {
      $route_name = 'entity.ap.add_form';
    }
    else {
      $route_name = 'entity.ap.add_form.auditor';
    }

    return Url::fromRoute($route_name, [], $options);
  }
}
