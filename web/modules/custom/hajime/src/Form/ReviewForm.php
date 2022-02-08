<?php

namespace Drupal\hajime\Form;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\RedirectCommand;
use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Language\Language;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Form controller for the hajime_review entity edit forms.
 *
 * @ingroup hajime
 */
class ReviewForm extends ContentEntityForm {

  /**
   * Dependency Injection.
   */
  public static function create(ContainerInterface $container): ReviewForm {
    $instanse = parent::create($container);
    $instanse->messenger = $container->get('messenger');
    return $instanse;
  }

  /**
   * {@inheritdoc}
   *
   * Building form for reviews.
   */
  public function buildForm(array $form, FormStateInterface $form_state): array {
    /** @var \Drupal\hajime\Entity\HajimeReview $entity */
    $form = parent::buildForm($form, $form_state);
    $entity = $this->entity;
    $form['#attached'] = ['library' => ['hajime/hajime_library']];
    $form['#prefix'] = '<div id="form_wrapper"';
    $form['#suffix'] = '</div>';
    $form['langcode'] = [
      '#title' => $this->t('Language'),
      '#type' => 'language_select',
      '#default_value' => $entity->getUntranslated()->language()->getId(),
      '#languages' => Language::STATE_ALL,
    ];
    $form['actions']['submit']['#ajax'] = [
      'callback' => '::setMessage',
      'wrapper' => 'form_wrapper',
    ];
    return $form;
  }

  /**
   * Ajax submitting.
   */
  public function setMessage(array $form, FormStateInterface $form_state) {
    $response = new AjaxResponse();
    if (!$form_state->hasAnyErrors()) {
      $this->messenger()->addStatus(t('Review added!'));
      $url = URL::fromRoute('hajime.front.page');
      $stringUrl = $url->toString();
      $command = new RedirectCommand($stringUrl);
      $response->addCommand($command);
      $entity = $this->getEntity();
      $entity->save();
      return $response;
    }
    return $form;
  }

}
