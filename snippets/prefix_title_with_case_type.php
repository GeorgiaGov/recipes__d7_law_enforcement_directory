<?php
/**
 * Paste this code into your *.module file. Make sure to replace
 * [YOUR_MODULE_NAME] with the name of your Feature module.
 */
 
/**
 * Implements hook_node_presave().
 */
function [YOUR_MODULE_NAME]_node_presave($node) {
  [YOUR_MODULE_NAME]_set_custom_title($node);
}

/**
 * Custom function to provide automatic title to cases.
 *
 * Prefixes the Case Number/Title with the "[case type] - Case Number: ".
 * If Case Number is set to NA, replace title with [case type].
 */
function [YOUR_MODULE_NAME]_set_custom_title(&$node) {
  // If this is not a Case node, bail out.
  if ($node->type != 'case') {
    return;
  }
  // Get case types.
  $case_type = field_get_items('node', $node, 'field_case_type');

  // Do not alter titles that already follow this format.
  if (substr_count($node->title, $case_type[0]['value']) > 0) {
    return;
  }

  if ($node->title == 'NA') {
    $node->title = $case_type[0]['value'];
  }
  else {
    $node->title = $case_type[0]['value'] . ' - Case Number: ' . $node->title;
  }
}
