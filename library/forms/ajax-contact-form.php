<?php

add_action('wp_ajax_send_contact_form', 'handle_contact_form');
add_action('wp_ajax_nopriv_send_contact_form', 'handle_contact_form');
function handle_contact_form(){
  
  // pretend everything was good if a bot fills out the honeypot
  if(!empty($_POST['website'])){
    wp_send_json_success();
  }

  $sanitized_fields = [];
  $errors = [];
  
  // email is required and needs to be validated
  if (!empty($_POST['email']) && is_email($_POST['email'])) {
    $sanitized_fields['email'] = sanitize_email($_POST['email']);
  } else {
    $errors[] = 'Please enter a valid email address.';
  }

  if(!empty($_POST['name'])){
    $sanitized_fields['name'] = sanitize_text_field($_POST['name']);
  } else {
    $errors[] = 'Name is a required field.'; 
  }

  if (!empty($_POST['floorplan'])) {
    $sanitized_fields['floorplan'] = sanitize_text_field($_POST['floorplan']);
  }

  if (!empty($_POST['comment'])) {
    $sanitized_fields['comment'] = sanitize_textarea_field($_POST['comment']);
  }

  if(!empty($errors)){
    wp_send_json_error($errors);
  }

  // No errors and we have our sanitized data. Let's make a post.
  $submission = wp_insert_post([
    'post_title' => $sanitized_fields['email'] . ' - ' . date('F j, Y'),
    'post_type' => 'submission',
    'post_status' => 'publish',
  ], true);

  if(is_wp_error($submission)){
    wp_send_json_error('Something went wrong. Try again later.');
  }


  $acf_field_keys = [
    'name' => 'field_5e22470dde582',
    'email' => 'field_5e22471ede583',
    'floorplan' => 'field_5e22472bde584',
    'comment' => 'field_5e224745de585',
  ];

  if(function_exists('update_field')){
    foreach ($sanitized_fields as $field_key => $value) {
      update_field($acf_field_keys[$field_key], $value, $submission);
    }
  }

  $email_body = "<strong>Name:</strong> " . $sanitized_fields['name'] . "<br>";
  $email_body .= "<strong>Email:</strong> " . $sanitized_fields['email'] . "<br>";
  $email_body .= "<strong>Floorplan:</strong> " . $sanitized_fields['floorplan'] . "<br>";
  $email_body .= "<strong>Comment:</strong> " . $sanitized_fields['comment'] . "<br>";

  $sent = wp_mail('dev-email@flywheel.local', 'New Floorplan Inquiry', $email_body, ['Content-Type: text/html; charset=UTF-8']);

  wp_send_json_success([$sent]);

}