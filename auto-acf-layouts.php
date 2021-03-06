<?php

/**
 * Auto ACF Layouts
 * 
 * @version   2.0 | February 1st 2014
 * @author    Beau Charman | http://twitter.com/beaucharman
 * @link      https://github.com/beaucharman/auto-acf-layouts/
 * @license   MIT license
 *
 * Logical layout automation for Advanced Custom Fields and it's Flexible Content Field add on.
 * http://www.advancedcustomfields.com/
 * http://www.advancedcustomfields.com/add-ons/flexible-content-field/
 */



class Auto_ACF_Layout 
{



  public function __construct()
  {

   /**
    * Path to where the layout templates are found,
    * relative to the theme template directory.
    */
    if (! defined('AACFL_DIRECTORY'))
    {
      define('AACFL_DIRECTORY', '/library/acf-layouts/');
    }
  }



  /**
   * Render
   *
   * @param  {string} $file
   * @param  {array}  $data
   * @return {string}
   */
  static function render($layout, $data = null)
  {

    $full_layout_directory = get_template_directory() . AACFL_DIRECTORY;
    $layout_file = '{{layout}}.php';
    $find = array('{{layout}}', '_');
    $replace = array($layout, '-');

    /* Find a file that matchs this_format */
    $new_layout_file = str_replace($find[0], $replace[0], $layout_file);

    if (file_exists($full_layout_directory . $new_layout_file))
    {
      include($full_layout_directory . $new_layout_file);
      
      return true;
    }
    else
    {
      /* Find a file that matchs this-format */
      $new_layout_file = str_replace($find, $replace, $layout_file);

      if (file_exists($full_layout_directory . $new_layout_file))
      {
        include($full_layout_directory . $new_layout_file);
        
        return true;
      }
    }

    /**
     * If no files can be matched,
     * and WP DEBUG is true: show a warning.
     */
    if (WP_DEBUG)
    {
      echo '<pre><span style="color:red;">[Auto_ACF_Layout]: No layout template found for <strong>$layout.</strong></pre>';
    }

    return false;
  }

}

new Auto_ACF_Layout;
