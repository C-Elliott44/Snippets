<?php // Video Product Page Template 

function dhali_video_container($product) {
                                
	$product_name = $product->get_name();
	$product_sku = $product->get_sku();
	$product_url = get_permalink( $product->get_id() );
	$product_image = $product->get_image(); ?>

	<div class="product-wrap col-6 col-sm-3">
		<a href="<?php echo $product_url;?>">
			<div class="single-woo-product-thumb">
				<div>
					<?php echo $product_image;?>
				</div>
			</div>
			<div>
				<span class="product-sku">
					<?php echo $product_sku;?>
				</span>
			</div>
			<h2 class="woocommerce-loop-product__title">
				<?php echo $product_name;?>
			</h2>
		</a>
	</div>
	<?php
}?>



<?
$video_product_array = array();

$args  = array(
    'posts_per_page'  => -1,
    'offset'          => 0,
    'order'           => 'DESC',
    'post_type'       => 'product',
    'meta_key'		  => 'video_section',
    'post_status'     => 'publish',
    'suppress_filters' => true ); 

$posts = get_posts($args);
    foreach ($posts as $post) :?>
    <?php if( have_rows('video_section') ):
        while ( have_rows('video_section') ) : the_row();

            $video_src = get_sub_field('embedded_youtube_link');

            $temp_array = array(
                $video_src    =>  $post->ID,
            );

            $video_product_array = array_merge_recursive($video_product_array, $temp_array);

        endwhile;
    endif; ?>
<?php endforeach; ?>


<?php
foreach($video_product_array as $single_video => $the_product) { ?>

    <div class="row">
        <div class="col-sm-12 col-md-4">
            <div>
                <iframe width="560" height="315" src="<?php echo $single_video; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
        <div class="col-sm-12 col-md-8">
            <div class="row">
                <?php if(is_array($the_product)) {

                    foreach($the_product as $seperated_product) {
                        $product = get_product($seperated_product);
                        // Video Product Page Template function.php
                        dhali_video_container($product);
                        
                    } 

                } else {
                    $product = get_product($the_product);
                    // Video Product Page Template function.php
                    dhali_video_container($product);

                } ?>
            </div>
        </div>
    </div>
    <hr>
<?php }

?>
        


