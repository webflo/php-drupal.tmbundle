/**
 * Implements hook_install_tasks().
 */
function <?php print $basename; ?>_install_tasks() {
  ${1:// Here, we define a variable to allow tasks to indicate that a particular,
  // processor-intensive batch process needs to be triggered later on in the
  // installation.
  \$myprofile_needs_batch_processing = variable_get('myprofile_needs_batch_processing', FALSE);
  \$tasks = array(
    // This is an example of a task that defines a form which the user who is
    // installing the site will be asked to fill out. To implement this task,
    // your profile would define a function named myprofile_data_import_form()
    // as a normal form API callback function, with associated validation and
    // submit handlers. In the submit handler, in addition to saving whatever
    // other data you have collected from the user, you might also call
    // variable_set('myprofile_needs_batch_processing', TRUE) if the user has
    // entered data which requires that batch processing will need to occur
    // later on.
    'myprofile_data_import_form' => array(
      'display_name' => st('Data import options'),
      'type' => 'form',
    ),
    // Similarly, to implement this task, your profile would define a function
    // named myprofile_settings_form() with associated validation and submit
    // handlers. This form might be used to collect and save additional
    // information from the user that your profile needs. There are no extra
    // steps required for your profile to act as an "installation wizard"; you
    // can simply define as many tasks of type 'form' as you wish to execute,
    // and the forms will be presented to the user, one after another.
    'myprofile_settings_form' => array(
      'display_name' => st('Additional options'),
      'type' => 'form',
    ),
    // This is an example of a task that performs batch operations. To
    // implement this task, your profile would define a function named
    // myprofile_batch_processing() which returns a batch API array definition
    // that the installer will use to execute your batch operations. Due to the
    // 'myprofile_needs_batch_processing' variable used here, this task will be
    // hidden and skipped unless your profile set it to TRUE in one of the
    // previous tasks.
    'myprofile_batch_processing' => array(
      'display_name' => st('Import additional data'),
      'display' => \$myprofile_needs_batch_processing,
      'type' => 'batch',
      'run' => \$myprofile_needs_batch_processing ? INSTALL_TASK_RUN_IF_NOT_COMPLETED : INSTALL_TASK_SKIP,
    ),
    // This is an example of a task that will not be displayed in the list that
    // the user sees. To implement this task, your profile would define a
    // function named myprofile_final_site_setup(), in which additional,
    // automated site setup operations would be performed. Since this is the
    // last task defined by your profile, you should also use this function to
    // call variable_del('myprofile_needs_batch_processing') and clean up the
    // variable that was used above. If you want the user to pass to the final
    // Drupal installation tasks uninterrupted, return no output from this
    // function. Otherwise, return themed output that the user will see (for
    // example, a confirmation page explaining that your profile's tasks are
    // complete, with a link to reload the current page and therefore pass on
    // to the final Drupal installation tasks when the user is ready to do so).
    'myprofile_final_site_setup' => array(
    ),
  );
  return \$tasks;}
}

$2