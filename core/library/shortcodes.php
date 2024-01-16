<?php


// Creating short code
function shortcode_editable($atts)
{

    $a = shortcode_atts(
        array(
            'id' => '', //Provide any default id.
            'type' => '', //Provide any default id. 
            'item' => ''
        ),
        $atts
    );


    $editable = get_post_meta($a['id'], 'meta', true);

    $editables = get_posts(['posts_per_page' => 200, 'post_type' => 'editables', 'meta_query' => [['key' => 'meta', 'value' => strtr(serialize(['related' => (string) $editable['related']]), ['a:1:{' => '', '}' => '']), 'compare' => 'like']], 'orderby' => 'menu_order', 'order' => 'ASC']);

    $array = $meta = $result = [];

    foreach ($editables as $editable) {
        $metas = $editable->meta;
        $type = $metas['editable_type'];
        unset($metas['related'], $metas['reset'], $metas['editable_type']);

        foreach ($metas as $field => $values) {
            foreach ($values as $keys => $value) {
                $result[strstr($keys, '_', true)] = $value;
            }
            $meta[] = $result;
            unset($metas[$field]);
        }

        if (isset($array[$type])) {
            $array[$type][] = ['ID' => $editable->ID, 'title' => $editable->post_title, 'description' => $editable->post_excerpt, 'itens' => $meta];

        } else {
            $array[$type] = ['ID' => $editable->ID, 'title' => $editable->post_title, 'description' => $editable->post_excerpt, 'itens' => $meta];
        }
        unset($meta);
    }
 
        print_r($array[$a['type']]['itens'][$a['item']]); 
}
add_shortcode('editable', 'shortcode_editable');
