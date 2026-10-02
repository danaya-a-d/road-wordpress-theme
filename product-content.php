<?php
$product_id = get_the_ID();
$product_img_src = get_the_post_thumbnail_url($product_id, 'product');
?>

<li class="solutions__item">
    <a class="solutions__img-link" href="<?php the_permalink();?>"><img class="solutions__photo"
                                                 src="<?php echo $product_img_src?>" alt=""></a>
    <a href="<?php the_permalink();?>" class="solutions__name"><?php the_title(); ?></a>
    <div class="solutions__about"><?php the_excerpt(); ?></div>
    <a href="<?php the_permalink();?>" class="solutions__link"><?php echo $GLOBALS['prod']['link']; ?></a>
</li>