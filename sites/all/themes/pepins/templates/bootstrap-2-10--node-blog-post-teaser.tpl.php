<?php
/**
 * @file
 * Bootstrap 2-10 template for Display Suite.
 */
?>


<<?php print $layout_wrapper; print $layout_attributes; ?> class="<?php print $classes; ?>">
  <?php if (isset($title_suffix['contextual_links'])): ?>
    <?php print render($title_suffix['contextual_links']); ?>
  <?php endif; ?>
  <div class="row-fluid">
    <<?php print $left_wrapper; ?> class="span2 col-sm-2 <?php print $left_classes; ?>">
      <?php print $left; ?>
    </<?php print $left_wrapper; ?>>
    <<?php print $right_wrapper; ?> class="span10 col-sm-10 <?php print $right_classes; ?>">
      <?php print $right; ?>
<!--
      <div class="field field-name-title"><h2><?php echo $node->title ?></h2>
      <p>
        <?php
          if(isset($node->body['und'][0]['summary']))
          {
            echo strlen(strip_tags($node->body['und'][0]['summary'])) < 450 ? substr(strip_tags($node->body['und'][0]['summary']), 0 , 450) . ' ...' : strip_tags($node->body['und'][0]['summary']);
          }
          else
          {
            echo strlen(strip_tags($node->body['und'][0]['value']  )) < 450 ? substr(strip_tags($node->body['und'][0]['value']  ), 0 , 450) . ' ...' : strip_tags($node->body['und'][0]['value']);
          }
          echo ' ' . l(t('Read more'),'node/'. $node->nid);
        ?>
      </p>
      submitted-by
-->
      <?php //die(); ?>

      <div class="share_links" >
        <div class="comment_count" >
          <span class="comment_bouble" ><?php echo $node->comment_count; ?></span>
        </div>
        <div class="addthis_toolbox addthis_default_style" data-url="<?php echo url('node/' . $node->nid); ?>" data-title="<?php echo $node->title; ?>" >
          <a class="addthis_counter addthis_pill_style"></a>
        </div>
        <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4fc9383e1ee05f1b"></script>
      </div>

  </<?php print $right_wrapper; ?>>
  </div>
</<?php print $layout_wrapper ?>>


<!-- Needed to activate display suite support on forms -->
<?php if (!empty($drupal_render_children)): ?>
  <?php print $drupal_render_children ?>
<?php endif; ?>
