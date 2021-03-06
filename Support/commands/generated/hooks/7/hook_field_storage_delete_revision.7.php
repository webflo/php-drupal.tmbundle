/**
 * Implements hook_field_storage_delete_revision().
 */
function <?php print $basename; ?>_field_storage_delete_revision(\$entity_type, \$entity, \$fields) {
  ${1:list(\$id, \$vid, \$bundle) = entity_extract_ids(\$entity_type, \$entity);

  if (isset(\$vid)) {
    foreach (\$fields as \$field_id) {
      \$field = field_info_field_by_id(\$field_id);
      \$revision_name = _field_sql_storage_revision_tablename(\$field);
      db_delete(\$revision_name)
        ->condition('entity_type', \$entity_type)
        ->condition('entity_id', \$id)
        ->condition('revision_id', \$vid)
        ->execute();
    \}
  \}}
}

$2