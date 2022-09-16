<?php
get_header();
global $post, $wp;

// Полный список новостей
// актуальная страница
// $paged = get_query_var('page') ? get_query_var('page') : 1;
$categories = get_the_terms($post->ID, 'news-categories');

// Запрос на все новости на сайте
$args = [
	'posts_per_page' => 6,
	// 'category_name' => $sortCategoryName, // тут имя категории
	'paged' => $paged,
	'orderby' => 'date',
	'order' => 'ASC',
	'post_type' => 'news',
	// 's' => $_REQUEST['search']
];
$news = new WP_Query($args);
?>


<div class="first-section news-section">
	<div class="container">
		<h1 class="section-title"><?php the_title() ?></h1>
		<div class="news-list">
			<?php while ($news->have_posts()) :
				$news->the_post();
				$categories = get_the_terms($post->ID, 'news-categories');
				$postData = get_field('news_item_group', $post->ID); ?>

				<a class="news-item" href="<?= get_permalink($post); ?>">
					<div class="news-item-inner">
						<div class="photo">
							<img class="photo-img" src="<?= $postData['news-card']['picture'] ?>" alt="">
							<div class="category"><?= $categories[0]->name ?></div>
						</div>
						<div class="news-item-name"><?= $post->post_title ?></div>
						<div class="preview-text"><?= $postData['news-card']['short-description'] ?></div>
					</div>
					<div class="more"></div>
				</a>
			<?php endwhile; ?>
		</div>

		<div class="load-more">
			<?php if ($news->max_num_pages > 1) : ?>
				<script>
					var ajaxurl = '<?= site_url(); ?>/wp-admin/admin-ajax.php';
					var posts_vars = '<?= serialize($news->query_vars); ?>';
					var current_page = <?= (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
					var max_pages = '<?= $news->max_num_pages; ?>';
				</script>

				<div id="loadmore" class="more js-load-news">Больше новостей</div>
			<?php endif; ?>
		</div>

		<?php wp_reset_postdata(); ?>
	</div>
</div>
<div class="subscribe">
	<div class="container">
		<div class="title">Получайте новости</div>
		<div class="form-subscribe">
			<?= do_shortcode('[contact-form-7 id="5" title="Получайте новости"]') ?>
			<!-- <input class="input-text" type="text" name="email" placeholder="ваша почта"> -->
			<!-- <input class="btn btn-blue" type="submit" value="получить"> -->
			<div class="description">Вышлем на почту бесплатную подборку франшиз с инвестицией от 15 000 до 700 000 тыс. руб.</div>
		</div>
		<div class="mail-photo"></div>
	</div>
</div>

<?php get_footer();
