<?php

namespace Drupal\ascend_ap\Hook;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Hook\Attribute\Hook;
use Drupal\Core\Render\BubbleableMetadata;
use Drupal\Core\Session\AccountInterface;

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

  // /**
  //  * Implements hook_token_info().
  //  */
  // #[Hook('token_info')]
  // public function tokenInfo() {
  //   $types['ap'] = [
  //     'name' => t('Action plan'),
  //     'description' => t('Tokens for action plans.'),
  //   ];

  //   $tokens['school_year'] = [
  //     'name' => t('School Year (YY)'),
  //     'description' => t('Current school year in YY format (e.g. 24).'),
  //   ];

  //   return [
  //     'types' => $types,
  //     'tokens' => ['ap' => $tokens],
  //   ];
  // }

  // /**
  //  * Implements hook_tokens().
  //  */
  // public function tokens($type, $tokens, array $data, array $options, BubbleableMetadata $bubbleable_metadata) {
  //   $replacements = [];

  //   if ($type == 'ap') {
  //     $year = 25;

  //     foreach ($tokens as $name => $original) {
  //       switch ($name) {
  //         case 'school_year':
  //           $replacements[$original] = $year;
  //           break;
  //       }
  //     }
  //   }

  //   return $replacements;
  // }

}
