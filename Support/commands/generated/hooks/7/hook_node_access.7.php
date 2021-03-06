/**
 * Implements hook_node_access().
 */
function <?php print $basename; ?>_node_access(\$node, \$op, \$account) {
  ${1:\$type = is_string(\$node) ? \$node : \$node->type;

  if (in_array(\$type, node_permissions_get_configured_types())) {
    if (\$op == 'create' && user_access('create ' . \$type . ' content', \$account)) {
      return NODE_ACCESS_ALLOW;
    \}

    if (\$op == 'update') {
      if (user_access('edit any ' . \$type . ' content', \$account) || (user_access('edit own ' . \$type . ' content', \$account) && (\$account->uid == \$node->uid))) {
        return NODE_ACCESS_ALLOW;
      \}
    \}

    if (\$op == 'delete') {
      if (user_access('delete any ' . \$type . ' content', \$account) || (user_access('delete own ' . \$type . ' content', \$account) && (\$account->uid == \$node->uid))) {
        return NODE_ACCESS_ALLOW;
      \}
    \}
  \}

  // Returning nothing from this function would have the same effect.
  return NODE_ACCESS_IGNORE;}
}

$2