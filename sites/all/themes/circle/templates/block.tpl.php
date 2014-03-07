<?php

/**
 * @file
 * Default theme implementation to display a block.
 */
?>
<section role="block" class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <?php if ($block->subject): ?>
    <header role="block-header">
      <?php print render($title_prefix); ?>
        <h2<?php print $title_attributes; ?>><?php print $block->subject ?></h2>
      <?php print render($title_suffix); ?>
  </header>
  <?php endif;?>
  <div class="block-content"<?php print $content_attributes; ?>>
    <?php print $content ?>
  </div>
</section>
