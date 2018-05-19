<?php
/**
 * Plugin Name: Taxonomy List
 * Version: 1.0.0
 * Plugin URI: http://plugins.muhammadrehman.com/
 * Description: You can display list of any taxonomy terms by using shortcode.
 * Author: Muhammad Rehman
 * Author URI: http://muhammadrehman.com/
 * License: GPLv2 or later
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
 
define('WPTLS_PLUGIN_DIR_URL',plugin_dir_url( __FILE__ ) );
 
function wptls_style() {
    wp_enqueue_style( 'wptls_fontawesome', 'https://use.fontawesome.com/releases/v5.0.8/css/all.css' );
    wp_enqueue_style( 'wptls_style', WPTLS_PLUGIN_DIR_URL . 'assets/style.css' );
    wp_enqueue_script( 'wptls_script', WPTLS_PLUGIN_DIR_URL . 'assets/script.js', array(),false ,true);
}

add_action( 'wp_enqueue_scripts', 'wptls_style' );

add_shortcode( 'taxonomy_list', 'wptls_taxonomy_list' );

function wptls_taxonomy_list( $atts ) {
    $atts = shortcode_atts( array(
        'name' => 'category',
        'hide_empty' => false,
        'exclude' => '',
        'include' => '',
        'order' => 'ASC',
    ), $atts);


    $terms = get_terms( array(
        'taxonomy' => $atts['name'],
        'hide_empty' => $atts['hide_empty'],
        'orderby' => 'id',
        'order' => $atts['order'],
        'parent'   => 0
    ) );

    $html = '<div class="taxonomy-list">';

    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
        foreach ( $terms as $term ) {
            
            if( !empty( $atts['exclude'] ) ) {
                $exclude = explode( ',',$atts['exclude'] );
                if( in_array( $term->term_id, $exclude) ) {
                    continue;
                }
            }
            
            if( !empty( $atts['include'] ) ) {
                $include = explode( ',',$atts['include'] );
                if( !in_array( $term->term_id, $include) ) {
                    continue;
                }
            }
            
            $image = '';
            if( function_exists('get_woocommerce_term_meta') ) {
                $thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
                $image = wp_get_attachment_url( $thumbnail_id );
            }
                
            $html .= '<div class="taxonomy-list-item">';
            $term_link = get_term_link( $term );
            
            if( wptls_has_child_terms( $atts['name'],$term->term_id,$atts['hide_empty'] ) == true )
                $html .= '<div class="tax-arrow"><i class="fas fa-angle-right"></i></div>';
            
            $html .= '<div class="tax-details">
                <div class="tax-name">                
                <div class="tax-image"><img src="'.$image.'" width="50"></div><div class="tax-title"><a href="' . esc_url( $term_link ) . '">' . $term->name . '</a></div>
                </div>';
            $html .= '<div class="tax-desc">' . $term->description . '</div>
                </div>';
                    
            $child_terms = get_terms( array(
                'taxonomy' => $atts['name'],
                'hide_empty' => $atts['hide_empty'],
                'orderby' => 'id',
                'order' => $atts['order'],
                'parent'   => $term->term_id
            ) );
            
            foreach ( $child_terms as $child_term ) {
                
                $image = '';
                if( function_exists('get_woocommerce_term_meta') ) {
                    $thumbnail_id = get_woocommerce_term_meta( $child_term->term_id, 'thumbnail_id', true );
                    $image = wp_get_attachment_url( $thumbnail_id );
                }
                
                $html .= '<div class="tax-child-list-item">';
                $child_term_link = get_term_link( $child_term );
                $html .= '<div class="tax-name">
                        <div class="tax-image"><img src="'.$image.'" width="50"></div><div class="tax-title"><a href="' . esc_url( $child_term_link ) . '">' . $child_term->name . '</a></div>
                </div>';
                $html .= '<div class="tax-desc">' . $child_term->description . '</div>';
                $html .= '</div>';
            }
            
            $html .= '</div>';
        }
    }
    
    $html .= '</div>';
    return $html;
}

function wptls_has_child_terms( $taxonomy, $parent_id, $hide_empty ) {
    $has_child_terms = get_terms( array(
        'taxonomy' => $taxonomy,
        'hide_empty' => $hide_empty,
        'parent'   => $parent_id
    ) );
    
    if( !empty( $has_child_terms ) )
        return true;
    else 
        return false;
}