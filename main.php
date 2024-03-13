<?php
/*
Plugin Name: Unique ID Field
Description: Advanced Custom field that creates a unique ID.
Author: Jen Wachter
Version: 1.0.0
*/

// exit if accessed directly
if (!defined('ABSPATH')) {
  exit;
}

add_action('init', function () {
  if (!function_exists('acf_register_field_type')) {
    return;
  }

  require_once __DIR__ . '/src/UniqueIDField.php';
  acf_register_field_type('UniqueIDField');
});
