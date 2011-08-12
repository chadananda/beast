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

  return $roles;
}
