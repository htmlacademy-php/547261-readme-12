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


$page_content = include_template('main.php', ['posts' => $posts]);
$layout_content = include_template('layout.php', ['content' => $page_content, 'user_name' => $user_name, 'title' => $title]);

print($layout_content);
