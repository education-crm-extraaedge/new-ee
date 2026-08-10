<?php
/**
 * Video library data for /videos/.
 *
 * The shipped library: category -> section -> videos, each video being
 * array(title, YouTube ID). Thumbnails and embeds are both built from the
 * ID, so nothing else has to be uploaded.
 *
 * NOBODY NEEDS TO EDIT THIS FILE. Videos are added, removed and restored
 * from ExtraaEdge Site -> 🎬 Videos in the admin; ee_video_library() below
 * folds those changes over this list. Editing here still works and is a
 * fine way to ship a new batch, but it is not the normal route.
 *
 * Not published here on purpose:
 *   - the three Vidya AI videos, which belong on getvidya.ai
 *   - one untitled video held back for review
 */
if (!defined('ABSPATH')) exit;

/** The shipped list, before anything the admin screen has changed. */
function ee_video_library_builtin() {
    return array(
        array(
            'name' => 'Customer Success Stories',
            'slug' => 'customer-stories',
            'sections' => array(
                array('name' => 'University & Colleges', 'videos' => array(
                    array('Customer Success Story: Bharati Vidyapeeth University, College of Engineering Pune', 'VERyHw2bMJs'),
                    array('Customer Success Story: BITS Pilani Dubai', 'Vovf1vtGrf0'),
                    array('Customer Success Story: Brindavan Group of Institutions || Adoption Story', 'B-VLSFOSzow'),
                    array('Customer Success Story: Dayananda Sagar University', 'sa6hYKHJ_yg'),
                    array('Customer Success Story: Manchester Metropolitan University', 'PXALCMtv8Cs'),
                    array('Customer Success Story: MIT AOE || 300% increase in admissions', 'GCwcpsQy-ec'),
                    array('Customer Success Story: Nilaya\'s Group of Educational Institutes', 'h4FuvfGUKz0'),
                    array('Customer Success Story: NSHM', '1sWZPnaCoRk'),
                    array('Customer Success Story: P P Savani University', '1pLrDZ8wqVI'),
                    array('How ExtraaEdge helped Anant National University with its Admission Journey?', 'JFQRtDYqTVY'),
                    array('How ExtraaEdge helped Apar India Group of Institutions with its Admission Journey?', 'O8pVh0ByKSo'),
                    array('How ExtraaEdge Helped Ashoka University in Its Admission Journey', 'Mn5zKoUMgSU'),
                    array('How ExtraaEdge helped BBIT with its Admission Journey?', 'y8Fpl7nxHYg'),
                    array('How ExtraaEdge helped Cosmopolitan Education Society with its Admission Journey?', '4lkVzj-wLVE'),
                    array('How ExtraaEdge helped DAMITS with its Admission Journey?', 'pL3KF2suDV4'),
                    array('How ExtraaEdge helped GIFT Autonomous College with its Admission Journey?', 'KOUmINSJU3A'),
                    array('How ExtraaEdge helped Graphic Era University with its Admission Journey?', '0Oqf_PkJauo'),
                    array('How ExtraaEdge helped Indian Academy Group of Institutions with its Admission Journey?', 'yfK83D2SKps'),
                    array('How ExtraaEdge helped Institute of Professional Studies with its Admission Journey?', 'lcWe-f7G-9g'),
                    array('How ExtraaEdge helped Mahalakshmi Tech Campus with its Admission Journey?', 'mQY2qNQn7hQ'),
                    array('How ExtraaEdge helped Mangalayatan University with its Admission Journey?', 'Qveqo-PHBUk'),
                    array('How ExtraaEdge helped Modern Institute of Pharmaceutical Sciences with its Admission Journey?', 'K1Iyov43-48'),
                    array('How ExtraaEdge helped Mumbai Educational Trust, MET League of Colleges with its Admission Journey?', '26l_hgrUau4'),
                    array('How ExtraaEdge helped Sai Nath University with its Admission Journey?', '2yTU2iOFAEM'),
                    array('How ExtraaEdge helped Techno India Group with its Admission Journey?', 'Ssaxbgo-dbk'),
                    array('How ExtraaEdge helped Tula\'s Institute with its Admission Journey?', '3SHgLf1GFgk'),
                    array('How ExtraaEdge helped Uttaranchal University with its Admission Journey?', 'G9K36caYcl0'),
                    array('How has ExtraaEdge CRM benefited Uttaranchal University?', 'tLExH5jpQbw'),
                    array('How MIT AOE utilises ExtraaEdge CRM to achieve a 60% growth in admissions?', 'bUyTHTdrorg'),
                    array('How Rai University Ahmedabad Achieved 100% Admission Targets with ExtraaEdge!', 'Rnuge2EjXaA'),
                    array('Why Amrapali chose ExtraaEdge CRM? - Featuring Amrapali Group of Institutes', '9l99MjTfEbw'),
                    array('Why customers love ExtraaEdge : Featuring Atlas Skilltech University', 'CQos2xyDdhY'),
                    array('Why Customers love ExtraaEdge : Featuring Vishwakarma University', 'a-DrEJ4HC_Y'),
                    array('Why customers love ExtraaEdge: Featuring Ajeenkya DY Patil University', '_0EOIUoUq7Y'),
                    array('Why customers love ExtraaEdge: Featuring Ambalika Institute', 'XbbPkVzFGyQ'),
                    array('Why customers love ExtraaEdge: Featuring MIT ACSC', 'v2Qoh0JC1pY'),
                    array('Why did DPUGBSRC implement ExtraaEdge CRM and how were they able to achieve their admissions target?', '7sPbL3uvha0'),
                    array('Why ExtraaEdge is MIT ADT\'s choice?', 'cDbVpd8Lg4c'),
                    array('Why Roots Collegium chose ExtraaEdge as their CRM Partner?', 'GH3_l5c32JU'),
                )),
                array('name' => 'B-School & Management', 'videos' => array(
                    array('Customer Case Study: Yangpoo Executive Education', 'ahRurKWVxO4'),
                    array('Excel to CRM Evolution: Featuring Ashoka School of Business', '0UaythYKX9M'),
                    array('Find out Why King\'s Business School finds ExtraaEdge CRM efficient.', 'J7gufAA2TMg'),
                    array('How ExtraaEdge helped Dayananda Sagar Business School (DSBS) with its Admission Journey?', 'npz09yMbagI'),
                    array('How ExtraaEdge helped FOSTIIMA Business School with its Admission Journey?', 'q53VDQFTq04'),
                    array('How ExtraaEdge helped IBSC with its Admission Journey?', 'ApP0hhJ45NQ'),
                    array('How ExtraaEdge helped JIMS Noida with its Admission Journey?', 'SzuQDpEvfao'),
                    array('How ExtraaEdge helped NSB Bangalore with its Admission Journey?', 'sFzyQCt2SuE'),
                    array('How ExtraaEdge helped Xavier Institute of Social Service with its Admission Journey?', 'lG4MGcB0a9A'),
                    array('How ExtraaEdge helped XISS Ranchi with its Admission Journey?', 'MJ2jQg_vaJk'),
                    array('How ExtraaEdge Simplified Admissions for Nopany Institute of Management & Healthcare Studies', 'sJu3xU2rniU'),
                    array('How was KIM able to track their lead journey from enquiry to enrollment with ExtraaEdge CRM?', 'RPID43fc33o'),
                    array('Onboarding Done Right for IMI: Insights from a Delighted ExtraaEdge Customer', 'H-FgqYoGT74'),
                    array('Taxila Business School: Why ExtraaEdge is value for money?', 'Tp4l1gny9is'),
                    array('Why Customers love ExtraaEdge : Featuring IES MCRC', 'DjeyZmX8ATs'),
                    array('Why customers love ExtraaEdge: Featuring ASM Group of Institutes', 'GKEAzowZhk8'),
                    array('Why IIFT chose ExtraaEdge CRM?', 'K3kqAHKJAgo'),
                )),
                array('name' => 'Design & Creative', 'videos' => array(
                    array('Customer Success Story: ImaginXP', '_FJF5f7mNj4'),
                    array('Customer Success Story: ISDI', '-OpenrbBku0'),
                    array('Customer Success Story: Red & White Multimedia Education', 'mzAmVYjzKaQ'),
                    array('How ExtraaEdge helped Academy of Applied Arts with its Admission Journey?', 'Bq9K9WcEzoE'),
                    array('How ExtraaEdge helped Annapurna College of Film And Media with its Admission Journey?', 'dWLdQ8E3FOU'),
                    array('How ExtraaEdge helped ARCH College of Design & Business with its Admission Journey?', 'ulWJFO0HR4Q'),
                    array('How ExtraaEdge helped Asian Institute of Design (Formerly AIGA) with its Admission Journey?', 'YiWejGIQWCw'),
                    array('How ExtraaEdge helped DesignBoat UX/UI School with its Admission Journey?', '4683tkwb3LE'),
                    array('How ExtraaEdge helped Ellen College of Design with its Admission Journey?', 'fDj8d8xV2Jw'),
                    array('How ExtraaEdge helped Hamstech College of Creative Education with its Admission Journey?', 'TpFKn5ioMpM'),
                    array('How ExtraaEdge helped NIF Global Saltlake with its Admission Journey?', 'thCZcsFJB80'),
                    array('Streamlined Admission Process with ExtraaEdge: Whistling Woods International', 'ihjzSvE6NDM'),
                    array('When Creativity Meets Clarity: How Whistling Woods Transformed Admissions with ExtraaEdge', 'YD5LQiragoc'),
                    array('Why Asian Institute of Design chose ExtraaEdge CRM above others?', 'YTbnvTT0I6Y'),
                    array('Why customers love ExtraaEdge : Featuring Calcutta Media Institute', 'i28_smspJuc'),
                )),
                array('name' => 'Coaching & Test Prep', 'videos' => array(
                    array('Customer Success Story: Ambitions Commerce Institute', 'NDqc4Pzfrdw'),
                    array('Customer Success Story: Study Smart', 'CTo9ru2eDgQ'),
                    array('How ExtraaEdge helped O2 IAS Academy with its Admission Journey?', 'r23KcTs6gyM'),
                    array('How ExtraaEdge helped Raja Rani Coaching with its Admission Journey?', '94_4yE13vds'),
                    array('How ExtraaEdge helped Scholars Academy with its Admission Journey?', 'DybcIYc_Wms'),
                    array('How ExtraaEdge helped Sleepy Classes IAS with its Admission Journey?', 'yTXeLEQzYuU'),
                    array('How ExtraaEdge helped Yeshas Academy with its Admission Journey?', 'x4mUquCvNlM'),
                    array('How ExtraaEdge was able to solve Mahendra\'s unique challenge?', 'dNNrauq_IHg'),
                    array('Why O2IAS preferred ExtraaEdge CRM to increase their lead to conversion ratio by 50%?', 'bDoZ5JVOLbU'),
                )),
                array('name' => 'Skilling & Vocational', 'videos' => array(
                    array('Bombay Stock Exchange Institute\'s No. 1 Choice: ExtraaEdge', 'mdEGBmqgkyw'),
                    array('Customer Success Story: K11 School of Fitness Sciences', '96QOtMP5WmQ'),
                    array('Customer Success Story: Tedco Education', 'woP_yPe5seg'),
                    array('Discover why Focal Skill prefers ExtraaEdge CRM for its game-changing impact on education institutes', 'UOMNy-vlOsA'),
                    array('How ExtraaEdge helped G-TEC JAINx EDUCATION Ltd. with its Admission Journey?', '9X_8Eja7Pc8'),
                    array('How ExtraaEdge helped ICA Edu Skills with its Admission Journey?', 'QXQM-LMabkI'),
                    array('How ExtraaEdge helped IFM Fincoach with its Admission Journey?', 'JqyiKvrp5L4'),
                    array('How ExtraaEdge helped NG Networks with its Admission Journey?', 'N8tOu06tR6Q'),
                    array('How ExtraaEdge helped Tedco Global Chefs Academy with its Admission Journey?', '16Y_9Y-IDys'),
                    array('User-Friendly Power & Proactive Support: CMTI\'s Winning Combo with ExtraaEdge!', 'dTT24kjjZXA'),
                    array('Why Customers love ExtraaEdge : Featuring ICA', 'AVTIDqSeiB0'),
                    array('Why Customers love ExtraaEdge : Featuring SumedhaIT', '_H1rviYoVbY'),
                    array('Why customers love ExtraaEdge: Featuring ICA', 'r5Sw0nE0a9k'),
                )),
                array('name' => 'Study Abroad', 'videos' => array(
                    array('Doubled Conversions & Slashed Enrollment Time? See How Admit Abroad Did It with ExtraaEdge!', 'eBbML9UlFBE'),
                    array('How Admit Abroad team adopted with the ExtraaEdge CRM in 10 days?', 'KisEkYkGYs8'),
                    array('How ExtraaEdge helped Career Buddy Club with its Admission Journey?', 'oyAUFE_vpnE'),
                    array('How ExtraaEdge helped Karma Education with its Admission Journey?', 'ImZh6WHRADw'),
                    array('How UniHawk smoothly navigated the lead journey with the help of ExtraaEdge CRM?', 'e_XABuwlbOo'),
                    array('Why Career Mudhra loves ExtraaEdge?', 'bXFaeoohNI0'),
                )),
                array('name' => 'K-12 & Junior College', 'videos' => array(
                    array('How ExtraaEdge helped Gatik Junior College with its Admission Journey?', 'SLSB2pLqwjg'),
                    array('Why Walnut School chose ExtraaEdge as their CRM partner?', '1QNzm8PTstk'),
                )),
                array('name' => 'EdTech & Platforms', 'videos' => array(
                    array('How ExtraaEdge became MiVirtue\'s preferred CRM', 'iraejcCg1-Q'),
                    array('How MentorBeep achieved 10x growth with ExtraaEdge', '59lKHq5LPJ8'),
                    array('Why customers love ExtraaEdge: Featuring MyCollegeKhoj', 'Ji8hVJjv7l0'),
                    array('Why Filo Chose ExtraaEdge CRM?', 'rtY2kzLC1uU'),
                )),
                array('name' => 'More Success Stories', 'videos' => array(
                    array('Find out how Gynam finds ExtraaEdge to be a user-friendly system!', 'F_J3G1WvL0E'),
                    array('How ExtraaEdge helped Inspiring Educations with its Admission Journey?', '_FLpaWbQxQs'),
                    array('How ExtraaEdge helped Vishram International Services with its Admission Journey?', 'cpLLY-SU-yU'),
                    array('Why did IFLAC choose ExtraaEdge CRM above others?', 'eGWzcAIKGhY'),
                )),
            ),
        ),
        array(
            'name' => 'Product Demos',
            'slug' => 'product-demos',
            'sections' => array(
                array('name' => 'Full Product Tour', 'videos' => array(
                    array('ExtraaEdge Education CRM: A detailed tour of the product', 'aji5VQuoHCI'),
                    array('ExtraaEdge WebApp Tour', 'gKSloHySfzU'),
                )),
                array('name' => 'Mobile App', 'videos' => array(
                    array('ExtraaEdge MobileApp Tour', 'x4lr7Ps_x2M'),
                    array('Mobile Application and its Usage', 'C_w19DKEg1I'),
                    array('Powerful Mobile CRM for Admissions Teams', 'cCa7ZOJi694'),
                )),
                array('name' => 'Chatbot & WhatsApp', 'videos' => array(
                    array('Empower your admission teams with WhatsApp automation', 'K541Zk0qMMg'),
                    array('ExtraaEdge Chatbot in Action', 'WM4cLlZo140'),
                    array('ExtraaEdge WhatsApp API', 'CeZucmn9tAI'),
                    array('Inbuilt 2 way WhatsApp and WhatsApp Bot within ExtraaEdge CRM.', 'BbmAZI1hz_I'),
                    array('Make your Student Communications Effective with our Inbuilt 2 Way WhatsApp within ExtraaEdge CRM', '_R-6QV4pNB0'),
                )),
                array('name' => 'Modules & Add-ons', 'videos' => array(
                    array('Automate Communication with Education CRM', 'x-pwif53MAI'),
                    array('Introduction to Book Refer', 'WkyO7Rb9ehk'),
                    array('Introduction to Classifieds', '55z8i0wXN-8'),
                    array('New and improved Application Management System', 'jYyMcEa7eA8'),
                    array('One click payment integration', 'qPPxjNEAGlA'),
                    array('One Click Payment Integration - Online Payment Link', 'ggXpUYJz8lo'),
                    array('Placement Edge - Intro', '-RjGNRaq_0Q'),
                    array('Streamlining Multi Center Lead Journeys with ExtraaEdge CRM', 'KkZNR2wzNHU'),
                )),
            ),
        ),
        array(
            'name' => 'Webinars & Masterclasses',
            'slug' => 'webinars',
            'sections' => array(
                array('name' => 'Admissions Masterclass', 'videos' => array(
                    array('Episode 01: Helping Admission Teams Win in 2020', 'X-ksg-cXzho'),
                    array('Episode 02: Elevate your Admissions via Digital Marketing', 'iprzk16UHrw'),
                    array('Episode 03: The Power of Chatbot & WhatsApp Bot to Drive Conversions', 'XT0KQuotY_8'),
                    array('Episode 04: Setting up a World-class Admission Process', 'KBY4RR9ennQ'),
                    array('Episode 05: Leveraging Automation to Increase Applications', 'yVf-sR35LHY'),
                )),
                array('name' => 'Webinars', 'videos' => array(
                    array('[ WEBINAR ] Digital Strategy & Marketing Technology for the Education Industry', 'ADnkgLBb40A'),
                    array('[WEBINAR] Automation 101 for admissions leaders', 'VNvp_ER5eYY'),
                    array('[WEBINAR] Leverage Vocational CRM to drive long-term growth', 'AJTc3lyXb8w'),
                    array('[Webinar] The Power of Reports - Leveraging Data for Admissions Success', 'JbPy3ZDR4Fs'),
                    array('[WEBINAR]: Boost admissions by enhancing the student experience', 'J61koEY9Bw8'),
                    array('[WEBINAR]: Exclusive Product Demo - 2-Way Inbuilt WhatsApp', 'LyFVAjcbwBM'),
                    array('[WEBINAR]: What\'s the right CRM for you?', '1R0hehbv1XM'),
                    array('Increasing conversions and reducing drop-offs for Study Abroad Market : Learn more in this webinar', 'B7ARdnlJ6V4'),
                )),
                array('name' => 'ReThink Growth Series', 'videos' => array(
                    array('"ReThink" A Growth Series with ExtraaEdge', 'iKdOx3qMrM8'),
                )),
                array('name' => 'Strategy & Insights', 'videos' => array(
                    array('3 Most Effective Ways to Make your Admission Team Productive', 'QLYhE02vyMg'),
                    array('Doing Admissions Email Marketing the Right Way', 'e_XS6maOEqk'),
                    array('Go-to-Market Strategies for 2024 : Boosting Admission Conversions', 'xngCxLWu85k'),
                    array('MT-CET Analysis Video', '3nxidpQxFeU'),
                    array('Playbook for Mastering your Admissions', '4SaFdo5swwQ'),
                    array('Predicting the way forward #admissions2022', 'o73D9UN6IAk'),
                    array('Revealing the Secret: How we helped our clients improve their conversion rate by 2X', 'SQzGE5Q7vSE'),
                    array('Top secret: 5 must-have tools to manage, scale, and predict your admissions!', 'I2stE9WUMqw'),
                )),
                array('name' => 'Reports & Analytics', 'videos' => array(
                    array('Making Data-Driven Admissions Decisions through Reports', 'nLxTQLyoCIM'),
                )),
            ),
        ),
        array(
            'name' => 'How-To & Tutorials',
            'slug' => 'tutorials',
            'sections' => array(
                array('name' => 'Lead Management', 'videos' => array(
                    array('Add lead', 'sDagncwvmPQ'),
                    array('Bulk upload & Failed lead Panel', 'As0WBybxSpI'),
                    array('Delete a lead', '_GyZmMvobmk'),
                    array('Download leads', 'HY-WrbGpRnk'),
                    array('Filter leads', 'Uv3EgXOJo3U'),
                    array('How to add a lead in ExtraaEdge CRM?', 'EguCBxdaO5M'),
                    array('How to refer a lead?', 'qEHkawf_lS0'),
                    array('How to track activities on a lead?', 'XhICAJr5YX8'),
                    array('How to track activity of a lead?', 'A01zOERAsQ0'),
                    array('How to update lead details in ExtraaEdge CRM', 'mImwoXHG9Nw'),
                    array('Lead Score Feature', '4R72QnBUHA4'),
                    array('Quick Actions', 'jIdaRfsOsF8'),
                    array('Refer a lead', 'KQrwdR5ySLM'),
                    array('Refer all lead', '6M3fJSliAbc'),
                    array('Save List Feature', '31D86ffD7l4'),
                    array('Search a lead', 'KVSyZ-xdWRU'),
                    array('Segmentation Panel', 'iJ9z48bDx00'),
                    array('Sorting leads', 'FT28MpLv9iM'),
                    array('Track activity of a lead', 'nAsVUlaNYLE'),
                    array('Tutorial EE 2 - Working with the Lead', 'F_vBf6eyJxo'),
                    array('Tutorial EE 3 - Uploading and working on Multiple Leads', '7NGgG0UBsOw'),
                    array('Tutorial ExtraaEdge - How to Add Lead', 'BznYpgfYBcY'),
                    array('Update lead details', 'yONRfF0fr_I'),
                    array('Update lead status', 'gxkwwqNuRh0'),
                )),
                array('name' => 'Follow-ups & Reminders', 'videos' => array(
                    array('Add/Schedule follow up', 'it8AEx76ZKY'),
                    array('Followup reminder in education crm', '_rC7qCJuFmQ'),
                    array('How to add or schedule a follow-up in ExtraaEdge CRM?', 'EovjM_j74qo'),
                    array('My Follow Up Panel', 'gxwrXPYB9WY'),
                    array('Pending follow up', '_V19mzmKGBU'),
                )),
                array('name' => 'Communication & Campaigns', 'videos' => array(
                    array('Call a lead', 'OlI7F0FtLxI'),
                    array('Creating Email Templates', '4Q249-rNcWY'),
                    array('Creating SMS template', 'szdXozthE2Q'),
                    array('Creating Whatsapp templates', '1xC2nn_o5jQ'),
                    array('Different modes of communication in ExtraaEdge CRM', 'nNM530_sc-8'),
                    array('How to call a lead?', 'AT-TjsBNXk8'),
                    array('How to create SMS, Email & WhatsApp templates', 'H1fxPPPyvDQ'),
                    array('Promotional & Transactional SMS', '340vxqpjfKE'),
                    array('Run marketing campaigns', 'Xc82_Ns1sbA'),
                    array('Send Email to a single lead', 'eD9OvbI3rvk'),
                    array('Send Email to multiple leads', 'dPvrYQenLWo'),
                    array('Send SMS to a single lead', 'Qrd_tcws1qo'),
                    array('Send SMS to multiple leads', 'X8pAN3W07H4'),
                    array('Send Whatsapp message to a lead', 'XANypfJqWXs'),
                )),
                array('name' => 'Reports & Analytics', 'videos' => array(
                    array('Standard Report & Analytics', 'bqay6gKfDXs'),
                )),
                array('name' => 'Account & Settings', 'videos' => array(
                    array('Forgot Password', '-Fz2Vqy36HA'),
                    array('Lead Assignment rules', 'JLACdyenelA'),
                )),
            ),
        ),
        array(
            'name' => 'Brand Films',
            'slug' => 'brand-films',
            'sections' => array(
                array('name' => 'Admission CRM', 'videos' => array(
                    array('Attract, Engage, and Enroll more with ExtraaEdge CRM | All-in-One Marketing & Admissions Software', 'fmPILlVC30I'),
                    array('Boost Admissions by 40%: Real Success Stories with Education CRM', 'BpMScGN41Qg'),
                    array('Custom CRM Solutions: 20% More Admissions with Admission CRM', '0naiuHA1e5s'),
                    array('ExtraaEdge Admission CRM', 'JPKopA65UXM'),
                    array('ExtraaEdge CRM', 'ybDAfIxQSbc'),
                    array('ExtraaEdge CRM - The Only Education CRM you Need to Manage your Admissions', 'BcN8dDBZS00'),
                    array('India\'s No 1 Admission CRM', 'ySkJOY3f0p8'),
                    array('Stop Losing Students: Streamline Admissions with Admission CRM', 'lQBGJIeBykQ'),
                    array('Student Admissions Made Easy | All-in-one Marketing & Admissions Software', '685o4Ro2Kvk'),
                    array('Tap Into The Admissions Potential with ExtraaEdge!', '2KhlxtNWssk'),
                    array('Transform Admissions: The Ultimate Education CRM for Institutes', 'tevKyqYyIQQ'),
                    array('You Won\'t Believe How Easy Admission Management Can Be with ExtraaEdge CRM', '_uF6TvB87Gc'),
                )),
                array('name' => 'Marketing Suite', 'videos' => array(
                    array('Marketing Tools for Agile Admission Teams | ExtraaEdge', 'OjkDFT6dfO0'),
                )),
            ),
        ),
        array(
            'name' => 'Life at ExtraaEdge',
            'slug' => 'life-at-extraaedge',
            'sections' => array(
                array('name' => 'People & Careers', 'videos' => array(
                    array('[Life at ExtraaEdge] Featuring - Customer Success Heroes', 'pGPdfHIDT2o'),
                    array('[Life at ExtraaEdge] Featuring - Sales Hero', 'BjIVnMWLlHE'),
                    array('[Life at ExtraaEdge] Featuring Arpit - Head of Implementation', 'Aw2OYKFeZWI'),
                    array('[Unscripted] - Featuring - Twin Talent of ExtraaEdge', 'UzfyKxLjhG4'),
                    array('[Unscripted] Check out what it means to be a Customer Success Hero', 'LGa0BhDNqWU'),
                    array('[Unscripted] Featuring - Demand Generation Hero', 'giZrnTEzFgY'),
                    array('[Unscripted] Featuring -- Customer Success Wizard', 'CbWqliYXD5Q'),
                    array('[Unscripted] Take a peek at life of a Demand Generation Specialist', 'T5IC131C3ZQ'),
                    array('Being an Intern at ExtraaEdge', 'uzWZEDlJaik'),
                    array('How exciting is the role of a Product Designer at ExtraaEdge?', '-al0mIR2BYk'),
                    array('How you get to wear multiple hats at ExtraaEdge', 'lAgKS9ohgZg'),
                    array('The flexible career trajectory at ExtraaEdge', 'vNpw-Pgp-YA'),
                    array('The Youngest AVP at ExtraaEdge', 'mvGRIxYqLqg'),
                    array('Trial by fire - First 90 days as an ExtraaEdgian', 'YRc-LHAX7Mw'),
                    array('What it\'s like working in a startup as an engineer', 'QkmgWLUSVkQ'),
                    array('Working in Customer Success at ExtraaEdge', 'T3G-8R630vQ'),
                )),
                array('name' => 'Company Moments', 'videos' => array(
                    array('2025 A YEAR OF BREAKING BARRIERS', 'Y7jeEXjfVzQ'),
                    array('ExtraaEdge || 2019 in review', 'u1Tzehx92UA'),
                    array('Happy New Year | Let\'s Welcome 2021 with a Smile', 'lgelOJgX6YY'),
                    array('Yaadein: A trip down memory lane', '2Zid9Yg3vOY'),
                )),
            ),
        ),
    );
}

/* ── Admin overrides ─────────────────────────────────────────────────────
   Two options carry everything the 🎬 Videos screen does:
     ee_video_extras — videos added there
     ee_video_hidden — IDs of shipped videos removed there (removing an
                       added video just drops it from extras)
   Kept apart from the shipped list so a theme update never wipes the
   client's edits, and so "remove" is always reversible. */

/* function_exists guards so the shipped list still renders if this file is
   ever loaded before the options API is available. */
function ee_video_extras() {
    if (!function_exists('get_option')) return array();
    $x = get_option('ee_video_extras', array());
    return is_array($x) ? $x : array();
}
function ee_video_hidden() {
    if (!function_exists('get_option')) return array();
    $h = get_option('ee_video_hidden', array());
    return is_array($h) ? $h : array();
}

/**
 * The live library: shipped list + admin additions - admin removals.
 *
 * An added video whose category or section does not exist yet creates it,
 * so a non-coder can file a video anywhere without touching this file.
 */
function ee_video_library() {
    $lib    = ee_video_library_builtin();
    $hidden = ee_video_hidden();

    /* index by slug so extras can find their home in one pass */
    $bySlug = array();
    foreach ($lib as $i => $c) $bySlug[$c['slug']] = $i;

    foreach (ee_video_extras() as $x) {
        $slug = isset($x['cat']) ? $x['cat'] : '';
        $name = isset($x['cat_name']) && $x['cat_name'] !== '' ? $x['cat_name'] : $slug;
        $sec  = isset($x['section']) && $x['section'] !== '' ? $x['section'] : 'More videos';
        $id   = isset($x['id']) ? $x['id'] : '';
        $ttl  = isset($x['title']) ? $x['title'] : '';
        if ($slug === '' || $id === '' || $ttl === '') continue;

        if (!isset($bySlug[$slug])) {
            $lib[] = array('name' => $name, 'slug' => $slug, 'sections' => array());
            $bySlug[$slug] = count($lib) - 1;
        }
        $ci = $bySlug[$slug];

        $si = null;
        foreach ($lib[$ci]['sections'] as $k => $s) {
            if ($s['name'] === $sec) { $si = $k; break; }
        }
        if ($si === null) {
            $lib[$ci]['sections'][] = array('name' => $sec, 'videos' => array());
            $si = count($lib[$ci]['sections']) - 1;
        }
        $lib[$ci]['sections'][$si]['videos'][] = array($ttl, $id);
    }

    if ($hidden) {
        foreach ($lib as $ci => $cat) {
            foreach ($cat['sections'] as $si => $sec) {
                $keep = array();
                foreach ($sec['videos'] as $v) {
                    if (!in_array($v[1], $hidden, true)) $keep[] = $v;
                }
                $lib[$ci]['sections'][$si]['videos'] = $keep;
            }
            /* a section emptied by removals should not leave a bare heading */
            $lib[$ci]['sections'] = array_values(array_filter($lib[$ci]['sections'], function ($s) {
                return !empty($s['videos']);
            }));
        }
        /* and a category emptied the same way drops out of the nav */
        $lib = array_values(array_filter($lib, function ($c) { return !empty($c['sections']); }));
    }

    return $lib;
}

/** One category by slug, or null. */
function ee_video_category($slug) {
    foreach (ee_video_library() as $cat) {
        if ($cat['slug'] === $slug) return $cat;
    }
    return null;
}

/** Flat list of every video in a category, section name attached. */
function ee_video_flatten($cat) {
    $out = array();
    foreach ($cat['sections'] as $sec) {
        foreach ($sec['videos'] as $v) {
            $out[] = array('title' => $v[0], 'id' => $v[1], 'section' => $sec['name']);
        }
    }
    return $out;
}
