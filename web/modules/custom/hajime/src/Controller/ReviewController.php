<?php

namespace Drupal\hajime\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Returns responses for hajime_review routes.
 */
class ReviewController extends ControllerBase {

  /**
   * Method provide dependency injection and add services.
   */
  public static function create(ContainerInterface $container) {
    $instance = parent::create($container);
    $instance->entityManager = $container->get('entity_type.manager');
    $instance->formBuild = $container->get('entity.form_builder');
    return $instance;
  }

  /**
   * Drupal services.
   *
   * @var \Drupal\Core\Entity\EntityFormBuilder
   */
  protected $formBuild;

  /**
   * Drupal services.
   *
   * @var \Drupal\Core\Entity\EntityTypeManager
   */
  protected $entityManager;

  /**
   * Method that create output of module.
   */
  public function build(): array {
    $entity = $this->entityManager
      ->getStorage('hajime_review')
      ->create();
    $form = $this->formBuild->getForm($entity, 'default');
    $storage = $this->entityManager->getStorage('hajime_review');
    $query = $storage->getQuery()
      ->sort('created', "DESC")
      ->pager(5);
    $pager = [
      '#type' => 'pager',
    ];
    $results = $query->execute();
    $reviews = $storage->loadMultiple($results);
    $build = $this->entityManager->getViewBuilder('hajime_review')->viewMultiple($reviews);
    return [
      '#theme' => 'hajime-review-page',
      '#form' => $form,
      '#reviews' => $build,
      '#pager' => $pager,
    ];
  }

}
