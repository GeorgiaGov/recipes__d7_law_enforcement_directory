# How To

## Create a View

If you are not familiar with Views, it is basically a tool that will build a query for you, and then help you display the results. [If you need more details about Views, you should check out the "What is Views?" page on drupal.org.](https://www.drupal.org/docs/7/modules/views/what-is-views) You can see the cases view used by GBI at http://gbi.georgia.gov/cases. We'll be building a table-style view like the one there.

Click on Structure from the main menu. On the screen that appears, click on Views.

<screenshot>

You will now see a list of current views. Click on Add new view.

<screenshot>

On the next screen, you'll get some preliminary options for your view.

- **View name:** Cases
- Show Content of type _Case_ sorted by _Unsorted_
- **Display format:** Table

<screenshot of the page with View name, Show content…, display format filled in>

You could just save this view, but we want to configure it further, so select the "Continue & edit" button to add more options to your new view.

### Add and Configure a Contextual Filter

The first thing you should do is add a contextual filter for your case types. This will allow you to construct URLs that filter this view by case type, i.e. cases/robberies, without creating a whole separate view per case type.

Click on Advanced and then "Add" next to Contextual Filters.

<screenshot>

Search for "case type", check the box next to it, and then choose the Apply (all displays) button to save your selection.

<screenshot>

In the fieldset "When the filter value IS in the URL or a default is provided":

- Check "Override title", and set the text field to %1
- Check "Override breadcrumb", and set the text field to %1
- Check "Specify validation criteria"
  * Validator: - Basic validation -
  * Action to take if filter value does not validate: Display contents of "No results found".

Choose the Apply (all displays) button to save your selection.

<screenshot>

### Add Fields and Sort Criteria

Next, choose the fields you'd like to show in your table. Click add next to "Fields" and tick off the fields you want to include. Make sure to include the Case Date. Then apply to all displays.

<screenshot of Add Fields modal?>

Then add Sort Criteria. GBI sorts by Case Date by first, and Post Date second. You may choose to sort by Case Number, or other criteria.

<screenshot of sort criteria modal?>

### Expose Some Filters

For any of your individual fields or sort criteria, you may choose to tick the box that says _Expose this sort to visitors, to allow them to change it._ Doing so will turn that item into an exposed filter. GBI's cases page allows a simple search by case number/title, and changing the sort order for the Case Date and the Post Date.

<screenshot of GBIs exposed filters>

Save your View. Visit the page at /cases to check out the layout.
