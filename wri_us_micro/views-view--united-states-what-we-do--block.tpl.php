<?php

/**
 * @file
 * Main view template.
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 *
 * @ingroup views_templates
 */

?>

<div class="<?php print $classes; ?>">
  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <?php print $title; ?>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <?php if ($header): ?>
    <div class="view-header">
      <?php print $header; ?>
    </div>
  <?php endif; ?>

  <?php if ($exposed): ?>
    <div class="view-filters">
      <?php print $exposed; ?>
    </div>
  <?php endif; ?>

  <?php if ($attachment_before): ?>
    <div class="attachment attachment-before">
      <?php print $attachment_before; ?>
    </div>
  <?php endif; ?>

  <?php if ($rows): ?>

<?php 
  if (isset($_GET["project"])) {
    $project = $_GET["project"];
  }
  else {
    $project = "smart-infrastructure";
  }

  $topicPath = "/dev/path/";
?>

<script>

jQuery(document).ready(function() {
  var theproject = "<?php echo $project; ?>";

  if (theproject === "smart-infrastructure")
  {
    jQuery(".project-tab").removeClass("active");
    jQuery("#tab-infra").addClass("active");
    jQuery(".project-link").removeClass("active");
    jQuery("#link-infra").addClass("active");
  }
  else if (theproject === "reducing-methane-emissions")
  {
    jQuery(".project-tab").removeClass("active");
    jQuery("#tab-reba").addClass("active");
    jQuery(".project-link").removeClass("active");
    jQuery("#link-reba").addClass("active");
  }
  else if (theproject === "science-based-targets")
  {
    jQuery(".project-tab").removeClass("active");
    jQuery("#tab-water").addClass("active");
    jQuery(".project-link").removeClass("active");
    jQuery("#link-water").addClass("active");
  }
  else if (theproject === "next-project-name")
  {
    jQuery(".project-tab").removeClass("active");
    jQuery("#tab-climate").addClass("active");
    jQuery(".project-link").removeClass("active");
    jQuery("#link-climate").addClass("active");
  }

  console.warn(theproject);

});

</script>

    <div id="the-tabs">
      <a href="<?php print $topicPath; ?>united-states?project=smart-infrastructure#main-content"><div id="tab-infra" class="project-tab">Smart Infrastructure</div></a>
      <a href="<?php print $topicPath; ?>united-states?project=reducing-methane-emissions#main-content"><div id="tab-reba" class="project-tab">Reducing Methane Emissions</div></a>
      <a href="<?php print $topicPath; ?>united-states?project=science-based-targets#main-content"><div id="tab-water" class="project-tab">Science Based Targets</div></a>
    </div>
    <div class="view-content">
      <?php print $rows; ?>
    </div>
    <div id="link-infra" class="project-link"><a href="<?php print $topicPath; ?>united-states/smart-infrastructure">See more on the Smart Infrastructure page</a></div>
    <div id="link-reba" class="project-link"><a href="<?php print $topicPath; ?>united-states/reducing-methane-emissions">See more on the Reducting Methane Emissions page</a></div>
    <div id="link-water" class="project-link"><a href="<?php print $topicPath; ?>united-states/science-based-targets">See more on the Science Based Targets page</a></div>
    <!--<div id="link-climate" class="project-link"><a href="/dev/united-states/privte-sector">See more on the Private Sector page</a></div>-->

  <?php elseif ($empty): ?>
    <div class="view-empty">
      <?php print $empty; ?>
    </div>
  <?php endif; ?>

  <?php if ($pager): ?>
    <?php print $pager; ?>
  <?php endif; ?>

  <?php if ($attachment_after): ?>
    <div class="attachment attachment-after">
      <?php print $attachment_after; ?>
    </div>
  <?php endif; ?>

  <?php if ($more): ?>
    <?php print $more; ?>
  <?php endif; ?>

  <?php if ($footer): ?>
    <div class="view-footer">
      <?php print $footer; ?>
    </div>
  <?php endif; ?>

  <?php if ($feed_icon): ?>
    <div class="feed-icon">
      <?php print $feed_icon; ?>
    </div>
  <?php endif; ?>

</div>

<script src="https://use.fontawesome.com/ff6778ff14.js"></script>

