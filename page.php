<?php

namespace AcMarche\Theme;


use AcMarche\Common\Twig;
use AcMarche\Common\WpRepository;

get_header();
global $post;
global $post;

$image = null;
if (has_post_thumbnail()) {
    $images = wp_get_attachment_image_src(get_post_thumbnail_id(), 'original');
    if ($images) {
        $image = $images[0];
    }
}

$urlBack = '/';

$tags = [];
$relations = [];
$next = null;

$content = get_the_content(null, null, $post);
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);
$relations = [];

Twig::rendPage(
    'article/page.html.twig',
    [
        'post' => $post,
        'tags' => $tags,
        'image' => $image,
        'title' => $post->post_title,
        'relations' => $relations,
        'content' => $content,
        'next' => $next,
    ]
);
get_footer();
