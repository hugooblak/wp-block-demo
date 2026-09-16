# Fieldpass: a lightweight WordPress block theme demo

A marketing website for **Fieldpass**, a made-up ticketing platform for school events. It was built as a portfolio piece to show one way to build a fast, accessible WordPress site that a non-developer team can run without a page builder.

> Fieldpass is a fictional brand. The product, copy and FAQs are invented for this demo.

**Try it in your browser (no install):** [Open in WordPress Playground](https://playground.wordpress.net/?blueprint-url=https://raw.githubusercontent.com/hugooblak/wp-block-demo/main/blueprint.json)

Playground runs a real WordPress site in your browser tab. The first load can take a little while. You're logged in as an admin, so you can open the editor and change things. Nothing you do there is saved.

![Homepage](theme/fieldpass/screenshot.jpg)

---

## What's in the site

| Page | Who it's for | What it does |
|---|---|---|
| Home | Everyone | Short intro, then two clear paths: schools, or parents and fans |
| For schools | Schools and districts | Features, how it works, reasons to choose, FAQs, "Request a demo" |
| Request a demo | Schools | Simple form |
| Help Centre | Parents and fans | Help guides, app links, FAQs by topic, contact options. No tickets, accounts or checkout |
| Contact | Parents and fans | Support form |
| Blog + articles | Both | Normal WordPress posts, with categories |
| 404 | Everyone | Helpful links back |

## How it's built

**Nothing but WordPress, plus one form plugin.**

| Part | What it is | Why |
|---|---|---|
| `theme/fieldpass` | A block theme: `theme.json`, HTML templates and PHP patterns | Uses WordPress's own editor for everything. No page builder |
| `plugins/fieldpass-faq` | Small custom plugin (about 500 lines including comments and CSS) | The FAQ library. It's a plugin, not theme code, so FAQs survive a theme change |
| Contact Form 7 | Free plugin from wordpress.org, one of the most widely used form plugins | Forms, validation and email. Simple to manage. No paid licence |
| `content/setup.php` | Demo content script | Only used to fill the demo. Real content is entered in WordPress |

**No other plugins.** Page titles come from WordPress itself. The theme adds a basic meta description from each page's excerpt, and it turns itself off if an SEO plugin (Yoast, Rank Math, The SEO Framework) is installed later.

### Why Contact Form 7

- **It costs nothing to keep.** Free, no paid tier needed for simple forms.
- **It's light.** The theme only loads its files on pages that have a form. Every other page loads zero form code.
- **It's accessible.** Error messages are linked to their fields for screen readers (`aria-invalid`, `aria-describedby`). Every field has a visible label.
- **The trade-off:** you edit form fields in a simple text editor, not with blocks. For contact forms that rarely change, that's fine. If the team wanted drag-and-drop form building, WPForms Lite is a common alternative worth testing.

Only Contact Form 7 was tested for this demo.

## How the team edits the site

| Task | Where |
|---|---|
| Change text, buttons or images on a page | Pages → open the page → click and type |
| Add a section to a page | "+" → Patterns → **Fieldpass sections** (hero, feature grid, steps, FAQ block, call to action and more) |
| Start a new landing page from a layout | Pages → Add new → pick a **Fieldpass page layout** |
| Change colours, font sizes, button style (whole site) | Appearance → Editor → Styles |
| Change the menu | Appearance → Editor → Navigation → Main menu |
| Change the header or footer | Appearance → Editor → Patterns → Template parts |
| Add, edit, remove FAQs | **FAQs** in the admin menu |
| Put FAQs in a category | FAQs → Topics, then tick a topic when editing an FAQ |
| Reorder FAQs | Change the **Order** number in the FAQ's sidebar, or with Quick Edit. Lower numbers show first |
| Show FAQs on a page | Add the **FAQ list** block and pick a topic |
| Write a blog post | Posts → Add new |
| Make a section dark, light or a card | Select the group → Styles: *Dark section*, *Warm light section* or *Card* |

No page is built from Custom HTML blocks. Every section is made of normal blocks (group, columns, heading, paragraph, buttons, image).

## How it stays lightweight

- **One font file** (Schibsted Grotesk, 46 KB), stored on the site and preloaded. No calls to Google Fonts.
- **No photos.** The illustrations are four small SVG files. The drawings themselves are about 3 KB; each file also carries an embedded content-credentials tag (C2PA) of about 8 KB.
- **Only two scripts on most pages**, both from WordPress core, for the mobile menu. No sliders, no animation libraries, no jQuery on the front end.
- **FAQs open and close with plain HTML** (`<details>`), with no JavaScript.
- **Form scripts only load on form pages.**
- **WordPress's emoji script is removed** (browsers show emoji on their own).
- **The FAQ block's CSS only loads on pages that use it.**
- **Most design settings live in `theme.json`.** `style.css` holds only a few rules (focus outlines, form fields, the mobile menu).

## Test results

Tested on WordPress 7.1 with PHP 8.4. Full details are in [`proof/`](proof/README.md).

| Page | Speed | Accessibility | Best practices | SEO |
|---|---|---|---|---|
| Home | 96 | 100 | 100 | 100 |
| For schools | 98 | 100 | 100 | 100 |
| Help Centre | 97 | 100 | 100 | 100 |
| Request a demo | 97 | 100 | 100 | 100 |
| Blog | 99 | 100 | 100 | 100 |
| Article | 99 | 100 | 100 | 100 |

Lighthouse, mobile setting (simulated slow phone and network), on a local test server.

- **Accessibility scan (axe-core, WCAG 2.2 AA rules):** 0 issues on 8 pages, at desktop and mobile width.
- **Keyboard checks:** skip link, visible 3px focus outline on menu links, buttons and FAQ questions, FAQs open with Enter or Space, and the mobile menu opens with Enter and closes with Escape, returning focus to the menu button.
- **Forms:** empty submit shows linked error messages; a correct submit shows the thank-you message.
- **Layout:** no sideways scrolling from 320px to 1440px wide.
- **Editor:** every page, template, template part and pattern loads in the block editor with no invalid blocks.

Automated tools can't catch every accessibility problem. A full WCAG 2.2 AA audit for a real project would add manual screen reader testing.

## Run it locally

You need a local WordPress (for example [WordPress Studio](https://developer.wordpress.com/studio/) or [LocalWP](https://localwp.com/)).

1. Copy `theme/fieldpass` into `wp-content/themes/` and activate it.
2. Copy `plugins/fieldpass-faq` into `wp-content/plugins/`, and install Contact Form 7. Activate both.
3. Optional demo content: `wp eval-file content/setup.php` from the WordPress folder.

## Demo-only details

- Forms are in **demo mode**: they validate and show the thank-you message, but send no email. Remove `demo_mode: on` under the form's *Additional settings* to send email.
- The App Store and Google Play buttons link to the store home pages as placeholders.

## Files

```
blueprint.json          Sets up the WordPress Playground demo
content/setup.php       Demo pages, posts, FAQs, forms and menu
theme/fieldpass/
  theme.json            Colours, fonts, spacing, block styles
  style.css             The few styles theme.json can't express
  functions.php         Font preload, meta description, form loading (commented)
  templates/            Page, post, blog, archive, search and 404 layouts
  parts/                Header and footer
  patterns/             Reusable sections and full page layouts
  styles/sections/      Dark, warm light and card styles
  assets/               Font and SVG images
plugins/fieldpass-faq/
  fieldpass-faq.php     Plugin entry point
  includes/             FAQ post type, admin list, schema markup
  blocks/faq-list/      The FAQ list block (no build step)
  assets/faq-editor.js  "Order" box on the FAQ edit screen
proof/                  Screenshots, Lighthouse reports, accessibility results
```

## Licence

GPL-2.0-or-later, like WordPress. Font: SIL Open Font License (see `theme/fieldpass/assets/fonts/OFL.txt`).
