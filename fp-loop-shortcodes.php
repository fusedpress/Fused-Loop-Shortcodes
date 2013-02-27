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

       
        add_shortcode('date', array($this, 'get_date'));

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
    public function get_date($atts){
        return date('F jS, Y');
    }
}
FPLoopShortCodes::get_instance();
?>
