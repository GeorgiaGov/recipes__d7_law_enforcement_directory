<?php
/**
 * Paste this code into your *.module file. Make sure to replace
 * [YOUR_MODULE_NAME] with the name of your Feature module.
 */

/**
 * Implements hook_node_view().
 *
 * Changes the date label when viewing a full node.
 */
function [YOUR_MODULE_NAME]_node_view($node, $view_mode, $langcode) {
  // Bail if not case type or view mode is not full.
  if ($node->type != 'case' || $view_mode != 'full') {
    return;
  }

  // Try to pull the values for field_case_type.
  $case_type = field_get_items('node', $node, 'field_case_type');
  if (!empty($case_type[0]['value'])) {
    // Get case-type-specific label for the universal date field.
    $node->content['field_case_date']['#title'] = _[YOUR_MODULE_NAME]_get_date_label($case_type[0]['value']);
  }
}

/**
 * Implements hook_views_pre_render().
 *
 * Changes the date label for a list of nodes in a View.
 */
function [YOUR_MODULE_NAME]_views_pre_render(&$view) {
  // Only act on the cases View, and only of there are results.
  if ('cases' == $view->name && !empty($view->result)) {
    // Get case-type-specific label for the universal date field.
    $case_type = (!empty($view->args[0])) ? $view->args[0] : NULL;
    $view->field['field_case_date']->options['label'] = _[YOUR_MODULE_NAME]_get_date_label($case_type);

    // Remove dashes and capitalize case type, make the view title look nicer.
    $view->build_info['title'] = ucwords(str_replace('-', ' ', $case_type));
  }
}

/**
 * Implements hook_form_FORM_ID_alter().
 *
 * Changes the 'Case Date' label on the exposed filter form on the /cases View.
 */
function [YOUR_MODULE_NAME]_form_views_exposed_form_alter(&$form, &$form_state, $form_id) {
  if ($form['sort_by']['#options']['field_case_date_value']) {
    $arg = arg(1);
    $case_type = !empty($arg) ? $arg : NULL;
    $form['sort_by']['#options']['field_case_date_value'] = _[YOUR_MODULE_NAME]_get_date_label($case_type);
  }
}

/**
 * Utility function to choose case type date field label.
 *
 * Choice is based on values from field_case_type in case content type.
 * Prefixing the function with an underscore is just a convention to indicate
 * that this function is for this module's internal use.
 */
function _[YOUR_MODULE_NAME]_get_date_label($case_type) {
  // Define the date labels by case type key.
  $type_titles = array(
    'unsolved-homicide' => t('Incident Date'),
    'unidentified-remains' => t('Date Found'),
    'missing-persons' => t('Last Seen Date'),
    'robberies' => t('Incident Date'),
  );

  // If no matches, return generic label "Case Date".
  return ($case_type && isset($type_titles[$case_type])) ? $type_titles[$case_type] : t('Case Date');
}
