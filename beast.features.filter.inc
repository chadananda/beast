<?php
/**
 * @file
 * beast.features.filter.inc
 */

/**
 * Implementation of hook_filter_default_formats().
 */
function beast_filter_default_formats() {
  $formats = array();

  // Exported format: Filtered HTML
  $formats['filtered_html'] = array(
    'format' => 'filtered_html',
    'name' => 'Filtered HTML',
    'cache' => '1',
    'status' => '0',
    'weight' => '0',
    'filters' => array(
      'shortener' => array(
        'weight' => '-50',
        'status' => '1',
        'settings' => array(
          'shortener_url_behavior' => 'short',
          'shortener_url_length' => '72',
        ),
      ),
      'filter_markdown' => array(
        'weight' => '-49',
        'status' => '1',
        'settings' => array(),
      ),
      'filter_html' => array(
        'weight' => '-47',
        'status' => '1',
        'settings' => array(
          'allowed_html' => '<a> <em> <strong> <cite> <blockquote> <code> <ul> <ol> <li> <dl> <dt> <dd><b><i>',
          'filter_html_help' => 1,
          'filter_html_nofollow' => 1,
        ),
      ),
      'filter_autop' => array(
        'weight' => '-46',
        'status' => '1',
        'settings' => array(),
      ),
      'filter_htmlcorrector' => array(
        'weight' => '-45',
        'status' => '1',
        'settings' => array(),
      ),
      'filter_html_escape' => array(
        'weight' => '-44',
        'status' => '1',
        'settings' => array(),
      ),
      'blink_links' => array(
        'weight' => '-43',
        'status' => '1',
        'settings' => array(),
      ),
    ),
  );

  // Exported format: Full Markdown
  $formats['full_html'] = array(
    'format' => 'full_html',
    'name' => 'Full Markdown',
    'cache' => '1',
    'status' => '1',
    'weight' => '1',
    'filters' => array(
      'filter_html' => array(
        'weight' => '-49',
        'status' => '1',
        'settings' => array(
          'allowed_html' => '<img>',
          'filter_html_help' => 1,
          'filter_html_nofollow' => 1,
        ),
      ),
      'filter_markdown' => array(
        'weight' => '-48',
        'status' => '1',
        'settings' => array(),
      ),
      'pathologic' => array(
        'weight' => '-47',
        'status' => '1',
        'settings' => array(
          'local_paths' => 'http://fdr7.info
  http://fdr7.lnker.com',
          'absolute' => 1,
        ),
      ),
      'blink_links' => array(
        'weight' => '-46',
        'status' => '1',
        'settings' => array(),
      ),
    ),
  );

  return $formats;
}
