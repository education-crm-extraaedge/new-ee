Blog rail banners
=================

The right-hand rail on /blog/ shows banner images that link to
https://www.extraaedge.com/book-a-demo/

Expected filenames:

  banner-admissions-crm    (Admissions CRM - "Turn More Enquiries Into Enrollments")
  banner-vidya-ai          (Vidya AI Suite - "Meet Your AI Admissions Team")

.png, .jpg, .jpeg and .webp all work - the extension is not fixed.


HOW TO ADD THEM - pick either one
---------------------------------

A) Media Library (easiest, no files to move)
   WordPress admin -> Media -> Add New -> upload both images.
   Keep the filenames above. Nothing else to do.

B) Theme folder
   Put the files in this directory:
     wp-content/themes/<your-theme>/assets/blog/
   A child theme is checked before the parent, so either works.

C) Any other URL
   Open page-blog.php, find the $ee_bl_banners array near the bottom, and
   replace 'src' with the full https://... URL. Anything starting with http
   is used exactly as given.


Sizes
-----
The rail renders portrait banners about 300px wide, so export around
900x1900 (2x) for a sharp result.


If a banner does not appear
---------------------------
Log in as an administrator and open /blog/. A note in the rail will name the
file it could not find and the folders it looked in. That note is only ever
shown to administrators, and only while an image is missing.

Remember to purge the LiteSpeed cache after uploading.
