<?php



/**

 * Day Six theme functions and definitions

 * 

 * @package Day Six theme

 */


/*
|--------------------------------------------------------------------------
| Front-end styles en scripts
|--------------------------------------------------------------------------
|
| 
| 
|
*/
function add_theme_scripts() {
    // Lees de versie uit het bestand
    $version = file_exists(get_template_directory() . '/version.txt') ? file_get_contents(get_template_directory() . '/version.txt') : '1.0';

    wp_enqueue_style( 'styles', get_template_directory_uri() . '/style.css', array(), $version, 'all');
    wp_enqueue_script( 'script', get_template_directory_uri() . '/script/index.js', array(), $version, true);
    
    // Voeg CSS-bestanden toe aan de queue met een versienummer
    wp_enqueue_style('swiper', get_template_directory_uri() . '/assets/css/swiper.css', array(), $version);
    wp_enqueue_style('tailwind', get_template_directory_uri() . '/tailwindcss-styles/style.css', array(), $version);
    wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.css', array(), $version);
    
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );
/*
|--------------------------------------------------------------------------
| Back-end styles en scripts
|--------------------------------------------------------------------------
|
| 
| 
|
*/

function load_custom_wp_admin_style(){
     $version = file_exists(get_template_directory() . '/version.txt') ? file_get_contents(get_template_directory() . '/version.txt') : '1.0';
    wp_enqueue_style( 'gutenberg',  'https://hostdashboard.nl/devdocs/css/gutenberg.css');
     wp_enqueue_style( 'styles', get_template_directory_uri() . '/style.css', array(), $version, 'all');
    // wp_enqueue_style( 'swiper',  'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css');
    // wp_enqueue_style( 'styles', get_template_directory_uri() . '/style.css', array(), '1.2', 'all');
    // wp_enqueue_script( 'swiper', get_template_directory_uri() . '/script/swiper.js', array(), 1.1, true);
    wp_enqueue_script( 'script', get_template_directory_uri() . '/script/index.js', array(), '1.2', true);
 
}
add_action('admin_enqueue_scripts', 'load_custom_wp_admin_style');


function remove_default_login_styles() {
    wp_dequeue_style( 'login' ); // Uitschakelen van de standaard login styles
    wp_dequeue_style( 'login-rtl' ); // Uitschakelen van de standaard login styles voor RTL (Right to Left) talen
}
add_action( 'login_enqueue_scripts', 'remove_default_login_styles' );
function add_custom_login_css() {
    wp_enqueue_style( 'custom-login-css', get_stylesheet_directory_uri() . '/style.css' ); // Voeg je eigen CSS-bestand toe
}
add_action( 'login_enqueue_scripts', 'add_custom_login_css' );

/*
|--------------------------------------------------------------------------
| Menu
|--------------------------------------------------------------------------
|
| 
| 
|
*/

function day_six_config(){
    register_nav_menus (
        array(
            'day_six_main_menu' => 'Main Menu'
        )
    );
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'preview', 100, 100, array( 'center', 'center' ) );
}

add_action( 'after_setup_theme', 'day_six_config', 0 );




/*
|--------------------------------------------------------------------------
| ACF blocks
|--------------------------------------------------------------------------
|
| 
| 
|
*/

/*
|--------------------------------------------------------------------------
| Categorie
|--------------------------------------------------------------------------
*/
add_filter('block_categories_all', function ($categories) {

    array_unshift($categories,   
      [
        'slug'  => 'achtergrond',
        'title' => 'Achtergronden',
        'icon'  => null
    ],        
    [
        'slug'  => 'bibliotheek',
        'title' => 'Pagina secties',
        'icon'  => null
    ],  
    [
        'slug'  => 'elementen',
        'title' => 'Losse elementen',
        'icon'  => null
    ],

  
);

return $categories;
}, 10, 1);


/*
|--------------------------------------------------------------------------
| All allowed blocks
|--------------------------------------------------------------------------
*/
add_filter('allowed_block_types_all', function($allowed_blocks, $editor_context) {
    $blocks = get_blocks();
    $acf_blocks = []; 
    foreach ($blocks as $block) { 
        $acf_blocks[] = 'acf/' . $block;
    }

    $core_blocks = [
        // 'core/paragraph',
        // 'core/heading',
    ];

    return array_merge($acf_blocks, $core_blocks);
}, 10, 2);


/*
|--------------------------------------------------------------------------
| Register blocks
|--------------------------------------------------------------------------
*/
add_action( 'init', 'register_acf_blocks', 5 );
function register_acf_blocks() {

    $blocks = get_blocks();
    foreach ($blocks as $block) {
            register_block_type( __DIR__ . '/blocks/'.$block );
    }
}

/*
|--------------------------------------------------------------------------
| Get all blocks name from the folder name
|--------------------------------------------------------------------------
*/
function get_blocks() {
	$theme   = wp_get_theme();
	$blocks  = get_option( 'cwp_blocks' );
	$version = get_option( 'cwp_blocks_version' );
	if ( empty( $blocks ) || version_compare( $theme->get( 'Version' ), $version ) || ( function_exists( 'wp_get_environment_type' )  ) ) {
		$blocks = scandir( get_template_directory() . '/blocks/' );
		$blocks = array_values( array_diff( $blocks, array( '..', '.', '.DS_Store', '_base-block' ) ) );

		update_option( 'cwp_blocks', $blocks );
		update_option( 'cwp_blocks_version', $theme->get( 'Version' ) );
	}
	return $blocks;
}



/*
|--------------------------------------------------------------------------
| Script for one block
|--------------------------------------------------------------------------
*/
function cwp_register_block_script() {
    $blocks = get_blocks();
    foreach ($blocks as $block) {
        wp_register_script( $block, get_template_directory_uri() . '/blocks/'.$block.'/script.js' );
    }

}
add_action( 'init', 'cwp_register_block_script' );
/*
|--------------------------------------------------------------------------
| ACF json files
|--------------------------------------------------------------------------
|
| 
| 
|
*/

/**
 * Save the ACF fields as JSON in the specified folder.
 * 
 * @param string $path
 * @returns string
 */
add_filter('acf/settings/save_json', function ($path) {
    $path = get_stylesheet_directory() . '/acf-json';
    return $path;
});
/**
 * Load the ACF fields as JSON in the specified folder.
 *
 * @param array $paths
 * @returns array
 */
add_filter('acf/settings/load_json', function ($paths) {
    unset($paths[0]);
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
});



/*
|--------------------------------------------------------------------------
| ACF icon picker
|--------------------------------------------------------------------------
|
| 
| 
|
*/

// modify the path to the icons directory
add_filter( 'acf_icon_path_suffix', 'acf_icon_path_suffix' );

function acf_icon_path_suffix( $path_suffix ) {
    return 'img/icons-acf/';
}

// modify the path to the above prefix
add_filter( 'acf_icon_path', 'acf_icon_path' );

function acf_icon_path( $path_suffix ) {
    return plugin_dir_path( __FILE__ );
}

// modify the URL to the icons directory to display on the page
add_filter( 'acf_icon_url', 'acf_icon_url' );

function acf_icon_url( $path_suffix ) {
    return plugin_dir_url( __FILE__ );
}





/*
|--------------------------------------------------------------------------
| Add an dublicate knop
|--------------------------------------------------------------------------
|
| 
| 
|
*/


/*
 * Function for post duplication. Dups appear as drafts. User is redirected to the edit screen
 */

function rd_duplicate_post_as_draft() {
  global $wpdb;

  // Controleer of de actie is toegestaan voor de huidige gebruiker
  if (!current_user_can('edit_posts')) {
    wp_die('You do not have permission to duplicate posts.');
  }

  if (!isset($_GET['post']) && !isset($_POST['post'])) {
    wp_die('No post to duplicate has been supplied.');
  }

  // Nonce-verificatie
  if (!isset($_GET['duplicate_nonce']) || !wp_verify_nonce($_GET['duplicate_nonce'], basename(__FILE__))) {
    wp_die('Security check failed.');
  }

  $post_id = (isset($_GET['post']) ? absint($_GET['post']) : absint($_POST['post']));
  $post = get_post($post_id);

  // Controleer of het berichttype wordt ondersteund (post, page, product)
  $supported_post_types = array('post', 'page', 'product');

  if ($post && in_array($post->post_type, $supported_post_types)) {
    // Maak een nieuw bericht op basis van het originele bericht
    $new_post_args = array(
      'post_type' => $post->post_type,
      'post_title' => 'Copy of ' . $post->post_title,
      'post_content' => $post->post_content,
      'post_status' => 'draft',
      'post_author' => get_current_user_id(),
      'post_parent' => $post->post_parent,
      'post_excerpt' => $post->post_excerpt,
    );

    $new_post_id = wp_insert_post($new_post_args);

    if ($new_post_id) {
      // Dupliceer categorieën en tags
      $taxonomies = get_object_taxonomies($post->post_type);

      foreach ($taxonomies as $taxonomy) {
        $post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
        wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
      }

      // Dupliceer postmeta
      $post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");

      if ($post_meta_infos) {
        foreach ($post_meta_infos as $meta_info) {
          $meta_key = $meta_info->meta_key;

          if ($meta_key == '_wp_old_slug') continue;

          $meta_value = $meta_info->meta_value;
          update_post_meta($new_post_id, $meta_key, $meta_value);
        }
      }

      // Stuur de gebruiker naar het bewerkscherm van het gedupliceerde bericht
      wp_redirect(admin_url('post.php?action=edit&post=' . $new_post_id));
      exit;
    } else {
      wp_die('Failed to duplicate the post.');
    }
  } else {
    wp_die('Post creation failed, could not find the original post.');
  }
}

add_action('admin_action_rd_duplicate_post_as_draft', 'rd_duplicate_post_as_draft');

// Voeg de duplicatielink toe aan de acties voor berichten, pagina's en producten
function rd_duplicate_post_link($actions, $post) {
  if (current_user_can('edit_posts')) {
    $actions['duplicate'] = '<a href="' . wp_nonce_url(admin_url('admin.php?action=rd_duplicate_post_as_draft&post=' . $post->ID), basename(__FILE__), 'duplicate_nonce') . '" title="Duplicate this item" rel="permalink">Duplicate</a>';
  }
  return $actions;
}

add_filter('post_row_actions', 'rd_duplicate_post_link', 10, 2);
add_filter('page_row_actions', 'rd_duplicate_post_link', 10, 2);

// Voeg ondersteuning toe voor WooCommerce-producten (indien van toepassing)
add_filter('product_row_actions', 'rd_duplicate_post_link', 10, 2);






function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


function my_custom_js() {
    ?>
      <script>
        document.addEventListener( 'gform_confirmation_loaded', function( event ) {
          if ( event.detail.formId === '1' ) {
            document.getElementById( 'contact-modal' ).style.display = 'block';
          }
        }, false );
      </script>
    <?php
    }





/*
|--------------------------------------------------------------------------
| REMOVE GUTENBERG CSS
|--------------------------------------------------------------------------
|
| 
| 
|
*/

function remove_gutenberg_container_img_css() {
    // Voeg hier de naam van het CSS-bestand van Gutenberg toe waarin de class .block-editor__container img wordt gedefinieerd.
    $gutenberg_css_handle = 'wp-block-library';

    // Verwijder het Gutenberg CSS-bestand.
    wp_dequeue_style( $gutenberg_css_handle );
    wp_deregister_style( $gutenberg_css_handle );
}
add_action( 'wp_enqueue_scripts', 'remove_gutenberg_container_img_css', 100 );
add_action( 'admin_enqueue_scripts', 'remove_gutenberg_container_img_css', 100 );
add_action( 'enqueue_block_editor_assets', 'remove_gutenberg_container_img_css', 100 );


  
/*
|--------------------------------------------------------------------------
| Wordpress menu
|--------------------------------------------------------------------------
|
| 
| 
|
*/


function customize_dashboard_menu() {
    global $menu;

    // Vervang "super admin" door de gebruikersnaam die je wilt tonen.
    $allowed_user = 'kevin';

    // Haal de huidige ingelogde gebruiker op.
    $current_user = wp_get_current_user();
    $current_user_login = $current_user->user_login;

    // Verberg specifieke menu-onderdelen voor alle gebruikers behalve "kevin".
    if ($current_user_login !== $allowed_user) {
        // Hier kun je de volledige URL/querystrings vinden van de menu-onderdelen die je wilt verbergen:
        $hidden_menu_items_by_url = array(
            // 'edit.php',
            'edit.php?post_type=acf-field-group',
            'edit-comments.php',
            'themes.php',
            // 'plugins.php',
            // 'users.php',
            // 'options-general.php',
            // 'tools.php',
            'admin.php?page=ai1wm_export'
            // Voeg hier andere URL's/querystrings toe van de items die je wilt verbergen op basis van de URL.
        );

        // Hier kun je de classes vinden van de menu-onderdelen die je wilt verbergen:
        $hidden_menu_items_by_class = array(
            'toplevel_page_wppusher', 
            'toplevel_page_ai1wm_export',
            'menu-top toplevel_page_mlang',
            // 'toplevel_page_rank-math',
            'toplevel_page_zci_settings',
            'menu-top toplevel_page_edit?post_type=filter-set',
            // Voeg hier andere classes toe van de items die je wilt verbergen op basis van de class.
        );

        foreach ($menu as $key => $item) {
            // Verberg op basis van URL/querystring.
            if (in_array($item[2], $hidden_menu_items_by_url)) {
                unset($menu[$key]);
            }

            // Verberg op basis van class.
            foreach ($hidden_menu_items_by_class as $class) {
                if (strpos($item[4], $class) !== false) {
                    unset($menu[$key]);
                    break;
                }
            }
        }
    }
}

add_action('admin_menu', 'customize_dashboard_menu');


/*
|--------------------------------------------------------------------------
| Wordpress topbar
|--------------------------------------------------------------------------
|
| 
| 
|
*/

function add_custom_admin_bar_styles() {
    // Controleren of de gebruiker is ingelogd
    if (is_user_logged_in()) {
        // Gebruiker met de gebruikersnaam "xxx" uitsluiten
        $user = wp_get_current_user();
        if ($user->user_login === 'xxx') {
            return;
        }

        // Voeg hier de CSS-styling toe voor de menu-items die je wilt aanpassen
        $custom_styles = "
            #wp-admin-bar-comments { display: none !important; }
            #wp-admin-bar-customize { display: none !important; }
            #wp-admin-bar-new-content { display: none !important; }
            #wp-admin-bar-rank-math { display: none !important; }
            #dashboard_primary { display: none !important; }
            #dashboard_quick_press { display: none !important; }
            #dashboard_activity  { display: none !important; }
            #welcome-panel { display: none !important; }
            #dashboard_site_health { display: none !important; }
            #rg_forms_dashboard { display: none !important; }
            // #menu-posts { display: none !important; }
            #menu-comments { display: none !important; }
            #wc_admin_dashboard_setup { display: none !important; }
            #rank_math_dashboard_widget { display: none !important; }
            #toplevel_page_getwooplugins { display: none !important; }
            #wp-admin-bar-weglot { display: none !important; }
            #toplevel_page_weglot-settings { display: none !important; }
            #cookiebot_status { display: none !important; }
            #toplevel_page_wefact-settings { display: none !important; }
            #toplevel_page_cookiebot { display: none !important; }
            #toplevel_page_password-protected { display: none !important; }
            #menu-posts-viwec_template { display: none !important; }
            #toplevel_page_admin-page-wc-settings-tab-buckaroo_settings { display: none !important; }
            #toplevel_page_aws-options { display: none !important; }
            /* Voeg hier meer CSS-styling toe indien nodig */
        ";

        // Voeg de CSS-styling toe aan zowel de front-end als het WordPress-dashboard
        echo '<style type="text/css">' . $custom_styles . '</style>';
        echo '<style type="text/css" id="custom-admin-bar-styles">' . $custom_styles . '</style>';
    }
}
add_action('wp_head', 'add_custom_admin_bar_styles');
add_action('admin_head', 'add_custom_admin_bar_styles');



/*
|--------------------------------------------------------------------------
| Wordpress footer
|--------------------------------------------------------------------------
|
| 
| 
|
*/


function vervang_dashboard_footer_tekst() {
    echo 'Day Six Digitale Communicatie B.V.';
}

add_filter('admin_footer_text', 'vervang_dashboard_footer_tekst');



/*
|--------------------------------------------------------------------------
| Wordpress admin URL
|--------------------------------------------------------------------------
|
| 
| 
|
*/

// Functie voor het doorverwijzen van "/backend" naar "/wp-login.php"
function redirect_backend_to_wp_login() {
    if ($_SERVER['REQUEST_URI'] == '/backend') {
        wp_redirect(wp_login_url());
        exit;
    }
}
add_action('init', 'redirect_backend_to_wp_login');



/*
|--------------------------------------------------------------------------
| E-mailadres verzenden van mails
|--------------------------------------------------------------------------
|
| 
| 
|
*/

function custom_wp_mail_from($original_email_address) {
    // Vervang 'jouw@emailadres.com' door het gewenste specifieke e-mailadres
    return 'noreply@bedrijfsnaam.nl';
}

function custom_wp_mail_from_name($original_email_from) {
    // Vervang 'Jouw Naam' door de gewenste afzender naam
    return 'Bedrijfsnaam';
}

add_filter('wp_mail_from', 'custom_wp_mail_from');
add_filter('wp_mail_from_name', 'custom_wp_mail_from_name');


/*
|--------------------------------------------------------------------------
| Hide Super Admin
|--------------------------------------------------------------------------
|
| 
| 
|
*/

function exclude_user_kevin_from_users_list($query) {
    if (!is_admin()) {
        return; // We voeren deze actie alleen uit in de backend
    }

    $current_user = wp_get_current_user();

    // Controleer of de huidige gebruiker "super admin" is
    if ($current_user->user_login === 'kevin') {
        return; // "super admin" kan zijn eigen gebruikersgegevens zien
    }

    // Haal de huidige gebruiker op
    $current_user_id = $current_user->ID;

    // Haal de gebruiker "super admin" op
    $kevin_user = get_user_by('login', 'kevin');

    // Controleer of "super admin" bestaat en niet dezelfde is als de huidige gebruiker
    if ($kevin_user && $current_user_id !== $kevin_user->ID) {
        // Voeg een voorwaarde toe aan de gebruikersquery om "super admin" te verbergen voor andere gebruikers
        $query->query_vars['exclude'] = array($kevin_user->ID);
    }
}
add_action('pre_get_users', 'exclude_user_kevin_from_users_list');



/*
|--------------------------------------------------------------------------
| Hide auteur
|--------------------------------------------------------------------------
|
| 
| 
|
*/


function verwijder_auteur_en_reacties_kolommen($columns) {
    // Controleer of de 'auteur' kolom aanwezig is in de array van kolommen
    if (isset($columns['author'])) {
        // Verwijder de 'auteur' kolom uit de array
        unset($columns['author']);
    }

    // Controleer of de 'reacties' kolom aanwezig is in de array van kolommen
    if (isset($columns['comments'])) {
        // Verwijder de 'reacties' kolom uit de array
        unset($columns['comments']);
    }

    return $columns;
}
add_filter('manage_posts_columns', 'verwijder_auteur_en_reacties_kolommen');
add_filter('manage_pages_columns', 'verwijder_auteur_en_reacties_kolommen');




/*
|--------------------------------------------------------------------------
| WOOCOMMERCE
|--------------------------------------------------------------------------
|
| 
| 
|
*/

function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );




/*
|--------------------------------------------------------------------------
| VERTALINGEN
|--------------------------------------------------------------------------
|
| 
| 
|
*/

function custom_frontend_translations($translated_text, $text, $domain) {
    switch ($text) {
            case 'Re-Order':
            $translated_text = 'Volgorde';
            break;
             case 'Reset all':
            $translated_text = 'Reset alle filters';
            break;
            case 'Add to cart':
            $translated_text = 'Voeg toe +';
            break;
            case 'Verwijderen van lijst':
            $translated_text = 'Test';
            break;
            case 'Op uitverkoop':
            $translated_text = 'Aanbiedingen';
            break;
            case 'On sale':
            $translated_text = 'Aanbiedingen';
            break;
       
    }
    return $translated_text;
}

add_filter('gettext', 'custom_frontend_translations', 20, 3);



/*
|--------------------------------------------------------------------------
| FILTER EVERYTHING POP-UP INSTELLING
|--------------------------------------------------------------------------
|
| 
| 
|
*/

/* Start code to add in the functions.php */
add_filter( 'wpc_mobile_width', 'my_custom_wpc_mobile_width' );
function my_custom_wpc_mobile_width( $width ) {
    // Screen width in px when Filters widget should become mobile
    $width = 1200; 
    return $width;
}
/* End code to add in the functions.php  */





/*
|--------------------------------------------------------------------------
| SIDE BAR
|--------------------------------------------------------------------------
|
| 
| 
|
*/


register_sidebar( array(
  'name' => __( 'Filter sidebar', 'rmccollin' ),
  'id' => 'filter-sidebar',
  'description' => __( 'A widget area located to the left filter sidebar.', 'rmccollin' ),
  'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
  'after_widget' => '</div>',
  'before_title' => '<p class="">',
  'after_title' => '</p>',
) );
 
// Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false', 100 );
 
// Disables the block editor from managing widgets. renamed from wp_use_widgets_block_editor
add_filter( 'use_widgets_block_editor', '__return_false' );


// Make an own input field for the quantity in the cart because why not!!
add_action('wp_ajax_update_cart_quantity', 'handle_update_cart_quantity');
add_action('wp_ajax_nopriv_update_cart_quantity', 'handle_update_cart_quantity');

function handle_update_cart_quantity() {
    $cart_item_key = sanitize_text_field($_POST['cart_item_key']);
    $quantity = intval($_POST['quantity']);

    if ($cart_item = WC()->cart->get_cart_item($cart_item_key)) {
        WC()->cart->set_quantity($cart_item_key, $quantity, true);
        WC()->cart->calculate_totals();
        wp_send_json_success();
    } else {
        wp_send_json_error('Invalid cart item key');
    }
}




/*
|--------------------------------------------------------------------------
| VOORRAAD 0 NAAR CONCEPT
|--------------------------------------------------------------------------
|
| 
| 
|
*/

// Voeg de volgende code toe aan het functions.php bestand van je thema

// function voorraad_nul_naar_concept( $ID, $post ) {
//     // Controleer of het product een WooCommerce-product is
//     if ( 'product' === $post->post_type ) {
//         // Krijg de voorraadstatus van het product
//         $voorraad = get_post_meta( $ID, '_stock', true );

//         // Als voorraad 0 is, stel de status in op concept
//         if ( 0 === intval( $voorraad ) ) {
//             // Stel de status in op concept
//             $post_data = array(
//                 'ID'          => $ID,
//                 'post_status' => 'draft',
//             );
//             wp_update_post( $post_data );
//         }
//     }
// }

// // Haak de functie in op het save_post-evenement
// add_action( 'save_post', 'voorraad_nul_naar_concept', 10, 2 );




/*
|--------------------------------------------------------------------------
| RECENT BEKEKEN
|--------------------------------------------------------------------------
|
| 
| 
|
*/


function track_viewed_products() {
    if (is_product()) {
        global $post;

        // Haal de recent bekeken producten op
        $recently_viewed = get_transient('wcj_viewed_products');

        // Haal het ID van het huidige product op
        $current_product_id = $post->ID;

        if (empty($recently_viewed)) {
            $recently_viewed = array();
        }

        // Voeg het huidige product toe aan de lijst van recent bekeken producten
        if (!in_array($current_product_id, $recently_viewed)) {
            $recently_viewed[] = $current_product_id;

            // Beperk de lijst tot bijvoorbeeld de laatste 10 bekeken producten
            if (count($recently_viewed) > 10) {
                array_shift($recently_viewed);
            }

            // Bijwerk de transient
            set_transient('wcj_viewed_products', $recently_viewed, 12 * WEEK_IN_SECONDS); // 12 weken (aan te passen)
        }
    }
}
add_action('template_redirect', 'track_viewed_products');






function na_toevoegen_aan_winkelwagen($cart_item_key, $product_id, $quantity, $variation_id, $variation, $cart_item_data) {
    // Controleer of de actie al is uitgevoerd
    if (!isset($_SESSION['toegevoegd_aan_winkelwagen'])) {
        // Voeg hier je aangepaste functionaliteit toe nadat een product aan het winkelmandje is toegevoegd
        // Bijvoorbeeld, voeg je JavaScript-code toe om de pop-up te tonen.
        ?>
        <script>
            document.addEventListener("DOMContentLoaded", () => {
            try {
                const overlayShopCart = document.querySelector(".sidecart-overlay");
                const sidecart = document.querySelector("#sidecart-menu");
               
                overlayShopCart.classList.toggle("sidecart-overlay-active");
                sidecart.classList.toggle("sidecart-hidden");
                
            } catch (error) {
                console.error(error);
            }

            console.log('Product is toegevoegd aan het winkelmandje!');
            });
        </script>
        <?php

        // Markeer de actie als uitgevoerd in de sessievariabele
        $_SESSION['toegevoegd_aan_winkelwagen'] = true;
    }
}

add_action('woocommerce_add_to_cart', 'na_toevoegen_aan_winkelwagen', 10, 6);






function custom_login_logo_url() {
    return home_url(); // Vervang 'home_url()' door de gewenste URL
}
add_filter( 'login_headerurl', 'custom_login_logo_url' );

function custom_lost_password_url( $lostpassword_url, $redirect ) {
    return site_url( '/wp-login.php?action=lostpassword', 'login' ); // Standaard WordPress wachtwoord reset URL
}
add_filter( 'lostpassword_url', 'custom_lost_password_url', 10, 2 );




add_action( 'woocommerce_order_status_processing', 'custom_send_email_on_order_processing' );

function custom_send_email_on_order_processing( $order_id ) {
    // Get the order object
    $order = wc_get_order( $order_id );

    // Check if the order status is "in behandeling"
    if ( $order && $order->get_status() === 'processing' ) {
        // Check if the order contains products with the specified brand attribute
        $products_with_brand = array('Dogguo', 'Nutridog');
        $found_products = array();
        foreach ( $order->get_items() as $item ) {
            $product = $item->get_product();
            $product_brands = $product->get_attribute('pa_brand');
            if ( $product_brands && array_intersect( $products_with_brand, explode(', ', $product_brands) ) ) {
                $found_products[] = array(
                    'name'     => $product->get_name(),
                    'quantity' => $item->get_quantity()
                );
            }
        }

        // If products with specified brand attribute are found, send email
        if ( !empty($found_products) ) {
            $to = 'info@nutridog.nl';
            $subject = 'Nieuwe bestelling vereist intern beheer';
            $message = 'Er is een nieuwe bestelling geplaatst die een product omvat dat door ons intern wordt verzonden.' . PHP_EOL . PHP_EOL;
            $message .= 'Ordernummer: #' . $order_id . PHP_EOL . PHP_EOL;
            $message .= 'Producten:' . PHP_EOL;
            foreach ($found_products as $found_product) {
                $message .= $found_product['name'] . ' - Aantal: ' . $found_product['quantity'] . PHP_EOL;
            }
            wp_mail( $to, $subject, $message );
        }
    }
}



function gebruik_originele_afbeeldingen_in_zoekresultaten( $size ) {
    return 'full'; // Gebruik de volledige afbeelding
}
add_filter( 'aws_image_size', 'gebruik_originele_afbeeldingen_in_zoekresultaten' );







// Voeg kolommen toe aan het productoverzicht in de WooCommerce backend
add_filter('manage_edit-product_columns', 'add_custom_columns', 10);
function add_custom_columns($columns) {
    $columns['product_cost_price'] = __('Inkoopprijs', 'day-six');
    $columns['product_margin'] = __('Marge %', 'day-six');
    return $columns;
}

// Vul de kolommen met gegevens
add_action('manage_product_posts_custom_column', 'show_custom_columns', 10, 2);
function show_custom_columns($column, $post_id) {
    if ($column === 'product_cost_price') {
        $product = wc_get_product($post_id);

        if ($product->is_type('variable')) {
            echo __('Variabel', 'day-six');
        } else {
            $b2b_price = get_post_meta($post_id, 'b2b_price', true);
            $b2b_price = floatval($b2b_price);

            if ($b2b_price > 0) {
                echo sprintf('€ %.2f', $b2b_price);
            } else {
                echo __('', 'day-six');
            }
        }
    }

    if ($column === 'product_margin') {
        $product = wc_get_product($post_id);

        if ($product->is_type('variable')) {
            echo __('Variabel', 'day-six');
        } else {
            $b2b_price = floatval(get_post_meta($post_id, 'b2b_price', true));

            if ($b2b_price > 0) {
                $regular_price = floatval(get_post_meta($post_id, '_regular_price', true));
                $sale_price = floatval(get_post_meta($post_id, '_sale_price', true));
                $effective_price = $sale_price > 0 ? $sale_price : $regular_price;

                $margin = (($effective_price - $b2b_price) / $b2b_price) * 100;
                echo sprintf('%.2f%%', $margin);
            } else {
                echo __('', 'day-six');
            }
        }
    }
}

// Maak de kolommen sorteerbaar
add_filter('manage_edit-product_sortable_columns', 'make_custom_columns_sortable');
function make_custom_columns_sortable($columns) {
    $columns['product_cost_price'] = 'product_cost_price';
    $columns['product_margin'] = 'b2b_price'; // Gebruik inkoopprijs voor sorteren
    return $columns;
}

// Voeg sorting-functionaliteit toe
add_action('pre_get_posts', 'sort_custom_columns');
function sort_custom_columns($query) {
    if (!is_admin() || !$query->is_main_query()) {
        return;
    }

    if ($query->get('orderby') === 'product_cost_price') {
        $query->set('meta_key', 'b2b_price');
        $query->set('orderby', 'meta_value_num');
    }

    if ($query->get('orderby') === 'b2b_price') {
        $query->set('meta_key', 'b2b_price');
        $query->set('orderby', 'meta_value_num');
    }
}



// Voeg een admin notice toe met marge-informatie
add_action('admin_notices', 'show_margin_alert');
function show_margin_alert() {
    // Zorg ervoor dat de melding alleen op de productpagina's verschijnt
    $screen = get_current_screen();
    if ($screen->id !== 'edit-product') {
        return;
    }

    // Query om alle producten op te halen
    $args = [
        'post_type'      => 'product',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
    ];
    $query = new WP_Query($args);

    // Initialiseer de tellers
    $low_margin_count = 0;         // Tussen 10% en 20%
    $mid_margin_count = 0;         // Tussen 20% en 50%
    $high_margin_count = 0;        // Tussen 50% en 100%
    $very_high_margin_count = 0;   // Tussen 100% en 200%
    $critical_high_margin_count = 0; // Meer dan 200%
    $very_low_margin_count = 0;    // Tussen 1% en 10%
    $critical_margin_count = 0;    // Onder 1%

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();

            $product = wc_get_product(get_the_ID());

            if (!$product->is_type('variable')) {
                $b2b_price = floatval(get_post_meta(get_the_ID(), 'b2b_price', true));
                $regular_price = floatval(get_post_meta(get_the_ID(), '_regular_price', true));
                $sale_price = floatval(get_post_meta(get_the_ID(), '_sale_price', true));
                $effective_price = $sale_price > 0 ? $sale_price : $regular_price;

                if ($b2b_price > 0 && $effective_price > 0) {
                    $margin = (($effective_price - $b2b_price) / $b2b_price) * 100;

                    if ($margin >= 10 && $margin < 20) {
                        $low_margin_count++;
                    } elseif ($margin >= 20 && $margin < 50) {
                        $mid_margin_count++;
                    } elseif ($margin >= 50 && $margin < 100) {
                        $high_margin_count++;
                    } elseif ($margin >= 100 && $margin < 200) {
                        $very_high_margin_count++;
                    } elseif ($margin >= 200) {
                        $critical_high_margin_count++;
                    } elseif ($margin >= 1 && $margin < 10) {
                        $very_low_margin_count++;
                    } elseif ($margin < 1) {
                        $critical_margin_count++;
                    }
                }
            }
        }
        wp_reset_postdata();
    }

    // Toon de melding
    if (
        $low_margin_count > 0 || $mid_margin_count > 0 || $high_margin_count > 0 ||
        $very_high_margin_count > 0 || $critical_high_margin_count > 0 ||
        $very_low_margin_count > 0 || $critical_margin_count > 0
    ) {
        echo '<div class="notice notice-warning is-dismissible">';
        echo '<p><strong>Marge-informatie:</strong></p>';
        echo '<ul>';
        echo '<li>Producten met een marge onder 1%: ' . $critical_margin_count . '</li>';
        echo '<li>Producten met een marge tussen 1% en 10%: ' . $very_low_margin_count . '</li>';
        echo '<li>Producten met een marge tussen 10% en 20%: ' . $low_margin_count . '</li>';
        echo '<li>Producten met een marge tussen 20% en 50%: ' . $mid_margin_count . '</li>';
        echo '<li>Producten met een marge tussen 50% en 100%: ' . $high_margin_count . '</li>';
        echo '<li>Producten met een marge tussen 100% en 200%: ' . $very_high_margin_count . '</li>';
        echo '<li>Producten met een marge groter dan 200%: ' . $critical_high_margin_count . '</li>';
        echo '</ul>';
        echo '</div>';
    }
}
