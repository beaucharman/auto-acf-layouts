## Auto ACF Layouts

> Logical layout automation for Advanced Custom Fields and it's Flexible Content Field add on.
> http://www.advancedcustomfields.com/
> http://www.advancedcustomfields.com/add-ons/flexible-content-field/

**Referencing ACF_Layout**

`include` auto-acf-layouts.php in your theme.

**Creating the Layout Templates**

For each Flexible Content Field layout type, create a file that represents its *name* as a php file (dashes can replace underscores for better, consistant filename style).

For example, the layout type `image_gallery_layout` can be named `image_gallery_layout.php` or `image-gallery-layout.php`. 
Place this file in the default layouts folder, which is `wp-content/themes/name/layouts/`.

**Changing the reference to the Layout Templates**

The `AACFL_DIRECTORY` constant in the ACF_Layout class file can be changed to point to the themes includes folder, template parts folder and so on. Say, if this line was changed to: 

```
define('AACFL_DIRECTORY', '/library/layout-templates/');
```

Auto_ACF_Layout would look for the layout templates in `wp-content/themes/name/library/layout-templates/`.


**Rendering the Layout Templates**

Simply add something like the following to the page, and the ACF_Layout will sort out the rest :) 

```php
<?php while (has_sub_field('flexible_content_layout_name')) : ?>

  <?php Auto_ACF_Layout::render(get_row_layout()); ?>

<?php endwhile; ?>
```

You can also target specific ACFs, such as:

```php
<?php Auto_ACF_Layout::render('latest_event_select'); ?>
```

Furthermore, you can reuse the templates added to the `AACFL_DIRECTORY` without needing data from custom fields, simply pass the required data in an array, and then handel appropriately within the template. For example: 

```php
<?php 

// single.php

Auto_ACF_Layout::render('latest_event_select', $data = array('title', 'Custom Title')); ?>

<?php 

// library/acf-layouts//latest-event-select.php

$title = null;

if (get_field('title')) 
{
  $title = get_field('title');
}
else if (isset($data['title']))
{
  $title = $data['title'];
}
```
