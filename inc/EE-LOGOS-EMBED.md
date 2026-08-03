# `[ee_logos]` — institute logo wall

Paste the shortcode into any page, post, Gutenberg "Shortcode" block or page-builder
text/HTML widget. Nothing else to set up — the data and styling ship with the theme
(`inc/institute-logos.php`, loaded from `functions.php`).

## Building your own set (Site Editor)

**ExtraaEdge Site → 🏫 Logo Sets → ➕ New logo set**

1. Name it after where it goes — "Universities page", "Products page", "Sales dept".
2. Tick the logos it should show. Search by name, or use **Select all** on a
   category. Anything not in the list goes under **Your own logos** — type a URL
   or pick from the Media Library.
3. Save. The screen shows the shortcode, e.g. `[ee_logos set="universities-page"]`.
4. Paste that wherever the logos should appear. Done.

Editing the set later updates every page using it — no need to touch those pages.

## Quick copy-paste

| Page | Paste this |
|---|---|
| Home | `[ee_logos]` |
| Universities | `[ee_logos cat="universities" title="Universities that run on ExtraaEdge"]` |
| Colleges | `[ee_logos cat="colleges" title="Colleges that run on ExtraaEdge"]` |
| Schools | `[ee_logos cat="schools" title="Schools that run on ExtraaEdge"]` |
| Coaching | `[ee_logos cat="coaching-institutes" title="Coaching institutes on ExtraaEdge"]` |
| EdTech | `[ee_logos cat="edtech" title="EdTech companies on ExtraaEdge"]` |
| Study Abroad | `[ee_logos cat="study-abroad" title="Study-abroad partners"]` |
| Products / Solutions | `[ee_logos tabs="1" title="Trusted across every kind of institution"]` |

## Attributes

| Attribute | Default | What it does |
|---|---|---|
| `set` | *(empty)* | A set you built in Site Editor → 🏫 Logo Sets. Overrides `cat` and `tabs`. |
| `cat` | *(empty)* | Empty = the curated home set. One key, a comma-separated list (`cat="universities,colleges"`), or `all`. |
| `tabs` | off | `tabs="1"` renders every category with a clickable switcher. |
| `layout` | `marquee` | `grid` for a static grid instead of the scrolling rows. |
| `limit` | `0` | Cap the number of logos. `0` = all. |
| `rows` | `2` | `1` for a single scrolling row. |
| `speed` | `38` | Seconds for one full loop. Higher = slower. |
| `badge` | `Trusted Nationwide` | Small pill above the heading. `badge=""` removes it. |
| `title` | `Trusted by leading institutions` | Heading. `title=""` removes it. |
| `sub` | *(empty)* | One line under the heading. |
| `class` | *(empty)* | Extra CSS class on the section. |

### Category keys

`universities` · `colleges` · `schools` · `coaching-institutes` · `edtech` · `study-abroad`

Spaces and underscores work too, so `cat="Study Abroad"` is fine.

## Examples

    [ee_logos cat="universities" limit="24" speed="50"]
    [ee_logos cat="schools" layout="grid" badge="" title="Schools we work with"]
    [ee_logos cat="universities,colleges" title="Higher education on ExtraaEdge"]
    [ee_logos tabs="1" cat="universities,colleges,schools"]

## Adding or changing an institute

The easy way is the Site Editor screen above — add it under **Your own logos** in
whichever sets need it.

To add it to the built-in category lists instead (so it shows up for everyone
picking that category):

open `inc/institute-logos.php` and edit `ee_institute_logo_sets()`. Each entry is

    array('u' => 'https://…/logo.svg', 'a' => 'Institute Name'),

`u` is the logo URL, `a` is the name (used as the image alt text). Add it to the
category it belongs to; add it to `'home'` as well if it should appear on the
home page strip.

## Notes

- The CSS prints once per page no matter how many strips are on it.
- A logo that fails to load removes its own card, so a bad URL never leaves a hole.
- The same logo file is only ever shown once per strip. A few institutes share a
  mark (Rai University / Rai Technology University, the two MIT entries), so the
  count on a tab can be one or two lower than the row count in the sheet.
- The scroll pauses on hover and is disabled entirely for visitors who ask for
  reduced motion.
- The home page strip and `[ee_logos]` read the same list, so they cannot drift.
