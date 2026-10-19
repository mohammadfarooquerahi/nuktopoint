<?php
/**
 * The template for displaying the homepage.
 *
 * @package Nukto_Point
 */

get_header();
?>

<main id="primary" class="site-main nk-main">
    <?php
    // Hero Section with Ticker, Big Typography & Expanding Showreel Card
    get_template_part('template-parts/hero');

    // Infinite Marquee Banner (Capabilities & Brand Keywords)
    get_template_part('template-parts/marquee');

    // Selected Work / Portfolio Grid (Real Behance Projects)
    get_template_part('template-parts/work-grid');

    // Interactive Services Showcase (Accordion & Split Sticky View)
    get_template_part('template-parts/services');

    // Studio Philosophy & Lead Designer Bio (SZABIST, Pak-Turk, M.Phil)
    get_template_part('template-parts/about');

    // Impact Statistics & Key Metrics
    get_template_part('template-parts/stats');

    // Testimonials & Client Endorsements
    get_template_part('template-parts/testimonials');

    // Interactive Contact Form & Direct Inquiries
    get_template_part('template-parts/contact-form');
    ?>
</main>

<?php
get_footer();
