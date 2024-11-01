<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly   

/**
 * Retrieving the values:
 * Price = get_post_meta( get_the_ID(), 'wikilms_price', true )
 * Duration = get_post_meta( get_the_ID(), 'wikilms_duration', true )
 * Max Students = get_post_meta( get_the_ID(), 'wikilms_students', true )
 * Skill Level = get_post_meta( get_the_ID(), 'wikilms_level', true )
 * Course Access = get_post_meta( get_the_ID(), 'wikilms_access', true )
 * Language = get_post_meta( get_the_ID(), 'wikilms_language', true )
 * Contact Form 7 Shortcode ID = get_post_meta( get_the_ID(), 'contact_shortcodes', true )
 */

class Wikilms_Meta_Box {
    private $config = '{"title":"Course Info","prefix":"wikilms_","domain":"wikilms","class_name":"Wikilms_Meta_Box","post-type":["post"],"context":"normal","priority":"default","cpt":"wl-courses","fields":[{"type":"text","label":"Price","id":"wikilms_price"},{"type":"text","label":"Duration","id":"wikilms_duration"},{"type":"text","label":"Max Students","id":"wikilms_students"},{"type":"text","label":"Skill Level","id":"wikilms_level"},{"type":"text","label":"Course Access","id":"wikilms_access"},{"type":"text","label":"Language","id":"wikilms_language"},{"type":"text","label":"Contact Form 7 Shortcode ID","id":"contact_shortcodes"}]}';

    public function __construct() {
        $this->config = json_decode( $this->config, true );
        $this->process_cpts();
        add_action( 'add_meta_boxes', [ $this, 'add_meta_boxes' ] );
        add_action( 'save_post', [ $this, 'save_post' ] );
    }

    public function process_cpts() {
        if ( !empty( $this->config['cpt'] ) ) {
            if ( empty( $this->config['post-type'] ) ) {
                $this->config['post-type'] = [];
            }
            $parts = explode( ',', $this->config['cpt'] );
            $parts = array_map( 'trim', $parts );
            $this->config['post-type'] = array_merge( $this->config['post-type'], $parts );
        }
    }

    public function add_meta_boxes() {
        foreach ( $this->config['post-type'] as $screen ) {
            add_meta_box(
                sanitize_title( $this->config['title'] ),
                $this->config['title'],
                [ $this, 'add_meta_box_callback' ],
                $screen,
                $this->config['context'],
                $this->config['priority']
            );
        }
    }

    public function save_post( $post_id ) {
        foreach ( $this->config['fields'] as $field ) {
            switch ( $field['type'] ) {
                default:
                    if ( isset( $_POST[ $field['id'] ] ) ) {
                        $sanitized = sanitize_text_field( $_POST[ $field['id'] ] );
                        update_post_meta( $post_id, $field['id'], $sanitized );
                    }
            }
        }
    }

    public function add_meta_box_callback() {
        $this->fields_table();
    }

    private function fields_table() {
        ?><table class="form-table" role="presentation">
            <tbody><?php
                foreach ( $this->config['fields'] as $field ) {
                    ?><tr>
                        <th scope="row"><?php $this->label( $field ); ?></th>
                        <td><?php $this->field( $field ); ?></td>
                    </tr><?php
                }
            ?></tbody>
        </table><?php
    }

    private function label( $field ) {
        switch ( $field['type'] ) {
            default:
                printf(
                    '<label class="" for="%s">%s</label>',
                    esc_attr($field['id']), esc_html($field['label'])
                );
        }
    }

    private function field( $field ) {
        switch ( $field['type'] ) {
            default:
                $this->input( $field );
        }
    }

    private function input( $field ) {
        printf(
            '<input class="regular-text %s" id="%s" name="%s" %s type="%s" value="%s">',
            isset( $field['class'] ) ? esc_attr($field['class']) : '',
            esc_attr($field['id']), esc_attr($field['id']),
            isset( $field['pattern'] ) ? "pattern='{$field['pattern']}'" : '',
            $field['type'],
            $this->value( $field )
        );
    }

    private function value( $field ) {
        global $post;
        if ( metadata_exists( 'post', $post->ID, $field['id'] ) ) {
            $value = get_post_meta( $post->ID, $field['id'], true );
        } else if ( isset( $field['default'] ) ) {
            $value = $field['default'];
        } else {
            return '';
        }
        return str_replace( '\u0027', "'", $value );
    }

}
new Wikilms_Meta_Box;