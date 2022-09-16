<?php
get_header();
global $post, $wp;

// активные баннеры
$banners  = get_field('group-banners', 'option');

// Запрос на избранную франшизы
$args = [
	'posts_per_page' => 1,
	'orderby' => 'date',
	'order' => 'DESC',
	'post_type' => 'franchise',
	'meta_query' => [
		'relation' => 'AND',
		[
			'key' => 'group-franchise_is-favourite',
			'value' => 1,
		],
	],
];
$favourite = new WP_Query($args);

// Запрос на все франшизы на сайте
$args = [
	'posts_per_page' => 6,
	'orderby' => 'date',
	'order' => 'DESC',
	'post_type' => 'franchise',
	$args['tax_query'] = [
		'relation' => 'AND',
	]
];

// if (get_query_var('taxonomy') != '' && get_query_var('term') != '') {
	$args['tax_query'][] = [
		'taxonomy' => get_query_var('taxonomy'),
		'field'    => 'slug',
		'terms'    => get_query_var('term')
	];
// }

/*
if (isset($_GET['sort-popularity'])) {
	$args['tax_query'][] = [
		'taxonomy' => 'franchise-other',
		'field'    => 'slug',
		'terms'    => $_GET['sort-popularity']
	];
}
if (isset($_GET['sort-region']) && $_GET['sort-region'] != 'catalog') {
	$args['tax_query'][] = [
		'taxonomy' => 'franchise-other',
		'field'    => 'slug',
		'terms'    => $_GET['sort-region']
	];
}
if ($_GET['sort-category'] != 'catalog') {
	$args['tax_query'][] = [
		'taxonomy' => 'franchise-other',
		'field'    => 'slug',
		'terms'    => $_GET['sort-category']
	];
}
if ($_GET['sort-investment'] != 'catalog') {
	$args['tax_query'][] = [
		'taxonomy' => 'franchise-other',
		'field'    => 'slug',
		'terms'    => $_GET['sort-investment']
	];
}
*/
$franchises = new WP_Query($args);
?>

<div class="first-section favourite-franchise-section">
	<div class="container">
		<div class="section-title">Каталог франшиз</div>
		<?php if ($favourite->have_posts()) : ?>
			<div class="favourite-franchise">
				<?php while ($favourite->have_posts()) :
					$favourite->the_post();
					$favFranchise = get_field('group-franchise', $post->ID);
					$termData = getCategoryData($post->ID);
				?>
					<div class="photo">
						<img class="photo-img" src="<?= $favFranchise['cover-catalog'] ?>">
					</div>

					<div class="info">
						<div class="row-top">
							<div class="name"><?= $post->post_title ?></div>
							<div class="fr-logo">
								<img class="fr-logo-img" src="<?= $favFranchise['logo'] ?>" alt="">
							</div>
						</div>

						<div class="row-middle">
							<div class="description"><?= $favFranchise['description-short'] ?></div>
						</div>

						<div class="row-bottom">
							<div class="category" <?= $termData['style'] ?>><?= $termData['name']  ?></div>
							<div class="investment"><span class="label">Инвестиции: </span><span class="value"><?= number_format($favFranchise['investment'], 0, '.', ' ') ?></span><span class="currency"> руб.</span></div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif;
		wp_reset_postdata(); ?>
	</div>
</div>
</div>




<div class="catalog-section">
	<div class="container">
		<div class="catalog-aside">
			<div class="filter">
				<div class="selector-wrap wrap-category">
					<select class="filter-selector js-filter-selector" name="category">
						<?php
						$firstElem = [
							'title' => 'Все франшизы',
							'link' => '',
						];

						foreach (getTaxonomyItems(CATEGORY_FRANCHISES_THEMES, $firstElem) as $index => $cat) : ?>
							<option <?= $index == 0 ? 'selected' : '' ?> value="<?= $cat['link'] ?>"><?= $cat['title'] ?></option>
						<?php endforeach; ?>
					</select>
				</div>

				<div class="selector-wrap wrap-investment">
					<select class="filter-selector js-filter-selector" name="investment">
						<?php
						$firstElem = [
							'title' => 'Любая сумма',
							'link' => '',
						];

						foreach (getTaxonomyItems(CATEGORY_INVESTMENT, $firstElem) as $index => $cat) : ?>
							<option <?= $index == 0 ? 'selected' : '' ?> value="<?= $cat['link'] ?>"><?= $cat['title'] ?></option>
						<?php endforeach; ?>
					</select>
				</div>


				<?php $term = get_term_by('slug', 'top', CATEGORY_OTHER, OBJECT, 'raw'); ?>
				<div class="field-wrap <?= 'wrap-' . $term->slug . ' js-' . $term->slug ?>">
					<a href="<?= '/' . $term->taxonomy . '/' . $term->slug . '/' ?>" class="filter-field" name="<?= $term->slug ?>"><?= $term->name ?></a>
				</div>

				<?php $term = get_term_by('slug', 'cheap', CATEGORY_OTHER, OBJECT, 'raw'); ?>
				<div class="field-wrap <?= 'wrap-' . $term->slug . ' js-' . $term->slug ?>">
					<a href="<?= '/' . $term->taxonomy . '/' . $term->slug . '/' ?>" class="filter-field" name="<?= $term->slug ?>"><?= $term->name ?></a>
				</div>

				<?php $term = get_term_by('slug', 'popular', CATEGORY_OTHER, OBJECT, 'raw'); ?>
				<div class="field-wrap <?= 'wrap-' . $term->slug . ' js-' . $term->slug ?>">
					<a href="<?= '/' . $term->taxonomy . '/' . $term->slug . '/' ?>" class="filter-field" name="<?= $term->slug ?>"><?= $term->name ?></a>
				</div>
			</div>

			<?php foreach ($banners['banners'] as $banner) : ?>
				<?php if ($banner['is-active']) : ?>
					<a class="banner" href="<?= $banner['link'] ?>">
						<img class="banner-img" src="<?= $banner['picture'] ?>" alt="<?= $banner['name'] ?>">
					</a>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>



		<div class="franchises">
			<form class="sort-blocks" id="catalog-sort" method="GET">
				<div class="selector-wrap">
					<select class="filter-selector sort-popularity js-sort-popularity" name="sort-popularity">
						<?php /*
						foreach (getTaxonomyItems(CATEGORY_OTHER, []) as $index => $cat) : ?>
							<option <?= $index == 0 ? 'selected' : '' ?> value="<?= $cat['slug'] ?>"><?= $cat['title'] ?></option>
						<?php endforeach; */ ?>

						<?php /*
						foreach (getTaxonomyItems(CATEGORY_OTHER, []) as $index => $cat) : ?>
							<?php if (isset($_GET['sort-popularity'])) : ?>
								<?php if ($_GET['sort-popularity'] == $cat['slug']) : ?>
									<option selected value="<?= $cat['slug'] ?>"><?= $cat['title'] ?></option>
								<?php else : ?>
									<option <?= $index == 0 ? 'selected' : '' ?> value="<?= $cat['slug'] ?>"><?= $cat['title'] ?></option>
								<?php endif; ?>
							<?php endif; ?>
						<?php endforeach; */ ?>

						<?php foreach (getTaxonomyItems(CATEGORY_OTHER, []) as $index => $cat) : ?>
							<option <?= $index == 0 ? 'selected' : '' ?> value="<?= $cat['slug'] ?>"><?= $cat['title'] ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="selector-wrap">
					<select class="filter-selector sort-region js-sort-region" name="sort-region">
						<?php
						$firstElem = [
							'title' => 'Вся Россия',
							'link' => '/catalog/',
							'slug' => 'catalog',
						];

						foreach (getTaxonomyItems(CATEGORY_REGIONS, $firstElem) as $index => $cat) : ?>
							<option <?= $index == 0 ? 'selected' : '' ?> value="<?= $cat['slug'] ?>"><?= $cat['title'] ?></option>
						<?php endforeach; ?>
					</select>
				</div>

				<?php if (get_query_var('taxonomy') != 'franchise-category') : ?>
					<div class="selector-wrap">
						<select class="filter-selector sort-category js-sort-category" name="sort-category">
							<?php
							$firstElem = [
								'title' => 'Все франшизы',
								'link' => '/catalog/',
								'slug' => 'catalog',
							];

							foreach (getTaxonomyItems(CATEGORY_FRANCHISES_THEMES, $firstElem) as $index => $cat) : ?>
								<option <?= $index == 0 ? 'selected' : '' ?> value="<?= $cat['slug'] ?>"><?= $cat['title'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				<?php endif; ?>


				<?php if (get_query_var('taxonomy') != 'investment') : ?>
					<div class="selector-wrap">
						<select class="filter-selector sort-investment js-sort-investment" name="sort-investment">
							<?php
							$firstElem = [
								'title' => 'Любая сумма',
								'link' => '/catalog/',
								'slug' => 'catalog',
							];

							foreach (getTaxonomyItems(CATEGORY_INVESTMENT, $firstElem) as $index => $cat) : ?>
								<option <?= $index == 0 ? 'selected' : '' ?> value="<?= $cat['link'] ?>"><?= $cat['title'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				<?php endif; ?>
			</form>






			<div class="franchises-list">
				<?php
				while ($franchises->have_posts()) :
					$franchises->the_post();
					$postData = get_field('group-franchise', $post->ID);
					$termData = getCategoryData($post->ID);
				?>

					<div class="franchise">
						<div class="row-top">
							<div class="name"><?= $post->post_title ?></div>
							<div class="fr-logo"> <img class="fr-logo-img" src="<?= $postData['logo'] ?>" alt="<?= $post->post_title ?>"></div>
						</div>
						<div class="row-middle">
							<div class="photo"><img class="photo-img" src="<?= $postData['cover-catalog'] ?>" alt="Фото <?= $post->post_title ?>"></div>
						</div>
						<div class="row-bottom">
							<div class="investment"> <span class="label">Инвестиции: </span><span class="value"><?= number_format($postData['investment'], 0, '.', ' ') ?></span><span class="currency"> руб.</span></div>
							<div class="category" <?= $termData['style'] ?>><?= $termData['name'] ?></div>
							<a class="more" href="<?= get_permalink($post); ?>">Подробнее</a>
						</div>
					</div>

				<?php endwhile; ?>
			</div>


			<?php if ($franchises->max_num_pages > 1) : ?>
				<div class="show-more-wrap">
					<script>
						var ajaxurl = '<?= site_url(); ?>/wp-admin/admin-ajax.php';
						var posts_vars = '<?= serialize($franchises->query_vars); ?>';
						var current_page = <?= (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
						var max_pages = '<?= $franchises->max_num_pages; ?>';
					</script>

					<div id="loadmore-catalog" class="show-more js-show-more">Показать больше</div>
				</div>
			<?php endif; ?>

			<?php wp_reset_postdata(); ?>
		</div>
	</div>
</div>


<?php get_footer();
