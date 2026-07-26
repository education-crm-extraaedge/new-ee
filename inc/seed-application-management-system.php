<?php
if (!defined('ABSPATH')) exit;

/**
 * One-time content seed for the 'Application Management System' product
 * page (/products/application-management-system/), imported from the
 * client-supplied copy (2026-07-26). Runs once on any wp-admin page load,
 * fills in ONLY the fields that are currently empty (never overwrites
 * anything already edited), and uses the exact same post-meta keys as
 * the Products tabbed meta-box editor - so after this runs, a non-coder
 * can open Products -> Application Management System in wp-admin and
 * see/edit this content through the normal editor UI, no code involved.
 */
add_action('admin_init', 'ee_seed_ams_product_content');
function ee_seed_ams_product_content() {
    if (get_option('ee_ams_content_seeded_v1')) return;

    $post = get_page_by_path('application-management-system', OBJECT, 'product');
    if (!$post) return; // page not created yet - try again next admin page load
    $pid = $post->ID;

    if (empty(get_post_meta($pid, '_hero_h1_before', true)) && empty(get_post_meta($pid, '_hero_h1_highlight', true))) {
        update_post_meta($pid, '_hero_h1_before', 'Automate your Application Forms with ');
        update_post_meta($pid, '_hero_h1_highlight', 'Application Management System');
        update_post_meta($pid, '_hero_h1_after', '');
    }

    if (empty(get_post_meta($pid, '_hero_description', true))) {
        update_post_meta($pid, '_hero_description', 'A custom-built application management system and applicant portal with communication and payment functionalities, specifically designed for the admissions teams of universities, institutes, and vocational colleges to streamline their processes and enhance the experience for applicants.');
    }

    if (empty(get_post_meta($pid, '_content_sections', true))) {
        update_post_meta($pid, '_content_sections', array(
            array(
                'id'               => 'powerful-automated-admission-workflows',
                'heading'          => 'Powerful automated admission workflows',
                'description'      => 'Eliminate manual paperwork and manage applicant details, documents, payments, and e-signatures within a single window. Automated reminders and alerts to provide guidance to applicants who are stuck in the application process. Our system supports various browsers, low internet connections, and multiple devices, ensuring a seamless experience for all users.',
                'features_heading' => 'Key Features',
                'features'         => 'Customisable application form that perfectly aligns with your unique admissions process, ensuring a smoother and more efficient application experience
Quick multi-course payment collections simplify the payment process for applicants who apply to multiple courses within your institution
Create on-the-fly application PDFs and generate instant payment receipts to save time and effort for your admissions team
Real-time application tracking to keep the applicants updated on their progress and provide prompt notifications regarding any updates in their application status.',
                'image'            => 'https://www.extraaedge.com/wp-content/uploads/2024/12/Powerful-automated-admission-workflows.webp',
                'image_position'   => 'right',
                'cta_text'         => 'Learn more',
                'cta_url'          => '#admission-form',
            ),
            array(
                'id'               => 'mobile-friendly-application-with-communications',
                'heading'          => 'Mobile-friendly application with communications',
                'description'      => 'Application form mobile app on the Play Store provides students with the leverage to fill out forms at their pace from anywhere. They now have the convenience of uploading necessary documents, signing applications, checking the status of their applications, taking virtual campus tours, and making payments.',
                'features_heading' => 'Key Features',
                'features'         => 'Branded mobile application app to establish a strong presence in the digital space and enhance your institute\'s image and credibility
In-app notifications for reminders, deadlines, and updates to improve communication and help students manage their time effectively
A 360-degree communication experience for prospects within the app, such as push notifications, messaging, or in-app chat
Support for both Android and iOS stores ensures accessibility for a wide range of users, enhancing user satisfaction and engagement',
                'image'            => 'https://www.extraaedge.com/wp-content/uploads/2024/12/Mobile-friendly-application-with-communications.webp',
                'image_position'   => 'left',
                'cta_text'         => 'Learn more',
                'cta_url'          => '#admission-form',
            ),
            array(
                'id'               => 'hassle-free-integration-with-multiple-platforms',
                'heading'          => 'Hassle-free integration with multiple platforms',
                'description'      => 'Seamless integration process that brings together all aspects of your student journey, ensuring a streamlined and efficient admissions process. You can effortlessly track website activities and access the complete communication history of each student, all in one centralised location. This integration provides a holistic view of student interactions.',
                'features_heading' => 'Key Features',
                'features'         => 'Mapped out and visible application steps to proactively monitor progress, address any bottlenecks, and ensure a smooth process
Integrated calling (IVR) and chat (SMS, WhatsApp) functionalities to provide immediate assistance to students as they navigate the form-filling process
Effortlessly integrate your own payment gateway to ensure a smooth and customised payment experience for your applicants
Seamless document management to securely upload required documents, eliminating the need for manual handling and reducing paperwork',
                'image'            => 'https://www.extraaedge.com/wp-content/uploads/2024/12/Hassle-free-integration-with-multiple-platforms.webp',
                'image_position'   => 'right',
                'cta_text'         => 'Learn more',
                'cta_url'          => '#admission-form',
            ),
            array(
                'id'               => 'make-collections-easy-with-multiple-payment-gateways',
                'heading'          => 'Make collections easy with multiple payment gateways',
                'description'      => 'Multiple payment gateways such as HDFC, EaseBuzz, Paytm, VISA, Mastercard, Razorpay, and Stripe offer a wide range of options to students. With multiple payment gateway options, you can cater to a diverse range of applicants and provide a smooth and hassle-free payment experience. In times of technical glitches, the system provides an alternative method of payment.',
                'features_heading' => 'Key Features',
                'features'         => 'Generate the payment links on the fly with customisable expiration dates to simplify the process and track every transaction
Detailed MIS collections are provided as feeds to your accounting system and team to enhance the visibility and accuracy of the fee payment
A single-view payment journey, transaction date, transaction ID, and payment method are displayed to ensure clear visibility into the student journey
Dynamic fee collection for multiple courses and programs and customise fee structures based on different courses, programs, and student categories',
                'image'            => 'https://www.extraaedge.com/wp-content/uploads/2024/12/Make-collections-easy-with-multiple-payment-gateways.webp',
                'image_position'   => 'left',
                'cta_text'         => 'Learn more',
                'cta_url'          => '#admission-form',
            ),
        ));
    }

    if (empty(get_post_meta($pid, '_faqs', true))) {
        update_post_meta($pid, '_faqs', array(
            array(
                'question' => 'How is Application Management System useful in Education Industry?',
                'answer'   => '<p>Manual application forms involve manually reviewing each form, verifying the information provided, and entering data into a system. Sending updates, notifications, or requesting additional information from applicants also becomes manual and time-intensive.</p><p>With an application management system, you can digitize your application forms and make them accessible to every applicant. The application forms are designed to enhance the applicant\'s experience.</p><p>The student can save their progress, upload supporting documents, and receive instant confirmation of their submission. The system provides real-time updates on application status, ensuring transparency and reducing applicant inquiries.</p><p>Additionally, the dynamic fee collection feature enables real-time payment processing, allowing applicants to conveniently pay their fees online.</p><p>Not only does it automate fee collection, but an application management system also offers real-time application tracking. You can easily monitor the progress of each application, view completed and pending tasks, and access comprehensive applicant profiles all in one centralized dashboard.</p><p>A robust application management system reduces the risk of errors or delays in the application review process.</p>',
            ),
            array(
                'question' => 'How can ExtraaEdge Application Management System benefit education institutes?',
                'answer'   => '<p>ExtraaEdge Application Management System can help you with the following:</p><ul><li>It customises forms to meet your institute\'s needs.</li><li>It provides a better interface for a better user experience, resulting in higher prospect engagement.</li><li>The system is mobile-friendly, allowing candidates to complete it on the go.</li><li>While filling out the form, it maps the student\'s whole path.</li><li>Follow-up communications can also be sent to the students if they quit the form at any point.</li><li>Provide convenience to the student to fill out app form in multiple settings.</li><li>Auto login link to reinitiate students\' application form.</li><li>Rule engines to strategize the Application form process without even manual intervention.</li></ul>',
            ),
            array(
                'question' => 'When should educational institutes opt for an Application Management System?',
                'answer'   => '<p>Educational institutions should use Application Management Software if they are experiencing any of the following problems:</p><ul><li>If you have an ineffective real-time application form tracking and management, which results in lead leakages.</li><li>If you don\'t have any system to track student dropout rates.</li><li>If your admission team is manually collecting all the documents that the student has submitted.</li><li>If you don\'t have a payment gateway and are having trouble bringing all of your payments together in one place.</li></ul>',
            ),
            array(
                'question' => 'How are students assessed and shortlisted using Application Management System?',
                'answer'   => '<p>Shortlisted applications are a sign of the quality of an educational institution\'s intake, and leave no room for errors. It might be challenging to evaluate and shortlist applicants, especially when there are a lot of them. All required documents and information are collected online using an application form customised to your institute\'s needs, and the best candidates can then be selected as per your set criteria. Another advantage of a student application management system is efficiency. The use of a student application management system aids in the reduction of human errors which leads to uniformity. The Application Tracking Software also ensures that unauthenticated leads are eliminated with the deployment of OTPs.</p>',
            ),
            array(
                'question' => 'How does the GD/PI Post Application Module streamline the admissions process?',
                'answer'   => '<p>The GD/PI Post Application Module is designed to simplify and automate the Group Discussion (GD) and Personal Interview (PI) stages, which are critical in higher education admissions. With this module:</p><ul><li>Institutions can automatically schedule interviews based on applicant preferences and panel availability, eliminating time-consuming manual coordination.</li><li>Real-time notifications ensure applicants and panelists are informed of their schedules through email, SMS, or WhatsApp.</li><li>The module includes an evaluation system where interviewers can rate applicants based on predefined criteria and provide feedback, helping standardize the selection process.</li><li>Integrated with platforms like Zoom and Google Calendar, it allows institutions to manage both in-person and virtual interviews effortlessly.</li></ul><p>This module not only enhances operational efficiency but also improves the applicant experience, making it a key feature in any CRM for education.</p>',
            ),
            array(
                'question' => 'Can the Offer Letter and Admit Card Module be customized for institutions?',
                'answer'   => '<p>Yes, the Offer Letter and Admit Card Module offers extensive customization options to suit the unique needs of higher education institutions. This module allows:</p><ul><li>Creation of personalized offer letters and admit cards with dynamic fields like applicant names, program details, and fees.</li><li>Use of custom templates that align with the institution\'s branding, ensuring a professional and consistent look.</li><li>Institutions to issue provisional or final offer letters depending on the admissions stage, with automated tracking to monitor when applicants view or download their documents.</li><li>E-signature integration to simplify the process for both institutions and applicants while ensuring document authenticity.</li></ul><p>By automating these critical steps, the module helps institutions save time and reduce errors while delivering a superior applicant experience.</p>',
            ),
            array(
                'question' => 'What are the benefits of the Zoom/Calendar Booking Module for interviews?',
                'answer'   => '<p>The Zoom/Calendar Booking Module revolutionizes interview scheduling by integrating virtual meeting platforms directly into the CRM. Here\'s how it benefits higher education institutions:</p><ul><li><strong>Seamless Scheduling:</strong> Applicants can select interview slots that suit their schedules, while admissions teams can manage availability through a centralized dashboard.</li><li><strong>Platform Integration:</strong> The module works seamlessly with popular platforms like Zoom, Microsoft Teams, and Google Meet, ensuring smooth virtual interview experiences.</li><li><strong>Automated Notifications:</strong> Timely reminders and updates are sent to both applicants and panelists to minimize no-shows and enhance coordination.</li><li><strong>Recording and Storage:</strong> Virtual interviews can be recorded and securely stored for review and compliance purposes.</li></ul><p>This module is a must-have for institutions looking to digitize their admissions process and provide a modern, convenient experience for applicants.</p>',
            ),
            array(
                'question' => 'How does the Advanced Panel Allocation Module improve admissions efficiency?',
                'answer'   => '<p>The Advanced Panel Allocation & Slot Builder Module optimizes admissions operations by automating the allocation of interview panels and scheduling slots. Key features include:</p><ul><li><strong>Dynamic Slot Creation:</strong> Institutions can build custom slots based on applicant volume, panelist availability, and program requirements.</li><li><strong>Algorithmic-Powered Matching:</strong> The system intelligently matches applicants with the most relevant panelists based on expertise and availability.</li><li><strong>Load Balancing:</strong> Panelists\' workloads are evenly distributed, ensuring fair and efficient processing of applications.</li><li><strong>Real-Time Conflict Resolution:</strong> The module identifies scheduling conflicts and provides alternative slots, ensuring smooth operations.</li></ul><p>This module saves time, reduces errors, and provides data-driven insights into panelist performance and slot utilization, making it an essential component of a higher education CRM.</p>',
            ),
            array(
                'question' => 'How does ExtraaEdge\'s CRM enhance application management and student experience?',
                'answer'   => '<p>ExtraaEdge\'s Application Management System is a comprehensive solution designed to improve transparency and efficiency in the admissions process. Key capabilities include:</p><ul><li><strong>End-to-End Automation:</strong> From lead acquisition to final admission, the system automates every step, ensuring zero lead leakage and higher conversion rates.</li><li><strong>Real-Time Analytics:</strong> Institutions gain actionable insights into application status, applicant behavior, and campaign performance, enabling data-driven decisions.</li><li><strong>Customizable Workflows:</strong> Flexible workflows cater to the unique needs of different institutions, streamlining admissions for universities, coaching institutes, and vocational programs.</li><li><strong>Omnichannel Communication:</strong> Integrated email, SMS, WhatsApp, and chatbots ensure constant engagement with applicants, providing them with timely updates and reminders.</li><li><strong>Integrated Ecosystem:</strong> The system connects seamlessly with CRMs, ERPs, and LMS platforms, offering a unified view of the applicant journey.</li></ul><p>By addressing critical challenges like high CAC and low conversion rates, ExtraaEdge\'s CRM provides a holistic solution tailored to the needs of education brands.</p>',
            ),
            array(
                'question' => 'How does the GD/PI Module ensure fairness and transparency in evaluations?',
                'answer'   => '<p>The GD/PI Post Application Module is built to promote fairness and transparency in the applicant evaluation process, addressing common concerns for higher education admissions. Here\'s how:</p><ul><li><strong>Standardized Evaluation Criteria:</strong> Predefined evaluation rubrics ensure that all applicants are assessed consistently across panels, eliminating bias.</li><li><strong>Real-Time Scoring:</strong> Panelists can score applicants during the session, with scores instantly recorded and accessible for review.</li><li><strong>Audit Trail:</strong> The system maintains a detailed log of all evaluations, allowing institutions to review decisions and address applicant grievances if needed.</li><li><strong>Panelist Training Integration:</strong> Institutions can provide access to training materials and evaluation guidelines within the module to ensure that all panelists are aligned with institutional standards.</li></ul><p>By combining automation with transparency, this module strengthens the credibility of the admissions process in CRM for higher education.</p>',
            ),
            array(
                'question' => 'How does the Offer Letter Module handle multiple admission cycles effectively?',
                'answer'   => '<p>The Offer Letter and Admit Card Module is designed to efficiently handle the complexities of multiple admission cycles and programs. Here\'s how it works:</p><ul><li><strong>Multi-Program Support:</strong> The system can generate offer letters and admit cards for multiple programs, ensuring accurate and program-specific information for each applicant.</li><li><strong>Cycle-Based Customization:</strong> Institutions can customize templates and workflows for different admission cycles (e.g., early decision, regular admission) to meet specific timelines and criteria.</li><li><strong>Batch Processing:</strong> The module supports bulk generation of documents, reducing administrative overhead during peak admission periods.</li><li><strong>Automated Deadline Management:</strong> The system dynamically updates deadlines and reminders based on the admission cycle, ensuring applicants don\'t miss critical steps.</li></ul><p>This feature-rich module streamlines operations and ensures that institutions can manage complex admissions workflows efficiently.</p>',
            ),
            array(
                'question' => 'What happens if applicants miss interviews in the Zoom/Calendar Booking Module?',
                'answer'   => '<p>The Zoom/Calendar Booking Module includes features to handle missed interview appointments effectively:</p><ul><li><strong>Automated Rescheduling Options:</strong> If an applicant misses their interview, the system can automatically offer rescheduling options based on panel and time slot availability.</li><li><strong>Real-Time Notifications:</strong> Both applicants and panelists are notified instantly about missed interviews, reducing downtime.</li><li><strong>Waitlist Management:</strong> The module includes a waitlist feature, allowing applicants on standby to fill vacant slots, ensuring no time is wasted.</li><li><strong>Data Insights:</strong> Institutions can track no-show rates and identify patterns to make adjustments in scheduling or applicant communication strategies.</li></ul><p>These capabilities ensure that missed interviews don\'t disrupt the admissions process, maintaining a professional and applicant-friendly experience.</p>',
            ),
            array(
                'question' => 'How does the Panel Allocation Module adapt to last-minute changes in schedules?',
                'answer'   => '<p>The Advanced Panel Allocation & Slot Builder Module is built to handle last-minute changes efficiently, minimizing disruptions:</p><ul><li><strong>Real-Time Adjustments:</strong> The system allows administrators to reallocate panelists or reschedule applicants with just a few clicks.</li><li><strong>Dynamic Notifications:</strong> All affected parties are instantly notified of changes via email, SMS, or WhatsApp.</li><li><strong>Algorithmic-Assisted Reallocation:</strong> The module uses algorithms to suggest alternative slots and panellists based on availability and load balancing.</li><li><strong>Fallback Mechanism:</strong> In case of unavoidable conflicts, the module can activate predefined fallback rules to maintain process continuity, such as merging slots or assigning backup panelists.</li></ul><p>This flexibility ensures that institutions can maintain efficiency and professionalism, even during unexpected changes.</p>',
            ),
            array(
                'question' => 'How does ExtraaEdge\'s CRM integrate with systems for better application management?',
                'answer'   => '<p>ExtraaEdge\'s Application Management System is designed to integrate seamlessly with an institution\'s existing infrastructure:</p><ul><li><strong>ERP, SIS, and LMS Integration:</strong> The system connects with popular educational platforms to provide a unified view of student data and streamline workflows.</li><li><strong>Third-Party APIs:</strong> Supports integrations with external services like payment gateways, email providers, and communication tools (e.g., WhatsApp, SMS platforms).</li><li><strong>Custom API Options:</strong> Institutions with unique requirements can leverage custom APIs to connect their proprietary systems with ExtraaEdge.</li><li><strong>Data Migration Support:</strong> The platform includes tools and services to migrate data from legacy systems, ensuring a smooth transition to the new CRM.</li><li><strong>Real-Time Sync:</strong> All integrations are updated in real-time, ensuring data consistency across platforms.</li></ul><p>These features make ExtraaEdge a versatile solution for higher education institutions, capable of adapting to varied operational needs.</p>',
            ),
        ));
    }

    update_option('ee_ams_content_seeded_v1', 1);
}