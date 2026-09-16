# Test proof

Everything here was produced on 16 September 2026 against a clean install:
WordPress 7.1, PHP 8.4, SQLite, the Fieldpass theme, the FAQ plugin and Contact Form 7 6.1.7, filled by `content/setup.php`.

## Lighthouse

Mobile setting (simulated mid-range phone on a slow 4G connection). Local test server with no compression or caching, so a real host with gzip should do at least as well.

| Page | Speed | Accessibility | Best practices | SEO | Largest paint | Layout shift | Blocking time | Scripts |
|---|---|---|---|---|---|---|---|---|
| Home | 96 | 100 | 100 | 100 | 2.4 s | 0 | 0 ms | 2 |
| For schools | 98 | 100 | 100 | 100 | 2.3 s | 0 | 0 ms | 2 |
| Help Centre | 97 | 100 | 100 | 100 | 2.3 s | 0 | 0 ms | 2 |
| Request a demo | 97 | 100 | 100 | 100 | 2.4 s | 0 | 0 ms | 6 |
| Blog | 99 | 100 | 100 | 100 | 2.1 s | 0 | 0 ms | 2 |
| Article | 99 | 100 | 100 | 100 | 2.1 s | 0 | 10 ms | 2 |

Full reports: [`lighthouse/`](lighthouse/) (open the HTML files in a browser).

**Homepage weight:** 194 KB uncompressed, about 81 KB with gzip. Of that, 46 KB is the font file.

## Accessibility

- **axe-core scan**, WCAG 2.0/2.1/2.2 A and AA rules plus best practices. 8 pages (Home, For schools, Help Centre, Request a demo, Contact, Blog, an article, 404) at 1440px and 390px wide: **0 violations**. Raw results: [`axe-results.json`](axe-results.json).
- **Keyboard, tested in a real browser:**
  - First Tab shows "Skip to content"; Enter jumps past the header.
  - Menu links, buttons and FAQ questions show a 3px focus outline.
  - FAQ questions open with Enter and close with Space.
  - Mobile menu button is labelled "Open menu", opens with Enter, moves focus into the menu, closes with Escape and returns focus to the button.
- **Forms:** every field has a label linked to it. Submitting empty marks 4 required fields `aria-invalid` and shows error text. Filling them in and submitting again shows the thank-you message.
- **Colour contrast:** lowest text pair is 6.6:1 (grey text on the warm background). AA needs 4.5:1.

Automated scans cannot catch every accessibility problem. A real project would add screen reader testing (NVDA, VoiceOver).

## Other checks

- **Links:** crawled every internal link and file on the site. All return 200, except the deliberate 404 test page.
- **Layout:** no sideways scrolling on 6 pages at 320, 390, 600, 700, 768, 860, 900, 1024 and 1440px.
- **Editor:** all pages, posts, templates, template parts and 18 patterns were parsed inside the block editor: 0 invalid blocks, 0 Custom HTML blocks.
- **FAQ admin:** topic filter, Order column, and the Order box on the edit screen were tested; a changed order number saved correctly.

## Screenshots

[`screenshots/`](screenshots/): Home, For schools, Help Centre, Request a demo, Blog and an article, each at 1440px (desktop), 820px (tablet) and 390px (mobile).
