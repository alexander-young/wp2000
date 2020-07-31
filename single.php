<?php get_header(); ?>


<main id="main">

  <div class="container">

    <div class="inner-container mb-12">
      <div class="column">
        <h1 class="h1 pb-4 mb-4 border-b-2"><?php the_title(); ?></h1>
        <span class="italic">Published on: <?php the_date(); ?></span>
      </div>
    </div>


    <div class="inner-container flex">
      <div class="column w-full">
        
        <article class="prose prose-xl max-w-none">
          <?php the_content(); ?>
        </article>
        
      </div>
    </div>

</main>

<?php get_footer(); ?>