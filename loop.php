<?php if ( ! have_posts() ) : ?>
	<article id="post-0" class="post error404 not-found">
		<h1 class="entry-title"><?php _e( 'Not Found', 'boilerplate' ); ?></h1>
		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'boilerplate' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</article><!-- #post-0 -->
<?php endif; ?>



<?php while ( have_posts() ) : the_post(); ?>
	<?php $options = get_option ( 'svbtle_options' ); ?>

	<?php 
		$post_author_from_custom_field = "Quackd"; // set default value
		foreach(get_post_custom_values("author") as $_author) {
			$post_author_from_custom_field = $_author;
		}
	?>


	<?php $kudos = get_post_meta($post->ID, '_wp-svbtle-kudos', true); 
				if ($kudos > "") { $kudos = $kudos; } else { $kudos = "0"; } ?>
				
		<article id="<?php the_ID(); ?>" class="post">

			<h2 class="entry-title"><?php print_post_title(); ?></h2>

			<div class="author-meta" style="margin-bottom:20px;">
					<p>By <?php echo $post_author_from_custom_field ?> &bull; <?php the_time('F d, Y'); ?></p>
			</div>

	<?php if ( is_home() || is_archive() || is_search() ) : // Only display excerpts for archives and search. ?>
			<?php if ( has_post_thumbnail() ) { ?> 
				<a href="<?php the_permalink(); ?>">
  					<?php the_post_thumbnail('homepage-thumbnail');	?>
  				</a>
  				<?php echo '<span class="caption">' . get_post( get_post_thumbnail_id() )->post_excerpt . '</span>';
			}?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
	<?php else : ?>
			<?php if ( has_post_thumbnail() ) { ?> 
				<a href="<?php the_permalink(); ?>">
  					<?php the_post_thumbnail('single-thumbnail');	?>
  				</a>
  				<?php echo '<span class="caption">' . get_post( get_post_thumbnail_id() )->post_excerpt . '</span>';
			}?>
			<div class="entry-content">
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'boilerplate' ) ); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'boilerplate' ), 'after' => '</div>' ) ); ?>
			</div><!-- .entry-content -->
	<?php endif; ?>

			<div class="meta-element like-button">
				<div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false"></div>
			</div>
			<div class="meta-element tweet-button">
				<a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-via="quackdcom" data-text="<?php the_title(); ?>">Tweet</a>				</div>
			</div>
			<div class="clearfix" style="margin-bottom:20px;"></div>

		<?php the_tags('', ', '); ?>

			<aside class="kudo kudoable" id="<?php the_ID(); ?>">
				<a href="?" class="kudobject">
					<div class="opening clearfix">
						<span class="circle">&nbsp;</span>
					</div>
				</a>
		
				<a href="?" class="counter">
					<span class="num"><?php echo $kudos; ?></span>
					<span class="txt">Kudos</span>
				</a>
			</aside>
		</article><!-- #post-## -->


<?php endwhile; // End the loop. Whew. ?>

<?php if (  $wp_query->max_num_pages > 1 ) : ?>

	<nav class="pagination">

		<span class="next">
			<?php next_posts_link( __( 'Continue&nbsp;&nbsp;&nbsp;→', 'boilerplate' ) ); ?>
		</span>

	  <span class="prev">
			<?php previous_posts_link( __( '←&nbsp;&nbsp;&nbsp;Newer', 'boilerplate' ) ); ?>
		</span>
	
	</nav>
<?php endif; ?>