<?php add_shortcode('contact_form', function(){ 
  
  ob_start();

  $floorplan = new \WP2K\Floorplan();
  $all_floorplans = $floorplan->get_all_floorplans();
  
?>
<form id="contact-form">

  <label>Name*
    <input type="text" name="name" required/>
  </label>

  <label>Email*
    <input type="email" name="email" required/>
  </label>

  <label class="website">Website
    <input type="text" name="website" class="website" tabindex="-1" autocomplete="off" />
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
    <textarea name="comment"></textarea>
  </label>

  <button type="submit" class="button small">Send</button>

  <div id="form-response" class="hidden p-4 text-white mt-6"></div>

</form>
<?php return ob_get_clean(); });?>
