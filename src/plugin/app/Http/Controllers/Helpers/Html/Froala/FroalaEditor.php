<?php

namespace App\Http\Controllers\Helpers\Html\Froala;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller\Helpers\Html\Froala;

class FroalaEditor extends \App\Http\Controllers\Controller
{
    private static $js_path='assets/backend/plugins/froala/js';
    private static $css_path='assets/backend/plugins/froala/css';
    public static $uplad_url='./backend/ajax/editorupload';
    public static $remove_url='./backend/ajax/removeimage';
    private static $editor_id;
    
    
    public static function setJsPath($path){
        FroalaEditor::$js_path=$path;
    }
    
    public static function getJsPath(){
        return FroalaEditor::$js_path;
    }
    
    public static function setCssPath($path){
        FroalaEditor::$css_path=$path;
    }
    
    public static function getCssPath(){
        return FroalaEditor::$css_path;
    }
    
    public static function setEditorID($id){
        FroalaEditor::$editor_id=$id;
    }
    
    public static function getEditorID(){
        return FroalaEditor::$editor_id;
    }
    
    public static function init_css(){
        $html=  file_get_contents(__DIR__.'/html/css.html');
        $html=  str_replace('{css_path}', FroalaEditor::$css_path, $html);
        return $html;
    }
    
    public static function init_js(){
        $html=  file_get_contents(__DIR__.'/html/js.html');
        $html=  str_replace('{js_path}', FroalaEditor::$js_path, $html);
        return  $html;
    }
    
    public static function init_editor($id,$name='content',$content=''){
        $html=  file_get_contents(__DIR__.'/html/html.php');
        $html=  str_replace('{upload_url}', FroalaEditor::$uplad_url, $html);
        $html=  str_replace('{remove_url}', FroalaEditor::$remove_url, $html);
        $html=  str_replace('{html}', $content, $html);
        $html=  str_replace('{editor_id}', $id, $html);
        $html=  str_replace('{name}',$name, $html);
        return $html;
//        return '<textarea name="'.$name.'" id="'.FroalaEditor::$editor_id.'">'.$html.'</textarea>';
    }
}
