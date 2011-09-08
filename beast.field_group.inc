<?php
/**
 * @file
 * beast.field_group.inc
 */

/**
 * Implementation of hook_field_group_info().
 */
function beast_field_group_info() {
  $export = array();

  $field_group = new stdClass;
  $field_group->api_version = 1;
  $field_group->identifier = 'group_article_media|node|article|form';
  $field_group->group_name = 'group_article_media';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'article';
  $field_group->mode = 'form';
  $field_group->parent_name = 'group_promotion';
  $field_group->data = array(
    'label' => 'Media',
    'weight' => '4',
    'children' => array(
      0 => 'field_image',
      1 => 'field_audio',
    ),
    'format_type' => 'tab',
    'format_settings' => array(
      'label' => 'Media',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => '',
        'description' => '',
      ),
      'formatter' => 'open',
    ),
  );
  $export['group_article_media|node|article|form'] = $field_group;

  return $export;
}
