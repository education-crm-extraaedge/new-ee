Blog rail banners
=================

The right-hand rail on /blog/ shows banner images that link to
https://www.extraaedge.com/book-a-demo/

They are currently pointed at the Media Library:

  https://www.extraaedge.com/wp-content/uploads/2026/blog-side-bar/admission-crm-banner.png
  https://www.extraaedge.com/wp-content/uploads/2026/blog-side-bar/vidya-ai-suite-admissions-banner.png


TO SWAP A BANNER
----------------
Open page-blog.php and find the $ee_bl_banners array, just above the rail
markup near the bottom. Each entry has 'src' (the image), 'href' (where it
links) and 'alt' (the description, which matters for SEO and screen readers).

'src' accepts any of:

  * a full https://... URL          - used exactly as given
  * a path inside the theme         - e.g. assets/blog/my-banner.png
                                      (this folder; child theme is checked
                                      before the parent)
  * just an image filename          - looked up in the Media Library

.png, .jpg, .jpeg and .webp all work - the extension is not fixed, so a .png
entry still matches a .jpg export of the same name.

Add or remove array entries to change how many banners the rail shows.


SIZES
-----
The rail renders portrait banners about 300px wide, so export around
900x1900 (2x) for a sharp result.


IF A BANNER DOES NOT APPEAR
---------------------------
Log in as an administrator and open /blog/. A note in the rail will name the
file it could not find and the folders it looked in. That note is only ever
shown to administrators, and only while an image is missing. If no banner
resolves at all, the rail falls back to a plain Book a Demo card rather than
being left empty.

Remember to purge the LiteSpeed cache after any change.
