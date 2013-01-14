<?php 

get_header();

?>

<div class="entry-meta">
	
</div><!-- .entry-meta -->

<header id="begin">
	<?php if (is_home()) { ?>
		<time id="top_time">Our newest essays</time>
	<?php } ?>

	<?php if (is_tag()) { ?>
		<time id="top_time">Essays about <?php single_tag_title(); ?></time>
	<?php } ?>

	<?php if (is_search()) { ?>
		<time id="top_time">Essays containing <?php the_search_query(); ?></time>
	<?php } ?>

</header>

<?php

get_template_part( 'loop', 'index' );

get_footer(); 

?>