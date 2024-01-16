<?php

 

/* Mudar Rodapé da administração */
function footerInfo() {
    echo "Desenvolvido: DevStep Studio.";
}
add_filter('admin_footer_text', 'footerInfo');
 

/* ADMIN */
require get_parent_theme_file_path('core/admin/init.php');
require get_parent_theme_file_path('core/library/meta_boxs.php');   
require get_parent_theme_file_path('core/library/config_types.php');   
require get_parent_theme_file_path('core/library/post_types.php');    
require get_parent_theme_file_path('core/library/shortcodes.php');   

