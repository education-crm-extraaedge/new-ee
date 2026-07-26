<?php
if (!defined('ABSPATH')) exit;

/**
 * Institute logo lists sourced from the client-provided
 * Institutes_Category_Wise spreadsheet (2026-07-26 import).
 * ee_institute_logo_sets() feeds both the home page 'Top 50' strip
 * and each Industries category page's trusted-institutions strip.
 */
function ee_institute_logo_sets() {
    static $sets = null;
    if ($sets !== null) return $sets;
    $sets = array(
        'top50' => array(
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/d-y-patil-university-ambi-u2013pune-logo.svg', 'a' => 'D Y Patil University Ambi Pune'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/overseas/aip-education-pty-ltd-aus-logo.svg', 'a' => 'Aip Education Pty Ltd Aus'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/iitm-college-of-engineering-logo.svg', 'a' => 'Iitm College of Engineering'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/sree-sloka-sai-dattatreya-edu-society-logo.svg', 'a' => 'Sree Sloka Sai Dattatreya Edu Society'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/edtech/seamless-education-services-logo.svg', 'a' => 'Seamless Education Services'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/coaching%20institute%20crm/ignite-academy-logo.svg', 'a' => 'Ignite Academy'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/coaching%20institute%20crm/the-quantium-school-vedaantha-fdn-logo.svg', 'a' => 'The Quantium School Vedaantha Fdn'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/edtech/dq-labs-pvt-ltd-logo.svg', 'a' => 'Dq Labs Pvt Ltd'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/vikrant-university-logo.svg', 'a' => 'Vikrant University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/coaching%20institute%20crm/results-consortium-ltd-logo.svg', 'a' => 'Results Consortium Ltd'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/coaching%20institute%20crm/iitians-prashikshan-kendra-logo.svg', 'a' => 'Iitians Prashikshan Kendra'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/d-y-patil-pgdm-institute-akurdi-logo.svg', 'a' => 'D Y Patil Pgdm Institute Akurdi'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/school-of-innovation-and-management-logo.svg', 'a' => 'School of Innovation and Management'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/bareilly-scholars-educational-society-kcmt-logo.svg', 'a' => 'Bareilly Scholars Educational Society Kcmt'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/vocational/gold-gym-logo.svg', 'a' => 'Gold Gym'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/vocational/career-buddy-placement-and-training-logo.svg', 'a' => 'Career Buddy Placement and Training'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/park-s-college-logo.svg', 'a' => 'Park S College'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/academy-of-applied-arts-logo.svg', 'a' => 'Academy of Applied Arts'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/reliance-foundation-inst-of-edu-and-research-jio-logo.svg', 'a' => 'Reliance Foundation Inst of Edu and Research Jio'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/toms-college-of-engineering-logo.svg', 'a' => 'Toms College of Engineering'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/vocational/the-language-skool-logo.svg', 'a' => 'The Language Skool'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/fortune-cloud-technologies-logo.svg', 'a' => 'Fortune Cloud Technologies'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/dalhousie-public-school-edu-society-logo.svg', 'a' => 'Dalhousie Public School Edu Society'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/overseas/mit-univista-global-tech-logo.svg', 'a' => 'Mit Univista Global Tech'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/aishwarya-college-udaipur-logo.svg', 'a' => 'Aishwarya College Udaipur'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/kishkinda-university-logo.svg', 'a' => 'Kishkinda University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/edtech/mindcreed-logo.svg', 'a' => 'Mindcreed'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/trillium-foundation-logo.svg', 'a' => 'Trillium Foundation'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/edtech/nilaya-edutech-pvt-ltd-logo.svg', 'a' => 'Nilaya Edutech Pvt Ltd'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/etherial-education-pvt-ltd-or-united-group-of-institute-logo.svg', 'a' => 'Etherial Education Pvt Ltd Or United Group of Institute'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/vocational/pixel-pop-academy-pvt-ltd-logo.svg', 'a' => 'Pixel Pop Academy Pvt Ltd'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/seth-anandram-jaipuria-school-kanpur-logo.svg', 'a' => 'Seth Anandram Jaipuria School Kanpur'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/vocational/nips-school-of-hotel-management-logo.svg', 'a' => 'Nips School of Hotel Management'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/coaching%20institute%20crm/dr-rajkumar-academy-for-civil-services-logo.svg', 'a' => 'Dr Rajkumar Academy for Civil Services'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/velammal-vidhyashram-logo.svg', 'a' => 'Velammal Vidhyashram'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/atharva-university-mumbai-logo.svg', 'a' => 'Atharva University Mumbai'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/iibm-institute-of-business-mgmt-logo.svg', 'a' => 'Iibm Institute of Business Mgmt'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/modern-groups-of-institute-logo.svg', 'a' => 'Modern Groups of Institute'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/vocational/ebek-language-laboratories-logo.svg', 'a' => 'Ebek Language Laboratories'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/edtech/srj-edu-services-pvt-ltd-logo.svg', 'a' => 'Srj Edu Services Pvt Ltd'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/universal-wisdom-school-logo.svg', 'a' => 'Universal Wisdom School'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/shree-om-university-logo.svg', 'a' => 'Shree Om University'),
        ),
        'edtech' => array(
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/overseas/aip-education-pty-ltd-aus-logo.svg', 'a' => 'Aip Education Pty Ltd Aus'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/sree-sloka-sai-dattatreya-edu-society-logo.svg', 'a' => 'Sree Sloka Sai Dattatreya Edu Society'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/edtech/dq-labs-pvt-ltd-logo.svg', 'a' => 'Dq Labs Pvt Ltd'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/coaching%20institute%20crm/iitians-prashikshan-kendra-logo.svg', 'a' => 'Iitians Prashikshan Kendra'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/fortune-cloud-technologies-logo.svg', 'a' => 'Fortune Cloud Technologies'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/overseas/mit-univista-global-tech-logo.svg', 'a' => 'Mit Univista Global Tech'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/edtech/mindcreed-logo.svg', 'a' => 'Mindcreed'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/edtech/nilaya-edutech-pvt-ltd-logo.svg', 'a' => 'Nilaya Edutech Pvt Ltd'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/edtech/ahaguru-education-technology-logo.svg', 'a' => 'Ahaguru Education Technology'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/edtech/nspira-management-services-logo.svg', 'a' => 'Nspira Management Services'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/edtech/yangpoo-marketing-pvt-ltd-logo.svg', 'a' => 'Yangpoo Marketing Pvt Ltd'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/zeal-college-of-engineering-pune-logo.svg', 'a' => 'Zeal College of Engineering Pune'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/edtech/eduplusnow-learning-systems-logo.svg', 'a' => 'Eduplusnow Learning Systems'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/edtech/udnav-or-eduplus-logo.svg', 'a' => 'Udnav Or Eduplus'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/vocational/wiztoonz-academy-of-media-and-design-logo.svg', 'a' => 'Wiztoonz Academy of Media and Design'),
        ),
        'coaching' => array(
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/coaching%20institute%20crm/ignite-academy-logo.svg', 'a' => 'Ignite Academy'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/coaching%20institute%20crm/the-quantium-school-vedaantha-fdn-logo.svg', 'a' => 'The Quantium School Vedaantha Fdn'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/vocational/career-buddy-placement-and-training-logo.svg', 'a' => 'Career Buddy Placement and Training'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/vocational/the-language-skool-logo.svg', 'a' => 'The Language Skool'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/vocational/pixel-pop-academy-pvt-ltd-logo.svg', 'a' => 'Pixel Pop Academy Pvt Ltd'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/coaching%20institute%20crm/dr-rajkumar-academy-for-civil-services-logo.svg', 'a' => 'Dr Rajkumar Academy for Civil Services'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/iibm-institute-of-business-mgmt-logo.svg', 'a' => 'Iibm Institute of Business Mgmt'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/coaching%20institute%20crm/premier-academy-for-general-and-edu-logo.svg', 'a' => 'Premier Academy for General and Edu'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/vocational/finx-institute-limited-logo.svg', 'a' => 'Finx Institute Limited'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/vocational/k11-fitness-pvt-ltd-logo.svg', 'a' => 'K11 Fitness Pvt Ltd'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/coaching%20institute%20crm/competishun-logo.svg', 'a' => 'Competishun'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/vocational/ica-edu-skills-logo.svg', 'a' => 'Ica Edu Skills'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/vocational/the-trading-institute-logo.svg', 'a' => 'The Trading Institute'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/coaching%20institute%20crm/the-premia-academy-hyd-logo.svg', 'a' => 'The Premia Academy Hyd'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/mahendra-educational-pvt-ltd-logo.svg', 'a' => 'Mahendra Educational Pvt Ltd'),
        ),
        'k12' => array(
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/dalhousie-public-school-edu-society-logo.svg', 'a' => 'Dalhousie Public School Edu Society'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/trillium-foundation-logo.svg', 'a' => 'Trillium Foundation'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/seth-anandram-jaipuria-school-kanpur-logo.svg', 'a' => 'Seth Anandram Jaipuria School Kanpur'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/velammal-vidhyashram-logo.svg', 'a' => 'Velammal Vidhyashram'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/universal-wisdom-school-logo.svg', 'a' => 'Universal Wisdom School'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/overseas/gateway-international-logo.svg', 'a' => 'Gateway International'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/sanskriti-university-logo.svg', 'a' => 'Sanskriti University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/chrysalis-high-varthur-logo.svg', 'a' => 'Chrysalis High Varthur'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/wisdom-world-school-hadapsaror-wakad-logo.svg', 'a' => 'Wisdom World School Hadapsaror Wakad'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/seth-anandram-jaipuria-school-ghaziabad-logo.svg', 'a' => 'Seth Anandram Jaipuria School Ghaziabad'),
        ),
        'preschool' => array(
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/vocational/ebek-language-laboratories-logo.svg', 'a' => 'Ebek Language Laboratories'),
        ),
        'online-degree' => array(
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/iitm-college-of-engineering-logo.svg', 'a' => 'Iitm College of Engineering'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/edtech/mit-school-of-distance-education-logo.svg', 'a' => 'Mit School of Distance Education'),
        ),
        'higher-education' => array(
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/d-y-patil-university-ambi-u2013pune-logo.svg', 'a' => 'D Y Patil University Ambi Pune'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/edtech/seamless-education-services-logo.svg', 'a' => 'Seamless Education Services'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/vikrant-university-logo.svg', 'a' => 'Vikrant University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/d-y-patil-pgdm-institute-akurdi-logo.svg', 'a' => 'D Y Patil Pgdm Institute Akurdi'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/school-of-innovation-and-management-logo.svg', 'a' => 'School of Innovation and Management'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/bareilly-scholars-educational-society-kcmt-logo.svg', 'a' => 'Bareilly Scholars Educational Society Kcmt'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/park-s-college-logo.svg', 'a' => 'Park S College'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/academy-of-applied-arts-logo.svg', 'a' => 'Academy of Applied Arts'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/toms-college-of-engineering-logo.svg', 'a' => 'Toms College of Engineering'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/aishwarya-college-udaipur-logo.svg', 'a' => 'Aishwarya College Udaipur'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/kishkinda-university-logo.svg', 'a' => 'Kishkinda University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/etherial-education-pvt-ltd-or-united-group-of-institute-logo.svg', 'a' => 'Etherial Education Pvt Ltd Or United Group of Institute'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/vocational/nips-school-of-hotel-management-logo.svg', 'a' => 'Nips School of Hotel Management'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/atharva-university-mumbai-logo.svg', 'a' => 'Atharva University Mumbai'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/modern-groups-of-institute-logo.svg', 'a' => 'Modern Groups of Institute'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/edtech/srj-edu-services-pvt-ltd-logo.svg', 'a' => 'Srj Edu Services Pvt Ltd'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/shree-om-university-logo.svg', 'a' => 'Shree Om University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/himalayan-university-logo.svg', 'a' => 'Himalayan University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/rimt-om-prakash-bansal-trust-logo.svg', 'a' => 'Rimt Om Prakash Bansal Trust'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/bharati-vidyapeeth-deemed-univ-pune-logo.svg', 'a' => 'Bharati Vidyapeeth Deemed Univ Pune'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/mit-art-design-and-tech-university-logo.svg', 'a' => 'Mit Art Design and Tech University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/anant-national-university-logo.svg', 'a' => 'Anant National University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/asm-group-of-institutes-logo.svg', 'a' => 'Asm Group of Institutes'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/desh-bhagat-university-logo.svg', 'a' => 'Desh Bhagat University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/sr-university-logo.svg', 'a' => 'Sr University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/institute-of-public-enterprise-logo.svg', 'a' => 'Institute of Public Enterprise'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/pune-institute-of-business-mgmt-logo.svg', 'a' => 'Pune Institute of Business Mgmt'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/vocational/hamstech-india-limited-logo.svg', 'a' => 'Hamstech India Limited'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/overseas/middle-east-college-oman-logo.svg', 'a' => 'Middle East College Oman'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/xiss-ranchi-logo.svg', 'a' => 'Xiss Ranchi'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/gurunanak-educational-trust-jis-logo.svg', 'a' => 'Gurunanak Educational Trust Jis'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/singhania-university-logo.svg', 'a' => 'Singhania University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/mangalayatan-university-logo.svg', 'a' => 'Mangalayatan University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/renaissance-university-indore-logo.svg', 'a' => 'Renaissance University Indore'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/jspm-university-pune-logo.svg', 'a' => 'Jspm University Pune'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/aissms-institute-of-it-logo.svg', 'a' => 'Aissms Institute of It'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/dr-d-y-patil-vidyapeeth-pune-logo.svg', 'a' => 'Dr D Y Patil Vidyapeeth Pune'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/vignana-jyothi-inst-of-mgmt-logo.svg', 'a' => 'Vignana Jyothi Inst of Mgmt'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/atria-university-logo.svg', 'a' => 'Atria University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/met-league-of-colleges-mumbai-logo.svg', 'a' => 'Met League of Colleges Mumbai'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/amritsar-group-of-colleges-logo.svg', 'a' => 'Amritsar Group of Colleges'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/srinivasa-university-logo.svg', 'a' => 'Srinivasa University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/kirloskar-institute-of-management-logo.svg', 'a' => 'Kirloskar Institute of Management'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/wud-university-world-univ-of-design-logo.svg', 'a' => 'Wud University World Univ of Design'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/iihmr-health-mgmt-research-logo.svg', 'a' => 'Iihmr Health Mgmt Research'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/sai-balaji-iims-pune-logo.svg', 'a' => 'Sai Balaji Iims Pune'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/sasurie-college-of-engineering-logo.svg', 'a' => 'Sasurie College of Engineering'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/edtech/fostiima-business-school-logo.svg', 'a' => 'Fostiima Business School'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/gopal-narayan-singh-university-logo.svg', 'a' => 'Gopal Narayan Singh University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/des-imdr-pune-logo.svg', 'a' => 'Des Imdr Pune'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/arch-educational-society-jaipur-logo.svg', 'a' => 'Arch Educational Society Jaipur'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/supreme-knowledge-foundation-skfgi-logo.svg', 'a' => 'Supreme Knowledge Foundation Skfgi'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/tula-s-institute-dehradun-logo.svg', 'a' => 'Tula S Institute Dehradun'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/vocational/national-power-training-institute-logo.svg', 'a' => 'National Power Training Institute'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/techno-india-university-wb-logo.svg', 'a' => 'Techno India University Wb'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/ips-academy-indore-logo.svg', 'a' => 'Ips Academy Indore'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/vels-institute-vistas-logo.svg', 'a' => 'Vels Institute Vistas'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/indian-academy-degree-college-logo.svg', 'a' => 'Indian Academy Degree College'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/overseas/ecole-intuit-lab-logo.svg', 'a' => 'Ecole Intuit Lab'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/suryadatta-group-of-institutes-logo.svg', 'a' => 'Suryadatta Group of Institutes'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/adani-institute-of-digital-tech-mgmt-logo.svg', 'a' => 'Adani Institute of Digital Tech Mgmt'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/imt-ghaziabad-logo.svg', 'a' => 'Imt Ghaziabad'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/jg-university-ahmedabad-logo.svg', 'a' => 'Jg University Ahmedabad'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/rai-technology-university-logo.svg', 'a' => 'Rai Technology University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/rai-university-logo.svg', 'a' => 'Rai University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/ashoka-university-haryana-logo.svg', 'a' => 'Ashoka University Haryana'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/ashoka-school-of-business-hyd-logo.svg', 'a' => 'Ashoka School of Business Hyd'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/jims-logo.svg', 'a' => 'Jims'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/maya-devi-educational-foundation-logo.svg', 'a' => 'Maya Devi Educational Foundation'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/kiit-school-of-management-ksom-logo.svg', 'a' => 'Kiit School of Management Ksom'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/jagannath-inst-of-mgmt-sciences-logo.svg', 'a' => 'Jagannath Inst of Mgmt Sciences'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/kiit-school-of-rural-management-logo.svg', 'a' => 'Kiit School of Rural Management'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/kalinga-inst-of-industrial-tech-kiit-logo.svg', 'a' => 'Kalinga Inst of Industrial Tech Kiit'),
        ),
        'study-abroad' => array(
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/coaching%20institute%20crm/results-consortium-ltd-logo.svg', 'a' => 'Results Consortium Ltd'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/overseas/ec-council-university-logo.svg', 'a' => 'Ec Council University'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/overseas/the-new-school-logo.svg', 'a' => 'The New School'),
        ),
        'channel-partners' => array(
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/vocational/gold-gym-logo.svg', 'a' => 'Gold Gym'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/reliance-foundation-inst-of-edu-and-research-jio-logo.svg', 'a' => 'Reliance Foundation Inst of Edu and Research Jio'),
            array('u' => 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/narayana-hrudayalaya-foundations-logo.svg', 'a' => 'Narayana Hrudayalaya Foundations'),
        ),
    );
    return $sets;
}

/**
 * Category key => keyword list matched (case-insensitive substring)
 * against the current Industry post's title, so the right logo set
 * renders automatically with no extra admin UI needed.
 */
function ee_institute_category_keywords() {
    return array(
        'edtech' => array('edtech', 'ed-tech', 'ed tech'),
        'coaching' => array('coaching', 'test prep', 'tuition', 'vocational'),
        'k12' => array('k-12', 'k12', 'school crm', 'schools'),
        'preschool' => array('preschool', 'pre-school', 'playschool', 'play school'),
        'online-degree' => array('online degree', 'distance education', 'online learning'),
        'higher-education' => array('higher education', 'university', 'college'),
        'study-abroad' => array('study abroad', 'overseas', 'international admission'),
        'channel-partners' => array('channel partner'),
    );
}
/**
 * Renders the "Trusted by" institute-logo marquee for an Industries category
 * page. Auto-detects the category from the current post's title unless
 * $category_key is passed explicitly. Safe no-op if nothing matches.
 */
function ee_render_category_institute_logos($category_key = '', $args = array()) {
    static $rendered = false;
    if ($rendered) return;

    $sets = ee_institute_logo_sets();

    if ($category_key === '') {
        $title = strtolower(get_the_title());
        foreach (ee_institute_category_keywords() as $key => $kws) {
            foreach ($kws as $kw) {
                if (strpos($title, $kw) !== false) { $category_key = $key; break 2; }
            }
        }
    }

    if ($category_key === '' || empty($sets[$category_key])) return;
    $logos = $sets[$category_key];
    if (empty($logos)) return;

    $rendered = true;

    $args = wp_parse_args($args, array(
        'badge'   => 'Trusted Nationwide',
        'heading' => 'Trusted by leading institutions',
    ));

    /* Split into two rows (odd/even), pad each to a minimum width so the
       seamless -50% loop never shows a trailing gap on short lists. */
    $row_a = array(); $row_b = array();
    foreach ($logos as $i => $logo) {
        if ($i % 2 === 0) { $row_a[] = $logo; } else { $row_b[] = $logo; }
    }
    if (empty($row_a)) $row_a = $row_b;
    if (empty($row_b)) $row_b = $row_a;

    $MIN = 8;
    $pad = function ($row) use ($MIN) {
        if (empty($row)) return $row;
        $out = $row;
        while (count($out) < $MIN) {
            foreach ($row as $item) { $out[] = $item; if (count($out) >= $MIN) break; }
        }
        return $out;
    };
    $row_a = $pad($row_a);
    $row_b = $pad($row_b);
    ?>
<style>
.ee-ind-logos{background:transparent;padding:40px 20px 8px;overflow:hidden}
.ee-ind-logos-head{max-width:760px;margin:0 auto 24px;text-align:center;padding:0 24px}
.ee-ind-logos-badge{display:inline-block;font-size:12px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:#DE6E30;background:rgba(222,110,48,.08);border:1px solid rgba(222,110,48,.18);padding:7px 16px;border-radius:99px;margin-bottom:12px}
.ee-ind-logos-h2{font-family:'Inter',sans-serif;font-weight:800;font-size:clamp(20px,3vw,32px);line-height:1.2;letter-spacing:-.02em;color:#19345d;margin:0}
.ee-ind-logos-wrap{overflow:hidden;padding:6px 0;-webkit-mask-image:linear-gradient(90deg,transparent,#000 6%,#000 94%,transparent);mask-image:linear-gradient(90deg,transparent,#000 6%,#000 94%,transparent)}
.ee-ind-logos-track{display:flex;gap:22px;width:max-content;align-items:center;will-change:transform;padding:6px 0}
.ee-ind-logos-a{animation:eeIndScrollL 38s linear infinite}
.ee-ind-logos-b{animation:eeIndScrollR 38s linear infinite;margin-top:14px}
.ee-ind-logos-wrap:hover .ee-ind-logos-track{animation-play-state:paused}
@keyframes eeIndScrollL{0%{transform:translateX(0)}100%{transform:translateX(-50%)}}
@keyframes eeIndScrollR{0%{transform:translateX(-50%)}100%{transform:translateX(0)}}
.ee-ind-logo-card{flex:none;width:150px;height:76px;background:#f8fafc;border:1px solid #e2e8f0;border-radius:12px;display:grid;place-items:center;padding:14px;transition:.3s}
.ee-ind-logo-card:hover{border-color:#DE6E30;transform:translateY(-3px)}
.ee-ind-logo-card img{max-height:44px;max-width:100%;width:auto;object-fit:contain;filter:grayscale(100%);opacity:.75;transition:.3s}
.ee-ind-logo-card:hover img{filter:none;opacity:1}
@media(prefers-reduced-motion:reduce){.ee-ind-logos-track{animation:none}}
@media(max-width:600px){.ee-ind-logo-card{width:118px;height:64px;padding:10px}.ee-ind-logo-card img{max-height:34px}}
</style>
<section class="ee-ind-logos" aria-label="Trusted institutions using ExtraaEdge">
  <div class="ee-ind-logos-head">
    <div class="ee-ind-logos-badge"><?php echo esc_html($args['badge']); ?></div>
    <h2 class="ee-ind-logos-h2"><?php echo esc_html($args['heading']); ?></h2>
  </div>
  <div class="ee-ind-logos-wrap">
    <div class="ee-ind-logos-track ee-ind-logos-a">
      <?php for ($pass = 0; $pass < 2; $pass++): foreach ($row_a as $logo): ?>
      <div class="ee-ind-logo-card"<?php echo $pass === 1 ? ' aria-hidden="true"' : ''; ?>><img src="<?php echo esc_url($logo['u']); ?>" alt="<?php echo esc_attr($logo['a']); ?>" loading="lazy" data-logo-src="<?php echo esc_attr($logo['u']); ?>" onerror="(function(s){document.querySelectorAll('.ee-ind-logo-card img[data-logo-src=&quot;'+s+'&quot;]').forEach(function(i){var c=i.closest('.ee-ind-logo-card');if(c)c.remove();});})(this.getAttribute('data-logo-src'))"></div>
      <?php endforeach; endfor; ?>
    </div>
    <div class="ee-ind-logos-track ee-ind-logos-b">
      <?php for ($pass = 0; $pass < 2; $pass++): foreach ($row_b as $logo): ?>
      <div class="ee-ind-logo-card"<?php echo $pass === 1 ? ' aria-hidden="true"' : ''; ?>><img src="<?php echo esc_url($logo['u']); ?>" alt="<?php echo esc_attr($logo['a']); ?>" loading="lazy" data-logo-src="<?php echo esc_attr($logo['u']); ?>" onerror="(function(s){document.querySelectorAll('.ee-ind-logo-card img[data-logo-src=&quot;'+s+'&quot;]').forEach(function(i){var c=i.closest('.ee-ind-logo-card');if(c)c.remove();});})(this.getAttribute('data-logo-src'))"></div>
      <?php endforeach; endfor; ?>
    </div>
  </div>
</section>
    <?php
}
