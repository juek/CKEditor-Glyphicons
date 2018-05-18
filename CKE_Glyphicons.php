<?php 

defined('is_running') or die('Not an entry point...');

class CKE_Glyphicons
{

  /* action hook */
  static function GetHead(){
    global $page, $addonRelativeCode;
    $page->css_user[] = $addonRelativeCode . '/CKEditor_plugins/glyphicons_2.2/css/css/bootstrap.css';
    $page->css_user[] = $addonRelativeCode . '/admin_cke_force_glyphicons.css';
  }


  /* filter hook */
  static function CKEditorPlugins($plugins){
    global $addonRelativeCode;
    $plugins['widget']      = $addonRelativeCode . '/CKEditor_plugins/widget_4.5.11/'; // meet dependency
    $plugins['lineutils']   = $addonRelativeCode . '/CKEditor_plugins/lineutils_4.5.11/'; // meet dependency
    $plugins['glyphicons']  = $addonRelativeCode . '/CKEditor_plugins/glyphicons_2.2/';
    return $plugins;
  }


  /* filter hook */
  static function CKEditorConfig($options){
    global $addonRelativeCode;
    $options['contentsCss'] = $addonRelativeCode . '/CKEditor_plugins/glyphicons_2.2/css/css/bootstrap.css';
    $options['allowedContent'] = true;
    return $options;
  }


  /* filter hook */
  static function InlineEdit_Scripts($scripts, $type){
    global $addonRelativeCode;
    if( $type !== 'text' ){
      return $scripts;
    }
    $scripts[]['code'] = 'CKEDITOR.dtd.$removeEmpty["span"] = false;';
    return gpAjax::InlineEdit_Text($scripts);
  }

}