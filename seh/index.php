<?php get_template_part( 'header' ); ?>

    <div id="welcome">
        <img src="<?php bloginfo('template_directory'); ?>/images/seh-rounded-100.png" id="logo" alt="SH"/>
        <div id="fronttext">
            <p><strong>Sense Egbert Hofstede</strong> (<span class="phonetics">[ˈsɛn.sə ˈɛɣ.bərt ˈɦɔf.steː.də]</span>; 1993) is a young male of the species <em>homo sapiens sapiens</em> who originates from the North of the Netherlands.</a> Currently in the period between school and university, he spends most of his time on toying with computer code, playing the guitar and reading.</p>
        </div>
        <div id="frontsidetext">
            <p>At the moment I am not so much, but I used to be involved a lot in the <a rel="external" href="http://www.ubuntu.com/" title="Ubuntu">Ubuntu</a> project, most notably the Ayatana project.</p>
            <p>I'm reverted to joyful idleness for the moment.</p>
        </div>
        <div id="frontbottomtext">
            <strong>Find me at</strong>
            <ul id="codelist">
                <li><a rel="external" href="https://github.com/sensehofstede" title="sensehofstede's Profile - GitHub" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/github.png" alt="GitHub"/></a></li>
                <li><a rel="external" href="https://launchpad.net/~sense" title="Sense Hofstede in Launchpad" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/launchpad.png" alt="Launchpad"/></a></li>
                <li><a rel="external" href="https://www.ohloh.net/accounts/sensehofstede" title="Sense Hofstede - Ohloh" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/ohloh.png" alt="Ohloh"/></a></li>
            </ul>
       </div>
        <a href="" title="About Sense Hofstede" class="expandarrow">&#x21F2;</a>
    </div>
    <div id="blog">
        <div id="blogtab">
            <a href="#blog" title="Blog">&darr; Blog &darr;</a>
        </div>
        <div id="content">
        	<?php get_sidebar( 'blog-top-bar' ); ?>
    	    <div id="posts">
        	    <?php get_template_part( 'loop', 'index' ); ?>
    	    </div>
        </div>
    </div>
    
<?php get_template_part( 'footer' ); ?>
