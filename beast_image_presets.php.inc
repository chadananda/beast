<?php

//  $Id$

/*
 *
 * @file
 *
 */

$koc_imagecache_presets['koc_icon'] = array(
    'presetname' => 'koc_icon',
    'actions' => array(
      0 => array(
        'weight' => '-30',
        'module' => 'imagecache',
        'action' => 'imagecache_scale',
        'data' => array(
          'width' => '40',
          'height' => '40',
        ),
      ),
    ),
  );


$koc_imagecache_presets['koc_podcast_144'] = array(
    'presetname' => 'koc_podcast_144',
    'actions' => array(
      0 => array(
        'weight' => '-30',
        'module' => 'imagecache',
        'action' => 'imagecache_scale',
        'data' => array(
          'width' => '144',
          'height' => '144',
        ),
      ),
    ),
  );
$koc_imagecache_presets['koc_itunes_600'] = array(
    'presetname' => 'koc_itunes_600',
    'actions' => array(
      0 => array(
        'weight' => '-30',
        'module' => 'imagecache',
        'action' => 'imagecache_scale',
        'data' => array(
          'width' => '600',
          'height' => '600',
        ),
      ),
    ),
  );



$koc_imagecache_presets['koc_resource_page'] = array(
  'presetname' => 'koc_resource_page',
  'actions' =>
  array(
    0 =>
    array(
      'weight' => '-10',
      'module' => 'imagecache',
      'action' => 'imagecache_scale',
      'data' =>
      array(
        'width' => '200',
        'height' => '',
        'upscale' => 0,
      ),
    ),
    1 =>
    array(
      'weight' => '-9',
      'module' => 'imagecache_canvasactions',
      'action' => 'canvasactions_definecanvas',
      'data' =>
      array(
        'RGB' =>
        array(
          'HEX' => 'ffffff',
        ),
        'under' => 1,
        'exact' =>
        array(
          'width' => '',
          'height' => '',
          'xpos' => 'center',
          'ypos' => 'center',
        ),
        'relative' =>
        array(
          'leftdiff' => '',
          'rightdiff' => '',
          'topdiff' => '',
          'bottomdiff' => '',
        ),
      ),
    ),
    2 =>
    array(
      'weight' => '-8',
      'module' => 'imagecache_canvasactions',
      'action' => 'canvasactions_definecanvas',
      'data' =>
      array(
        'RGB' =>
        array(
          'HEX' => 'eeeeee',
        ),
        'under' => 1,
        'exact' =>
        array(
          'width' => '',
          'height' => '',
          'xpos' => 'center',
          'ypos' => 'center',
        ),
        'relative' =>
        array(
          'leftdiff' => '1',
          'rightdiff' => '1',
          'topdiff' => '1',
          'bottomdiff' => '1',
        ),
      ),
    ),
    3 =>
    array(
      'weight' => '-7',
      'module' => 'imagecache_canvasactions',
      'action' => 'canvasactions_definecanvas',
      'data' =>
      array(
        'RGB' =>
        array(
          'HEX' => 'ffffff',
        ),
        'under' => 1,
        'exact' =>
        array(
          'width' => '',
          'height' => '',
          'xpos' => 'center',
          'ypos' => 'center',
        ),
        'relative' =>
        array(
          'leftdiff' => '5',
          'rightdiff' => '5',
          'topdiff' => '5',
          'bottomdiff' => '5',
        ),
      ),
    ),
    4 =>
    array(
      'weight' => '-6',
      'module' => 'imagecache_canvasactions',
      'action' => 'canvasactions_definecanvas',
      'data' =>
      array(
        'RGB' =>
        array(
          'HEX' => 'cccccc',
        ),
        'under' => 1,
        'exact' =>
        array(
          'width' => '',
          'height' => '',
          'xpos' => 'center',
          'ypos' => 'center',
        ),
        'relative' =>
        array(
          'leftdiff' => '1',
          'rightdiff' => '1',
          'topdiff' => '1',
          'bottomdiff' => '1',
        ),
      ),
    ),
    5 =>
    array(
      'weight' => '-5',
      'module' => 'imagecache_canvasactions',
      'action' => 'canvasactions_definecanvas',
      'data' =>
      array(
        'RGB' =>
        array(
          'HEX' => '',
        ),
        'under' => 1,
        'exact' =>
        array(
          'width' => '',
          'height' => '',
          'xpos' => 'center',
          'ypos' => 'center',
        ),
        'relative' =>
        array(
          'leftdiff' => '10',
          'rightdiff' => '10',
          'topdiff' => '10',
          'bottomdiff' => '10',
        ),
      ),
    ),
  ),



);
