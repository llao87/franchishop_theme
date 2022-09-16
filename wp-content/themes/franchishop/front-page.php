<?php get_header(); ?>

<div class="promo">
	<div class="container">
		<div class="section-title">Каталог лучших франшиз<span class="accent">2022</span></div>
		<div class="section-subtitle">Интернет-портал, посвященный франчайзингу РФ</div>
	</div>
</div>
<div class="fast-filter">
	<div class="container">
		<div class="fast-filter-inner"> 
			<div class="title">Поброр франшизы по фильтру</div>
			<form class="form-fast-filter">
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
				<div class="selector-wrap"> 
					<select class="filter-selector sort-region js-sort-category" name="sort-region">
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
				<div class="selector-wrap"> 
					<select class="filter-selector sort-investment js-sort-category" name="sort-investment">
						<?php
						$firstElem = [
							'title' => 'Любая сумма',
							'link' => '/catalog/',
							'slug' => 'catalog',
						];

						foreach (getTaxonomyItems(CATEGORY_INVESTMENT, $firstElem) as $index => $cat) : ?>
							<option <?= $index == 0 ? 'selected' : '' ?> value="<?= $cat['slug'] ?>"><?= $cat['title'] ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<input class="btn btn-blue js-btn-send" type="submit" value="Подобрать">
			</form>
			<div class="title-row"> 
				<div class="title">Подбор по темам</div>
				<div class="show-all">Все темы</div>
			</div>
			<div class="themes"> 
				<a class="theme" href="#">Кафе и рестораны</a>
				<a class="theme" href="#">Авто</a>
				<a class="theme" href="#">Гостиницы</a>
				<a class="theme" href="#">Детские</a>
				<a class="theme" href="#">Обувь</a>
				<a class="theme" href="#">ИТ и интернет</a>
				<a class="theme" href="#">Домашний бизнес</a>
				<a class="theme" href="#">Подарки</a>
				<a class="theme" href="#">Товары для здоровья</a>
				<a class="theme" href="#">Финуслуги</a>
				<a class="theme" href="#">Производство</a>
				<a class="theme" href="#">Отдых и развлечения</a>
				<a class="theme" href="#">Товары для дома</a>
			</div>
		</div>
	</div>
</div>
<div class="top-list">
	<div class="container"> 
		<div class="title-row"> 
			<div class="title">Топовые</div>
			<div class="show-all">Все франшизы</div>
		</div>
		<div class="franchises">
			<a class="franchise" href="#">
				<div class="photo"><img src="<?= THEME_DIR . '/img/logo-invitro.jpg'?>" alt="Invitro"></div>
				<div class="title">INVITRO </div>
				<div class="more"></div>
			</a>
			<a class="franchise" href="#">
				<div class="photo"><img src="<?= THEME_DIR . '/img/logo-lifehacker.jpg'?>" alt="Lifehacker Coffee"></div>
				<div class="title">Lifehacker Coffee </div>
				<div class="more"></div>
			</a>
			<a class="franchise" href="#">
				<div class="photo"><img src="<?= THEME_DIR . '/img/logo-x-fit.jpg'?>" alt="X-Fit"></div>
				<div class="title">X-Fit </div>
				<div class="more"></div>
			</a>
			<a class="franchise" href="#">
				<div class="photo"><img src="<?= THEME_DIR . '/img/logo-burger-king.jpg'?>" alt="Burger King"></div>
				<div class="title">Burger King </div>
				<div class="more"></div>
			</a>
			<a class="franchise" href="#">
				<div class="photo"><img src="<?= THEME_DIR . '/img/logo-hot-tours.jpg'?>" alt="Сеть магазинов Горящих путевок"></div>
				<div class="title">Сеть магазинов Горящих путевок </div>
				<div class="more"></div>
			</a>
			<a class="franchise" href="#">
				<div class="photo"><img src="<?= THEME_DIR . '/img/logo-volchek.jpg'?>" alt="Булочные Вольчека"></div>
				<div class="title">Булочные Вольчека </div>
				<div class="more"></div>
			</a>
			<a class="franchise" href="#">
				<div class="photo"><img src="<?= THEME_DIR . '/img/logo-beeline.jpg'?>" alt="Билайн"></div>
				<div class="title">Билайн </div>
				<div class="more"></div>
			</a>
			<a class="franchise" href="#">
				<div class="photo"><img src="<?= THEME_DIR . '/img/logo-ozon.jpg'?>" alt="Ozon"></div>
				<div class="title">Ozon </div>
				<div class="more"></div>
			</a>
			<a class="franchise" href="#">
				<div class="photo"><img src="<?= THEME_DIR . '/img/logo-wildberries.jpg'?>" alt="Wildberries"></div>
				<div class="title">Wildberries </div>
				<div class="more"></div>
			</a>
			<a class="franchise" href="#">
				<div class="photo"><img src="<?= THEME_DIR . '/img/logo-boxberry.jpg'?>" alt="Boxberry"></div>
				<div class="title">Boxberry </div>
				<div class="more"></div>
			</a>
		</div>
	</div>
</div>
<div class="investment">
	<div class="container"> 
		<div class="title-row"> 
			<div class="title">Предполагаемый размер инвестиций</div>
			<div class="controls"> 
				<div class="investment-amount js-investment-amount">500 тыс. – 1 млн.</div>
				<div class="btn btn-blue">Подобрать</div>
			</div>
		</div>
		<div class="variants"> 
			<div class="variant variant--1"><span class="variant-text">до 500 тыс. руб</span></div>
			<div class="variant variant--2 active"><span class="variant-text">500 тыс. - 1 млн.</span></div>
			<div class="variant variant--3"><span class="variant-text">1 млн. - 5 млн.</span></div>
			<div class="variant variant--4"><span class="variant-text">Свыше 5 млн.</span></div>
		</div>
		<div class="control-row"> 
			<div class="more">Больше кейсов</div>
		</div>
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
					<div class="photo">
						<img class="photo-img" src="<?= THEME_DIR . '/img/photo-ivan-ivanov.svg'?>">
					</div>
					<div class="info"> 
						<div class="company-name">Синнабон</div>
						<div class="employee-name">Иван Иванов</div>
					</div>
				</div>
				<div class="news-photo">
					<img class="news-photo-img" src="<?= THEME_DIR . '/img/what-not-working.jpg'?>" alt="Франшиза Синнабон">
					<span class="news-franchise-logo">
						<img class="logo-img" src="<?= THEME_DIR . '/img/logo-cinnabon.png'?>" alt="Франшиза Синнабон">
					</span>
				</div>
				<div class="descriprion">Франшиза продовольственных компаний и сетей общественного питания – самый</div>
				<div class="more"></div>
			</a>

			<a class="news-item" href="#">
				<div class="author"> 
					<div class="photo">
						<img class="photo-img" src="<?= THEME_DIR . '/img/photo-ivan-ivanov.svg'?>">
					</div>
					<div class="info"> 
						<div class="company-name">Boxxberry</div>
						<div class="employee-name">Иван Иванов</div>
					</div>
				</div>
				<div class="news-photo">
					<img class="news-photo-img" src="<?= THEME_DIR . '/img/boxxberry.jpg'?>" alt="Франшиза Boxxberry">
					<span class="news-franchise-logo">
						<img class="logo-img" src="<?= THEME_DIR . '/img/logo-boxxberry.png'?>" alt="Франшиза Boxxberry">
					</span>
				</div>
				<div class="descriprion">Франшиза продовольственных компаний и сетей общественного питания – самый</div>
				<div class="more"></div>
			</a>
			<a class="news-item" href="#">
				<div class="author"> 
					<div class="photo">
						<img class="photo-img" src="<?= THEME_DIR . '/img/photo-ivan-ivanov.svg'?>">
					</div>
					<div class="info"> 
						<div class="company-name">Пятерочка</div>
						<div class="employee-name">Иван Иванов</div>
					</div>
				</div>
				<div class="news-photo">
					<img class="news-photo-img" src="<?= THEME_DIR . '/img/pyaterochka.jpg'?>" alt="Франшиза Пятерочка">
					<span class="news-franchise-logo">
						<img class="logo-img" src="<?= THEME_DIR . '/img/logo-pyaterochka.png'?>" alt="Франшиза Пятерочка">
					</span>
				</div>
				<div class="descriprion">Франшиза продовольственных компаний и сетей общественного питания – самый</div>
				<div class="more"></div>
			</a>
		</div>
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
<?php get_footer();
