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
    return array(
        'universities'        => 'Universities',
        'colleges'            => 'Colleges',
        'schools'             => 'Schools',
        'coaching-institutes' => 'Coaching Institutes',
        'edtech'              => 'EdTech',
        'study-abroad'        => 'Study Abroad',
    );
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

    $out = array();
    $seen = array();
    foreach ($keys as $k) {
        /* tolerate "Study Abroad", "study_abroad" and "study-abroad" alike */
        $k = str_replace(array(' ', '_'), '-', $k);
        if (empty($sets[$k])) continue;
        foreach ($sets[$k] as $logo) {
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
