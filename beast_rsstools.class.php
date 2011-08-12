<?php

 error_reporting(0); // hide errors from returning to caller 
 
 
class beast_rsstools {

  function videocast_xml($fields) {
    
  }
  
  function rss_xml($fields) {  
  /*
    fields = array(rss_title, rss_descriptions, site_url, language, copyright, rss_url, 
     logo_image_width, logo_image_height, site_url, rss_title, image_144, 
     rss_lastbuild_date, site_email, site_author, site_categories
    )
    fields['items'] = array(node_title, node_description, page_url, site_email, pubdate, node_categories);    
  */
  
    $item_template = "\n\n". '      
    <item> 
       <title><![CDATA[ [node_title] ]]></title>
       <link>[page_url]</link>
       <author>[site_email] ([site_author])</author>
       <pubDate>[pubdate]</pubDate> 
       <guid>[page_url]</guid>
[node_categories]
       <description><![CDATA[ [node_description] ]]></description>
    </item> 
    '. "\n\n"; 
    
    
    $rss_template = '<?xml version="1.0" encoding="UTF-8" ?>
    <rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">      
      <channel>
        <title><![CDATA[ [rss_title] ]]></title> 
        <description><![CDATA[ [rss_description] ]]></description> 
        <link>[site_url]</link>
        <language>[language]</language>
        <copyright>[copyright]</copyright> 
        <atom:link href="[rss_url]" rel="self" type="application/rss+xml" />
        <image>
           <width>[logo_image_width]</width>
           <height>[logo_image_height]</height>
           <link>[site_url]</link> 
           <title>[rss_title]</title> 
           <url>[image_144]</url> 
        </image>
        <lastBuildDate>[rss_lastbuild_date]</lastBuildDate>
        <webMaster>[site_email] ([site_author])</webMaster>
        <ttl>240</ttl>
        [site_categories]
          [item_list]
      </channel>
    </rss> 
    ';
    
    if ($fields['items']) foreach ($fields['items'] as $item) {
      $item['node_title'] = $item['node_title'];
      $item['node_description'] = $item['node_description'] ."\n\n". $item['node_resource'];
      $item['mp3_author'] = $item['mp3_author'];
      $item['node_subtitle'] = $item['node_subtitle'];
      $item['node_teaser'] = $item['node_teaser'];
      $item['node_keywords'] = $item['node_keywords']; 
      $item['node_categories'] = self::keywords_to_categories($item['node_keywords']);
      
      $item_list .= self::applytemplate($item_template, $item) ."\n";
    }
    $fields['item_list'] = $item_list;
    $fields['site_email'] = $fields['site_email'];
    $fields['site_slogan'] = $fields['site_slogan'];
    $fields['rss_description'] = $fields['rss_description'];
    $fields['site_keywords'] = $fields['site_keywords'];
    $fields['site_categories'] = self::keywords_to_categories($fields['site_keywords']);
    
   // finally, build full rss
   $xml = self::applytemplate($rss_template, $fields, TRUE); 
    
   return $xml;
  } 

  function podcast_xml($fields) { 

    $item_template = "\n\n". '  <item>
     <title><![CDATA[ [node_title] ]]></title>
     <description><![CDATA[ [node_description] ]]></description>
     <link>[page_url]</link>
     <pubDate>[pubdate]</pubDate>
     <enclosure url="[mp3_url]" length="[mp3_length]" type="[mp3_mime]" />  
     <itunes:duration>[mp3_duration]</itunes:duration>
     <itunes:author>[mp3_author]</itunes:author>
     <itunes:subtitle><![CDATA[ [node_subtitle] ]]></itunes:subtitle> 
     <itunes:keywords>[node_keywords]</itunes:keywords> 
     <itunes:image href="[node_image_600]" />
     <guid>[mp3_guid]</guid>
  </item>'. "\n\n";

    $podcast_template = '<?xml version="1.0" encoding="UTF-8"?>
    <rss xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd" version="2.0"
         xmlns:atom="http://www.w3.org/2005/Atom">
    <channel>
     <title><![CDATA[ [podcast_title] ]]></title>
     <link>[site_url]</link>
     <language>[language]</language>
     <copyright>[copyright]</copyright> 
     <description><![CDATA[ [podcast_description] ]]></description> 
     <atom:link href="[rss_url]" rel="self" type="application/rss+xml" />

     <image>
        <width>[logo_image_width]</width>
        <height>[logo_image_height]</height>
        <link>[site_url]</link>
        <title>[podcast_title]</title>
        <url>[image_144]</url>
     </image>
     <lastBuildDate>[rss_lastbuild_date]</lastBuildDate>
     <webMaster>[site_email] ([site_author])</webMaster>

[itunes_categories]
 
     <itunes:explicit>clean</itunes:explicit>
     <itunes:keywords>[site_keywords]</itunes:keywords>
     <itunes:image href="[image_600]" />
     <itunes:owner>                              
       <itunes:name>[site_author]</itunes:name>
       <itunes:email>[site_email])</itunes:email>
     </itunes:owner>

     <ttl>240</ttl>
  [item_list]
     </channel>
    </rss>';

    if ($fields['items']) foreach ($fields['items'] as $item) {
      if (!$item['mp3_file']) continue; 
      $item['node_title'] = $item['node_title'];
      $item['node_description'] = $item['node_description'] ."\n\n". $item['node_resource'];
      $item['mp3_author'] = $item['mp3_author'];
      $item['node_subtitle'] = $item['node_subtitle'];
      $item['node_teaser'] = $item['node_teaser'];
      $item['node_keywords'] = $item['node_keywords'];
      $item_list .= self::applytemplate($item_template, $item) ."\n";
    }
    $fields['item_list'] = $item_list;
    //$fields['site_email'] = htmlspecialchars($fields['site_email'], ENT_QUOTES, 'UTF-8');
    $fields['site_email'] = $fields['site_email'];    
    $fields['site_slogan'] = $fields['site_slogan'];
    $fields['podcast_description'] = $fields['podcast_description'];
    $fields['site_keywords'] = $fields['site_keywords'];
    $fields['itunes_categories'] = self::format_itunes_categories($fields['itunes_categories']);

   // finally, build full rss
   $xml = self::applytemplate($podcast_template, $fields, TRUE); 
   return $xml;
 }
 


 function format_itunes_categories($categories) {
   // organize into categories
   foreach ($categories as $key=>$desc) {
     if (!strpos($key, ':'))  $cats[$key][$key] = 1;
     else {
       list($cat, $sub) = explode(":", $key);
       $cats[$cat][$sub] = 1;
     }
   }
   // format for itunes
   $indent = str_repeat(' ', 5);
   foreach($cats as $cat=>$values) {
    $cat_only = (count($values)==1) && isset($values[$cat]); 
    if ($cat_only) $xml[] = $indent . '<itunes:category text="'. htmlentities($cat)  .'" />';
    else {
      $xml[] = $indent . '<itunes:category text="'. htmlentities($cat)  .'">';
      foreach ($values as $subcat => $nonsensevalue) if ($subcat != $cat) 
        $xml[] = $indent . '  <itunes:category text="'. htmlentities($subcat)  .'" />'; 
      $xml[] = $indent . '</itunes:category>'; 
    }
   }
   return implode("\n", $xml);   
 }


 // tools
 
  /**
 * replace all [key] items with array value
 */
  function applytemplate($template, $array, $twice=false) {
    if (!is_array($array) || !count($array)) return $template;
    foreach ($array as $item => $value) $template = str_replace("[$item]", $value, $template);
    if ($twice) foreach ($array as $item => $value) $template = str_replace("[$item]", $value, $template);
    return $template;  
  }
  function set_file_permissions($filepath) {
    if (!@chmod($filepath, 0664)) {
      watchdog('rsstools', t('Could not set appropriate file permissions on @filepath',
       array('@filepath' => $filepath)), WATCHDOG_ERROR);
    }   
  }
  function keywords_to_categories($keywords) {
    if (!$keywords) return;
    $list = explode(',',$keywords);
    if (count($list)) foreach ($list as $kw) $categories .= '       <category>'. trim(htmlspecialchars($kw, ENT_QUOTES, 'UTF-8')) ."</category>\n";
    //echo $keywords .' '.$categories; exit;
    return rtrim($categories, "\n");
  }


}
