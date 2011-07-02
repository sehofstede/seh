<?php
/**
 * The template for displaying the static front page.
 */

get_header(); ?>

    <section id="welcome">
        <img src="<?php bloginfo('stylesheet_directory'); ?>/images/seh-rounded-100.png" id="logo" alt="SH" itemprop="image"/>
        <div id="fronttext" itemprop="author" itemscope itemtype="http://schema.org/Person">
            <p itemprop="description"><?php seh_frontpage_text(); ?></p>
        </div>
        <?php wp_nav_menu( array( 'container' => 'nav', 'container_class' => 'menu-about', 'theme_location' => 'frontabout' ) ); ?>
    </section>

<?php get_footer(); ?>
