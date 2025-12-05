<?php

namespace Drupal\ascend_ap\Hook;

use Drupal\Core\Entity\Entity\EntityViewDisplay;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Hook\Attribute\Hook;

/**
 * Contains hook implementations for the Ascend AP module.
 */
class ApHooks {

  /**
   * Implements hook_form_alter().
   */
  #[Hook('form_alter')]
  public function formAlter(&$form, FormStateInterface $form_state, $form_id) {
    return;
  }


  /**
   * Implements hook_entity_view_alter().
   */
  #[Hook('entity_view_alter')]
  function entityViewAlter(array &$build, EntityInterface $entity, EntityViewDisplay $display) {
    // Check if we're in an entity_print context
    if (\Drupal::routeMatch()->getRouteName() == 'entity_print.view') {
      // Remove comment field from the build array
      if (isset($build['ascend_ap_comments'])) {
        unset($build['ascend_ap_comments']);
      }
    }
  }
}
