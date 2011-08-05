<?php
/**
 * @file
 * beast.features.user_role.inc
 */

/**
 * Implementation of hook_user_default_roles().
 */
function beast_user_default_roles() {
  $roles = array();

  // Exported role: admin
  $roles['admin'] = array(
    'name' => 'admin',
    'weight' => '2',
  );

  // Exported role: editor
  $roles['editor'] = array(
    'name' => 'editor',
    'weight' => '3',
  );

  // Exported role: promoter
  $roles['promoter'] = array(
    'name' => 'promoter',
    'weight' => '6',
  );

  // Exported role: reader
  $roles['reader'] = array(
    'name' => 'reader',
    'weight' => '5',
  );

  // Exported role: subscriber
  $roles['subscriber'] = array(
    'name' => 'subscriber',
    'weight' => '7',
  );

  // Exported role: writer
  $roles['writer'] = array(
    'name' => 'writer',
    'weight' => '4',
  );

  return $roles;
}
