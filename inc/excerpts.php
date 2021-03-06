<?php

// Index page Excerpt, call using _pc_excerpt('_pc_index');
function _pc_index($length) {
  return 20;
}

// Custom Post Excerpt, call using _pc_excerpt('_pc_custom_post');
function _pc_model($length) {
  return 40;
}

// Create the Custom Excerpts callback
function _pc_excerpt($length_callback = '', $more_callback = '') {
  global $post;
  if (function_exists($length_callback)) {
      add_filter('excerpt_length', $length_callback);
  }
  if (function_exists($more_callback)) {
      add_filter('excerpt_more', $more_callback);
  }
  $output = get_the_excerpt();
  $output = apply_filters('wptexturize', $output);
  $output = apply_filters('convert_chars', $output);
  $output = '<p>' . $output . '</p>';
  echo $output;
}

// Custom View Article link to Post
function _pc_view_article($more) {
  global $post;
  return '...';
}
add_filter('excerpt_more', '_pc_view_article');
