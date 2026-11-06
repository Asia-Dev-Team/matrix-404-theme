# Matrix 404 Theme

WordPress theme that closes the public side of a site: every front-end request returns HTTP 404 and shows a full-screen "Matrix" falling-characters animation. The admin panel keeps working.

## What it does

- Returns HTTP 404 with no-cache headers for every front-end request, including search.
- Shows `404.html`: a full-screen canvas with the falling-characters animation and a "404" message.
- Leaves the admin panel (`/wp-admin`) and AJAX requests untouched.
- Removes WordPress identification and discovery tags from `<head>`: generator, RSD, WLW manifest, shortlink, adjacent posts, feed links, resource hints.

## Use cases

- A site under development or temporarily closed, where the content must stay editable in the admin.
- A domain that must not expose WordPress content to visitors or crawlers.

## Requirements

- WordPress. No plugins or server extensions.

## Installation

1. Copy the theme folder to `wp-content/themes/`.
2. Activate **404 Theme** in **Appearance → Themes**.
3. Open any front-end URL in a private browser window to check the 404 page.

## Project structure

```
style.css       Theme header (name, description, version)
functions.php   Forces 404 for front-end requests, disables search, removes head tags
index.php       Sends the 404 status and loads the 404 template
404.php         Outputs 404.html, with a plain-text fallback if the file is missing
404.html        Standalone page with the Matrix animation (inline CSS and JS)
```

## Customization

- Edit `404.html` to change the text, colors, or animation; it has no external dependencies.
- To also close the REST API for visitors who are not logged in, uncomment the `disable_rest_api` block at the end of `functions.php`.

## Known limitations

- The REST API (`/wp-json/`) stays open by default and exposes public content such as posts and users.
- Switching to this theme hides the whole site from search engines; returning to another theme does not restore rankings immediately.
