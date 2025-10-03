<?php

/**
 * @file
 * Provide token hooks for ap.
 */

use Drupal\ascend_ap\Hook\ApHooks;
use Drupal\Core\Hook\LegacyHook;
use Drupal\Core\Render\BubbleableMetadata;

/**
 * Legacy hook implementation.
 *
 * @todo Remove this method when support for Drupal core < 11.1 is dropped.
 */
#[LegacyHook]
function ascend_ap_tokens($type, $tokens, array $data, array $options, BubbleableMetadata $bubbleable_metadata) {
  \Drupal::service(ApHooks::class)->tokens($type, $tokens, $data, $options, $bubbleable_metadata);
}

/**
 * Legacy hook implementation.
 *
 * @todo Remove this method when support for Drupal core < 11.1 is dropped.
 */
#[LegacyHook]
function ascend_ap_token_info() {
  \Drupal::service(ApHooks::class)->tokenInfo();
}
