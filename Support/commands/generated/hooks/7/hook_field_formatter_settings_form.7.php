/**
 * Implements hook_field_formatter_settings_form().
 */
function <?php print $basename; ?>_field_formatter_settings_form(\$field, \$instance, \$view_mode, \$form, &\$form_state) {
  ${1:\$display = \$instance['display'][\$view_mode];
  \$settings = \$display['settings'];

  \$element = array();

  if (\$display['type'] == 'text_trimmed' || \$display['type'] == 'text_summary_or_trimmed') {
    \$element['trim_length'] = array(
      '#title' => t('Length'),
      '#type' => 'textfield',
      '#size' => 20,
      '#default_value' => \$settings['trim_length'],
      '#element_validate' => array('_element_validate_integer_positive'),
      '#required' => TRUE,
    );
  \}

  return \$element;
}
}

$2