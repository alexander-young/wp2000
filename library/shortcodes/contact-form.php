<?php add_shortcode('contact_form', function(){ 
  
  ob_start();

  $floorplan = new \WP2K\Floorplan();
  $all_floorplans = $floorplan->get_all_floorplans();
  
?>
<form id="contact-form">

  <label>First Name*
    <input type="text" name="first_name" required/>
  </label>

  <label>Last Name*
    <input type="text" name="last_name" required/>
  </label>

  <label>Email*
    <input type="email" name="email" required/>
  </label>

    <label>Floorplan
      <div class="relative">
        <select name="floorplan" class="block w-full py-3 px-4 pr-8">
          <option value="false">- Select A Floor Plan -</option>
          <?php
            foreach ($all_floorplans as $floorplan) {
              echo '<option value="'.$floorplan['slug'].'">'.$floorplan['title'].'</option>';
            }
          ?>
        </select>
        <?php select_arrow(); ?>
    </div>
  </label>

  <label>Comment
    <textarea></textarea>
  </label>

  <button type="submit" class="button small">Send</button>

</form>
<?php return ob_get_clean(); });?>
