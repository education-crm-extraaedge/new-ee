# `[ee_logos]` — institute logo wall

Paste the shortcode into any page, post, Gutenberg "Shortcode" block or page-builder
text/HTML widget. Nothing else to set up — the data and styling ship with the theme
(`inc/institute-logos.php`, loaded from `functions.php`).

## Building your own set (Site Editor)

**ExtraaEdge Site → 🏫 Logo Sets → ➕ New logo set**

1. Name it after where it goes — "Universities page", "Products page", "Sales dept".
   Set the **Heading (H2)** and **Description** shown above the logos, and a
   **Small pill** if you want one. Clear the heading to show no heading at all.
2. Tick the logos it should show. Search by name, or use **Select all** on a
   category. Everything picked appears as a chip under **In this set** — click
   the × on any chip to take it back out. Anything not in the list goes under **Your own logos** — type a URL
   or pick from the Media Library, then choose a **category** for it.

   Giving it a category files it into the shared library, so from then on it
   appears as a tickbox for every set and answers `cat=""` like any built-in
   category. Pick **+ New category…** to start a category of your own —
   "Training Partners", "Franchise", whatever you need — and it behaves exactly
   like Universities or Colleges, tabs included. Leave the category empty and
   the logo stays a one-off for this set only.
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
| `badge` | *(none)* | Small pill above the heading. Off unless you ask for it. |
| `title` | `Trusted by leading institutions` | Heading. `title=""` removes it. A set's own heading is used when the shortcode does not say. |
| `sub` | *(empty)* | One line under the heading. |
| `class` | *(empty)* | Extra CSS class on the section. |

### Category keys

`universities` · `colleges` · `schools` · `coaching-institutes` · `edtech` · `study-abroad`

Plus any category you create. Its key is the name in lowercase with dashes —
"Training Partners" becomes `training-partners`. The Logo Sets screen lists every
category with its ready-to-paste shortcode, so you never have to guess.

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

## Testimonials on hover

Every logo in the picker has a **Short testimonial** box, which appears once the
logo is ticked. Write a line or two and it shows in a small card when a visitor
hovers that logo — anywhere it appears, including the home page strip.

Logos with a testimonial carry a small orange dot in the corner so visitors know
there is something to hover. Cards without one behave exactly as before.

The card is keyboard reachable too — tab to a logo and the testimonial opens.
Clear the box and save to remove it.

## Deleting a logo from the list

In a set's picker, the small red **×** on a logo deletes it from the list
altogether — it disappears from every set and every page, including the home
page strip.

Nothing is destroyed. **ExtraaEdge Site → 🏫 Logo Sets** grows a **Deleted logos**
section with a **Restore** on each and a **Restore all**. The built-in lists live
in the theme file, so a delete is really a hide — which is exactly why it is
always undoable.

## Removing one of your own institutes

**ExtraaEdge Site → 🏫 Logo Sets** lists them under **Your own institutes** with a
Remove link. Removing the last institute in a category you created removes that
category too, so the list never fills up with empty ones. Sets that already
include the logo keep it.

## Notes

- The CSS prints once per page no matter how many strips are on it.
- A logo that fails to load removes its own card, so a bad URL never leaves a hole.
- The same logo file is only ever shown once per strip. A few institutes share a
  mark (Rai University / Rai Technology University, the two MIT entries), so the
  count on a tab can be one or two lower than the row count in the sheet.
- The scroll pauses on hover and is disabled entirely for visitors who ask for
  reduced motion.
- The home page strip and `[ee_logos]` read the same list, so they cannot drift.
