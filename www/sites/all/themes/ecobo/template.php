<?php

/**
 * Returns HTML for a breadcrumb trail.
 *
 * @param $variables
 *   An associative array containing:
 *   - breadcrumb: An array containing the breadcrumb links.
 */
function ecobo_breadcrumb($variables) {
  $variables['breadcrumb'][] = drupal_get_title();
  $breadcrumb = $variables['breadcrumb'];

  /* Remove empty breadcrumb */
  foreach ($breadcrumb as $id => $item) {
    if($item == '<a href="/node"></a>' || $item == '<a href="/fr/node"></a>') {
      unset($breadcrumb[$id]);
    }
  }

  if (!drupal_is_front_page()) {
    if (!empty($breadcrumb)) {

      // Provide a navigational heading to give context for breadcrumb links to
      // screen-reader users. Make the heading invisible with .element-invisible.
      $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';
      $output .= '<div class="breadcrumb">' . implode(' » ', $breadcrumb) . '</div>';

      return $output;
    }
  }
}
