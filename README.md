<?php
 
/**
 * ACF Layout
 * @version   1.0 | November 12th 2013
 * @author    Beau Charman | http://twitter.com/beaucharman
 * @link      https://gist.github.com/beaucharman/7181406
 * @license   MIT license
 *
 * Logical layout automation for Advanced Custom Fields and it's Flexible Content Field add on.
 * http://www.advancedcustomfields.com/
 * http://www.advancedcustomfields.com/add-ons/flexible-content-field/
 *
 * Usgae: ACF_Layout::render(get_row_layout());
 */
class ACF_Layout {
 
 
  /**
   * Path of where the layout templates are found,
   * relative to the theme template directory.
   */
  const LAYOUT_DIRECTORY = '/layouts/';
 
 
  /**
   * Get Layout
   *
   * @param  {string} $file
   * @param  {array}  $data
   * @return {string}
   */
  static function get_layout($layout, $data = null)
  {
    
    $full_layout_directory = get_template_directory() . self::LAYOUT_DIRECTORY;
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
      echo "<pre>ACF_Layout: No layout template found for $layout.</pre>";
    }
    
    return false;
  }
 
  /**
   * Render
   *
   * @param  {string} $layout
   * @return {string}
   */
  static function render($layout, $data = null)
  {
    return self::get_layout($layout, $data);
  }
}

Auto ACF Layouts

Logical layout automation for Advanced Custom Fields and it's Flexible Content Field add on. http://www.advancedcustomfields.com/ http://www.advancedcustomfields.com/add-ons/flexible-content-field/
Referencing ACF_Layout

Either include ACF_Layout.php in your theme, or paste it's contents in your functions.php file.

Creating the Layout Templates

For each Flexible Content Field layout type, create a file that represents its name as a php file (dashes can replace underscores for better, consistant filename style).

For example, the layout type image_gallery_layout can be named image_gallery_layout.php or image-gallery-layout.php.

Place this file in the default layouts folder, which is wp-content/themes/name/layouts/.

Changing the reference to the Layout Templates

The LAYOUT_DIRECTORY constant in the ACF_Layout class can be changed to anything that required. Say, if this line was changed to:

const LAYOUT_DIRECTORY = '/acf-flexible/layout-templates/';
ACF_Layout would look for the layout templates in wp-content/themes/name/acf-flexible/layout-templates/.

Rendering the Layout Templates

Simply add something like the following to the page, and the ACF_Layout will sort out the rest :)

<?php while (has_sub_field('layout_name')) : ?>

  <?php ACF_Layout::render(get_row_layout()); ?>

<?php endwhile; ?>
