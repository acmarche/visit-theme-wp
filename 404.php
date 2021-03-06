<?php

namespace AcMarche\Theme;

use AcMarche\Common\Router;
use VisitMarche\Theme\Lib\Twig;

get_header();

$url = Router::getCurrentUrl();
Twig::rendPage(
    'errors/404.html.twig',
    [
        'title' => '404',
        'posts' => [],
        'url' => $url,
    ]
);

get_footer();
