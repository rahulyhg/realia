<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Class Realia_Post_Type_Agent
 *
 * @class Realia_Post_Type_Agent
 * @package Realia/Classes/Post_Types
 * @author Pragmatic Mates
 */
class Realia_Post_Type_Agent {
    /**
     * Initialize custom post type
     *
     * @access public
     * @return void
     */
    public static function init() {
        add_action( 'init', array( __CLASS__, 'definition' ) );
        add_filter( 'cmb2_meta_boxes', array( __CLASS__, 'fields' ) );
    }

    /**
     * Custom post type definition
     *
     * @access public
     * @return void
     */
    public static function definition() {
        $labels = array(
            'name'               => __( 'Agents', 'realia' ),
            'singular_name'      => __( 'Agent', 'realia' ),
            'add_new'            => __( 'Add New Agent', 'realia' ),
            'add_new_item'       => __( 'Add New Agent', 'realia' ),
            'edit_item'          => __( 'Edit Agent', 'realia' ),
            'new_item'           => __( 'New Agent', 'realia' ),
            'all_items'          => __( 'All Agents', 'realia' ),
            'view_item'          => __( 'View Agent', 'realia' ),
            'search_items'       => __( 'Search Agent', 'realia' ),
            'not_found'          => __( 'No agents found', 'realia' ),
            'not_found_in_trash' => __( 'No agents found in Trash', 'realia' ),
            'parent_item_colon'  => '',
            'menu_name'          => __( 'Agents', 'realia' ),
        );

        register_post_type( 'agent', array(
            'labels'        => $labels,
            'supports'      => array( 'title', 'editor', 'thumbnail', ),
            'public'        => true,
            'show_ui'       => true,
            'has_archive'   => true,
            'rewrite'       => array( 'slug' => __( 'agents', 'realia' ) ),
            'menu_position' => 45,
            'categories'    => array( ),
            'menu_icon'     => 'dashicons-businessman',
        ) );
    }

    /**
     * Defines custom fields
     *
     * @access public
     * @param array $metaboxes
     * @return array
     */
    public static function fields( array $metaboxes ) {
        $metaboxes[REALIA_AGENT_PREFIX . 'general'] = array(
            'id'              => REALIA_AGENT_PREFIX . 'general',
            'title'           => __( 'General Options', 'realia' ),
            'object_types'    => array( 'agent' ),
            'context'         => 'normal',
            'priority'        => 'high',
            'show_names'      => true,
            'fields'          => array(
                array(
                    'id'                => REALIA_AGENT_PREFIX . 'email',
                    'name'              => __( 'E-mail', 'realia' ),
                    'type'              => 'text',
                ),
                array(
                    'id'                => REALIA_AGENT_PREFIX . 'web',
                    'name'              => __( 'Web', 'realia' ),
                    'type'              => 'text',
                ),
                array(
                    'id'                => REALIA_AGENT_PREFIX . 'phone',
                    'name'              => __( 'Phone', 'realia' ),
                    'type'              => 'text',
                ),
                array(
                    'id'                => REALIA_AGENT_PREFIX . 'address',
                    'name'              => __( 'Address', 'realia' ),
                    'type'              => 'textarea',
                ),
                array(
                    'name'              => __( 'Agencies', 'realia' ),
                    'id'                => REALIA_AGENT_PREFIX . 'agencies',
                    'type'              => 'custom_attached_posts',
                    'options'           => array(
                        'single'        => true,
                        'query_args'    => array( 'posts_per_page' => -1, 'post_type' => 'agency' ),
                    ),
                ),
            )
        );

        return $metaboxes;
    }
}

Realia_Post_Type_Agent::init();