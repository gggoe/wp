<?php

/**
 * power_mag widgets fields function
 * @package power_mag
 * 
 */
 
function power_mag_widgets_updated_field_value($widget_field, $new_field_value) {

    extract($widget_field);

    // Allow only integers in number fields
    if ($power_mag_widgets_field_type == 'number') {
        return absint($new_field_value);

        // Allow some tags in textareas
    } elseif ($power_mag_widgets_field_type == 'textarea') {
        // Check if field array specifed allowed tags
        if (!isset($power_mag_widgets_allowed_tags)) {
            // If not, fallback to default tags
            $power_mag_widgets_allowed_tags = '<p><strong><em><a>';
        }
        return strip_tags($new_field_value, $power_mag_widgets_allowed_tags);

        // No allowed tags for all other fields
    } elseif ($power_mag_widgets_field_type == 'url') {
        return esc_url_raw($new_field_value);
    } else {
        return strip_tags($new_field_value);
    }
}




function power_mag_widgets_show_widget_field($instance = '', $widget_field = '', $athm_field_value = '') {
    // Store Posts in array
    $power_mag_postlist[0] = array(
        'value' => 0,
        'label' => __('--choose--', 'power-mag')
    );
    $arg = array('posts_per_page' => -1);
    $power_mag_posts = get_posts($arg);
    foreach ($power_mag_posts as $power_mag_post) :
        $power_mag_postlist[$power_mag_post->ID] = array(
            'value' => $power_mag_post->ID,
            'label' => $power_mag_post->post_title
        );
    endforeach;

    extract($widget_field);

    switch ($power_mag_widgets_field_type) {

        // Standard text field
        case 'text' :
            ?>
            <p>
                <label for="<?php echo esc_attr($instance->get_field_id($power_mag_widgets_name)); ?>"><?php echo esc_attr($power_mag_widgets_title); ?>:</label>
                <input class="widefat" id="<?php echo esc_attr($instance->get_field_id($power_mag_widgets_name)); ?>" name="<?php echo esc_attr($instance->get_field_name($power_mag_widgets_name)); ?>" type="text" value="<?php echo esc_attr($athm_field_value); ?>" />

                <?php if (isset($power_mag_widgets_description)) { ?>
                    <br />
                    <small><?php echo esc_html($power_mag_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        // Standard url field
        case 'url' :
            ?>
            <p>
                <label for="<?php echo esc_attr($instance->get_field_id($power_mag_widgets_name)) ; ?>"><?php echo esc_html($power_mag_widgets_title) ; ?>:</label>
                <input class="widefat" id="<?php echo esc_attr($instance->get_field_id($power_mag_widgets_name)); ?>" name="<?php echo esc_attr($instance->get_field_name($power_mag_widgets_name)); ?>" type="text" value="<?php echo esc_attr($athm_field_value); ?>" />

                <?php if (isset($power_mag_widgets_description)) { ?>
                    <br />
                    <small><?php echo esc_html($power_mag_widgets_description) ; ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        // Textarea field
        case 'textarea' :
            ?>
            <p>
                <label for="<?php echo esc_attr($instance->get_field_id($power_mag_widgets_name)); ?>"><?php echo esc_html($power_mag_widgets_title); ?>:</label>
                <textarea class="widefat" id="<?php echo esc_attr($instance->get_field_id($power_mag_widgets_name)); ?>" name="<?php echo esc_attr($instance->get_field_name($power_mag_widgets_name)); ?>"><?php echo esc_html($athm_field_value); ?></textarea>
            </p>
            <?php
            break;

        // Checkbox field
        case 'checkbox' :
            ?>
            <p>
                <input id="<?php echo esc_attr($instance->get_field_id($power_mag_widgets_name)); ?>" name="<?php echo esc_attr($instance->get_field_name($power_mag_widgets_name)); ?>" type="checkbox" value="1" <?php checked('1', esc_attr($athm_field_value)); ?>/>
                <label for="<?php echo esc_attr($instance->get_field_id($power_mag_widgets_name)); ?>"><?php echo esc_html($power_mag_widgets_title); ?></label>

                <?php if (isset($power_mag_widgets_description)) { ?>
                    <br />
                    <small><?php echo esc_html($power_mag_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        // Radio fields
        case 'radio' :
            ?>
            <p>
                <?php
                echo esc_attr($power_mag_widgets_title);
                '<br />';
                foreach ($power_mag_widgets_field_options as $athm_option_name => $athm_option_title) {
                    ?>
                    <input id="<?php echo esc_attr($instance->get_field_id($athm_option_name)) ; ?>" name="<?php echo esc_attr($instance->get_field_name($power_mag_widgets_name)); ?>" type="radio" value="<?php echo esc_attr($athm_option_name) ; ?>" <?php checked(esc_attr($athm_option_name), esc_attr($athm_field_value)); ?> />
                    <label for="<?php echo esc_attr($instance->get_field_id($athm_option_name)) ; ?>"><?php echo esc_html($athm_option_title); ?></label>
                    <br />
                <?php } ?>

                <?php if (isset($power_mag_widgets_description)) { ?>
                    <small><?php echo esc_html($power_mag_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        // Select field
        case 'select' :
            ?>
            <p>
                <label for="<?php echo esc_attr($instance->get_field_id($power_mag_widgets_name)); ?>"><?php echo esc_html($power_mag_widgets_title); ?>:</label>
                <select name="<?php echo esc_attr($instance->get_field_name($power_mag_widgets_name)); ?>" id="<?php echo esc_attr($instance->get_field_id($power_mag_widgets_name)); ?>" class="widefat">
                    <?php foreach ($power_mag_widgets_field_options as $athm_option_name => $athm_option_title) { ?>
                        <option value="<?php echo esc_attr($athm_option_name); ?>" id="<?php echo esc_attr($instance->get_field_id($athm_option_name)); ?>" <?php selected(esc_attr($athm_option_name), esc_attr($athm_field_value)); ?>><?php echo esc_html($athm_option_title); ?></option>
                    <?php } ?>
                </select>

                <?php if (isset($power_mag_widgets_description)) { ?>
                    <br />
                    <small><?php echo esc_html($power_mag_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        case 'number' :
            ?>
            <p>
                <label for="<?php echo esc_attr($instance->get_field_id($power_mag_widgets_name)); ?>"><?php echo esc_html($power_mag_widgets_title); ?>:</label><br />
                <input name="<?php echo esc_attr($instance->get_field_name($power_mag_widgets_name)); ?>" type="number" step="1" min="1" id="<?php echo esc_attr($instance->get_field_id($power_mag_widgets_name)); ?>" value="<?php echo esc_attr($athm_field_value); ?>" class="small-text" />

                <?php if (isset($power_mag_widgets_description)) { ?>
                    <br />
                    <small><?php echo esc_html($power_mag_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        // Select field
        case 'selectpost' :
            ?>
            <p>
                <label for="<?php echo esc_attr($instance->get_field_id($power_mag_widgets_name)); ?>"><?php echo esc_html($power_mag_widgets_title); ?>:</label>
                <select name="<?php echo esc_attr($instance->get_field_name($power_mag_widgets_name)); ?>" id="<?php echo esc_attr($instance->get_field_id($power_mag_widgets_name)); ?>" class="widefat">
                    <?php foreach ($power_mag_postlist as $power_mag_single_post) { ?>
                        <option value="<?php echo esc_attr($power_mag_single_post['value']); ?>" id="<?php echo esc_attr($instance->get_field_id($power_mag_single_post['label'])) ; ?>" <?php selected(esc_attr($power_mag_single_post['value']), esc_attr($athm_field_value) ); ?>><?php echo esc_attr($power_mag_single_post['label']); ?></option>
                    <?php } ?>
                </select>

                <?php if (isset($power_mag_widgets_description)) { ?>
                    <br />
                    <small><?php echo esc_html($power_mag_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

           }
}