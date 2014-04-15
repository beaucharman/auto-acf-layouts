<?php

/**
 *
 * Flexible Content Layout: Blockquote
 *
 */



/**
 * Controller
 */
 
global $post;

/* Get the ID to use */
$post_id = (isset($data['post_id'])) ? $data['post_id'] : $post->ID;

/* Get Fields */
$quote = (get_sub_field('quote', $post_id)) ? get_sub_field('quote', $post_id) : null;
$source = (get_sub_field('source', $post_id)) ? get_sub_field('source', $post_id) : null;



/**
 * View
 */
 
?>

<?php if ($quote) : ?>

<figure class="figure__blockquote content-layout">
	<blockquote class="blockquote"><?php echo $quote; ?></blockquote>
	<?php if ($source) : ?><figcaption><?php echo $source; ?></figcaption><?php endif; ?>
</figure>

<?php endif; ?>

