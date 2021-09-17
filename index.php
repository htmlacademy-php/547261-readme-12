<?
require_once 'helpers.php';
$is_auth = rand(0, 1);


$user_name = 'Дмитрий'; // укажите здесь ваше имя
$title = 'readme: блог, каким он должен быть';

$posts = [
	[
		'title' => 'Цитата',
		'type' => 'post-quote',
		'content' => 'Мы в жизни любим только раз, а после ищем лишь похожих',
		'name' => 'Лариса',
		'avatar' => 'userpic-larisa-small.jpg'

	],
	[
		'title' => 'Игра престолов',
		'type' => 'post-text',
		'content' => 'Не могу дождаться начала финального сезона своего любимого сериала! ',
		'name' => 'Владик',
		'avatar' => 'userpic.jpg'

	],
	[
		'title' => 'Наконец, обработал фотки!',
		'type' => 'post-photo',
		'content' => 'rock-medium.jpg',
		'name' => 'Виктор',
		'avatar' => 'userpic-mark.jpg'

	],
	[
		'title' => 'Моя мечта',
		'type' => 'post-photo',
		'content' => 'coast-medium.jpg',
		'name' => 'Лариса',
		'avatar' => 'userpic-larisa-small.jpg'

	],
	[
		'title' => 'Лучшие курсы',
		'type' => 'post-link',
		'content' => 'www.htmlacademy.ru',
		'name' => 'Владик',
		'avatar' => 'userpic.jpg'
	]
];


function cropText($text, $maxTextLength)
{
	$text = explode(' ', $text);
	$lengthText = 0;
	$result = [];
	$readMore = null;

	foreach ($text as $word) {
		$lengthText += strlen($word);
		$result[] = $word;
		if ($lengthText > $maxTextLength) {
			$readMore = '... </p> <p> <a class="post-text__more-link" href="#">Читать далее</a>';
			break;
		}
	}
	return implode(' ', $result) . $readMore;
};

function сalculate_elapsed_time($date)
{
	$time_now = date_create('now');
	$time_post =  date_create($date);
	$diff = date_diff($time_post, $time_now);
	$minutes = $diff->format('%i');
	$hours = $diff->format('%h');
	$days = $diff->format('%d');
	$months = $diff->format('%m');
	$weeks = floor($days / 7);


	$minutes_plural_form = get_noun_plural_form($minutes, "минута", "минуты", "минут");
	$hours_plural_form = get_noun_plural_form($hours, "час", "часа", "часов");
	$days_plural_form = get_noun_plural_form($days, "день", "дня", "дней");
	$weeks_plural_form = get_noun_plural_form($weeks, "неделя", "недели", "недель");
	$months_plural_form = get_noun_plural_form($months, "месяц", "месяца", "месяцев");

	if ($months) {
		return "$months $months_plural_form назад";
	} elseif ($weeks) {
		return "$weeks $weeks_plural_form назад";
	} elseif ($days) {
		return "$days $days_plural_form назад";
	} elseif ($hours) {
		return "$hours $hours_plural_form назад";
	} else {
		return "$minutes $minutes_plural_form назад";
	}
}



$page_content = include_template('main.php', ['posts' => $posts]);
$layout_content = include_template('layout.php', ['content' => $page_content, 'user_name' => $user_name, 'title' => $title]);

print($layout_content);
