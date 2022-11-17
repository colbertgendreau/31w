<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscore
 */
?>
<!-- h1 class="trace">front-page.php</h1 -->
<?php get_header(); ?>

<main class="site__main">
<section class="liste">
                    <?php
                if ( have_posts() ) :
                    while ( have_posts() ) :
                    the_post();?>
                    <article class="liste__cours">
                    <h2><a href="<?=the_permalink()?>"><?=the_title()?></a></h2>
                    <h3>Durée du cours : <?= the_field('duree') ?></h3>
                    <h3>Méthode d'enseignement : <?= the_field('methode') ?></h3>
                    <h3>Email du prof : <?= the_field('email') ?></h3>
                    <h3>Lien : <?= the_field('lien') ?></h3>
                    <?php
                    // the_content(null, true);
                    if ( has_post_thumbnail() ) {
                        the_post_thumbnail('thumbnail');
                    }  ?>                  
                    <?= wp_trim_words(get_the_excerpt(),10,"...permalien");?>
                </article>
                    <?php endwhile;?>
                    </section>
                    <?php
            endif;
            ?>
    </main>    
<?php get_footer(); ?>
</html>



