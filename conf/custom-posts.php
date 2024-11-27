<?php

if (!defined('ABSPATH')) {
    exit;
}

const CPT_MAP_PLACE = 'map_note_place';

return [
    // BEGIN:CPT_MAP_PLACE
    [
        // Post type name
        CPT_MAP_PLACE,

        // Post type arguments.
        [
            'labels'              => [
                'name'          => _x('Places', 'map_note_place label', 'map-note-wp'),
                'singular_name' => _x('Place', 'map_note_place label', 'map-note-wp'),
                'add_new_item'  => _x('Add New Place', 'map_note_place label', 'map-note-wp'),
                #'edit_item'                => _x('', 'map_note_place label', 'map-note-wp'),
                #'new_item'                 => _x('', 'map_note_place label', 'map-note-wp'),
                #'view_item'                => _x('', 'map_note_place label', 'map-note-wp'),
                #'view_items'               => _x('', 'map_note_place label', 'map-note-wp'),
                #'search_items'             => _x('', 'map_note_place label', 'map-note-wp'),
                #'not_found'                => _x('', 'map_note_place label', 'map-note-wp'),
                #'not_found_in_trash'       => _x('', 'map_note_place label', 'map-note-wp'),
                #'parent_item_colon'        => _x('', 'map_note_place label', 'map-note-wp'),
                #'all_items'                => _x('', 'map_note_place label', 'map-note-wp'),
                #'archives'                 => _x('', 'map_note_place label', 'map-note-wp'),
                #'attributes'               => _x('', 'map_note_place label', 'map-note-wp'),
                #'insert_into_item'         => _x('', 'map_note_place label', 'map-note-wp'),
                #'uploaded_to_this_item'    => _x('', 'map_note_place label', 'map-note-wp'),
                #'featured_image'           => _x('', 'map_note_place label', 'map-note-wp'),
                #'set_featured_image'       => _x('', 'map_note_place label', 'map-note-wp'),
                #'remove_featured_image'    => _x('', 'map_note_place label', 'map-note-wp'),
                #'use_featured_image'       => _x('', 'map_note_place label', 'map-note-wp'),
                #'menu_name'                => _x('', 'map_note_place label', 'map-note-wp'),
                #'filter_items_list'        => _x('', 'map_note_place label', 'map-note-wp'),
                #'filter_by_date'           => _x('', 'map_note_place label', 'map-note-wp'),
                #'items_list_navigation'    => _x('', 'map_note_place label', 'map-note-wp'),
                #'items_list'               => _x('', 'map_note_place label', 'map-note-wp'),
                #'item_published'           => _x('', 'map_note_place label', 'map-note-wp'),
                #'item_published_privately' => _x('', 'map_note_place label', 'map-note-wp'),
                #'item_reverted_to_draft'   => _x('', 'map_note_place label', 'map-note-wp'),
                #'item_trashed'             => _x('', 'map_note_place label', 'map-note-wp'),
                #'item_scheduled'           => _x('', 'map_note_place label', 'map-note-wp'),
                #'item_updated'             => _x('', 'map_note_place label', 'map-note-wp'),
                #'item_link'                => _x('', 'map_note_place label', 'map-note-wp'),
                #'item_link_description'    => _x('', 'map_note_place label', 'map-note-wp'),
            ],
            'description'         => 'map-note-wp place custom post type',
            'public'              => false,
            'hierarchical'        => false,
            'exclude_from_search' => true,
            'publicly_queryable'  => false,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => false,
            'show_in_admin_bar'   => false,
            'show_in_rest'        => true,
            'menu_icon'           => 'dashicons-location',
            'map_meta_cap'        => true,
            'supports'            => ['title', 'editor'],
            'has_archive'         => false,
            'rewrite'             => [
                'slug'       => 'location',
                'with_front' => false,
                'feeds'      => false,
                'pages'      => false,
                'ep_mask'    => EP_PERMALINK,
            ],
            'query_var'           => true,
            'can_export'          => true,
            'delete_with_user'    => null,
        ]
    ], // END:CPT_MAP_PLACE
];
