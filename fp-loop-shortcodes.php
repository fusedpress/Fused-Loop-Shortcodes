<?php
/**
 * PLugin Name: Fused Loop Shortcodes
 * Author: Anu Sharma
 * Plugin URI:
 * Author URI:http://buddydev.com/members/anusharma/
 * Version:1.0
 * Description:  The Shortcode Library for FusedPress Loop Shortcodes.
 */
define('FP_LOOP_SHORTCODES_DIR_PATH', plugin_dir_path(__FILE__));

class FPLoopShortCodes {
    
    private static $instance;

    function __construct() {
  
        //register shortcodes
        $this->register_shortcodes();
  
    }
   
    /**
     * Register  shortcodes
     * 
     */
    private function register_shortcodes() {

       //Date 
        add_shortcode('date', array($this, 'get_date'));
        add_shortcode('modified-date',array($this,'modified_date'));
        
        //Time
        add_shortcode('time',array($this,'get_time'));
        add_shortcode('modified-time',array($this,'modified_time'));
        
        //Category Shortcodes
        add_shortcode('category',array($this,'get_category'));
        add_shortcode('tags',array($this,'get_tags'));
        
        //Author post link
        add_shortcode('author-post-link',array($this,'author_post_link'));
        
        //Comment link
        add_shortcode('comment-link',array($this,'comment_link'));
        

    }
    /**
     * Get Instance
     * 
     * Use singlten patteren
     * @return type
     */
    public static function get_instance() {

        if (!isset(self::$instance))
            self::$instance = new self();

        return self::$instance;
    }
    
    /**
     * Get Date
     * 
     * [date],[date formate=""]
     * 
     * @param type $atts
     * @return type
     */
    public function get_date($atts){
        
        extract(shortcode_atts(array(
                    'formate' => '',
                    'class'=>'date',
                        ), $atts));
        
        return '<div  class="' . esc_attr($class) . '">' .'Date: &nbsp;'. get_the_date($formate). '</div>'; 
       
    }
    /**
     * Get last modified date
     * 
     * [modified-date],[modified-date formate=""]
     * @param type $atts
     * @return type
     */
    public function modified_date($atts){
        
        extract(shortcode_atts(array(
            'formate'=>'',
            'class'=>'modi-date',
        ),$atts));
     
       return '<div  class="' . esc_attr($class) . '">' .'Last Modified Date: &nbsp;'. get_the_modified_date($formate). '</div>';
    }
    /**
     * get time
     * 
     * [time],[time formate=""]
     * 
     * @param type $atts
     * @return type
     */
    public function get_time($atts){
        
        extract(shortcode_atts(array(
                    'formate' => '',
                    'class' => 'time',
                        ), $atts));
        
          return '<div  class="' . esc_attr($class) . '">' .'Time: &nbsp;'. get_the_time($formate). '</div>'; 
      
    }
    /**
     * Get last modified time
     * 
     * [modified-time],[modified-time formate=""]
     * 
     * @param type $atts
     * @return type
     */
    public function modified_time($atts){
        
        extract(shortcode_atts(array(
                    'formate' => '',
                    'class' => 'modi-time',
                        ), $atts));
        
        return '<div  class="' . esc_attr($class) . '">' .'Last Modified Time: &nbsp;'. get_the_modified_time($formate). '</div>';
       
    }
    /**
     * Get Categorys
     * 
     * [category]
     * 
     * @param type $atts
     * @param type $content
     * @return type
     */
    public function get_category($atts,$content=null){
        
        extract(shortcode_atts(array(
            
                    'class' => 'category',
                        ), $atts));

        return '<div  class="' . esc_attr($class) . '">' . get_the_category_list(',' ). '</div>'; 
	
    }
    /**
     * Tags
     * 
     * [tags]
     * 
     * @param type $atts
     * @param type $content
     * @return type string
     */
    public function get_tags($atts,$content=null){
        extract(shortcode_atts(array(
                    'class' => 'tag-cloud',
                        ), $atts));

        return '<div  class="' . esc_attr($class) . '">'.'Tags: &nbsp;' . get_the_tag_list('', ',') . '</div>';
    }
    /**
     * Author post link
     * 
     * [author-post-link]
     * 
     * @param type $atts
     * @return type
     */
    public function author_post_link($atts){
        
        extract(shortcode_atts(array(
                    'class' => 'author-link',
                        ), $atts));

        return '<div  class="' . esc_attr($class) . '">'.'Posted By: &nbsp;' . get_the_author_link() . '</div>';
    }
    /**
     * Comment link
     * 
     * [comment-link]
     * 
     * @param type $atts
     * @return type
     */
    public function comment_link($atts){
        
        extract(shortcode_atts(array(
                    'class' => 'comment-link',
                        ), $atts));

        return '<div  class="' . esc_attr($class) . '">'.'Comment link: &nbsp;' . get_comments_link() . '</div>';
        
    }
  
}

FPLoopShortCodes::get_instance();
?>
