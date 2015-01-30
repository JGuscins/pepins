<?php
/**
 * @file
 * Bootstrap 6-6 bricks template for Display Suite.
 */

if (isset($node->field_campaign_highlightpicture['und'][0]['uri'] ) ) {
  $bild = image_style_url('campaign_puffbild' ,$node->field_campaign_highlightpicture['und'][0]['uri']);
}

?>
<div class="col-xs-12 col-sm-6 col-md-4">
<div style="background-image: url(<?php echo  $bild;  ?>);" data-url="<?php echo url('node/'.$node->nid); ?>" class="campaign_teaser">
  <div class="campaign_teaser_inner" >
    <table class="campaign_teaser_aligner"><tbody><tr><td>
      <h2 class="blocktitle"><?php echo l($node->title,'node/'. $node->nid); ?></h2>

    <?php if (isset($node->field_campaign_punch_line['und'][0]['value']) ) { ?>
      <p class="punchline" ><?php echo $node->field_campaign_punch_line['und'][0]['value'];?></p>
    <?php } ?>

    <?php if (isset($node->field_campaign_location['und'][0]['value']) ) { ?>
      <p class="location" ><?php echo $node->field_campaign_location['und'][0]['value'];?></p>
    <?php } ?>

    <?php if (isset($node->body['und'][0]['safe_value']) ) { ?>
      <?php echo text_summary($node->body['und'][0]['safe_value'], NULL , 150  ) ;?>
    <?php } ?>


    <?php
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
          echo '</td><td class="goal-max">';
            echo '<strong>' . t('Goal max:') . '</strong> ' . number_format($node->field_campaign_mal_max['und'][0]['value'], 0, '', '&nbsp;');
          echo '</td></tr>';
          echo '<tr> <td class="days-left">';
            echo '<strong>' . t('Days left:') . '</strong> ' . floor($difference/60/60/24) . ' ' . t('days');
          echo '</td><td class="new_participtions">';
            echo '<strong>' . t('New participtions:') . '</strong> ' . $node->field_campaign_new_participants['und'][0]['value'] ;
          echo '</td></tr>';
        echo '</table>';

      }
    ?>
    </td></tr></tbody></table>
  </div>
</div>
</div>
