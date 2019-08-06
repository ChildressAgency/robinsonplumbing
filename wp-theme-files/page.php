<?php get_header(); ?>
<main id="main">
  <div class="container">
    <article class="entry-content">
      <?php
        if(have_posts()){
          while(have_posts()){
            the_post();
            the_content();
          }
        }
      ?>
    </article>
  </div>
</main>
<?php get_footer();