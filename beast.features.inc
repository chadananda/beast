<?php
/**
 * @file
 * beast.features.inc
 */

/**
 * Implementation of hook_ctools_plugin_api().
 */
function beast_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "field_group" && $api == "field_group") {
    return array("version" => "1");
  }
}

/**
 * Implementation of hook_node_info().
 */
function beast_node_info() {
  $items = array(
    'article' => array(
      'name' => t('Syndicated Content'),
      'base' => 'node_content',
      'description' => t('Articles, Blogs and Product Reviews which will be re-published to hundreds of other sites for backlinks.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
