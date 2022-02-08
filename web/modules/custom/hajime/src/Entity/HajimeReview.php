<?php

namespace Drupal\hajime\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\EntityTypeInterface;

/**
 * Defines the hajime_review entity.
 *
 *  @ContentEntityType(
 *    id = "hajime_review",
 *    label = @Translation("Review"),
 *    base_table = "hajime_review",
 *    entity_keys = {
 *      "id" = "id",
 *      "uuid" = "uuid",
 *   },
 *   handlers = {
 *    "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *    "list_builder" = "Drupal\hajime\ReviewsListBuilder",
 *    "views_data" = "Drupal\views\EntityViewsData",
 *   "form" = {
 *    "default" = "Drupal\hajime\Form\ReviewForm",
 *    "delete" = "Drupal\hajime\Form\ReviewDeleteForm",
 *    },
 *   },
 *   links = {
 *    "collection" = "/hajime/list",
 *    "canonical" = "/hajime/{hajime_review}",
 *    "edit-form" = "/hajime/{hajime_review}/edit",
 *    "delete-form" = "/hajime/{hajime_review}/delete",
 *  },
 * )
 */
class HajimeReview extends ContentEntityBase {

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type): array {
    $fields = parent::baseFieldDefinitions($entity_type);
    $fields['id'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('ID'))
      ->setDescription(t('ID'))
      ->setReadOnly(TRUE);

    $fields['uuid'] = BaseFieldDefinition::create('uuid')
      ->setLabel(t('UUID'))
      ->setDescription(t('UUID'))
      ->setReadOnly(TRUE);
    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Name'))
      ->setDescription(t('Your name'))
      ->setRequired(TRUE)
      ->setSettings([
        'max_length' => 100,
      ])
      ->setPropertyConstraints('value', [
        'Length' => [
          'min' => 2,
          'minMessage' => 'Your name must be longer than 2 symbols',
          'max' => 100,
          'maxMessage' => 'Your name must be shorter than 100 symbols',
        ],
        'Regex' => [
          'pattern' => '/^[aA-zZ]{2,100}$/',
          'message' => t('Please use latin letters in range of 2-100'),
        ],
      ])
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'string',
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'settings' => [
          'placeholder' => 'Enter here your name...',
        ],
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);
    $fields['email'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Email'))
      ->setDescription(t('Your email'))
      ->setRequired(TRUE)
      ->setSettings([
        'max_length' => 25,
      ])
      ->setPropertyConstraints('value', [
        'Regex' => [
          'pattern' => '/^[_A-Za-z0-9-\\+]*@[A-Za-z0-9-]+(\\.[A-Za-z0-9]+)*(\\.[A-Za-z]{2,})$/',
          'message' => t('Email should be like example@email.com'),
        ],
      ])
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'string',
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'settings' => [
          'placeholder' => 'Enter here your email...',
        ],
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);
    $fields['number'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Mobile number'))
      ->setDescription(t('Your number'))
      ->setRequired(TRUE)
      ->setSettings([
        'max_length' => 20,
      ])
      ->setPropertyConstraints('value', [
        'Regex' => [
          'pattern' => '/^[0-9]{9,15}$/',
          'message' => t('Please use only numbers in range of 9-15'),
        ],
      ])
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'string',
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'settings' => [
          'placeholder' => 'Enter here your number...',
        ],
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);
    $fields['review'] = BaseFieldDefinition::create('string_long')
      ->setLabel(t('Review text'))
      ->setDescription(t('Your review'))
      ->setRequired(TRUE)
      ->setSettings([
        'max_length' => 255,
      ])
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'string',
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'settings' => [
          'placeholder' => 'Enter here your text...',
        ],
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);
    $fields['avatar'] = BaseFieldDefinition::create('image')
      ->setLabel(t('Avatar'))
      ->setDescription(t('Avatar of user'))
      ->setSettings([
        'file_directory' => 'IMAGE_FOLDER',
        'alt_field_required' => FALSE,
        'file_extensions' => 'png jpg jpeg',
        'max_filesize' => '2097152',
      ])
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'default',
      ])
      ->setDisplayOptions('form', [
        'label' => 'hidden',
        'type' => 'image_image',
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);
    $fields['image'] = BaseFieldDefinition::create('image')
      ->setLabel(t('Image'))
      ->setDescription(t('Review image'))
      ->setSettings([
        'file_directory' => 'IMAGE_FOLDER',
        'alt_field_required' => FALSE,
        'file_extensions' => 'png jpg jpeg',
        'max_filesize' => '5242880',
      ])
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'default',
      ])
      ->setDisplayOptions('form', [
        'label' => 'hidden',
        'type' => 'image_image',
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);
    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Created'))
      ->setDescription(t('The time that the entity was created.'))
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'datetime_custom',
        'settings' => [
          'data_format' => 'm/j/Y H:i:s',
        ],
      ]);
    $fields['changed'] = BaseFieldDefinition::create('changed')
      ->setLabel(t('Changed'))
      ->setDescription(t('The time that the entity was last edited.'));
    return $fields;

  }

}
