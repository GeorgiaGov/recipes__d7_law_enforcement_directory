# How To

## Add Custom Code

Aside from committing your configuration to code, another useful thing about Features is they give you a logical place to add some custom code and package it up with the rest of your configuration. Open the file created in your feature export ending with \*.module, i.e. case_directory.module. It will look something like this. You will be adding your custom code to the bottom of this file.

```php
<?php
/**
 * @file
 * Code for the Law Enforcement Case Directory feature.
 */

include_once 'case_directory.features.inc';
```

### I. Prefix the node Title/Case Number with the Case Type

At GBI, the case type appears in the node title of the case, along with some text that indicates you are looking at a case number. These are added to the node title on save without user additional user input, using custom code. The title can end up looking something like:

`robberies - Case Number: 5251546`

See the snippet in this repo titled [prefix_title_with_case_type.php](snippets/prefix_title_with_case_type.php). Paste this snippet into your \*.module file to get alter your case titles like this on save. Make sure to replace [YOUR_MODULE_NAME] with the name of your Feature module.

### II. Alter the Display Label of the Case Date by on Case Type

You'll see reviewing different Case Types on the GBI cases page that though the date for each case type is pulled from the same field, the labels for the dates are specific to each case type. This is made possible by four functions:
1. One to alter the label on a full node. `hook_node_view()`
2. One to alter the label on the table of cases. `hook_views_pre_render()`
3. One to alter the label on the exposed filter form. `hook_form_views_exposed_form_alter()`
4. And finally, one to tell the first three how the altered date labels read. `_[YOUR_MODULE_NAME]_get_date_label()`

See the snippet in this repo titled [alter_label_of_date_by_case_type.php](snippets/alter_label_of_date_by_case_type.php). Paste this snippet into your \*.module file. Make sure to replace [YOUR_MODULE_NAME] with the name of your Feature module.

-------------------------------------------------------

Once you have your new custom code in place (taking care to replace all instances of [YOUR_MODULE_NAME] with your module name), save your \*.module file. Take the whole folder that includes the \*.module file and upload it to your site at `sites/all/modules/custom`. Drupal does not come with a `/custom/` directory, so if you haven't created one already, create one now.

Go check out your new Feature on the page at Structure -> Features! That is a module you just created! Since it is a module, you can enable it from either this page or the module admin page.

-------------------------------------------------------

If this tutorial was helpful to you, we'd love to see what you've built. Tweet at [@GeorgiaGovTeam](https://twitter.com/georgiagovteam) to show off your work. If you see some room for improvement, see [CONTRIBUTING.md](CONTRIBUTING.md).
