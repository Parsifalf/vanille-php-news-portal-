<?php

require_once CORE . '/func.php';

$db_config = require CONFIG . '/db.php';


// $db = new Db($defaultConfig);

// $db = Db::getInstance();

$db = (Db::getInstance())->getConect($db_config);


$articles = [
  1 => [
    "title" => "Как научиться программировать: пошаговое руководство",
    "description" => "Полное руководство по основам программирования для начинающих.",
    "text" => "Хотите освоить мир программирования? Начните с выбора языка, изучите основы алгоритмов и структур данных, попрактикуйтесь с простыми задачами и не бойтесь экспериментировать. Это увлекательное путешествие, которое откроет перед вами новые возможности.",
    "id" => 1,
  ],
  2 => [
    "title" => "Путешествие по Италии: лучшие места и маршруты",
    "description" => "Откройте для себя красоту Италии: от живописных Альп до лазурного побережья.",
    "text" => "Италия – страна контрастов, где история переплетается с современностью, а великолепие природы дополняется богатой культурой. Посетите Рим, Флоренцию, Венецию, насладитесь пейзажами Тосканы и Амальфийского побережья. Вдохновитесь итальянской кухней и гостеприимством местных жителей.",
    "id" => 2,
  ],
  3 => [
    "title" => "Секреты эффективной работы: как повысить продуктивность",
    "description" => "Советы и техники для повышения продуктивности и достижения большего за меньшее время.",
    "text" => "Управление временем, организация рабочего пространства, постановка целей, делегирование задач, минимизация отвлечений – все это важные элементы для повышения продуктивности. Найдите свой подход, который позволит вам работать эффективно и с удовольствием.",
    "id" => 3,
  ],
  4 => [
    "title" => "Как научиться играть на гитаре: первые шаги",
    "description" => "Простое руководство для начинающих гитаристов: от выбора инструмента до первых аккордов.",
    "text" => "Гитара – один из самых популярных музыкальных инструментов.  Изучите основные аккорды, ритм и мелодию, а также  узнайте о различных стилях игры.  Практикуйтесь регулярно, слушайте любимую музыку и получайте удовольствие от процесса обучения.",
    "id" => 4,
  ],
  5 => [
    "title" => "Кулинарные шедевры: рецепты от шеф-поваров",
    "description" => "Вдохновляющие рецепты от лучших шеф-поваров мира: от простых блюд до изысканных деликатесов.",
    "text" => "Мир кулинарии полон открытий.  Попробуйте новые вкусовые комбинации, экспериментируйте с ингредиентами, создавайте собственные кулинарные шедевры, удивляйте близких своими кулинарными талантами.",
    "id" => 5,
  ],
  6 => [
    "title" => "Психология успеха: как достичь поставленных целей",
    "description" => "Познакомьтесь с психологическими принципами, которые помогут вам достичь успеха в любой сфере жизни.",
    "text" => "Успех – это не только удача, но и результат ваших усилий, настойчивости, веры в себя. Учитесь на своих ошибках, развивайте навыки, будьте открыты новому, и вы обязательно достигнете желаемого.",
    "id" => 6,
  ],
  7 => [
    "title" => "Как выбрать идеальный подарок: советы по выбору",
    "description" => "Руководство по выбору идеального подарка для любого случая: от дня рождения до свадьбы.",
    "text" => "Выбор подарка – это настоящее искусство.  Учитывайте интересы человека, которому вы дарите подарок, его стиль жизни, а также ваш бюджет. Не бойтесь быть оригинальным и дарить нестандартные подарки.",
    "id" => 7,
  ],
  8 => [
    "title" => "Уход за кожей: секреты красоты и молодости",
    "description" => "Рекомендации по правильному уходу за кожей лица и тела: от очищения до увлажнения.",
    "text" => "Красивая и здоровая кожа – это результат правильного ухода. Используйте качественную косметику,  регулярно очищайте кожу, увлажняйте ее, защищайте от солнца,  и вы всегда будете выглядеть свежо и привлекательно.",
    "id" => 8,
  ],
  9 => [
    "title" => "Как научиться рисовать: пошаговая инструкция",
    "description" => "Руководство для начинающих художников: от выбора материалов до первых художественных работ.",
    "text" => "Рисование – это увлекательный способ выразить себя и создать собственный мир.  Изучите основы композиции, перспективы, цвета, практикуйтесь в  рисование различных объектов,  и вы сможете создавать красивые и оригинальные рисунки.",
    "id" => 9,
  ],
  10 => [
    "title" => "Как стать успешным блогером: советы и рекомендации",
    "description" => "Пошаговое руководство по созданию и развитию успешного блога: от выбора тематики до продвижения.",
    "text" => "Блогерство – это  отличный способ  делиться своими мыслями,  знаниями,  увлечениями с миром.  Создайте интересный контент,  определите свою аудиторию,  продвигайте свой блог  в социальных сетях, и у вас появится  большая аудитория  читателей.",
    "id" => 10,
  ]
];


foreach ($articles as $key => $item) {
  $articles[$key] = array_merge($item, ['slug' => slugify($item['title'])]);
}

foreach ($articles as $article) {
  $res = "INSERT INTO `posts` (`title`, `short_desc`, `full_desc`, `slug`, `dt_create`) VALUES ('{$article['title']}', '{$article['description']}', '{$article['text']}', '" . $article['slug'] . "', CURRENT_TIMESTAMP);";
  $db->query($res);
  // dump('ok');
}
