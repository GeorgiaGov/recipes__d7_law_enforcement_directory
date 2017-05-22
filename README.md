# How To Build a Law Enforcement Case Directory

## Introduction

As a law enforcement agency, you may want to present information about your open cases on your website. This can be useful for collecting leads from the public; furthermore, greater transparency leads to greater trust in your organization. [The Georgia Bureau of Investigation does exactly this with their Cases page.](http://gbi.georgia.gov/cases)

Drupal excels at taking your case data, helping you structure it, and then formatting it for display. You can use core Drupal and few popular contributed modules to recreate most of what GBI has on their website without touching any code. For extra flair, you can add a couple snippets of custom code to smooth out the user experience.

In this tutorial, you are going to:
1. [Build a Case content type](01_create_case_content_type.md)
2. [Build a view](02_create_view.md)
3. [Export all your new configuration to a reusable Feature.](03_create_feature.md)
4. [Add custom code that:](04_add_custom_code.md)
    - Prefixes extra information to the case node title.
    - Changes the display label of the Case Date per Case Type.

Ready? OK!

## Requirements

A working Drupal 7 site with these contributed modules installed. [If you need help installing contributed modules, you can refer to this documentation on drupal.org.](https://www.drupal.org/node/895232)
* [Features](https://www.drupal.org/project/features)
* [Views](https://www.drupal.org/project/views)
* Date, Date API, Date Popup, Date Views (these are all packaged with the [Date project](https://www.drupal.org/project/date))
* [Field group](https://www.drupal.org/project/field_group) (optional)

(If you don’t have a development environment and don’t want to use your production site for this exercise, you can quickly set up an empty Drupal 7 site using [Acquia Dev Desktop](https://dev.acquia.com/downloads) and use that. Your new configuration will be portable between sites!)
