<?php

if (!defined('ABSPATH')) {
    exit;
}

const TAX_MAP_PLACE_CAT = 'map_note_place_cat';

return [
    // BEGIN:TAX_MAP_PLACE_CAT
    [
        TAX_MAP_PLACE_CAT,
        [
            CPT_MAP_PLACE,
        ],
        [
            'labels'                => [
                'name'                       => _x('Place Categories', 'map_note_place_cat label', 'map-note-wp'),
                'singular_name'              => _x('Place Category', 'map_note_place_cat label', 'map-note-wp'),
                #'search_items'               => _x('', 'map_note_place_cat label', 'map-note-wp'),
                #'popular_items'              => _x('', 'map_note_place_cat label', 'map-note-wp'),
                #'all_items'                  => _x('', 'map_note_place_cat label', 'map-note-wp'),
                #'parent_item'                => _x('', 'map_note_place_cat label', 'map-note-wp'),
                #'parent_item_colon'          => _x('', 'map_note_place_cat label', 'map-note-wp'),
                #'name_field_description'     => _x('', 'map_note_place_cat label', 'map-note-wp'),
                #'slug_field_description'     => _x('', 'map_note_place_cat label', 'map-note-wp'),
                #'parent_field_description'   => _x('', 'map_note_place_cat label', 'map-note-wp'),
                #'desc_field_description'     => _x('', 'map_note_place_cat label', 'map-note-wp'),
                #'edit_item'                  => _x('', 'map_note_place_cat label', 'map-note-wp'),
                #'view_item'                  => _x('', 'map_note_place_cat label', 'map-note-wp'),
                #'update_item'                => _x('', 'map_note_place_cat label', 'map-note-wp'),
                #'add_new_item'               => _x('', 'map_note_place_cat label', 'map-note-wp'),
                #'new_item_name'              => _x('', 'map_note_place_cat label', 'map-note-wp'),
                #'template_name'              => _x('', 'map_note_place_cat label', 'map-note-wp'),
                #'separate_items_with_commas' => _x('', 'map_note_place_cat label', 'map-note-wp'),
                #'add_or_remove_items'        => _x('', 'map_note_place_cat label', 'map-note-wp'),
                #'choose_from_most_used'      => _x('', 'map_note_place_cat label', 'map-note-wp'),
                #'not_found'                  => _x('', 'map_note_place_cat label', 'map-note-wp'),
                #'no_terms'                   => _x('', 'map_note_place_cat label', 'map-note-wp'),
                #'filter_by_item'             => _x('', 'map_note_place_cat label', 'map-note-wp'),
                #'items_list_navigation'      => _x('', 'map_note_place_cat label', 'map-note-wp'),
                #'items_list'                 => _x('', 'map_note_place_cat label', 'map-note-wp'),
                #'most_used'                  => _x('', 'map_note_place_cat label', 'map-note-wp'),
                #'back_to_items'              => _x('', 'map_note_place_cat label', 'map-note-wp'),
                #'item_link'                  => _x('', 'map_note_place_cat label', 'map-note-wp'),
                #'item_link_description'      => _x('', 'map_note_place_cat label', 'map-note-wp'),
            ],
            'description'           => 'map_note_place_cat custom taxonomy',
            'public'                => false,
            'publicly_queryable'    => false,
            'hierarchical'          => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'show_in_nav_menus'     => true,
            'show_in_rest'          => true,
            'show_tagcloud'         => true,
            'show_in_quick_edit'    => true,
            'show_admin_column'     => false,
            'meta_box_sanitize_cb'  => null,
            'default_term'          => [
                'name'        => '',
                'slug'        => '',
                'description' => _x('', 'map_note_place_cat default term description', 'map-note-wp'),
            ],
            'sort'                  => false,
            'args'                  => [],
        ]
    ],
    // END:TAX_MAP_PLACE_CAT
];
