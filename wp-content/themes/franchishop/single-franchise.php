<?php
get_header();
$pageData = get_field('group-franchise');
$commonData = get_field('group-company-info', 'option');
$termData = getCategoryData($post->ID);
?>

<div class="first-section franchise-section">
	<div class="container">
		<ul class="breadcrubs">
			<li class="breadcrubs-item">
				<a class="breadcrubs-link" href="/catalog">Каталог франшиз</a>
				<span class="breadcrubs-link">о франшизе</span>
			</li>
		</ul>
		<h2 class="section-title">О франшизе</h2>
		<div class="franchise-info">
			<div class="data">
				<div class="row-top">
					<div class="franchise-logo"><img class="logo-img" src="<?= $pageData['logo'] ?>" alt="Логотип ДоДо Пицца"></div>
					<div class="category" <?= $termData['style'] ?> ><?= $termData['name'] ?></div>
				</div>
				<div class="row-middle">
					<h1 class="title"><?= get_the_title() ?></h1>
					<div class="description"><?= $pageData['description-short'] ?></div>
				</div>
				<div class="row-bottom">
					<div class="investments">
						<div class="investment-item">
							<div class="title">Инвестиции:</div>
							<div class="text"><?= number_format($pageData['investment'], 0, '.', ' ') ?> руб.</div>
						</div>
						<div class="payback-period">
							<div class="title">Срок оккупаемости:</div>
							<div class="text"><?= $pageData['payback-period'] ?> мес.</div>
						</div>
					</div>
					<div class="btn btn-blue">Связаться с франчайзером</div>
				</div>
			</div>
			<div class="cover"><img class="cover-img" src="<?= $pageData['cover'] ?>" alt="Обложка франшизы ДоДо Пицца"></div>
		</div>

		<div class="franchise-counters">
			<div class="info">
				<div class="block-title">О франшизе</div>
				<div class="text"><?= $pageData['description-full'] ?></div>
			</div>

			<div class="counters">
				<?php foreach ($pageData['counters'] as $counter) : ?>
					<?php if ($counter['acf_fc_layout'] == 'counter-common') : ?>
						<div class="counter counter--common">
							<div class="digits"> <span class="digit"><?= $counter['digits'] ?></span><span class="remark"></span></div>
							<div class="text"><?= $counter['description'] ?></div>
						</div>
					<?php endif; ?>

					<?php if ($counter['acf_fc_layout'] == 'counter-price') : ?>
						<div class="counter counter--price">
							<div class="digits">
								<span class="digit"><?= $counter['digits'] ?></span>
								<span class="remark"><?= $counter['remark'] ?></span>
							</div>

							<div class="text"><?= $counter['description'] ?></div>
						</div>
					<?php endif; ?>

					<?php if ($counter['acf_fc_layout'] == 'counter-percent') : ?>
						<div class="counter counter--percents">
							<div class="digits">
								<span class="digit"><?= $counter['digits'] ?></span>
								<span class="remark">%</span>
							</div>

							<div class="text"><?= $counter['description'] ?></div>
						</div>
					<?php endif; ?>

				<?php endforeach; ?>

				<div class="controls">
					<div class="btn btn-blue">Связаться с франчайзером</div>
					<a class="presentation-link" href="<?= $commonData['presentation_pdf'] ?>">Скачать презентацию в PDF</a>
				</div>
			</div>
		</div>


		<?php if (count($pageData['advantages']) > 0) : ?>
			<div class="franchise-advantages">
				<div class="block-title">Преимущества франшизы</div>
				<div class="advantages">
					<?php foreach ($pageData['advantages'] as $advantage) : ?>
						<div class="advantage">
							<div class="icon">
								<img class="icon-img" src="<?= THEME_DIR . '/img/icon-advantage.svg' ?>" alt="Иконка преимущества">
							</div>
							<div class="text"><?= $advantage['advantage-description'] ?></div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>


		<?php if (count($pageData['steps-to-start']) > 0) : ?>
			<div class="franchise-steps">
				<div class="block-title">Что необходимо для успешного запуска...</div>
				<div class="steps">
					<?php foreach ($pageData['steps-to-start'] as $index => $step) : ?>
						<div class="step">
							<div class="icon"><?= $index + 1 ?></div>
							<div class="text"><?= $step['step-description'] ?></div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>


		<?php if (count($pageData['gallery'])) : ?>
			<div class="franchise-gallery">
				<div class="row-top">
					<div class="block-title">Фото проекта</div>
					<div class="controls js-controls">
						<div class="gallery-prev"></div>
						<div class="gallery-next"></div>
					</div>
				</div>
				<div class="swiper js-franchise-swiper">
					<div class="swiper-wrapper">
						<?php foreach ($pageData['gallery'] as $index => $slide) : ?>
							<div class="swiper-slide">
								<div class="slide-inner">
									<img class="slide-img" src="<?= $slide ?>" alt="slide <?= $index + 1 ?>">
								</div>
							</div>
						<?php endforeach; ?>

						<?php foreach ($pageData['gallery'] as $index => $slide) : ?>
							<div class="swiper-slide">
								<div class="slide-inner">
									<img class="slide-img" src="<?= $slide ?>" alt="slide <?= $index + 1 ?>">
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>


<div class="subscribe">
	<div class="container">
		<div class="title">Получайте новости</div>
		<form class="form-subscribe">
			<input class="input-text" type="text" name="email" placeholder="ваша почта">
			<input class="btn btn-blue" type="submit" value="получить">
			<div class="description">Вышлем на почту бесплатную подборку франшиз с инвестицией от 15 000 до 700 000 тыс. руб.</div>
		</form>
		<div class="mail-photo"></div>
	</div>
</div>


<div class="main-news">
	<div class="container">
		<div class="title-row">
			<div class="title">Новости франшиз</div>
			<div class="show-all">Больше кейсов</div>
		</div>

		<div class="news-list">
			<a class="news-item" href="#">
				<div class="author">
					<div class="photo"> <img class="photo-img" src="/img/photo-ivan-ivanov.svg"></div>
					<div class="info">
						<div class="company-name">Синнабон</div>
						<div class="employee-name">Иван Иванов</div>
					</div>
				</div>

				<div class="news-photo">
					<img class="news-photo-img" src="/img/what-not-working.jpg" alt="Франшиза Синнабон">
					<span class="news-franchise-logo">
						<img class="logo-img" src="/img/logo-cinnabon.png" alt="Франшиза Синнабон">
					</span>
				</div>

				<div class="descriprion">Франшиза продовольственных компаний и сетей общественного питания – самый</div>
				<div class="more"></div>
			</a>

			<a class="news-item" href="#">
				<div class="author">
					<div class="photo">
						<img class="photo-img" src="/img/photo-ivan-ivanov.svg">
					</div>

					<div class="info">
						<div class="company-name">Boxxberry</div>
						<div class="employee-name">Иван Иванов</div>
					</div>
				</div>

				<div class="news-photo">
					<img class="news-photo-img" src="/img/boxxberry.jpg" alt="Франшиза Boxxberry">
					<span class="news-franchise-logo">
						<img class="logo-img" src="/img/logo-boxxberry.png" alt="Франшиза Boxxberry">
					</span>
				</div>

				<div class="descriprion">Франшиза продовольственных компаний и сетей общественного питания – самый</div>
				<div class="more"></div>
			</a>

			<a class="news-item" href="#">
				<div class="author">
					<div class="photo">
						<img class="photo-img" src="/img/photo-ivan-ivanov.svg">
					</div>

					<div class="info">
						<div class="company-name">Пятерочка</div>
						<div class="employee-name">Иван Иванов</div>
					</div>
				</div>

				<div class="news-photo">
					<img class="news-photo-img" src="/img/pyaterochka.jpg" alt="Франшиза Пятерочка">
					<span class="news-franchise-logo">
						<img class="logo-img" src="/img/logo-pyaterochka.png" alt="Франшиза Пятерочка">
					</span>
				</div>

				<div class="descriprion">Франшиза продовольственных компаний и сетей общественного питания – самый</div>
				<div class="more"></div>
			</a>
		</div>
	</div>
</div>

<?php get_footer();
