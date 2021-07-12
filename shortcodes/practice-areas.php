<?php
function practice_area(){
    $query = new WP_Query(
        array(
            'post_type' => 'practice-area',
            'post-status' => 'publish',
            'post_per_page' => -1,
            'order' => 'ASC',
            'orderby' => 'menu_order'
        )
    );
    $i = 1;
    $str = '<div class="elementor-container elementor-row">';
    while ($query->have_posts()):
        $query->the_post();
        $str .= 
            '<div class="elementor-column elementor-col-33 elementor-inner-column elementor-element">
                <div class="practice-area--box homepage-services">
                    <a class="practice-area--link" href="'.get_the_permalink().'">
                        <i aria-hidden="true" class="practice-area--icon '.do_shortcode('[acf field="icon"]').'"></i>
                        <div class="practice-area--content">
                            <h3 class="practice-area--title">'.get_the_title().'</h3>
                            <p class="practice-area--description">'.do_shortcode('[acf field="description"]').'</p>
                        </div>
                    </a>
                </div>
            </div>';
        if ($i % 3 == 0):
            $str .= '</div>';
            $str .= '<div class="elementor-container elementor-row">'; 
        endif;
        $i++;
    endwhile;
    wp_reset_postdata();
    
    return $str;
}
add_shortcode('practice_area', 'practice_area');

function practice_area_link(){
    $query = new WP_Query(
        array(
            'post_type' => 'practice-area',
            'post-status' => 'publish',
            'post_per_page' => -1,
            'order' => 'ASC',
            'orderby' => 'menu_order'
        )
    );
    $links = '';
    while ($query->have_posts()):
        $query->the_post();
        $links .= '<a href="'.get_the_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a><br>';
    endwhile;
    wp_reset_postdata();
    return $links;
}
add_shortcode('practice_area_link', 'practice_area_link');

add_filter('manage_practice-area_posts_columns', 'practice_areas_columns');
function practice_areas_columns($columns) {
    $columns = array(
        'cb' => 'cb',
        'title' => 'Title',
        'order' => 'Order',
        'date' => 'Date'
    );
    return $columns;
}

add_filter('manage_edit-practice-area_sortable_columns', 'practice_areas_sortable_columns');
function practice_areas_sortable_columns ($columns) {
    $columns['order'] = 'order';
    return $columns;
}

add_action('manage_practice-area_posts_custom_column', 'practice_areas_show_columns');
function practice_areas_show_columns($column_name){
    global $post;
    if($column_name == 'order'):
        echo $post->menu_order;
    endif;
}

?>