<?php 

get_header();

?>

<div class="entry-meta">
	
</div><!-- .entry-meta -->

<header id="begin">
	<?php if (is_home()) { ?>
		<time id="top_time">Our newest essays</time>
	<?php } ?>
</header>

<?php

get_template_part( 'loop', 'index' );

get_footer(); 

?>