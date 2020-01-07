<?php

class Floorplan_CTA extends WP_Widget
{

public function __construct()
{
  $widget_ops = array(
    'classname' => 'floorplan_cta',
    'description' => 'A Widget to help users search for Floor Plans',
  );
  parent::__construct('floorplan_cta', 'Floor Plan Call to Action', $widget_ops);
}


public function widget($args, $instance)
{
  echo $args['before_widget'];
  if (!empty($instance['title'])) {
    echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
  }
  
  $floorplan = new \WP2K\Floorplan();
  $floorplan_types = $floorplan->get_floorplan_types();
  
  ?>
  <form id="floorplan_widget_cta" action="<?php echo get_post_type_archive_link('floorplan'); ?>">
    <div class="mb-4">
    <?php
    foreach ($floorplan_types as $type) {
      echo '<div class="mb-1">';
      $floorplan->display_floorplan_checkbox($type);
      echo '</div>';
    }
    ?>
    </div>
    <button type="submit" class="button small">Find My Home</button>
  </form>
  <?php

  echo $args['after_widget'];
}

public function form($instance)
{
  $title = !empty($instance['title']) ? $instance['title'] : esc_html('Title');
  ?>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_attr( 'I am looking for...' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
		</p>
  <?php
}

public function update($new_instance, $old_instance)
{
  $instance = [];
  $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
  return $instance;
}

}

// register Floorplan_CTA
add_action('widgets_init', function () {
  register_widget('Floorplan_CTA');
});