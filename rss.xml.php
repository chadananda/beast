<?php 

/*
 *  $file 
 *
 *  Lightweight stub, to pass on or generate an RSS feed
*/
 
  
  
  error_reporting(E_ERROR | E_WARNING | E_PARSE); // hide errors from returning to caller  
    
  // Load necessary Drupal parts
  require_once('beast_rsstools.class.php'); 
  if (!_beast_drupal_bootstrap_db()) exit;
   
  
  if (!function_exists('db_fetch_array')) {
    function db_fetch_array($query) {
      if (is_object($query)) return $query->fetchAssoc();
    }
  }
  if (!function_exists('db_value')) {
    function db_value($query) {
      if (is_object($query)) return $query->fetchField();
    } 
  }
  
  // based on IP, see if we have an RSS feed for you  
  $key = substr(md5($_SERVER['SERVER_ADDR']), 0, 10) .'.rss'; 
  //echo "key: $key";  
  
  /*    
   function rss_xml($fields) {  
    fields = array(rss_title, rss_description, site_url, language, copyright, rss_url, 
     logo_image_width, logo_image_height, site_url, rss_title, image_144, 
     rss_lastbuild_date, site_email, site_author, site_categories
    )
    fields['items'] = array(node_title, node_description, page_url, site_email, pubdate, node_categories);    
  */
  global $language; 
    // build fields  
   $fields = array (
     'rss_title' => ucwords(variable_get('site_name', '')) . ' RSS Feed', 
     'rss_description' => ucwords(variable_get('site_name', '')). ' (' . variable_get('site_slogan', '') . ') site content', 
     'site_url' => $GLOBALS['base_url'], 
     'language' => $language->language ? $language->language : 'en' , 
     'copyright' => '(c) ' .  $_SERVER['SERVER_NAME'] . ', ' . date('Y', strtotime('-4 year')) . ' - ' . date('Y'),  
     'rss_url' => "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'],
   );
    
    
   
   
   // and items
   $rows = db_query("SELECT node.title AS node_title, node.nid AS nid, feeds_source.feed_nid AS feeds_source_feed_nid, node.changed AS node_changed, node.created AS node_created, 'node' AS field_data_field_audio_node_entity_type, 'node' AS field_data_body_node_entity_type, 'node' AS field_data_field_image_node_entity_type, 'node' AS field_data_field_initial_keywords_node_entity_type, 'node' AS field_data_field_related_product_node_entity_type, 'node' AS field_data_field_spintax_body_node_entity_type, 'node' AS field_data_field_spintax_resource_node_entity_type, 'node' AS field_data_field_spintax_title_node_entity_type, 'node' AS field_data_field_video_node_entity_type, 'node' AS field_data_field_top_keywords_node_entity_type, 'node' AS field_data_field_detected_backlinks_node_entity_type
FROM 
{node} node
LEFT JOIN {feeds_source} feeds_source ON node.nid = feeds_source.feed_nid
WHERE (( (node.status = '1') AND (node.type IN  ('article')) ))
ORDER BY node_created DESC"
   ); 
 
 
 echo "<pre>";
   while ($row = db_fetch_array($rows)) {
    echo print_r($row, true); break;
   
    $item = array(
      'node_title' => $row['node_title'],
      'node_description' => $row['node_title'],
      'mp3_author' => $row['node_title'],
      'node_subtitle' => $row['node_title'],
      'node_teaser' => $row['node_title'],
      'node_keywords' => $row['node_title'],
      'node_categories' => $row['node_title'],
      
      /*
      'page_url' => drupal_lookup_path('alias',"node/".$row['nid']),
      'site_email' => 'info@' . $_SERVER['SERVER_NAME'],
      'pubdate' => $row['node_changed'],
      'node_categories' => beast_rsstools::keywords_to_categories($row['field_data_field_initial_keywords_node_entity_type']),*/
    );
    $fields['items'][] = $item;  
   }  
echo "</pre>";   
 
   
   // convert into RSS feed 
   //echo "hello"; exit;

   $result = beast_rsstools::rss_xml($fields);
  // header ("Content-Type:text/xml");
   
   ob_end_clean();
   //echo "hello world"; exit;
   
  if (headers_sent()) die('Headers Already Sent'); 
   
   
   echo "<pre>" . htmlspecialchars($result) . "</pre>";
   
 
 
 
 
/*
 * Tools  ============================================
*/


function _beast_drupal_bootstrap_db() {
  if (!$depth = count(explode('/', substr(getcwd(), strpos(getcwd(), '/sites/', 0)+1)))) return FALSE;  
  chdir(str_repeat('../', $depth)); 
  define('DRUPAL_ROOT', getcwd());
  require_once DRUPAL_ROOT . '/includes/bootstrap.inc'; 
  require_once DRUPAL_ROOT . '/includes/common.inc';
  require_once DRUPAL_ROOT . '/includes/path.inc';
 // require_once DRUPAL_ROOT . '/includes/module.inc';
  drupal_bootstrap(DRUPAL_BOOTSTRAP_VARIABLES);  // DRUPAL_BOOTSTRAP_PATH ?
  return TRUE;
} 
