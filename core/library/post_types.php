<?php



function post_types()
{
    create_types('post_type', 'female', 'editables', '', 'Editável', 'Editáveis', ['title', 'editor', 'excerpt', 'thumbnail'], 'dashicons-editor-code', '', [], 'private');
    create_types('post_type', 'male', 'works', '', 'Projeto', 'Projetos', ['title', 'thumbnail'], 'dashicons-feedback', '', [], 'public'); 
    create_types('post_type', 'male', 'depoiments', '', 'Depoimento', 'Depoimentos', ['title', 'editor','thumbnail'], 'dashicons-list-view', '', [], 'private'); 
}

create_column('editables', 'Shortcode', 'shortcode', true); 
create_column('editables', 'Tipo', 'editable_type', true); 
create_column('editables', 'Relação', 'related', true); 
 



add_action('init', 'post_types', 0);