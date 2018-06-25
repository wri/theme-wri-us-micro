<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */

?>

<div id="what-we-do">

  <?php 
    if ($fields['type']->raw == 'blog_post') {
      print "<div class='the-image the-blog-image'>" . $fields['field_featured_image']->content . "</div>";
    }
    elseif ($fields['type']->raw == 'project') {  
      print "<div class='the-image the-project-image'>" . $fields['field_landing_page_image']->content . "</div>";
    }
    elseif ($fields['type']->raw == 'publication') {
      print "<div class='the-image the-pub-image'>" . $fields['field_cover_shot']->content . "</div>";
    }
  ?>
  <div class="the-type">
    <?php 
      if ($fields['type']->raw == 'blurb') {
        print "Update:";
      }
      else {
        print $fields['type']->content . ": "; 
      }
    ?>
  </div>
  <div class="blog-date">
    <?php
      if ($fields['type']->raw == 'blog_post') {
        // print $fields['created']->content;
      }
    ?>
  </div>
  <div>
    <?php 
      if ($fields['type']->raw == 'blurb') {
        print $fields['title']->raw; 
      }
      else {
        print $fields['title']->content; 
      }
    ?>
  </div>
  <div class="blurb-content">
    <?php  
      if ($fields['type']->raw == 'blurb') {
        print $fields['body']->content;
      }
    ?>
  </div>
  <div class="project-content">
    <?php
      if ($fields['type']->raw == 'project') {
        print $fields['field_elevator_pitch']->content;
      }
    ?>
  </div>

  <div class="read-more">
    <?php 
      if ($fields['type']->raw == 'blurb') {
        print $fields['field_blurb_link']->content;
      }
      else {
        print $fields['view_node']->content; 
      }
    ?>
  </div>
</div>

