<?php

function twentysixteen_child_scripts()
{
    if(is_page_template( 'template-buscador.php' ))
    {
        wp_enqueue_script ('search-user', get_stylesheet_directory_uri().'/js/search-user.js', array('jquery'));
        wp_localize_script( 'search-user', 'admin_url', array('ajax_url' => admin_url('admin-ajax.php'))
                            );
    }
}

add_action( 'wp_enqueue_scripts', 'twentysixteen_child_scripts' );

function searchUsers() {
    $valor = isset($_REQUEST['valor']) ? sanitize_text_field ($_REQUEST['valor']) : "";
    $argumentos = array(
        'fields' => array('display_name', 'user_email'),
        'role' => 'subscriber',
        'search' => '*'.$valor.'*'
        
    );



    $users = get_users($argumentos);

    foreach ($users as $user){
        $user->avatar = get_avatar_url( $user->user_email );
    }

    echo wp_json_encode($users);
    wp_die();
}

add_action('wp_ajax_searchUsers', 'searchUsers');
add_action('wp_ajax_nopriv_searchUsers', 'searchUsers');