<?php
// Theme functions

function wps_get_link($link,$class){

  if ($link) {

    $title = $link['title'];
    $url = $link['url'];

    if ($target = $link['target']) {
      $target = ' target="'.$target.'" ';
    }else{
      $target = '';
    }

    if (!empty($class)) {
      $class = 'class="'.$class.'" ';
    }else{
      $class = '';
    }

    if ($title) {
      return '<a href="'.esc_url($url).'" '.$class.$target.'>'.$title.'</a>';
    }
  }
}

function get_thumbnail_src( $size ) {
  $post_id = get_the_ID();
  $attachment_id = get_post_thumbnail_id( $post_id );

  $image = wp_get_attachment_image_src( $attachment_id, $size );

  return $image[0];
}

add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
  return 'class="load-more"';
}

function is_blog() {
  global  $post;
  $posttype = get_post_type($post );
  return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag())) && ( $posttype == 'post')  ) ? true : false ;
}

function button( $atts ) {

  if (isset($atts['title']) and isset($atts['link'])) {

    $title = $atts['title'];
    $link = $atts['link'];

    if ($title and $link) {
     return '<a href="'.esc_url($link).'" class="btn btn-default">'.$title.'</a>';
   }
 }
}
add_shortcode( 'button','button' );

function wps_json(){

  $json = array();
  $map = get_field( 'map' );
  $marker = get_field( 'marker' );

  if ($map and $marker) {
    $json = array('markers' => array(
      array(
        'mainMarker' => true,
        'lat'        => $map['lat'],
        'lng'        => $map['lng'],
        'markerId'   => 1,
        'tooltipBox' => array(
          'abkuerzung'  => $marker['abkuerzung'],
          'datum'       => $marker['datum'],
          'dbkuerzel'   => $marker['dbkuerzel'],
          'dbstation'   => $marker['dbstation'],
          'ewknoten'    => $marker['ewknoten'],
          'fid'         => $marker['fid'],
          'ftable'      => $marker['ftable'],
          'gid'         => $marker['gid'],
          'knotentyp'   => $marker['knotentyp'],
          'koordinate'  => $marker['koordinate'],
          'name'        => $marker['name']
          )
        )
      ));
  }
  return json_encode($json);
}

function wps_acf_init() {
  if ($api_key = get_field( 'api_key', 'options' )) {
    acf_update_setting('google_api_key', $api_key);
  }
}

add_action('acf/init', 'wps_acf_init');