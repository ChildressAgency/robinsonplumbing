<?php get_header(); ?>
<main id="main">
  <div class="container">
    <article class="entry-content">
      <?php 
        if(have_posts()){
          while(have_posts()){
            the_post();

            if(is_singular()){
              the_content();
            }
            else{
              echo '<div class="loop-item">';
                echo '<h2><a href="' . esc_url(get_permalink()) . '">' . esc_html(get_the_title()) . '</a></h2>';
                the_excerpt();
              echo '</div>';
            }
          }
        }
      ?>
    </article>
  </div>
</main>
<?php get_footer();