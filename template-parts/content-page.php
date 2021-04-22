<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package oa-experimental
 */

if( have_rows('banner') ):

    // loop through the rows of data
    while ( have_rows('banner') ) : the_row();

        if( get_row_layout() == 'banner' ):
            $featured_image = get_sub_field('featured_image');
            $slogan = get_sub_field('slogan');
            $message = get_sub_field('message');
            $description = get_sub_field('description');
        ?>
            <div class="banner">
                <div class="banner__column banner__column-image-cover">
                    <img src="<?php echo esc_url($featured_image['url']); ?>" class="banner__featured-image" alt="<?php echo esc_attr($featured_image['alt']); ?>">
                    <h1 class="banner__text-large"><?php echo $slogan; ?></h1>
                </div>
                <div class="banner__column banner__column-solid-color">
                    <h2 class="banner__text-medium"><?php echo $message; ?></h2>
                    <p class="banner__text-normal"><?php echo $description; ?></p>
                </div>
            </div>
<?php
        endif;
    endwhile;

else :
    ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        </header><!-- .entry-header -->

        <?php oa_experimental_post_thumbnail(); ?>

        <div class="entry-content">
            <?php
            the_content();

            wp_link_pages(
                array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'oa-experimental' ),
                    'after'  => '</div>',
                )
            );
            ?>
        </div><!-- .entry-content -->

    </article><!-- #post-<?php the_ID(); ?> -->
<?php
endif;

?>



