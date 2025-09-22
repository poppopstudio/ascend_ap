<?php

namespace Drupal\ascend_ap\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;

/**
 * Checks that an AP's category + school + year combination is unique.
 *
 * @Constraint(
 *   id = "UniqueAp",
 *   label = @Translation("Unique action plan", context = "Validation"),
 *   type = "entity"
 * )
 */
class UniqueApConstraint extends Constraint {

  /**
   * The message that will be shown if the combination is not unique.
   */
  public $item_preexists = 'An action plan already exists for this combination of category, school and year.';
}
