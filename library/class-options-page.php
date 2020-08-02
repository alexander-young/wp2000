<?php

  namespace WP2K;

  class OptionsPage {

    private $errors = [];

    public function __construct() {
      add_action('admin_menu', [$this, 'create_settings_page']);
    }

    public function create_settings_page(){
    add_menu_page('WP2K Settings', 'WP2K Settings', 'manage_options', 'wp2k-settings', [$this, 'render_settings_form'], '', 100);
    }

    public function display_upload_error(){
      ?>
      <div class="notice notice-error">
        <p>Could not upload file. Please try again.</p>
      </div>
      <?php
    }

    public function handle_file_upload($file){

      // don't upload file if errors exist already
      if(!empty($this->errors)){
        return;
      }

      // if new file doesn't exist and doesn't exist already in the DB...throw error
      if(empty($file['footer_background']['name'])){
        if(!get_option('wp2k_footer_background')){
          $this->errors[] = 'footer_background';
        }
        return;
      }

      if (!function_exists('wp_handle_upload')) {
        require_once(ABSPATH . 'wp-admin/includes/file.php');
      }

      $uploaded = wp_handle_upload($file['footer_background'], ['test_form' => false]);

      if($uploaded && !isset($uploaded['error'])){

        $attach_id = wp_insert_attachment([
          'guid' => $uploaded['url'],
          'post_mime_type' => $uploaded['type']
        ], $uploaded['file'], 0 );

        if(!is_numeric($attach_id)){
          $this->display_upload_error();
        }

        if (!function_exists('wp_generate_attachment_metadata')) {
          require_once ABSPATH . 'wp-admin/includes/image.php';
        }

        $attach_meta = wp_generate_attachment_metadata($attach_id, $uploaded['file']);
        wp_update_attachment_metadata($attach_id, $attach_meta);

        update_option('wp2k_footer_background', $attach_id);

        return $attach_id;

      }else{
        $this->display_upload_error();
      }

    }
    
    public function handle_settings_form(){

    if (!isset($_POST['wp2k_settings_nonce'])
      || !wp_verify_nonce($_POST['wp2k_settings_nonce'], 'wp2k_save_settings')){
        ?>
        <div class="notice notice-error">
          <p>Whoops! Somethin went wrong. Please try again.</p>
        </div>
        <?php
      }else{

        $required = [
          'header_phone',
          'header_email',
          'footer_heading',
          'footer_copy',
          'footer_button_text',
          'footer_button_link',
        ];
        
        $footer_heading = sanitize_text_field($_POST['footer_heading']);
        $footer_copy = sanitize_textarea_field($_POST['footer_copy']);
        $footer_button_text = sanitize_text_field($_POST['footer_button_text']);
        $footer_button_link = sanitize_text_field($_POST['footer_button_link']);
        $header_phone = sanitize_text_field($_POST['header_phone']);
        $header_email = sanitize_email($_POST['header_email']);

        
        foreach($required as $field){
          if(empty($$field)){
            $this->errors[] = $field;
          }
        }

        $this->handle_file_upload($_FILES);

        if(!empty($this->errors)){
          ?>
          <div class="error">
            <p>The following field(s) are required:</p>
            <ul>
            <?php
              foreach($this->errors as $error){
                echo '<li>' . ucwords( str_replace('_', ' ', $error) ) . '</li>';
              }
            ?>
            </ul>
          </div>
          <?php
          return;
        }

        foreach ($required as $field) {
          update_option('wp2k_' . $field, $$field);
        }

        ?>
        <div class="notice notice-success">
          <p>Changes were successfully saved.</p>
        </div>
        <?php

      }

    }

    public function render_settings_form(){

      if(isset($_POST['wp2k_settings_form']) && $_POST['wp2k_settings_form']){
        $this->handle_settings_form();
      }

      ?>
        <div class="wrap">
          <h1><?php echo esc_html(get_admin_page_title()); ?></h1>

          <form method="POST" enctype="multipart/form-data">

              <h2>Header</h2>
              <table class="form-table">
                <tbody>
                  <tr>
                    <th>
                      <label for="header_phone">Phone Number</label>
                    </th>
                    <td>
                      <input 
                        type="tel"
                        name="header_phone"
                        id="header_phone"
                        value="<?php echo get_option('wp2k_header_phone'); ?>"
                        class="regular-text"
                      />
                    </td>
                  </tr>
                  <tr>
                    <th>
                      <label for="header_email">Email</label>
                    </th>
                    <td>
                      <input 
                        type="email"
                        name="header_email"
                        id="header_email"
                        value="<?php echo get_option('wp2k_header_email'); ?>"
                        class="regular-text"
                      />
                    </td>
                  </tr>
                </tbody>
              </table>

              <hr>

              <h2>Footer</h2>
              <table class="form-table">
                <tbody>
                  <tr>
                    <th>
                      <label for="footer_heading">Heading</label>
                    </th>
                    <td>
                      <input 
                        type="text"
                        name="footer_heading"
                        id="footer_heading"
                        value="<?php echo get_option('wp2k_footer_heading'); ?>"
                        class="regular-text"
                      />
                    </td>
                  </tr>
                  <tr>
                    <th>
                      <label for="footer_copy">Copy</label>
                    </th>
                    <td>
                      <textarea
                        name="footer_copy"
                        id="footer_copy"
                        class="regular-text"
                      ><?php echo get_option('wp2k_footer_copy'); ?></textarea>
                    </td>
                  </tr>
                  <tr>
                    <th>
                      <label for="footer_button_text">Button Text</label>
                    </th>
                    <td>
                      <input
                        type="text"
                        name="footer_button_text"
                        id="footer_button_text"
                        class="regular-text"
                        value="<?php echo get_option('wp2k_footer_button_text'); ?>"
                      />
                    </td>
                  </tr>
                  <tr>
                    <th>
                      <label for="footer_button_link">Button Link</label>
                    </th>
                    <td>
                      <input
                        type="text"
                        name="footer_button_link"
                        id="footer_button_link"
                        class="regular-text"
                        value="<?php echo get_option('wp2k_footer_button_link'); ?>"
                      />
                    </td>
                  </tr>
                  <tr>
                    <th>
                      <label for="footer_background">Background Image</label>
                    </th>
                    <td>
                      <input
                        type="file"
                        name="footer_background"
                        id="footer_background"
                      />
                      <?php
                        if(is_numeric($attach_id = get_option('wp2k_footer_background'))){
                          echo '<p>Current Background: </p>' . wp_get_attachment_image($attach_id, 'medium');
                        }
                      ?>
                    </td>
                  </tr>
                </tbody>
              </table>

              <?php wp_nonce_field('wp2k_save_settings', 'wp2k_settings_nonce'); ?>

              <input type="hidden" name="wp2k_settings_form" value="true" />

              <button type="submit" class="button button-primary">Save Changes</button>

          </form>
        </div>
      <?php
    }

  }

  new \WP2K\OptionsPage();

?>