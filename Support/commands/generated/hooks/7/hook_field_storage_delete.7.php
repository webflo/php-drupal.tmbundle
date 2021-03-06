/**
 * Implements hook_field_storage_delete().
 */
function <?php print $basename; ?>_field_storage_delete(\$entity_type, \$entity, \$fields) {
  ${1:list(\$id, \$vid, \$bundle) = entity_extract_ids(\$entity_type, \$entity);

  foreach (field_info_instances(\$entity_type, \$bundle) as \$instance) {
    if (isset(\$fields[\$instance['field_id']])) {
      \$field = field_info_field_by_id(\$instance['field_id']);
      field_sql_storage_field_storage_purge(\$entity_type, \$entity, \$field, \$instance);
    \}
  \}}
}

$2