<?php

namespace Drupal\ascend_ap\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides the default form handler for the Audit entity.
 */
class ApForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {

    $form = parent::form($form, $form_state);
    /** @var \Drupal\ascend_ap\Entity\Ap $ap */
    $ap = $this->entity;

    if ($this->operation == 'edit') {
      $form['#title'] = $this->t('<em>Edit @type</em> @title', [
        '@type' => 'ap',
        '@title' => $ap->label(),
      ]);
    }

    // Emulates entity info behaviour similar to nodes (guess where it's from).
    $form['meta'] = [
      '#type' => 'details',
      '#group' => 'advanced',
      '#weight' => -100,
      '#title' => $this->t('Status'),
      '#attributes' => ['class' => ['entity-meta__header']],
      '#tree' => TRUE,
      '#access' => $this->currentUser()->hasPermission('update any ap'),
    ];
    $form['meta']['published'] = [
      '#type' => 'item',
      '#markup' => $ap->isPublished() ? $this->t('Published') : $this->t('Not published'),
      // This line seems redundant but the above line doesn't work anyway? Only shows published for either.
      '#access' => !$ap->isNew(),
      '#wrapper_attributes' => ['class' => ['entity-meta__title']],
    ];
    $form['meta']['changed'] = [
      '#type' => 'item',
      '#title' => $this->t('Last saved'),
      // '#markup' => !$ap->isNew() ? $this->dateFormatter->format($ap->getChangedTime(), 'short') : $this->t('Not saved yet'),
      '#markup' => !$ap->isNew() ? \Drupal::service('date.formatter')->format($ap->getChangedTime(), 'short') : $this->t('Not saved yet'),
      '#wrapper_attributes' => ['class' => ['entity-meta__last-saved']],
    ];
    $form['meta']['author'] = [
      '#type' => 'item',
      '#title' => $this->t('Author'),
      '#markup' => $ap->getOwner()->getAccountName(),
      '#wrapper_attributes' => ['class' => ['entity-meta__author']],
    ];

    // Get the category from the ap entity.
    $details_category = $ap->get('category')->target_id;

    // IMPORTANT: if not set, all ensuing views are redundant.
    if (!isset($details_category)) {
      return $form;
    }

    // Add historic action plans here

    // Add the historic APs view into the sidebar.
    // $form['ap_historic'] = [
    //   '#type' => 'details',
    //   '#group' => 'advanced',
    //   '#weight' => -5,
    //   '#title' => $this->t("Historic action plans"),
    //   '#open' => TRUE,
    // ];
    // $form['audit_historic']['details'] = [
    //   '#type' => 'container',
    //   'view' => views_embed_view('ap_historic', 'embed_1', $details_category),
    //   '#wrapper_attributes' => ['class' => ['entity-meta__title']],
    // ];


    // Check the resource kit is installed - does this need DI?
    if (\Drupal::service('module_handler')->moduleExists('ascend_resource')) {

      // Add the related category info to the sidebar.
      $category_term = \Drupal::entityTypeManager()
        ->getStorage('taxonomy_term')
        ->load($details_category);

      $category_info = $category_term->get('ascend_info')->value ?? NULL;

      $form['audit_cat_info'] = [
        '#type' => 'details',
        '#group' => 'advanced',
        '#weight' => -15,
        '#title' => $this->t('Category info'),
        '#open' => TRUE,
      ];
      $form['audit_cat_info']['details'] = [
        '#type' => 'item',
        '#markup' => $category_info ?? $this->t('No information currently stored for this category.'),
        '#attributes' => ['class' => ['entity-meta__title']],
      ];
    }

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $saved = parent::save($form, $form_state);
    $form_state->setRedirectUrl($this->entity->toUrl('canonical'));

    return $saved;
  }

}
