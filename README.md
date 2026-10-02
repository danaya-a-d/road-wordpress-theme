# RoadAR Analytics — Custom WordPress Theme

Custom WordPress theme developed for the **RoadAR Analytics** corporate product website.

This repository is a cleaned portfolio snapshot of the theme source code. It focuses on the code I implemented: PHP templates, WordPress/CMS integration, custom field configuration, frontend styles and custom JavaScript.

**Static frontend demo:** https://danaya-a-d.github.io/road/

> The demo is a static snapshot of the frontend. WordPress admin/CMS functionality is not available in the demo.

## My role

- Responsive frontend implementation
- Custom WordPress theme development
- WordPress template and navigation integration
- CMS-managed content and custom fields
- Custom post type implementation
- Multilingual integration
- AJAX interactions and contact form handling

## Key features

- **Custom WordPress theme** with dedicated templates for the home, about, contacts and policy pages
- **Custom post type for solutions** with archive and single-item templates
- **Carbon Fields** configuration for theme options and page-specific editable content
- Structured CMS fields for product features, indicators, galleries and YouTube videos
- **Polylang-compatible** language switcher and localized theme fields
- WordPress menus, featured images and custom image sizes
- **AJAX-powered** dynamic content loading
- Contact form processing through WordPress AJAX and `wp_mail()`
- Responsive frontend styling and interactive UI behavior

## Tech stack

`WordPress` · `PHP` · `HTML` · `CSS` · `JavaScript` · `jQuery` · `Carbon Fields` · `Polylang` · `AJAX`

## Repository structure

```text
.
├── assets/
│   └── script/                 # custom JavaScript
├── includes/
│   └── carbon-fields-options/  # CMS field definitions
├── archive-product.php         # solutions archive
├── single-product.php          # solution details
├── product-content.php         # solution content partial
├── page-home.php
├── page-about.php
├── page-contacts.php
├── page-policy.php
├── contact-form.php
├── header.php
├── footer.php
├── functions.php               # theme setup, CPT, AJAX, CMS integration
├── index.php
└── style.css
```

## Portfolio-source note

The original local project archive also contained a full WordPress installation, WordPress core files, default themes/plugins, a vendored Carbon Fields package, third-party frontend libraries, fonts and client media.

Those files are intentionally **not included** here. This repository is meant for source-code review rather than as a production-ready WordPress backup.

Third-party libraries used by the original project included Slick and Fancybox. Font files and client media are also omitted from the public source snapshot.

## What to review

For the WordPress/CMS side, the most relevant files are:

- `functions.php`
- `includes/carbon-fields-options/theme-options.php`
- `includes/carbon-fields-options/post-meta.php`
- `archive-product.php`
- `single-product.php`
- `page-home.php`

For the frontend implementation, see `style.css`, the page templates and `assets/script/`.
