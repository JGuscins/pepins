<?php
/**
 * @file
 * Bootstrap 6-6 bricks template for Display Suite.
 */
?>

<<?php print $layout_wrapper; print $layout_attributes; ?> class="<?php print $classes; ?>">
  <?php if (isset($title_suffix['contextual_links'])): ?>
    <?php print render($title_suffix['contextual_links']); ?>
  <?php endif; ?>
  <?php if ($top) : ?>
    <div class="row-fluid first-row">
      <<?php print $top_wrapper; ?> class="span12 col-sm-12 <?php print $top_classes; ?>">
        <?php print $top; ?>
      </<?php print $top_wrapper; ?>>
    </div>
  <?php endif; ?>
  <div class="darkbg">
  <div class="col-xs-12">
  <?php if ($topleft || $topright) : ?>

    <div class="row-fluid topleft-topright fullwidth">
      <div class="row">
      <<?php print $topleft_wrapper; ?> class="span6 col-sm-8 <?php print $topleft_classes; ?>">
        <?php print $topleft; ?>
      </<?php print $topleft_wrapper; ?>>
      <<?php print $topright_wrapper; ?> class="span6 col-sm-4 <?php print $topright_classes; ?>">
        <?php
        // print $topright;
        print render($content['field_campaign_logo']);

        if (
          isset(  $node->field_campaign_mal_min['und'][0]['value'] ) &&
          isset(  $node->field_campaign_mal_max['und'][0]['value'] ) &&
          isset(  $node->field_campaign_collected['und'][0]['value'] )
        )
        {

          $average      = ( $node->field_campaign_collected['und'][0]['value'] / $node->field_campaign_mal_max['und'][0]['value'] ) * 100 ;
          $average_goal = ( $node->field_campaign_collected['und'][0]['value'] / $node->field_campaign_mal_min['und'][0]['value'] ) * 100 ;

          if ($average_goal > 100) {
            $average_goal = 100;
          }

          echo '<div class="goal-percent"> <div class="percent-of-total" style="width: '.$average.'%;"> </div> <div class="percent-of-goal" style="width: '.$average_goal.'%;"  ></div> <div class="goal-text"><strong>'    . $average . '</strong>%  (' . number_format($node->field_campaign_collected['und'][0]['value'], 0, '', '&nbsp;') . ')</div></div>';


          $today = time();
          $difference = $node->field_campaign_goal_date['und'][0]['value'] - $today;
          if ($difference < 0) { $difference = 0; }

          echo '<table class="goal-texts">';
            echo '<tr><td class="goal-min">';
              echo '<strong>' . t('Goal min:') . '</strong> ' . number_format($node->field_campaign_mal_min['und'][0]['value'], 0, '', '&nbsp;');
            echo '</td>';
            echo '<td class="goal-max">';
              echo '<strong>' . t('Goal max:') . '</strong> ' . number_format($node->field_campaign_mal_max['und'][0]['value'], 0, '', '&nbsp;');
            echo '</td>
                  </tr>';
            echo '<tr> <td class="days-left">';
              echo '<strong>' . t('Days left:') . '</strong> ' . floor($difference/60/60/24) . ' ' . t('days');
            echo '</td>';
            echo '<td class="new_participtions">';
              echo '<strong>' . t('New participtions:') . '</strong> ' . $node->field_campaign_new_participants['und'][0]['value'] ;
            echo '</td></tr>';
          echo '</table>';

        }
        ?>
        <div class="campaign-controls"><a href="#invest-link-missing" class="invest-link">Investera i kampanj</a></div>
      </<?php print $topright_wrapper; ?>>
      </div>
    </div>
  <?php endif; ?>
  <?php if ($central) : ?>
    <div class="row-fluid fullwidth">
      <<?php print $central_wrapper; ?> class="span12 <?php print $central_classes; ?>">
        <?php print $central; ?>
      </<?php print $central_wrapper; ?>>
    </div>
  <?php endif; ?>
  </div>
  </div>
  <?php if ($bottomleft || $bottomright) : ?>
    <div class="row-fluid">
      <<?php print $bottomleft_wrapper; ?> class="span6 col-sm-8 <?php print $bottomleft_classes; ?>">
        <?php print $bottomleft; ?>
      </<?php print $bottomleft_wrapper; ?>>
      <<?php print $bottomright_wrapper; ?> class="span6 col-sm-4 <?php print $bottomright_classes; ?>">
        <?php print $bottomright; ?>
      </<?php print $bottomright_wrapper; ?>>
    </div>
  <?php endif; ?>
  <?php if ($bottom) : ?>
    <div class="row-fluid">
      <<?php print $bottom_wrapper; ?> class="span12 <?php print $bottom_classes; ?>">
        <?php print $bottom; ?>
      </<?php print $bottom_wrapper; ?>>
    </div>
  <?php endif; ?>
</<?php print $layout_wrapper ?>>


<!-- Needed to activate display suite support on forms -->
<?php if (!empty($drupal_render_children)): ?>
  <?php print $drupal_render_children ?>
<?php endif; ?>
