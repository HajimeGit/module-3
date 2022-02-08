<?php

namespace Drupal\hajime;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Link;
use Drupal\Core\Url;

/**
 * Provides a list controller for hajime_review entity.
 *
 * @ingroup hajime
 */
class ReviewsListBuilder extends EntityListBuilder {

  /**
   * {@inheritdoc}
   *
   * We override ::render() so that we can add our own content above the table.
   * parent::render() is where EntityListBuilder creates the table using our
   * buildHeader() and buildRow() implementations.
   */
  public function render(): array {
    $build['description'] = [
      '#markup' => $this->t('User reviews'),
    ];
    $build += parent::render();
    return $build;
  }

  /**
   * {@inheritdoc}
   *
   * Building the header and content lines for the reviews list.
   */
  public function buildHeader(): array {
    $header['name'] = $this->t('Name');
    $header['email'] = $this->t('Email');
    $header['phone'] = $this->t('Phone');
    $header['review'] = $this->t('Review');
    $header['date'] = $this->t('Date created');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   *
   * Building the rows and content lines for the reviews list.
   */
  public function buildRow(EntityInterface $entity): array {
    /** @var \Drupal\hajime\Entity\HajimeReview $entity */
    $nodeId = $entity->id();
    $url = Url::fromRoute('entity.hajime_review.canonical', ['hajime_review' => $nodeId]);
    $link = Link::fromTextAndUrl($entity->name->value, $url);
    $row['name'] = $link;
    $row['email'] = $entity->email->value;
    $row['number'] = $entity->number->value;
    $row['review'] = $entity->review->value;
    $row['created'] = date('d-m-Y H:i:s', $entity->created->value);
    return $row + parent::buildRow($entity);
  }

}
