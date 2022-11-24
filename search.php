<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Shape
 * @since Shape 1.0
 */
 
get_header(); ?>
<main>
 <h2>Resultats de Recherche</h2>
   <?php while (have_posts()): the_post(); ?>
        <h3><a href="<?=the_permalink()?>"><?=the_title()?></a></h3>
         <p><?= wp_trim_words(get_the_excerpt(),20,"...");?></p>

     
   <?php endwhile ?>
</main>
 
<?php get_sidebar(); ?>
<?php get_footer(); ?>