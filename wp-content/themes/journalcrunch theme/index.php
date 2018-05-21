<?php get_header(); ?>
<!-- Begin #colleft -->
			<section>
			<!-- archive-title -->
			<?php if(of_get_option('journal_box_model')!="normal"){?>
						<?php if(is_month()) { ?>
						<h1><?php _e("Archive from", "site5framework"); ?> <?php the_time('F, Y') ?></h1>
						<?php } elseif(is_category()){ ?>
						<h1><?php _e("Browsing", "site5framework"); ?> "<?php $current_category = single_cat_title("", true); ?>"</h1>
						<?php } elseif(is_tag()) { ?>
						<h1><?php _e("Tagged with", "site5framework"); ?> "<?php wp_title('',true,''); ?>"</h1>
						<?php } elseif(is_author()) { ?>
						<h1><?php _e("Articles by", "site5framework"); ?> "<?php wp_title('',true,''); ?>"</h1>
						<?php }else{?>
						<!--<h1>Browsing All Articles</h1>-->
						<?php }
					}else{?>
						<?php if(is_month()) { ?>
						<div id="archive-title">
						<?php _e("Archive from", "site5framework"); ?> <strong><?php the_time('F, Y') ?></strong>
						</div>
						<?php } ?>
						<?php if(is_category()) { ?>
						<div id="archive-title">
						<?php _e("Browsing", "site5framework"); ?> "<strong><?php $current_category = single_cat_title("", true); ?></strong>"
						</div>
						<?php } ?>
						<?php if(is_tag()) { ?>
						<div id="archive-title">
						<?php _e("Tagged with", "site5framework"); ?> "<strong><?php wp_title('',true,''); ?></strong>"
						</div>
						<?php } ?>
						<?php if(is_author()) { ?>
						<div id="archive-title">
						<?php _e(">Articles by", "site5framework");?> "<strong><?php wp_title('',true,''); ?></strong>"
						</div>
						<?php }
					} ?>
					<!-- /archive-title -->
		<?php $postindex = 1; ?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php if(of_get_option('journal_box_model')!="normal"){?>
			<article class="postBox <?php if(($postindex % 2) == 0){ echo 'lastBox';}?>">
				<div class="postBoxInner">

					<?php if(has_post_thumbnail()) { ?>
							<?php the_post_thumbnail('post-thumbnails'); ?>
						<?php } else {
							echo '<img src="'.get_bloginfo("template_url").'/images/nothumb.jpg"  alt="No Thumbnail"/>';
					}?>

					<h2><a href="<?php the_permalink() ?>" ><?php the_title(); ?></a></h2>
					<div class="excerpt"><?php  theme_excerpt(20) ?></div>
					<div class="meta"> <?php the_time('M j, Y') ?> &nbsp;&nbsp;&nbsp;<img src="<?php bloginfo('template_directory'); ?>/images/ico_post_comments.png" alt="" /> <?php comments_popup_link(__("No Comments", "site5framework"),__("1 Comment", "site5framework"),__("% Comments", "site5framework") ); ?></div>
				</div>
				<a href="<?php the_permalink() ?>" class="readMore"><?php _e("Read More", "site5framework"); ?></a>
			</article>
			<?php ++$postindex; ?>
			<?php }else{?>
				<article>
                    <header>
						<h1><a href="<?php the_permalink() ?>" ><?php the_title(); ?></a></h1>
						<div class="meta">
						 <?php the_time('M j, Y') ?> by <?php the_author_posts_link()?>&nbsp;&nbsp;&nbsp;<img src="<?php bloginfo('template_directory'); ?>/images/ico_post_comments.png" alt="" /> <?php comments_popup_link(__("No Comments", "site5framework"),__("1 Comment", "site5framework"),__("% Comments", "site5framework") ); ?>&nbsp;&nbsp;&nbsp;<img src="<?php bloginfo('template_directory'); ?>/images/ico_post_date.png" alt="" /> <?php _e("Posted under", "site5framework"); ?>:  <?php the_category(', ') ?>
						</div>
                    </header>
						<?php the_content(__('Read more &raquo;', "site5framework")); ?>
				</article>
			<?php }?>
			<?php endwhile; ?>

	<?php else : ?>

		<p><?php _e("Sorry, but you are looking for something that isn't here.", "site5framework"); ?></p>

	<?php endif; ?>
	<div style="clear:both;"></div>
			<?php if (function_exists("wpthemess_paginate")) {
				wpthemess_paginate();
			} ?>
	</section>
	<!-- End section -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
