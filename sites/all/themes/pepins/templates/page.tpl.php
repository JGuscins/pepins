<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>
<div class="wrapper">
  <header id="navbar" role="banner" class="<?php print $navbar_classes; ?>">
    <div class="container">
      <div class="navbar-header">
        <?php if ($logo): ?>
        <a class="logo navbar-btn pull-left" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
        </a>
        <?php endif; ?>

        <?php if (!empty($site_name)): ?>
        <a class="name navbar-brand" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a>
        <?php endif; ?>

        <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
        <?php if (!empty($page['navigation'])): ?>
          <?php print render($page['navigation']); ?>
        <?php else: ?>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <?php endif; ?>
      </div>

      <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
        <div class="navbar-collapse collapse">
          <nav role="navigation">
            <?php if (!empty($primary_nav)): ?>
              <?php print render($primary_nav); ?>
            <?php endif; ?>

            <a href="/" class="navbar_logo" ><span></span></a>

            <?php if (!empty($secondary_nav)): ?>
              <?php print render($secondary_nav); ?>
            <?php endif; ?>
          </nav>
        </div>
      <?php endif; ?>
    </div>
  </header>

  <?php
    /*** Top image ***/
    if (isset($node->type)  && isset($node->field_top_image['und'][0]['uri'] )     ) {
        $bild = image_style_url('headerpicture' ,$node->field_top_image['und'][0]['uri']);
        echo '<div class="top-image" style="background-image: url('.$bild .'); " >';
            if (isset($node->field_top_image_line_1['und'][0]['value'])  ) {
              echo '<div class="topic-line1" >'.  $node->field_top_image_line_1['und'][0]['value']   .'</div>';
            }
            if (isset($node->field_top_image_line_2['und'][0]['value'])  ) {
              echo '<div class="topic-line2" >'.  $node->field_top_image_line_2['und'][0]['value']   .'</div>';
            }
        echo '</div>';
    }
    /*** end top image ***/


      /*** Top image frontpage ***/
    if (isset($node->type)  && $node->type == 'landingpage'  && isset($node->field_landingpage_top_image['und'][0]['uri'] )     ) {
        $bild = image_style_url('frontpage_header' ,$node->field_landingpage_top_image['und'][0]['uri']);
        echo '<div class="top-image frontpage-top-image" style="background-image: url('.$bild .'); " >';

            echo '<div class="logo"><img src="' . ($logo ? $logo : '/sites/all/themes/pepins/images/front_logo.png') . '" alt="logo" /></div>';
            if (isset($node->field_punch_line['und'][0]['value'])  ) {
              echo '<div class="topic-line1" >'.  $node->field_punch_line['und'][0]['value']   .'</div>';
            }
            if (isset($node->field_punch_line_2['und'][0]['value'])  ) {
              echo '<div class="topic-line2" >'.  $node->field_punch_line_2['und'][0]['value']   .'</div>';
            }

            echo '<div class="frontpage-links">';
              echo '<a href="'.url('node/5').'" class="btn btn-default btn_show_campagins" ><span>'.t('Show campaigns') .'</span></a>';
              echo '<a href="'.url('user/register').'" class="btn btn-default btn_userregister" ><span>'.t('Sign up!') .'</span></a>';
            echo '</div>';

            echo '<p class="frontpage-descriptions" >Har du redan ett konto? <a href="'.url('user'). '"> Logga in här</a> Lorem ipsum ror mintioribero expelestium quamus ex evelici endio. Itatis voluptatet aligeni officip.</p>';

        echo '</div>';
    }
    /*** end top image ***/


    /*** Top image registration page **/
    if (current_path() == 'user/register') {
      $registration_header_image_id = theme_get_setting('registration_header_iamge');

      if ($registration_header_image_id) {
        echo '<div class="top-image" style="background-image: url('.file_create_url(file_load($registration_header_image_id)->uri).'); " >';
              if(theme_get_setting('registration_punch_line_1')) {
                echo '<div class="topic-line1">'.theme_get_setting('registration_punch_line_1').'</div>';
              }
              if(theme_get_setting('registration_punch_line_2')) {
                echo '<div class="topic-line2">'.theme_get_setting('registration_punch_line_2').'</div>';
              }
              
        echo '</div>';
      }
    }
  ?>

  <div class="main-container">

    <header role="banner" id="page-header" class="container">
      <?php if (!empty($site_slogan)): ?>
        <p class="lead"><?php print $site_slogan; ?></p>
      <?php endif; ?>

      <?php print render($page['header']); ?>
    </header> <!-- /#page-header -->

    <!-- <div class="row"> -->

      <?php if (!empty($page['sidebar_first'])): ?>
        <aside class="col-sm-3" role="complementary">
          <?php print render($page['sidebar_first']); ?>
        </aside>  <!-- /#sidebar-first -->
      <?php endif; ?>

      <section<?php print $content_column_class; ?>>
        <?php if (!empty($page['highlighted'])): ?>
          <div class="highlighted jumbotron"><?php print render($page['highlighted']); ?></div>
        <?php endif; ?>
        <?php if (!empty($breadcrumb)): print $breadcrumb; endif;?>
        <a id="main-content"></a>

        <?php print $messages; ?>
        <?php if (!empty($tabs)): ?>
          <?php print render($tabs); ?>
        <?php endif; ?>
        <?php if (!empty($page['help'])): ?>
          <?php print render($page['help']); ?>
        <?php endif; ?>
        <?php if (!empty($action_links)): ?>
          <ul class="action-links"><?php print render($action_links); ?></ul>
        <?php endif; ?>
        <?php print render($page['content']); ?>
      </section>

      <?php if (!empty($page['sidebar_second'])): ?>
        <aside class="col-sm-3" role="complementary">
          <?php print render($page['sidebar_second']); ?>
        </aside>  <!-- /#sidebar-second -->
      <?php endif; ?>

    <!-- </div> -->
  </div>
  <div class="push"></div>
</div>

<footer class="footer">
  <div class="container">
    <div class="row">
    <?php
      $i = 0;
      foreach($page['footer'] as $pageBlockName =>$pageBlock)
      {
        if(substr($pageBlockName, 0, 6) !== 'block_')
        {
          continue;
        }
        switch ($i) {
          case 0:
            print '<div class="col-sm-6">' . render($pageBlock) . '</div>';
            break;

          case 1:
          case 2:
            print '<div class="col-sm-3 col-xs-6">' . render($pageBlock) . '</div>';
            break;

          default:
            print render($pageBlock);
            break;
        }

        $i++;
      }
    ?>
    </div>
  </div>
</footer>
