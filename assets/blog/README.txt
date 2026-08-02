Blog rail banners
=================

Drop the two banner images here, keeping these exact filenames:

  banner-admissions-crm.png   (Admissions CRM  - "Turn More Enquiries Into Enrollments")
  banner-vidya-ai.png         (Vidya AI Suite  - "Meet Your AI Admissions Team")

Both link to https://www.extraaedge.com/book-a-demo/

The rail renders portrait banners about 300px wide, so export at roughly
900x1900 (2x) for a sharp result. .jpg or .webp work too - if you change the
extension, update the filename in the $ee_bl_banners array near the bottom
of page-blog.php.

If you would rather host them in the WordPress Media Library, paste the full
https://... URL into 'src' in that array instead of the filename; anything
starting with http is used exactly as given and no file needs to be here.

An entry whose file is missing is skipped, so the page never renders a
broken image while artwork is still being uploaded.
