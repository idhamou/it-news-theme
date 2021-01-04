<?php

/*
 * add Tech IT listing posts widget
 */

class Tech_IT_Listing_Posts_Widget extends WP_Widget
{
    // Register widget with WordPress.
    function __construct()
    {
        parent::__construct(
            'Tech_IT_Listing_Posts_Widget',
            __('Post Listings', 'it_news'),
            array(
                'description' => __('Display a post listing', 'it_news')
            )
        );
    }

    //Front-end display of widget.
    public function widget($args, $instance)
    {
        $dir = plugin_dir_path(__FILE__);
        global $tech_it_used_post_ids;
        $exclude_ids = $tech_it_used_post_ids;

        $title = apply_filters('widget_title', $instance['title']);
        $args['before_widget'] = str_replace('class="', 'class="article ', $args['before_widget']);

        echo $args['before_widget'];

        if (!empty($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        $options = array(
            'post_type' => array('post'),
            'posts_per_page' => 10 ,
            'post_status' => 'publish',
            'post__not_in' => $exclude_ids
        );

        $theQuery = new WP_Query($options);

        $main_loop_i = 0;

        // The Loop
        if ($theQuery->have_posts()) {
            while ($theQuery->have_posts()) {
                do_action('the_main_loop', $main_loop_i);
                $theQuery->the_post();

                get_template_part('template-parts/content');

                $main_loop_i++;
            }

        }

        wp_reset_postdata();

        echo '<div class="more-post"><a href="' . get_post_type_archive_link("post"). __('More Tech IT Posts', 'it_new') . ' </a></div>';
        echo $args['after_widget'];
    }

    //Back-end widget form.
    public function form($instance)
    {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('New title', 'it_news');
        }

        ?>
        <p>
            <label for="<?php echo $this->get_field_name('title'); ?>"><?php _e('Title:', 'kamino'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>"/>
        </p>
        <?php
    }

    //Sanitize widget form values as they are saved.
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }

} // class Tech_IT_Listing_Posts_Widget

function register_Tech_IT_Listing_Posts_Widget()
{
    register_widget('Tech_IT_Listing_Posts_Widget');
}

add_action('widgets_init', 'register_Tech_IT_Listing_Posts_Widget');