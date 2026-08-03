<?php
if (!defined('ABSPATH')) exit;

/**
 * Institute logo sets, category-wise, from the client-provided
 * Institutes_Category_Wise sheet.
 *
 * Three ways in:
 *
 *   [ee_logos]                        the curated home set
 *   [ee_logos cat="universities"]     one category
 *   [ee_logos tabs="1"]               every category, with tabs to switch
 *
 * See ee_logos_shortcode() at the bottom for the full attribute list.
 * ee_render_category_institute_logos() is kept for single-industry.php,
 * which auto-detects the category from the post title.
 */

/**
 * key => human label. The keys are what the shortcode's cat="" takes.
 */
function ee_institute_categories() {
    $built_in = array(
        'universities'        => 'Universities',
        'colleges'            => 'Colleges',
        'schools'             => 'Schools',
        'coaching-institutes' => 'Coaching Institutes',
        'edtech'              => 'EdTech',
        'study-abroad'        => 'Study Abroad',
    );
    /* Categories added from Site Editor sit alongside the built-in six and
       behave identically - they show in the picker and answer cat="". */
    return array_merge($built_in, ee_logos_extra_cats());
}

/** slug => label for categories created in Site Editor. */
function ee_logos_extra_cats() {
    if (!function_exists('get_option')) return array();
    $c = get_option('ee_logo_cats', array());
    return is_array($c) ? $c : array();
}

/** Institutes added from Site Editor: list of array('u','a','cat'). */
function ee_logos_extra_logos() {
    if (!function_exists('get_option')) return array();
    $l = get_option('ee_logo_extras', array());
    return is_array($l) ? $l : array();
}

function ee_institute_logo_sets() {
    static $sets = null;
    if ($sets !== null) return $sets;
    $sets = array(
        'home' => array(
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/kalinga-inst-of-industrial-tech-kiit-logo.svg', 'a' => 'KALINGA INSTITUTE OF INDUSTRIAL TECHNOLOGY'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/kiit-school-of-management-ksom-logo.svg', 'a' => 'KIIT School of Management'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/kiit-school-of-rural-management-logo.svg', 'a' => 'KIIT School of Rural Management'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/bharati-vidyapeeth-deemed-univ-pune-logo.svg', 'a' => 'Bharati Vidyapeeth Deemed University, Pune'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/d-y-patil-university-ambi-u2013pune-logo.svg', 'a' => 'D Y Patil University, Ambi - Pune.'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/dr-d-y-patil-vidyapeeth-pune-logo.svg', 'a' => 'DR. D.Y. PATIL VIDYAPEETH SOCIETY, PUNE'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/d-y-patil-pgdm-institute-akurdi-logo.svg', 'a' => 'D Y Patil PGDM Institute Akurdi-Pune'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/rai-technology-university-logo.svg', 'a' => 'Rai University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/rai-technology-university-logo.svg', 'a' => 'Rai Technology University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/fore-school-of-management-logo.svg', 'a' => 'FORE School of Management'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/imt-ghaziabad-logo.svg', 'a' => 'Institute of Management Technology Ghaziabad'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/ashoka-university-haryana-logo.svg', 'a' => 'Ashoka University -  Haryana'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/reliance-foundation-inst-of-edu-and-research-jio-logo.svg', 'a' => 'Reliance Foundation Institution of Education & Research'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/uttaranchal-university-logo.svg', 'a' => 'Uttaranchal University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/techno-india-university-wb-logo.svg', 'a' => 'Techno India University West Bengal'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/sarla-birla-university-ranchi-logo.svg', 'a' => 'Sarla Birla University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/overseas/ec-council-university-logo.svg', 'a' => 'EC-Council University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/institute-of-public-enterprise-logo.svg', 'a' => 'Institute of Public Enterprise'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/xiss-ranchi-logo.svg', 'a' => 'Xavier Institute of Social Service (XISS), Ranchi'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/xavier-university-patna-logo.svg', 'a' => 'Xavier University Patna'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/narayana-hrudayalaya-foundations-logo.svg', 'a' => 'Narayana Hrudayalaya Foundations'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/seth-anandram-jaipuria-school-ghaziabad-logo.svg', 'a' => 'Seth Anandram Jaipuria School Ghaziabad'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/seth-anandram-jaipuria-school-kanpur-logo.svg', 'a' => 'Seth Anandram Jaipuria School Kanpur'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/suryadatta-group-of-institutes-logo.svg', 'a' => 'Suryadatta Group of Institutes'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/anant-national-university-logo.svg', 'a' => 'Anant National University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/atria-university-logo.svg', 'a' => 'Atria University | A.S. Kuppa Raju &Bros. Charitable Foundation Trust'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/renaissance-university-indore-logo.svg', 'a' => 'Renaissance University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/desh-bhagat-university-logo.svg', 'a' => 'Desh Bhagat University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/singhania-university-logo.svg', 'a' => 'Singhania University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/sr-university-logo.svg', 'a' => 'SR University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/mangalayatan-university-logo.svg', 'a' => 'Mangalayatan University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/sanskriti-university-logo.svg', 'a' => 'Sanskriti University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/adani-institute-of-digital-tech-mgmt-logo.svg', 'a' => 'Adani Institute of Digital Technology Management'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/mit-art-design-and-tech-university-logo.svg', 'a' => 'MIT Art Design and Technology University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/mit-art-design-and-tech-university-logo.svg', 'a' => 'MIT Institute of Design'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/edtech/mit-school-of-distance-education-logo.svg', 'a' => 'MIT School of Distance Education'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/ambalika-inst-of-mgmt-and-tech-logo.svg', 'a' => 'Ambalika Institute of Management and Technology'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/aissms-institute-of-it-logo.svg', 'a' => 'AISSMS Institute of Information Technology'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/vignana-jyothi-inst-of-mgmt-logo.svg', 'a' => 'Vignana Jyothi Institute of Management'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/supreme-knowledge-foundation-skfgi-logo.svg', 'a' => 'Supreme Knowledge Foundation'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/iibm-institute-of-business-mgmt-logo.svg', 'a' => 'IIBM Institute of Business Management'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/ips-academy-indore-logo.svg', 'a' => 'IPS Academy'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/kirloskar-institute-of-management-logo.svg', 'a' => 'Kirloskar Institute Of Management'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/zeal-college-of-engineering-pune-logo.svg', 'a' => 'Zeal College of Engineering and Research, Pune'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/amritsar-group-of-colleges-logo.svg', 'a' => 'Amritsar Group of Colleges'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/pune-institute-of-business-mgmt-logo.svg', 'a' => 'Pune Institute of business management'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/gurunanak-educational-trust-jis-logo.svg', 'a' => 'Gurunanak Educational Trust (JIS)'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/chrysalis-high-varthur-logo.svg', 'a' => 'Chrysalis High Varthur Foundation Trust'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/velammal-vidhyashram-logo.svg', 'a' => 'Velammal Vidhyashram'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/overseas/gateway-international-logo.svg', 'a' => 'GATEWAY INTERNATIONAL'),
        ),
        'universities' => array(
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/himalayan-university-logo.svg', 'a' => 'Himalayan University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/rimt-om-prakash-bansal-trust-logo.svg', 'a' => 'SHRI OM PRAKASH BANSAL EDUCATION & SOCIAL WELFARE TRUST (RIMT)'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/bharati-vidyapeeth-deemed-univ-pune-logo.svg', 'a' => 'Bharati Vidyapeeth Deemed University, Pune'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/mit-art-design-and-tech-university-logo.svg', 'a' => 'MIT Art Design and Technology University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/anant-national-university-logo.svg', 'a' => 'Anant National University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/desh-bhagat-university-logo.svg', 'a' => 'Desh Bhagat University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/sr-university-logo.svg', 'a' => 'SR University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/d-y-patil-university-ambi-u2013pune-logo.svg', 'a' => 'D Y Patil University, Ambi - Pune.'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/gurunanak-educational-trust-jis-logo.svg', 'a' => 'Gurunanak Educational Trust (JIS)'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/singhania-university-logo.svg', 'a' => 'Singhania University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/mangalayatan-university-logo.svg', 'a' => 'Mangalayatan University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/renaissance-university-indore-logo.svg', 'a' => 'Renaissance University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/jspm-university-pune-logo.svg', 'a' => 'JSPM University Pune'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/dr-d-y-patil-vidyapeeth-pune-logo.svg', 'a' => 'DR. D.Y. PATIL VIDYAPEETH SOCIETY, PUNE'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/uttaranchal-university-logo.svg', 'a' => 'Uttaranchal University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/vikrant-university-logo.svg', 'a' => 'Vikrant University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/sanskriti-university-logo.svg', 'a' => 'Sanskriti University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/atria-university-logo.svg', 'a' => 'Atria University | A.S. Kuppa Raju &Bros. Charitable Foundation Trust'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/srinivasa-university-logo.svg', 'a' => 'Srinivasa University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/overseas/ec-council-university-logo.svg', 'a' => 'EC-Council University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/wud-university-world-univ-of-design-logo.svg', 'a' => 'WUD University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/gopal-narayan-singh-university-logo.svg', 'a' => 'GOPAL NARAYAN SINGH UNIVERSITY'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/kishkinda-university-logo.svg', 'a' => 'Kishkinda University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/techno-india-university-wb-logo.svg', 'a' => 'Techno India University West Bengal'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/mansarovar-global-university-logo.svg', 'a' => 'Mansarovar Global university'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/atharva-university-mumbai-logo.svg', 'a' => 'ATHARVA University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/vels-institute-vistas-logo.svg', 'a' => 'Vels Institute of Science Technology and Advanced Studies'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/sarla-birla-university-ranchi-logo.svg', 'a' => 'Sarla Birla University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/shree-om-university-logo.svg', 'a' => 'Shree Om University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/jg-university-ahmedabad-logo.svg', 'a' => 'JG University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/rai-technology-university-logo.svg', 'a' => 'Rai Technology University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/rai-technology-university-logo.svg', 'a' => 'Rai University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/ashoka-university-haryana-logo.svg', 'a' => 'Ashoka University -  Haryana'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/xavier-university-patna-logo.svg', 'a' => 'Xavier University Patna'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/kalinga-inst-of-industrial-tech-kiit-logo.svg', 'a' => 'KALINGA INSTITUTE OF INDUSTRIAL TECHNOLOGY'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/reliance-foundation-inst-of-edu-and-research-jio-logo.svg', 'a' => 'Reliance Foundation Institution of Education & Research'),
        ),
        'colleges' => array(
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/mit-art-design-and-tech-university-logo.svg', 'a' => 'MIT Institute of Design'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/asm-group-of-institutes-logo.svg', 'a' => 'ASM Group of Institutes'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/institute-of-public-enterprise-logo.svg', 'a' => 'Institute of Public Enterprise'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/vocational/saltlake-society-for-hotel-mgmt-logo.svg', 'a' => 'SaltLake Society for Hotel Management'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/pune-institute-of-business-mgmt-logo.svg', 'a' => 'Pune Institute of business management'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/vocational/hamstech-india-limited-logo.svg', 'a' => 'Hamstech India Limited'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/xiss-ranchi-logo.svg', 'a' => 'Xavier Institute of Social Service (XISS), Ranchi'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/zeal-college-of-engineering-pune-logo.svg', 'a' => 'Zeal College of Engineering and Research, Pune'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/iitm-college-of-engineering-logo.svg', 'a' => 'IITM college of Engineering'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/aissms-institute-of-it-logo.svg', 'a' => 'AISSMS Institute of Information Technology'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/vignana-jyothi-inst-of-mgmt-logo.svg', 'a' => 'Vignana Jyothi Institute of Management'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/d-y-patil-pgdm-institute-akurdi-logo.svg', 'a' => 'D Y Patil PGDM Institute Akurdi-Pune'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/school-of-innovation-and-management-logo.svg', 'a' => 'School of Innovation and Management'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/met-league-of-colleges-mumbai-logo.svg', 'a' => 'Mumbai Educational Trust MET League of Colleges'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/amritsar-group-of-colleges-logo.svg', 'a' => 'Amritsar Group of Colleges'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/park-s-college-logo.svg', 'a' => 'Park\'s College'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/kirloskar-institute-of-management-logo.svg', 'a' => 'Kirloskar Institute Of Management'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/academy-of-applied-arts-logo.svg', 'a' => 'Academy of Applied Arts'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/toms-college-of-engineering-logo.svg', 'a' => 'Toms College of Engineering'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/iihmr-health-mgmt-research-logo.svg', 'a' => 'INTERNATIONAL INSTITUTE OF HEALTH MANAGEMENT RESEARCH'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/nutan-maharashtra-inst-of-engg-and-tech-logo.svg', 'a' => 'Nutan Maharashtra Institute of Engineering and Technology'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/sai-balaji-iims-pune-logo.svg', 'a' => 'Sai Balaji Education Society\'s International Institute of Management Studies'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/sasurie-college-of-engineering-logo.svg', 'a' => 'SASURIE COLLEGE OF ENGINEERING'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/edtech/fostiima-business-school-logo.svg', 'a' => 'FOSTIIMA INTEGRATED LEARNING RESOURCES PRIVATE LIMITED'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/aishwarya-college-udaipur-logo.svg', 'a' => 'Aishwarya College, Udaipur'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/des-imdr-pune-logo.svg', 'a' => 'DES IMDR'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/supreme-knowledge-foundation-skfgi-logo.svg', 'a' => 'Supreme Knowledge Foundation'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/vocational/nips-school-of-hotel-management-logo.svg', 'a' => 'NIPS School of Hotel Management'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/tula-s-institute-dehradun-logo.svg', 'a' => 'Rishabh Educational Trust Tula\'s Institute Dehradun'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/vocational/national-power-training-institute-logo.svg', 'a' => 'National Power training Institute'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/fore-school-of-management-logo.svg', 'a' => 'FORE School of Management'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/iibm-institute-of-business-mgmt-logo.svg', 'a' => 'IIBM Institute of Business Management'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/ips-academy-indore-logo.svg', 'a' => 'IPS Academy'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/modern-groups-of-institute-logo.svg', 'a' => 'MODERN INSTITUTE OF PHARMACEUTICAL SCIENCES'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/indian-academy-degree-college-logo.svg', 'a' => 'Indian Academy Degree College'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/overseas/ecole-intuit-lab-logo.svg', 'a' => 'Ecole Intuit Lab Education Pvt Ltd'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/suryadatta-group-of-institutes-logo.svg', 'a' => 'Suryadatta Group of Institutes'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/adani-institute-of-digital-tech-mgmt-logo.svg', 'a' => 'Adani Institute of Digital Technology Management'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/ambalika-inst-of-mgmt-and-tech-logo.svg', 'a' => 'Ambalika Institute of Management and Technology'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/imt-ghaziabad-logo.svg', 'a' => 'Institute of Management Technology Ghaziabad'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/pune-institute-of-business-mgmt-logo.svg', 'a' => 'Pune Business School'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/ashoka-school-of-business-hyd-logo.svg', 'a' => 'Ashoka School of business'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/jagannath-inst-of-mgmt-sciences-logo.svg', 'a' => 'Jagannath Institute of Management Sciences'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/kiit-school-of-management-ksom-logo.svg', 'a' => 'KIIT School of Management'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/jims-logo.svg', 'a' => 'Jims Engineering management Technical campus'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/kiit-school-of-rural-management-logo.svg', 'a' => 'KIIT School of Rural Management'),
        ),
        'schools' => array(
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/sree-sloka-sai-dattatreya-edu-society-logo.svg', 'a' => 'Sree Sloka Sai Dattatreya Educational Society'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/coaching%20institute%20crm/the-quantium-school-vedaantha-fdn-logo.svg', 'a' => 'The Quantium School C/o Vedaantha Foundation'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/rajasthani-sammelan-education-trust-logo.svg', 'a' => 'Rajasthani Sammelan Education Trust'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/bareilly-scholars-educational-society-kcmt-logo.svg', 'a' => 'Bareilly Scholars educational Society'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/edtech/nspira-management-services-logo.svg', 'a' => 'NSPIRA MANAGEMENT SERVICES PRIVATE LIMITED (One School)'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/narayana-group-one-school-logo.svg', 'a' => 'MAEER\'S Vishwashanti Gurukul Higher Secondary School - VGHS Pandharpur Unit'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/chrysalis-high-varthur-logo.svg', 'a' => 'Chrysalis High Varthur Foundation Trust'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/dalhousie-public-school-edu-society-logo.svg', 'a' => 'Dalhousie Public School Education Society'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/seth-anandram-jaipuria-school-kanpur-logo.svg', 'a' => 'Seth Anandram Jaipuria School Kanpur'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/arch-educational-society-jaipur-logo.svg', 'a' => 'ARCH EDUCATIONAL SOCIETY'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/velammal-vidhyashram-logo.svg', 'a' => 'Velammal Vidhyashram'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/modern-groups-of-institute-logo.svg', 'a' => 'Modern Academy Education Society'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/universal-wisdom-school-logo.svg', 'a' => 'Universal Wisdom School'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/acharyapuram-education-foundation-logo.svg', 'a' => 'Acharyapuram Education Foundation'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/wisdom-world-school-hadapsaror-wakad-logo.svg', 'a' => 'Wisdom World School, Hadapsar & Wakad'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/seth-anandram-jaipuria-school-ghaziabad-logo.svg', 'a' => 'Seth Anandram Jaipuria School Ghaziabad'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/maya-devi-educational-foundation-logo.svg', 'a' => 'Maya Devi Educational Foundation'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/overseas/the-new-school-logo.svg', 'a' => 'The New School'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/mahendra-educational-pvt-ltd-logo.svg', 'a' => 'Mahendra Educational Pvt. Ltd.'),
        ),
        'coaching-institutes' => array(
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/vocational/finx-institute-limited-logo.svg', 'a' => 'FINX INSTITUTE LIMITED'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/coaching%20institute%20crm/ignite-academy-logo.svg', 'a' => 'Ignite Academy'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/coaching%20institute%20crm/iitians-prashikshan-kendra-logo.svg', 'a' => 'IITIans Prashikshan Kendra Pvt. Ltd.'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/vocational/career-buddy-placement-and-training-logo.svg', 'a' => 'Career Buddy College Placement and Training'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/narayana-hrudayalaya-foundations-logo.svg', 'a' => 'Narayana Hrudayalaya Foundations'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/vocational/the-language-skool-logo.svg', 'a' => 'The Language SKOOL'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/vocational/pixel-pop-academy-pvt-ltd-logo.svg', 'a' => 'Pixel Pop Academy Private Limited'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/coaching%20institute%20crm/dr-rajkumar-academy-for-civil-services-logo.svg', 'a' => 'Dr. Rajkumar Academy for Civil Services'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/coaching%20institute%20crm/competishun-logo.svg', 'a' => 'Competishun'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/vocational/wiztoonz-academy-of-media-and-design-logo.svg', 'a' => 'Wiztoonz Academy of Media & Design'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/vocational/ica-edu-skills-logo.svg', 'a' => 'ICA EDU SKILLS PRIVATE LIMITED'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/vocational/ebek-language-laboratories-logo.svg', 'a' => 'Ebek Language Laboratories Private Limited'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/coaching%20institute%20crm/premier-academy-for-general-and-edu-logo.svg', 'a' => 'PREMIER ACADEMY FOR GENERAL & EDUCATIONAL'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/vocational/the-trading-institute-logo.svg', 'a' => 'THE TRADING INSTITUTE'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/coaching%20institute%20crm/the-premia-academy-hyd-logo.svg', 'a' => 'The Premia Academy'),
        ),
        'edtech' => array(
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/edtech/ahaguru-education-technology-logo.svg', 'a' => 'AHAGURU EDUCATION TECHNOLOGY PRIVATE LIMITED'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/school-of-innovation-and-management-logo.svg', 'a' => 'K-Innovative Hub Private Limited'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/edtech/nspira-management-services-logo.svg', 'a' => 'NSPIRA MANAGEMENT SERVICES PRIVATE LIMITED'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/edtech/vlead-management-consultancy-logo.svg', 'a' => 'vLEAD Management Consultancy Private Limited'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/edtech/yangpoo-marketing-pvt-ltd-logo.svg', 'a' => 'YANGPOO MARKETING PRIVATE LIMITED'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/vocational/k11-fitness-pvt-ltd-logo.svg', 'a' => 'K11 EDUCATION PRIVATE LIMITED'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/edtech/seamless-education-services-logo.svg', 'a' => 'Seamless Education Services Pvt Ltd'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/edtech/udnav-or-eduplus-logo.svg', 'a' => 'UDNAV ERP SOFTWARE TECHNOLOGIES LLP (Eduplus now)'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/edtech/dq-labs-pvt-ltd-logo.svg', 'a' => 'DQ Labs Pvt Ltd'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/coaching%20institute%20crm/results-consortium-ltd-logo.svg', 'a' => 'Results Consortium Ltd'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/fortune-cloud-technologies-logo.svg', 'a' => 'FORTUNE CLOUD TECHNOLOGIES PRIVATE LIMITED'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/edtech/mit-school-of-distance-education-logo.svg', 'a' => 'MIT School of Distance Education'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/overseas/mit-univista-global-tech-logo.svg', 'a' => 'UNIVISTA GLOBAL TECH PRIVATE LIMITED'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/edtech/mindcreed-logo.svg', 'a' => 'MINDCREED'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/edtech/nilaya-edutech-pvt-ltd-logo.svg', 'a' => 'Nilaya Edutech Pvt Ltd'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/etherial-education-pvt-ltd-or-united-group-of-institute-logo.svg', 'a' => 'ETHERIAL EDUCATION PRIVATE LIMITED'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/edtech/eduplusnow-learning-systems-logo.svg', 'a' => 'Eduplusnow Learning Systems Private Limited'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/edtech/srj-edu-services-pvt-ltd-logo.svg', 'a' => 'SRJ EDU Services Pvt. Ltd'),
        ),
        'study-abroad' => array(
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/overseas/gateway-international-logo.svg', 'a' => 'GATEWAY INTERNATIONAL'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/overseas/aip-education-pty-ltd-aus-logo.svg', 'a' => 'AIP Education Pty. Ltd.'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/overseas/middle-east-college-oman-logo.svg', 'a' => 'Middle East College'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/overseas/british-columbia-college-of-mgmt-logo.svg', 'a' => 'British Columbia College of Management'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/trillium-foundation-logo.svg', 'a' => 'TRILLIUM FOUNDATION'),
        ),
    );

    /* Older keys used elsewhere in the theme keep working: the Industries
       pages match on post title and expect these names. Higher education is
       the two degree-granting sets together. */
    $sets['top50']            = $sets['home'];
    $sets['k12']              = $sets['schools'];
    $sets['coaching']         = $sets['coaching-institutes'];
    $sets['higher-education'] = array_merge($sets['universities'], $sets['colleges']);
    $sets['online-degree']    = $sets['edtech'];
    $sets['preschool']        = $sets['schools'];
    $sets['channel-partners'] = $sets['study-abroad'];

    return $sets;
}

/**
 * Resolve a cat="" value to a de-duplicated logo list.
 * Accepts one key, a comma-separated list, 'all', or '' for the home set.
 */
function ee_institute_logos_for($cat = '') {
    $sets = ee_institute_logo_sets();
    $cat  = trim(strtolower($cat));

    if ($cat === '' || $cat === 'home') return $sets['home'];

    if ($cat === 'all') {
        $keys = array_keys(ee_institute_categories());
    } else {
        $keys = array_map('trim', explode(',', $cat));
    }

    $extras = ee_logos_extra_logos();
    $out = array();
    $seen = array();
    foreach ($keys as $k) {
        /* tolerate "Study Abroad", "study_abroad" and "study-abroad" alike */
        $k = str_replace(array(' ', '_'), '-', $k);

        $pool = isset($sets[$k]) ? $sets[$k] : array();
        /* the user's own institutes join whichever category they were filed
           under - including a category that only exists because they made it */
        foreach ($extras as $x) {
            if (isset($x['cat']) && $x['cat'] === $k) $pool[] = array('u' => $x['u'], 'a' => $x['a']);
        }
        if (!$pool) continue;
        foreach ($pool as $logo) {
            /* Keyed on the file, not the name: a few institutes share one
               mark (Rai University and Rai Technology University, the two
               MIT entries), and a logo wall showing the same mark twice
               reads as a bug. The first name met keeps the alt text. */
            $id = $logo['u'];
            if (isset($seen[$id])) continue;
            $seen[$id] = true;
            $out[] = $logo;
        }
    }
    return $out;
}

/**
 * Category key => keyword list matched (case-insensitive substring)
 * against the current Industry post's title, so the right logo set
 * renders automatically with no extra admin UI needed.
 */
function ee_institute_category_keywords() {
    return array(
        'edtech'              => array('edtech', 'ed-tech', 'ed tech', 'online degree', 'distance education', 'online learning'),
        'coaching-institutes' => array('coaching', 'test prep', 'tuition', 'vocational'),
        'schools'             => array('k-12', 'k12', 'school crm', 'schools', 'preschool', 'pre-school', 'playschool', 'play school'),
        'universities'        => array('university', 'universities'),
        'colleges'            => array('college'),
        'study-abroad'        => array('study abroad', 'overseas', 'international admission', 'channel partner'),
        'higher-education'    => array('higher education'),
    );
}

/**
 * The one renderer everything else goes through.
 * Prints its CSS once per page, however many strips are on it.
 */
function ee_institute_logos_html($args = array()) {
    $a = wp_parse_args($args, array(
        'set'     => '',        // a set built in Site Editor -> Logo Sets
        'cat'     => '',
        'tabs'    => false,     // show the category switcher
        'layout'  => 'marquee', // marquee | grid
        'limit'   => 0,         // 0 = all
        'badge'   => 'Trusted Nationwide',
        'title'   => 'Trusted by leading institutions',
        'sub'     => '',
        'speed'   => 38,        // seconds for one loop
        'rows'    => 2,
        'class'   => '',
    ));

    /* A saved set wins over cat/tabs - it is an explicit hand-picked list,
       so there is nothing to filter or switch between. */
    $saved = trim((string) $a['set']);
    if ($saved !== '') {
        $sets = function_exists('ee_logos_custom_sets') ? ee_logos_custom_sets() : array();
        $one  = $sets[$saved] ?? null;
        if (!$one || empty($one['logos'])) return '';
        $a['tabs'] = false;
        $a['cat']  = '';
    }

    $cats = ee_institute_categories();
    $tabs = !empty($a['tabs']) && $a['tabs'] !== 'false' && $a['tabs'] !== '0';

    /* With tabs on, every category is rendered and CSS/JS switches between
       them - no request per tab, and it still works with JS off (the first
       panel is visible and the rest are simply below it). */
    $panels = array();
    if ($tabs) {
        $keys = $a['cat'] === '' || $a['cat'] === 'all'
            ? array_keys($cats)
            : array_map('trim', explode(',', strtolower($a['cat'])));
        foreach ($keys as $k) {
            $k = str_replace(array(' ', '_'), '-', $k);
            if (!isset($cats[$k])) continue;
            $logos = ee_institute_logos_for($k);
            if ($logos) $panels[$k] = array('label' => $cats[$k], 'logos' => $logos);
        }
        if (!$panels) return '';
    } elseif ($saved !== '') {
        $panels['_'] = array('label' => '', 'logos' => $one['logos']);
    } else {
        $logos = ee_institute_logos_for($a['cat']);
        if (!$logos) return '';
        $panels['_'] = array('label' => '', 'logos' => $logos);
    }

    $limit = (int) $a['limit'];
    if ($limit > 0) {
        foreach ($panels as $k => $p) $panels[$k]['logos'] = array_slice($p['logos'], 0, $limit);
    }

    static $css_done = false;
    static $uid = 0;
    $uid++;
    $id = 'ee-logos-' . $uid;

    ob_start();

    if (!$css_done) {
        $css_done = true;
        ?>
<style id="ee-logos-css">
/* ── Institute logo strip ──────────────────────────────────────────────────
   Two marquee rows running opposite ways, or a plain grid. Brand palette
   only: #19345D navy, #DE6E30 orange, Inter. */
.ee-logos{padding:clamp(34px,5vw,56px) 0;overflow:hidden;font-family:'Inter',system-ui,-apple-system,sans-serif}
.ee-logos-head{max-width:760px;margin:0 auto clamp(20px,3vw,30px);text-align:center;padding:0 24px}
.ee-logos-badge{display:inline-block;font-size:12px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:#DE6E30;background:rgba(222,110,48,.08);border:1px solid rgba(222,110,48,.18);padding:7px 16px;border-radius:99px;margin-bottom:12px}
.ee-logos-h2{font-weight:800;font-size:clamp(20px,3vw,32px);line-height:1.2;letter-spacing:-.02em;color:#19345d;margin:0}
.ee-logos-sub{margin:10px 0 0;font-size:15px;line-height:1.6;color:#5a6b85}
/* tabs */
.ee-logos-tabs{display:flex;flex-wrap:wrap;justify-content:center;gap:8px;margin:0 auto clamp(18px,2.5vw,26px);padding:0 20px;max-width:900px}
.ee-logos-tab{font:700 13px/1 'Inter',system-ui,sans-serif;color:#19345d;background:#fff;border:1px solid rgba(25,52,93,.14);border-radius:999px;padding:10px 16px;cursor:pointer;transition:background .2s,color .2s,border-color .2s,transform .2s}
.ee-logos-tab:hover{border-color:rgba(222,110,48,.45);transform:translateY(-1px)}
.ee-logos-tab[aria-selected="true"]{background:linear-gradient(135deg,#E8843F,#DE6E30);border-color:transparent;color:#fff;box-shadow:0 10px 22px -10px rgba(222,110,48,.7)}
.ee-logos-tab .n{opacity:.65;font-weight:600;margin-left:5px}
.ee-logos-tab[aria-selected="true"] .n{opacity:.85}
.ee-logos-panel[hidden]{display:none}
/* marquee */
.ee-logos-wrap{overflow:hidden;padding:6px 0;-webkit-mask-image:linear-gradient(90deg,transparent,#000 6%,#000 94%,transparent);mask-image:linear-gradient(90deg,transparent,#000 6%,#000 94%,transparent)}
.ee-logos-track{display:flex;gap:22px;width:max-content;align-items:center;will-change:transform;padding:6px 0}
.ee-logos-a{animation:eeLogosL var(--ee-logos-speed,38s) linear infinite}
.ee-logos-b{animation:eeLogosR var(--ee-logos-speed,38s) linear infinite;margin-top:14px}
.ee-logos-wrap:hover .ee-logos-track,.ee-logos-wrap:focus-within .ee-logos-track{animation-play-state:paused}
@keyframes eeLogosL{0%{transform:translateX(0)}100%{transform:translateX(-50%)}}
@keyframes eeLogosR{0%{transform:translateX(-50%)}100%{transform:translateX(0)}}
/* grid */
.ee-logos-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(150px,1fr));gap:14px;max-width:1280px;margin:0 auto;padding:0 24px}
/* card */
.ee-logo-card{flex:none;width:150px;height:76px;background:#f8fafc;border:1px solid #e2e8f0;border-radius:12px;display:grid;place-items:center;padding:14px;transition:border-color .3s,transform .3s}
.ee-logos-grid .ee-logo-card{width:auto}
.ee-logo-card:hover{border-color:#DE6E30;transform:translateY(-3px)}
.ee-logo-card img{max-height:44px;max-width:100%;width:auto;object-fit:contain;filter:grayscale(100%);opacity:.75;transition:filter .3s,opacity .3s}
.ee-logo-card:hover img{filter:none;opacity:1}
@media(prefers-reduced-motion:reduce){.ee-logos-track{animation:none}.ee-logo-card{transition:none}}
@media(max-width:600px){
  .ee-logo-card{width:118px;height:64px;padding:10px}
  .ee-logos-grid{grid-template-columns:repeat(auto-fill,minmax(118px,1fr));gap:10px;padding:0 16px}
  .ee-logo-card img{max-height:34px}
  .ee-logos-tab{font-size:12px;padding:8px 13px}
}
</style>
        <?php
    }
    ?>
<section class="ee-logos <?php echo esc_attr($a['class']); ?>" id="<?php echo esc_attr($id); ?>" aria-label="Institutions using ExtraaEdge">
  <?php if ($a['badge'] || $a['title'] || $a['sub']) : ?>
  <div class="ee-logos-head">
    <?php if ($a['badge']) : ?><div class="ee-logos-badge"><?php echo esc_html($a['badge']); ?></div><?php endif; ?>
    <?php if ($a['title']) : ?><h2 class="ee-logos-h2"><?php echo esc_html($a['title']); ?></h2><?php endif; ?>
    <?php if ($a['sub']) : ?><p class="ee-logos-sub"><?php echo esc_html($a['sub']); ?></p><?php endif; ?>
  </div>
  <?php endif; ?>

  <?php if ($tabs) : ?>
  <div class="ee-logos-tabs" role="tablist">
    <?php $first = true; foreach ($panels as $k => $p) : ?>
    <button type="button" class="ee-logos-tab" role="tab"
            id="<?php echo esc_attr($id . '-t-' . $k); ?>"
            aria-controls="<?php echo esc_attr($id . '-p-' . $k); ?>"
            aria-selected="<?php echo $first ? 'true' : 'false'; ?>"><?php
      echo esc_html($p['label']); ?><span class="n"><?php echo count($p['logos']); ?></span></button>
    <?php $first = false; endforeach; ?>
  </div>
  <?php endif; ?>

  <?php $first = true; foreach ($panels as $k => $p) :
    $logos = $p['logos'];
    /* Split odd/even into the two rows, then pad short lists so the -50%
       loop never shows a trailing gap. */
    $row_a = array(); $row_b = array();
    foreach ($logos as $i => $logo) { if ($i % 2 === 0) $row_a[] = $logo; else $row_b[] = $logo; }
    if (!$row_a) $row_a = $row_b;
    if (!$row_b) $row_b = $row_a;
    if ((int) $a['rows'] === 1) { $row_a = $logos; $row_b = array(); }
    $MIN = 8;
    $pad = function ($row) use ($MIN) {
        if (!$row) return $row;
        $out = $row;
        while (count($out) < $MIN) { foreach ($row as $x) { $out[] = $x; if (count($out) >= $MIN) break; } }
        return $out;
    };
    $row_a = $pad($row_a); $row_b = $pad($row_b);
  ?>
  <div class="ee-logos-panel" role="<?php echo $tabs ? 'tabpanel' : 'group'; ?>"
       id="<?php echo esc_attr($id . '-p-' . $k); ?>"
       <?php if ($tabs) : ?>aria-labelledby="<?php echo esc_attr($id . '-t-' . $k); ?>"<?php endif; ?>
       <?php echo ($tabs && !$first) ? 'hidden' : ''; ?>>

    <?php if ($a['layout'] === 'grid') : ?>
    <div class="ee-logos-grid">
      <?php foreach ($logos as $logo) : ?>
      <div class="ee-logo-card"><img src="<?php echo esc_url($logo['u']); ?>" alt="<?php echo esc_attr($logo['a']); ?>" loading="lazy" decoding="async" onerror="this.closest('.ee-logo-card').remove()"></div>
      <?php endforeach; ?>
    </div>
    <?php else : ?>
    <div class="ee-logos-wrap" style="--ee-logos-speed:<?php echo (int) $a['speed']; ?>s">
      <div class="ee-logos-track ee-logos-a">
        <?php for ($pass = 0; $pass < 2; $pass++) : foreach ($row_a as $logo) : ?>
        <div class="ee-logo-card"<?php echo $pass ? ' aria-hidden="true"' : ''; ?>><img src="<?php echo esc_url($logo['u']); ?>" alt="<?php echo $pass ? '' : esc_attr($logo['a']); ?>" loading="lazy" decoding="async" onerror="this.closest('.ee-logo-card').remove()"></div>
        <?php endforeach; endfor; ?>
      </div>
      <?php if ($row_b) : ?>
      <div class="ee-logos-track ee-logos-b">
        <?php for ($pass = 0; $pass < 2; $pass++) : foreach ($row_b as $logo) : ?>
        <div class="ee-logo-card"<?php echo $pass ? ' aria-hidden="true"' : ''; ?>><img src="<?php echo esc_url($logo['u']); ?>" alt="<?php echo $pass ? '' : esc_attr($logo['a']); ?>" loading="lazy" decoding="async" onerror="this.closest('.ee-logo-card').remove()"></div>
        <?php endforeach; endfor; ?>
      </div>
      <?php endif; ?>
    </div>
    <?php endif; ?>
  </div>
  <?php $first = false; endforeach; ?>
</section>
<?php if ($tabs) : ?>
<script>
(function(){
  var root=document.getElementById('<?php echo esc_js($id); ?>'); if(!root) return;
  var tabs=[].slice.call(root.querySelectorAll('.ee-logos-tab'));
  function show(i){
    tabs.forEach(function(t,j){
      t.setAttribute('aria-selected', j===i ? 'true' : 'false');
      var p=document.getElementById(t.getAttribute('aria-controls'));
      if(p){ if(j===i){ p.removeAttribute('hidden'); } else { p.setAttribute('hidden',''); } }
    });
  }
  tabs.forEach(function(t,i){
    t.addEventListener('click',function(){ show(i); });
    /* arrow keys move between tabs, the pattern screen readers expect */
    t.addEventListener('keydown',function(e){
      var n = e.key==='ArrowRight' ? i+1 : e.key==='ArrowLeft' ? i-1 : -1;
      if(n<0 || n>=tabs.length) return;
      e.preventDefault(); tabs[n].focus(); show(n);
    });
  });
  show(0);
})();
</script>
<?php endif;

    return ob_get_clean();
}

/**
 * [ee_logos] - paste on any page, post or builder block.
 *
 *   set     a set built in Site Editor -> 🏫 Logo Sets. Wins over cat/tabs.
 *   cat     universities | colleges | schools | coaching-institutes |
 *           edtech | study-abroad | all | (empty = the home set)
 *           Comma-separate to merge: cat="universities,colleges"
 *   tabs    1 to render every category with a switcher
 *   layout  marquee (default) | grid
 *   limit   max logos, 0 for all
 *   rows    2 (default) | 1
 *   speed   seconds for one marquee loop, default 38
 *   badge / title / sub   header text; pass "" to drop that line
 */
function ee_logos_shortcode($atts) {
    $atts = shortcode_atts(array(
        'set'    => '',
        'cat'    => '',
        'tabs'   => '',
        'layout' => 'marquee',
        'limit'  => 0,
        'rows'   => 2,
        'speed'  => 38,
        'badge'  => 'Trusted Nationwide',
        'title'  => 'Trusted by leading institutions',
        'sub'    => '',
        'class'  => '',
    ), $atts, 'ee_logos');
    return ee_institute_logos_html($atts);
}
add_shortcode('ee_logos', 'ee_logos_shortcode');

/**
 * Renders the "Trusted by" strip for an Industries category page.
 * Auto-detects the category from the current post's title unless
 * $category_key is passed. Safe no-op if nothing matches.
 */
function ee_render_category_institute_logos($category_key = '', $args = array()) {
    static $rendered = false;
    if ($rendered) return;

    if ($category_key === '') {
        $title = strtolower(get_the_title());
        foreach (ee_institute_category_keywords() as $key => $kws) {
            foreach ($kws as $kw) {
                if (strpos($title, $kw) !== false) { $category_key = $key; break 2; }
            }
        }
    }
    if ($category_key === '') return;

    $logos = ee_institute_logos_for($category_key);
    if (!$logos) return;

    $rendered = true;
    $args = wp_parse_args($args, array(
        'badge' => 'Trusted Nationwide',
        'title' => 'Trusted by leading institutions',
    ));
    echo ee_institute_logos_html(array(
        'cat'   => $category_key,
        'badge' => $args['badge'],
        'title' => isset($args['heading']) ? $args['heading'] : $args['title'],
        'class' => 'ee-ind-logos',
    ));
}

/* =========================================================================
 * SITE EDITOR — 🏫 Logo Sets
 * Build a named set of logos for a page, category or department, then paste
 * that set's shortcode wherever it should appear.
 * ========================================================================= */

/** Saved sets: slug => array('label' => string, 'logos' => array of u/a) */
function ee_logos_custom_sets() {
    $sets = get_option('ee_logo_sets', array());
    return is_array($sets) ? $sets : array();
}

/** Every built-in logo, keyed by URL, with the category it came from. */
function ee_logos_library() {
    static $lib = null;
    if ($lib !== null) return $lib;
    $lib = array();
    /* ee_institute_logos_for() already folds in the user's own institutes,
       so a category they created lists here exactly like the built-in six */
    foreach (ee_institute_categories() as $key => $label) {
        foreach (ee_institute_logos_for($key) as $logo) {
            if (isset($lib[$logo['u']])) continue;
            $lib[$logo['u']] = array('u' => $logo['u'], 'a' => $logo['a'], 'cat' => $key, 'catlabel' => $label);
        }
    }
    return $lib;
}

add_action('admin_menu', function () {
    add_submenu_page('ee-site', 'Logo Sets', '🏫 Logo Sets', 'manage_options', 'ee-logo-sets', 'ee_logos_render_admin');
});

add_action('admin_enqueue_scripts', function ($hook) {
    if (strpos((string) $hook, 'ee-logo-sets') !== false) wp_enqueue_media();
});

/* ---- save ---- */
add_action('admin_post_ee_logos_save', function () {
    if (!current_user_can('manage_options')) wp_die('Nope');
    check_admin_referer('ee_logos_save');

    $slug = sanitize_title(wp_unslash($_POST['slug'] ?? ''));
    if ($slug === '') $slug = sanitize_title(wp_unslash($_POST['label'] ?? '')) ?: 'set-' . time();

    $sets = ee_logos_custom_sets();
    $logos = array();

    /* built-in picks, in library order */
    $picked = isset($_POST['pick']) && is_array($_POST['pick']) ? array_map('esc_url_raw', wp_unslash($_POST['pick'])) : array();
    $picked = array_flip($picked);
    foreach (ee_logos_library() as $u => $row) {
        if (isset($picked[$u])) $logos[] = array('u' => $row['u'], 'a' => $row['a']);
    }

    /* Anything typed in by hand or chosen from the Media Library. Each row
       also carries a category, so the institute joins the shared library and
       shows up in the picker and in cat="" from now on - not just in this
       set. A brand-new category name is created on the spot. */
    $cu = isset($_POST['custom_u']) ? (array) wp_unslash($_POST['custom_u']) : array();
    $ca = isset($_POST['custom_a']) ? (array) wp_unslash($_POST['custom_a']) : array();
    $cc = isset($_POST['custom_c']) ? (array) wp_unslash($_POST['custom_c']) : array();
    $cn = isset($_POST['custom_newcat']) ? (array) wp_unslash($_POST['custom_newcat']) : array();

    $cats   = ee_logos_extra_cats();
    $extras = ee_logos_extra_logos();
    $by_url = array();
    foreach ($extras as $i => $x) $by_url[$x['u']] = $i;

    foreach ($cu as $i => $u) {
        $u = esc_url_raw(trim($u));
        if ($u === '') continue;
        $name = sanitize_text_field($ca[$i] ?? '');

        /* compare before sanitising: sanitize_title('__new') is 'new', which
           would never match the sentinel and silently skip the new category */
        $raw = trim((string) ($cc[$i] ?? ''));
        if ($raw === '__new') {
            $label = sanitize_text_field($cn[$i] ?? '');
            $cat   = sanitize_title($label);
            if ($cat !== '' && !isset($cats[$cat])) $cats[$cat] = $label;
        } else {
            $cat = sanitize_title($raw);
        }
        /* only file it in the library when a category was chosen - otherwise
           it stays a one-off for this set, which is the old behaviour */
        if ($cat !== '') {
            $row = array('u' => $u, 'a' => $name, 'cat' => $cat);
            if (isset($by_url[$u])) $extras[$by_url[$u]] = $row;
            else { $extras[] = $row; $by_url[$u] = count($extras) - 1; }
        }
        $logos[] = array('u' => $u, 'a' => $name);
    }

    update_option('ee_logo_cats', $cats, false);
    update_option('ee_logo_extras', array_values($extras), false);

    $sets[$slug] = array(
        'label' => sanitize_text_field(wp_unslash($_POST['label'] ?? $slug)),
        'logos' => $logos,
    );
    update_option('ee_logo_sets', $sets, false);
    wp_safe_redirect(admin_url('admin.php?page=ee-logo-sets&set=' . rawurlencode($slug) . '&saved=1'));
    exit;
});

/* ---- delete ---- */
add_action('admin_post_ee_logos_delete', function () {
    if (!current_user_can('manage_options')) wp_die('Nope');
    check_admin_referer('ee_logos_delete');
    $slug = sanitize_title(wp_unslash($_POST['slug'] ?? ''));
    $sets = ee_logos_custom_sets();
    unset($sets[$slug]);
    update_option('ee_logo_sets', $sets, false);
    wp_safe_redirect(admin_url('admin.php?page=ee-logo-sets&deleted=1'));
    exit;
});

/* ---- remove one of the user's own institutes from the library ---- */
add_action('admin_post_ee_logos_drop_extra', function () {
    if (!current_user_can('manage_options')) wp_die('Nope');
    check_admin_referer('ee_logos_drop_extra');
    $u = esc_url_raw(wp_unslash($_POST['u'] ?? ''));
    $extras = array();
    foreach (ee_logos_extra_logos() as $x) { if ($x['u'] !== $u) $extras[] = $x; }
    update_option('ee_logo_extras', $extras, false);

    /* drop any category that just lost its last institute, so the list does
       not fill up with empty categories */
    $used = array();
    foreach ($extras as $x) $used[$x['cat']] = true;
    $cats = array();
    foreach (ee_logos_extra_cats() as $k => $label) { if (isset($used[$k])) $cats[$k] = $label; }
    update_option('ee_logo_cats', $cats, false);

    wp_safe_redirect(admin_url('admin.php?page=ee-logo-sets&dropped=1'));
    exit;
});

function ee_logos_render_admin() {
    if (!current_user_can('manage_options')) return;
    $slug = isset($_GET['set']) ? sanitize_title(wp_unslash($_GET['set'])) : '';
    if ($slug !== '' || isset($_GET['new'])) { ee_logos_render_editor($slug); return; }
    ee_logos_render_list();
}

/** Screen 1 — the sets you have built. */
function ee_logos_render_list() {
    $sets = ee_logos_custom_sets();
    ?>
    <div class="wrap" style="max-width:1000px">
      <h1>🏫 Logo Sets</h1>
      <p style="font-size:14px;color:#50575e;max-width:78ch">Build a set of institute logos for a page, category or department, then paste that set's shortcode wherever it should appear. The logos show automatically — no other setup.</p>

      <?php if (isset($_GET['saved'])) : ?><div class="notice notice-success is-dismissible"><p>Set saved.</p></div><?php endif; ?>
      <?php if (isset($_GET['deleted'])) : ?><div class="notice notice-success is-dismissible"><p>Set deleted.</p></div><?php endif; ?>
      <?php if (isset($_GET['dropped'])) : ?><div class="notice notice-success is-dismissible"><p>Institute removed from the library.</p></div><?php endif; ?>

      <p><a class="button button-primary" href="<?php echo esc_url(admin_url('admin.php?page=ee-logo-sets&new=1')); ?>">➕ New logo set</a></p>

      <?php if ($sets) : ?>
      <h2 style="margin-top:26px">Your sets</h2>
      <table class="widefat striped" style="max-width:980px">
        <thead><tr><th>Set</th><th style="width:90px">Logos</th><th style="width:330px">Paste this</th><th style="width:150px"></th></tr></thead>
        <tbody>
        <?php foreach ($sets as $s => $set) : ?>
          <tr>
            <td><b><?php echo esc_html($set['label'] ?: $s); ?></b><br><span style="color:#8a8f98;font-size:12px"><?php echo esc_html($s); ?></span></td>
            <td><?php echo count($set['logos']); ?></td>
            <td><code style="user-select:all;background:#f6f7f7;padding:4px 7px;border-radius:4px;display:inline-block">[ee_logos set="<?php echo esc_attr($s); ?>"]</code></td>
            <td>
              <a class="button" href="<?php echo esc_url(admin_url('admin.php?page=ee-logo-sets&set=' . rawurlencode($s))); ?>">Edit</a>
              <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" style="display:inline" onsubmit="return confirm('Delete this set? Any page using its shortcode will stop showing logos.')">
                <?php wp_nonce_field('ee_logos_delete'); ?>
                <input type="hidden" name="action" value="ee_logos_delete">
                <input type="hidden" name="slug" value="<?php echo esc_attr($s); ?>">
                <button class="button-link delete" style="color:#b32d2e">Delete</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
      <?php endif; ?>

      <?php $extras = ee_logos_extra_logos(); if ($extras) : $ecats = ee_logos_extra_cats(); ?>
      <h2 style="margin-top:30px">Your own institutes</h2>
      <p style="color:#50575e;max-width:78ch">Added from a set's <b>Your own logos</b> box. These show in the picker and answer <code>cat=""</code> like any built-in category.</p>
      <table class="widefat striped" style="max-width:980px">
        <thead><tr><th style="width:70px">Logo</th><th>Institute</th><th style="width:220px">Category</th><th style="width:90px"></th></tr></thead>
        <tbody>
        <?php foreach ($extras as $x) : ?>
          <tr>
            <td><img src="<?php echo esc_url($x['u']); ?>" alt="" style="width:52px;height:28px;object-fit:contain" onerror="this.style.visibility='hidden'"></td>
            <td><b><?php echo esc_html($x['a'] ?: '(no name)'); ?></b></td>
            <td><?php
              $lbl = $ecats[$x['cat']] ?? (ee_institute_categories()[$x['cat']] ?? $x['cat']);
              echo esc_html($lbl);
              if (isset($ecats[$x['cat']])) echo ' <span style="color:#8a8f98;font-size:12px">(yours)</span>';
            ?></td>
            <td>
              <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" onsubmit="return confirm('Remove this institute from the library? Sets that already include it keep it.')">
                <?php wp_nonce_field('ee_logos_drop_extra'); ?>
                <input type="hidden" name="action" value="ee_logos_drop_extra">
                <input type="hidden" name="u" value="<?php echo esc_attr($x['u']); ?>">
                <button class="button-link delete" style="color:#b32d2e">Remove</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
      <?php endif; ?>

      <h2 style="margin-top:30px">Ready-made sets</h2>
      <p style="color:#50575e;max-width:78ch">These ship with the theme and need no setup — paste and go.</p>
      <table class="widefat striped" style="max-width:980px">
        <thead><tr><th>Set</th><th style="width:90px">Logos</th><th>Paste this</th></tr></thead>
        <tbody>
          <tr><td><b>Home page set</b></td><td><?php echo count(ee_institute_logos_for('home')); ?></td><td><code style="user-select:all">[ee_logos]</code></td></tr>
          <?php $ec = ee_logos_extra_cats(); foreach (ee_institute_categories() as $k => $label) : ?>
          <tr><td><b><?php echo esc_html($label); ?></b><?php if (isset($ec[$k])) echo ' <span style="color:#8a8f98;font-weight:400;font-size:12px">(yours)</span>'; ?></td><td><?php echo count(ee_institute_logos_for($k)); ?></td><td><code style="user-select:all">[ee_logos cat="<?php echo esc_attr($k); ?>"]</code></td></tr>
          <?php endforeach; ?>
          <tr><td><b>All, with category tabs</b></td><td><?php echo count(ee_institute_logos_for('all')); ?></td><td><code style="user-select:all">[ee_logos tabs="1"]</code></td></tr>
        </tbody>
      </table>
      <p style="margin-top:14px;color:#50575e">Add <code>title=""</code>, <code>badge=""</code>, <code>sub=""</code>, <code>limit="24"</code>, <code>layout="grid"</code> or <code>speed="50"</code> to any of them.</p>
    </div>
    <?php
}

/**
 * Category picker for a custom-logo row. Choosing one files the institute
 * into the shared library under that category; "New category…" reveals a
 * text box and creates it on save. Leaving it unset keeps the logo as a
 * one-off for this set only.
 */
function ee_logos_cat_select($current = '') {
    ob_start(); ?>
<select name="custom_c[]" class="ee-ls-cat-sel" style="width:190px">
  <option value="">— no category —</option>
  <?php foreach (ee_institute_categories() as $k => $label) : ?>
  <option value="<?php echo esc_attr($k); ?>" <?php selected($current, $k); ?>><?php echo esc_html($label); ?></option>
  <?php endforeach; ?>
  <option value="__new">+ New category…</option>
</select><input type="text" name="custom_newcat[]" class="ee-ls-newcat" placeholder="New category name" style="width:170px;display:none">
<?php
    return ob_get_clean();
}

/** Screen 2 — pick the logos for one set. */
function ee_logos_render_editor($slug) {
    $sets = ee_logos_custom_sets();
    $set  = $sets[$slug] ?? array('label' => '', 'logos' => array());
    $lib  = ee_logos_library();

    /* what is already in the set: built-ins by URL, the rest as custom rows */
    $chosen = array();
    $custom = array();
    foreach ($set['logos'] as $logo) {
        if (isset($lib[$logo['u']])) $chosen[$logo['u']] = true;
        else $custom[] = $logo;
    }
    ?>
    <div class="wrap" style="max-width:1120px">
      <h1><?php echo $slug ? '🏫 Edit logo set' : '🏫 New logo set'; ?></h1>
      <p><a href="<?php echo esc_url(admin_url('admin.php?page=ee-logo-sets')); ?>">&larr; All logo sets</a></p>

      <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
        <?php wp_nonce_field('ee_logos_save'); ?>
        <input type="hidden" name="action" value="ee_logos_save">
        <input type="hidden" name="slug" value="<?php echo esc_attr($slug); ?>">

        <table class="form-table"><tr>
          <th scope="row"><label for="ee-ls-label">Set name</label></th>
          <td>
            <input id="ee-ls-label" name="label" type="text" class="regular-text" required
                   placeholder="e.g. Universities page" value="<?php echo esc_attr($set['label']); ?>">
            <p class="description">Just for you — visitors never see it.</p>
          </td>
        </tr>
        <?php if ($slug) : ?>
        <tr>
          <th scope="row">Paste this</th>
          <td>
            <code id="ee-ls-code" style="user-select:all;background:#f6f7f7;padding:7px 11px;border-radius:5px;font-size:14px">[ee_logos set="<?php echo esc_attr($slug); ?>"]</code>
            <button type="button" class="button" onclick="navigator.clipboard.writeText(document.getElementById('ee-ls-code').textContent);this.textContent='Copied'">Copy</button>
            <p class="description">Paste it into any page, post or builder text block. Add <code>title=""</code> to hide the heading, <code>layout="grid"</code> for a static grid.</p>
          </td>
        </tr>
        <?php endif; ?>
        </table>

        <h2>Pick the logos</h2>
        <p style="color:#50575e">Tick everything this set should show. <b><span id="ee-ls-count"><?php echo count($chosen); ?></span></b> selected.</p>

        <p>
          <input type="search" id="ee-ls-search" placeholder="Search institutes…" style="width:320px;padding:6px 10px">
          <button type="button" class="button" id="ee-ls-none">Clear all</button>
        </p>

        <?php foreach (ee_institute_categories() as $ck => $clabel) :
          $rows = array_filter($lib, function ($r) use ($ck) { return $r['cat'] === $ck; }); ?>
        <div class="ee-ls-cat" style="margin:0 0 22px">
          <h3 style="margin:16px 0 8px">
            <?php echo esc_html($clabel); ?>
            <span style="color:#8a8f98;font-weight:400">(<?php echo count($rows); ?>)</span>
            <button type="button" class="button button-small ee-ls-all" style="margin-left:8px">Select all</button>
          </h3>
          <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(220px,1fr));gap:8px">
            <?php foreach ($rows as $u => $r) : ?>
            <label class="ee-ls-item" style="display:flex;align-items:center;gap:9px;background:#fff;border:1px solid #dcdcde;border-radius:7px;padding:8px 10px;cursor:pointer">
              <input type="checkbox" name="pick[]" value="<?php echo esc_attr($u); ?>" <?php checked(isset($chosen[$u])); ?>>
              <img src="<?php echo esc_url($u); ?>" alt="" style="width:44px;height:26px;object-fit:contain;flex:none" loading="lazy"
                   onerror="this.style.visibility='hidden'">
              <span style="font-size:12px;line-height:1.3"><?php echo esc_html($r['a']); ?></span>
            </label>
            <?php endforeach; ?>
          </div>
        </div>
        <?php endforeach; ?>

        <h2>Your own logos</h2>
        <p style="color:#50575e">For anything not in the list above — upload it to the Media Library and add it here. Give it a category and it joins the list above for every set from now on; pick <b>+ New category…</b> to start a category of your own.</p>
        <div id="ee-ls-custom">
          <?php foreach ($custom as $c) : ?>
          <p class="ee-ls-crow">
            <input type="text" name="custom_a[]" value="<?php echo esc_attr($c['a']); ?>" placeholder="Institute name" style="width:210px">
            <input type="url" name="custom_u[]" value="<?php echo esc_attr($c['u']); ?>" placeholder="https://…/logo.svg" style="width:330px">
            <?php echo ee_logos_cat_select(isset($c['cat']) ? $c['cat'] : ''); ?>
            <button type="button" class="button ee-ls-media">Choose image</button>
            <button type="button" class="button-link delete ee-ls-drop" style="color:#b32d2e">Remove</button>
          </p>
          <?php endforeach; ?>
        </div>
        <p><button type="button" class="button" id="ee-ls-add">➕ Add a logo</button></p>

        <p style="margin-top:22px"><button class="button button-primary button-hero">Save logo set</button></p>
      </form>
    </div>

    <script>
    (function(){
      var wrap = document.querySelector('.wrap');
      /* built once server-side so the JS-added rows offer the same categories,
         including any the user just created */
      var CATSELECT = <?php echo wp_json_encode(ee_logos_cat_select('')); ?>;
      var count = document.getElementById('ee-ls-count');
      function boxes(){ return [].slice.call(wrap.querySelectorAll('input[name="pick[]"]')); }
      function retally(){ count.textContent = boxes().filter(function(b){return b.checked;}).length; }
      wrap.addEventListener('change', function(e){ if(e.target.name === 'pick[]') retally(); });

      /* search filters the tiles, and empties whole categories out of the way */
      var search = document.getElementById('ee-ls-search');
      search.addEventListener('input', function(){
        var q = search.value.trim().toLowerCase();
        wrap.querySelectorAll('.ee-ls-cat').forEach(function(cat){
          var any = false;
          cat.querySelectorAll('.ee-ls-item').forEach(function(it){
            var hit = !q || it.textContent.toLowerCase().indexOf(q) > -1;
            it.style.display = hit ? '' : 'none';
            if (hit) any = true;
          });
          cat.style.display = any ? '' : 'none';
        });
      });

      wrap.querySelectorAll('.ee-ls-all').forEach(function(btn){
        btn.addEventListener('click', function(){
          var items = btn.closest('.ee-ls-cat').querySelectorAll('.ee-ls-item:not([style*="none"]) input[name="pick[]"]');
          var turnOn = [].slice.call(items).some(function(b){ return !b.checked; });
          items.forEach(function(b){ b.checked = turnOn; });
          btn.textContent = turnOn ? 'Clear these' : 'Select all';
          retally();
        });
      });
      document.getElementById('ee-ls-none').addEventListener('click', function(){
        boxes().forEach(function(b){ b.checked = false; }); retally();
      });

      /* custom rows */
      var box = document.getElementById('ee-ls-custom');
      function row(){
        var p = document.createElement('p');
        p.className = 'ee-ls-crow';
        p.innerHTML = '<input type="text" name="custom_a[]" placeholder="Institute name" style="width:210px"> '
          + '<input type="url" name="custom_u[]" placeholder="https://\u2026/logo.svg" style="width:330px"> '
          + CATSELECT
          + '<button type="button" class="button ee-ls-media">Choose image</button> '
          + '<button type="button" class="button-link delete ee-ls-drop" style="color:#b32d2e">Remove</button>';
        box.appendChild(p);
      }
      document.getElementById('ee-ls-add').addEventListener('click', row);
      /* "+ New category…" swaps in a text box for the name */
      box.addEventListener('change', function(e){
        if (!e.target.classList.contains('ee-ls-cat-sel')) return;
        var txt = e.target.closest('.ee-ls-crow').querySelector('.ee-ls-newcat');
        if (!txt) return;
        var isNew = e.target.value === '__new';
        txt.style.display = isNew ? '' : 'none';
        if (isNew) txt.focus(); else txt.value = '';
      });
      box.addEventListener('click', function(e){
        if (e.target.classList.contains('ee-ls-drop')) { e.target.closest('.ee-ls-crow').remove(); return; }
        if (e.target.classList.contains('ee-ls-media')) {
          var target = e.target.closest('.ee-ls-crow').querySelector('input[type="url"]');
          var frame = wp.media({ title: 'Choose a logo', multiple: false, library: { type: 'image' } });
          frame.on('select', function(){
            var a = frame.state().get('selection').first().toJSON();
            target.value = a.url;
            var name = e.target.closest('.ee-ls-crow').querySelector('input[type="text"]');
            if (!name.value) name.value = a.title || '';
          });
          frame.open();
        }
      });
      if (!box.children.length) row();
    })();
    </script>
    <?php
}
