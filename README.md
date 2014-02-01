## Auto ACF Layouts

> Logical layout automation for Advanced Custom Fields and it's Flexible Content Field add on.
> http://www.advancedcustomfields.com/
> http://www.advancedcustomfields.com/add-ons/flexible-content-field/

**Referencing ACF_Layout**

Either `include` ACF_Layout.php in your theme, or paste it's contents in your functions.php file.

**Creating the Layout Templates**

For each Flexible Content Field layout type, create a file that represents its *name* as a php file (dashes can replace underscores for better, consistant filename style).

For example, the layout type `image_gallery_layout` can be named `image_gallery_layout.php` or `image-gallery-layout.php`. 

Place this file in the default layouts folder, which is `wp-content/themes/name/layouts/`.

**Changing the reference to the Layout Templates**

The `AACFL_DIRECTORY` constant in the ACF_Layout class can be changed to anything that required. Say, if this line was changed to: 

```
define('AACFL_DIRECTORY', '/acf-flexible/layout-templates/');
```

ACF_Layout would look for the layout templates in `wp-content/themes/name/acf-flexible/layout-templates/`.


**Rendering the Layout Templates**

Simply add something like the following to the page, and the ACF_Layout will sort out the rest :) 

```php
<?php while (has_sub_field('layout_name')) : ?>

  <?php Auto_ACF_Layout::render(get_row_layout()); ?>

<?php endwhile; ?>
```
