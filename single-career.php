<?php
/**
 * single-career.php — Job posting / Career landing page
 * Schema: JobPosting
 * Custom fields:
 *   _seo_title, _seo_description, _seo_keywords, _og_image
 *   _job_subtitle, _job_employment_type, _job_location, _job_remote (yes/no/hybrid)
 *   _job_department, _job_experience, _job_salary_min, _job_salary_max, _job_currency
 *   _job_valid_through, _job_responsibilities, _job_requirements, _job_perks
 *   _job_apply_url, _job_cta_text
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;

add_action('wp_head', function () {
    if (!is_singular('career')) return;
    global $post;
    $pid       = $post->ID;
    $title     = get_post_meta($pid, '_seo_title', true) ?: get_the_title($pid);
    $desc_meta = get_post_meta($pid, '_seo_description', true);
    $desc      = $desc_meta ?: wp_trim_words(wp_strip_all_tags($post->post_content), 30);
    $image     = get_post_meta($pid, '_og_image', true) ?: get_the_post_thumbnail_url($pid, 'full');
    $url       = get_permalink($pid);
    $keywords  = get_post_meta($pid, '_seo_keywords', true);
    $emp_type  = get_post_meta($pid, '_job_employment_type', true) ?: 'FULL_TIME';
    $loc       = get_post_meta($pid, '_job_location', true) ?: 'Pune, India';
    $remote    = get_post_meta($pid, '_job_remote', true) ?: 'no';
    $valid_to  = get_post_meta($pid, '_job_valid_through', true);
    $sal_min   = get_post_meta($pid, '_job_salary_min', true);
    $sal_max   = get_post_meta($pid, '_job_salary_max', true);
    $cur       = get_post_meta($pid, '_job_currency', true) ?: 'INR';
    if ($keywords) echo '<meta name="keywords" content="' . esc_attr($keywords) . '">' . "\n";

    $schema = array(
        '@context'         => 'https://schema.org',
        '@type'            => 'JobPosting',
        '@id'              => $url . '#jobposting',
        'title'            => get_the_title($pid),
        'description'      => $post->post_content ? wpautop($post->post_content) : $desc,
        'url'              => $url,
        'datePosted'       => get_the_date('c', $pid),
        'validThrough'     => $valid_to ?: date('c', strtotime('+60 days')),
        'employmentType'   => $emp_type,
        'image'            => $image,
        'identifier'       => array(
            '@type' => 'PropertyValue',
            'name'  => 'ExtraaEdge',
            'value' => 'EE-' . $pid,
        ),
        'hiringOrganization' => array('@id' => 'https://www.extraaedge.com/#organization'),
        'jobLocation'      => array(
            '@type'   => 'Place',
            'address' => array(
                '@type'           => 'PostalAddress',
                'addressLocality' => $loc,
                'addressCountry'  => 'IN',
            ),
        ),
    );
    if ($remote === 'yes') {
        $schema['jobLocationType'] = 'TELECOMMUTE';
        $schema['applicantLocationRequirements'] = array('@type' => 'Country', 'name' => 'India');
    }
    if ($sal_min && $sal_max) {
        $schema['baseSalary'] = array(
            '@type'    => 'MonetaryAmount',
            'currency' => $cur,
            'value'    => array(
                '@type'    => 'QuantitativeValue',
                'minValue' => (int) $sal_min,
                'maxValue' => (int) $sal_max,
                'unitText' => 'YEAR',
            ),
        );
    }
    echo "\n<script type=\"application/ld+json\">" . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "</script>\n";
});

get_header();
while (have_posts()) : the_post();

$pid       = get_the_ID();
$subtitle  = get_post_meta($pid, '_job_subtitle', true);
$emp_type  = get_post_meta($pid, '_job_employment_type', true) ?: 'Full-time';
$loc       = get_post_meta($pid, '_job_location', true) ?: 'Pune, India';
$remote    = get_post_meta($pid, '_job_remote', true) ?: 'no';
$dept      = get_post_meta($pid, '_job_department', true);
$exp       = get_post_meta($pid, '_job_experience', true);
$resp      = get_post_meta($pid, '_job_responsibilities', true);
$reqs      = get_post_meta($pid, '_job_requirements', true);
$perks     = get_post_meta($pid, '_job_perks', true);
$apply_url = get_post_meta($pid, '_job_apply_url', true) ?: '/contact-us/';
$cta_text  = get_post_meta($pid, '_job_cta_text', true) ?: 'Apply Now';
?>

<style>
.cr-hero{background:linear-gradient(135deg,#F8FAFC 0%,#FFFFFF 100%);padding:60px 0 50px}
.cr-hero .container{max-width:1100px;margin:0 auto;padding:0 24px}
.cr-badge{display:inline-flex;align-items:center;gap:8px;background:rgba(222,110,48,.08);color:#DE6E30;font-family:'Inter',sans-serif;font-weight:700;font-size:11px;text-transform:uppercase;letter-spacing:1.5px;padding:8px 18px;border-radius:9999px;margin-bottom:18px;border:1px solid rgba(222,110,48,.18)}
.cr-hero h1{font-family:'Inter',sans-serif;font-size:clamp(30px,4vw,46px);line-height:1.15;color:#19335D;font-weight:900;margin:0 0 14px;letter-spacing:-.02em}
.cr-hero .sub{font-size:clamp(15px,1.3vw,17px);color:#475569;line-height:1.7;margin-bottom:24px;max-width:760px}
.cr-meta-pills{display:flex;flex-wrap:wrap;gap:10px;margin-bottom:26px}
.cr-pill{display:inline-flex;align-items:center;gap:6px;background:#fff;border:1px solid #E2E8F0;color:#19335D;font-family:'Inter',sans-serif;font-weight:600;font-size:13px;padding:8px 16px;border-radius:9999px}
.cr-btn-primary{display:inline-flex;align-items:center;gap:8px;background:#DE6E30;color:#fff;font-family:'Inter',sans-serif;font-weight:700;font-size:15px;padding:15px 32px;border-radius:14px;text-decoration:none;transition:all .3s ease;box-shadow:0 8px 24px rgba(222,110,48,.3)}
.cr-btn-primary:hover{transform:translateY(-3px);background:#c85d20}

.cr-body{background:#fff;padding:60px 0}
.cr-body .container{max-width:1100px;margin:0 auto;padding:0 24px;display:grid;grid-template-columns:1fr 320px;gap:48px}
.cr-body article{font-family:'Inter',sans-serif;color:#19335D;line-height:1.8}
.cr-body article h2{font-family:'Inter',sans-serif;font-size:clamp(22px,2.8vw,30px);font-weight:800;color:#19335D;margin:32px 0 14px}
.cr-body article p{font-size:16px;color:#475569;margin-bottom:16px}
.cr-body article ul{margin:0 0 20px 20px;color:#475569}
.cr-body article li{margin-bottom:8px}

.cr-aside{position:sticky;top:100px;align-self:start}
.cr-aside-card{background:linear-gradient(135deg,#19335D 0%,#1e3d70 100%);color:#fff;border-radius:24px;padding:32px;box-shadow:0 24px 60px rgba(25,51,93,.18)}
.cr-aside-card h3{font-family:'Inter',sans-serif;font-size:20px;font-weight:800;margin:0 0 10px;color:#fff}
.cr-aside-card p{font-size:14px;color:rgba(255,255,255,.85);line-height:1.6;margin-bottom:18px}
.cr-aside-card a{display:block;background:#DE6E30;color:#fff;text-align:center;padding:14px;border-radius:12px;font-weight:700;text-decoration:none}
.cr-aside-card ul{list-style:none;padding:0;margin:0 0 16px;font-size:13px}
.cr-aside-card ul li{padding:8px 0;border-bottom:1px solid rgba(255,255,255,.1);color:rgba(255,255,255,.85)}
.cr-aside-card ul li b{color:#fff;display:block;margin-bottom:2px;font-size:11px;text-transform:uppercase;letter-spacing:1px}

@media(max-width:900px){.cr-body .container{grid-template-columns:1fr;gap:32px}.cr-aside{position:relative;top:0}}
</style>

<main id="main-content" role="main">
  <section class="cr-hero" aria-labelledby="career-heading">
    <div class="container">
      <div class="cr-badge">🚀 We're Hiring</div>
      <h1 id="career-heading"><?php the_title(); ?></h1>
      <?php if ($subtitle) : ?><p class="sub"><?php echo esc_html($subtitle); ?></p><?php endif; ?>
      <div class="cr-meta-pills">
        <span class="cr-pill">📍 <?php echo esc_html($loc); ?></span>
        <span class="cr-pill">💼 <?php echo esc_html(str_replace('_', ' ', $emp_type)); ?></span>
        <?php if ($dept) : ?><span class="cr-pill">🏢 <?php echo esc_html($dept); ?></span><?php endif; ?>
        <?php if ($exp) : ?><span class="cr-pill">⭐ <?php echo esc_html($exp); ?></span><?php endif; ?>
        <?php if ($remote === 'yes') : ?><span class="cr-pill">🌐 Remote</span><?php elseif ($remote === 'hybrid') : ?><span class="cr-pill">🔀 Hybrid</span><?php endif; ?>
      </div>
      <a href="<?php echo esc_url($apply_url); ?>" class="cr-btn-primary" rel="nofollow"><?php echo esc_html($cta_text); ?></a>
    </div>
  </section>

  <section class="cr-body">
    <div class="container">
      <article itemscope itemtype="https://schema.org/JobPosting">
        <?php the_content(); ?>

        <?php if ($resp) : ?>
        <h2>Key Responsibilities</h2>
        <ul>
          <?php foreach (explode("\n", trim($resp)) as $line) : $line = trim($line); if ($line) echo '<li>' . esc_html($line) . '</li>'; endforeach; ?>
        </ul>
        <?php endif; ?>

        <?php if ($reqs) : ?>
        <h2>Requirements</h2>
        <ul>
          <?php foreach (explode("\n", trim($reqs)) as $line) : $line = trim($line); if ($line) echo '<li>' . esc_html($line) . '</li>'; endforeach; ?>
        </ul>
        <?php endif; ?>

        <?php if ($perks) : ?>
        <h2>Perks & Benefits</h2>
        <ul>
          <?php foreach (explode("\n", trim($perks)) as $line) : $line = trim($line); if ($line) echo '<li>' . esc_html($line) . '</li>'; endforeach; ?>
        </ul>
        <?php endif; ?>
      </article>

      <aside class="cr-aside" role="complementary">
        <div class="cr-aside-card">
          <h3>Job Snapshot</h3>
          <ul>
            <li><b>Location</b><?php echo esc_html($loc); ?></li>
            <li><b>Type</b><?php echo esc_html(str_replace('_', ' ', $emp_type)); ?></li>
            <?php if ($dept) : ?><li><b>Department</b><?php echo esc_html($dept); ?></li><?php endif; ?>
            <?php if ($exp) : ?><li><b>Experience</b><?php echo esc_html($exp); ?></li><?php endif; ?>
          </ul>
          <a href="<?php echo esc_url($apply_url); ?>" rel="nofollow">📩 <?php echo esc_html($cta_text); ?></a>
        </div>
      </aside>
    </div>
  </section>
</main>

<?php endwhile; get_footer(); ?>
