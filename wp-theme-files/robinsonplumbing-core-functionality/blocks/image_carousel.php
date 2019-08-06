<?php
/**
 * Image Carousel block template
 */

//$id = 'service-carousel-' . $block['id'];

$images = get_field('service_carousel_images');
?>
<div id="service-carousel" class="carousel slide carousel-heights" data-ride="carousel">
  <ol class="carousel-indicators">
    <?php $i = 0; foreach($images as $image): ?>
      <li data-target="#service-carousel" data-slide-to="<?php echo $i; ?>"<?php if($i == 0){ echo ' class="active"'; } ?>></li>
    <?php $i++; endforeach; reset($images); ?>
  </ol>

  <div class="carousel-inner">
    <?php $i = 0; foreach($images as $image): ?>
      <div class="carousel-item<?php if($i == 0){ echo ' active'; } ?>">
        <img src="<?php echo esc_url($image['url']); ?>" class="img-fluid d-block mx-auto" alt="<?php echo esc_attr($image['alt']); ?>" />
      </div>
    <?php $i++; endforeach; ?>
  </div>
</div> 