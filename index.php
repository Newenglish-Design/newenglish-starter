<?php
/**
 * The main template file
 * */

get_header();
	if ( have_posts() ) { ?>
    
        <main role="main">
            <?php while ( have_posts() ) {
                the_post();
                the_content();
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
            } ?>
        </main>
    <?php } else { ?>
        <div>
            <div class="container">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
        <main role="main">
            <h1>This page could not be found.</h1>
        </main>
    <?php }
get_footer();
