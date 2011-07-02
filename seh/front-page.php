<?php
/**
 * The template for displaying the static front page.
 */

get_header(); ?>

    <section id="welcome">
        <img src="<?php bloginfo('stylesheet_directory'); ?>/images/seh-rounded-100.png" id="logo" alt="SH" itemprop="image"/>
        <div id="fronttext" itemprop="author" itemscope itemtype="http://schema.org/Person">
            <p itemprop="description"><strong itemprop="name">Sense Egbert Hofstede</strong> (<span class="phonetics">[ˈsɛn.sə ˈɛɣ.bərt ˈɦɔf.steː.də]</span>; <span itemprop="birthDate">1993</span>) is a young <span itemprop="gender">male</span> of the species <em>homo sapiens sapiens</em> who originates from the North of <span itemprop="nationality">the Netherlands</span>. Currently in the period between school and university, he spends most of his time on toying with computer code, playing the guitar and reading.</p>
        </div>
        <?php wp_nav_menu( array( 'container' => 'nav', 'container_class' => 'menu-about', 'theme_location' => 'frontabout' ) ); ?>
    </section>

<?php get_footer(); ?>
