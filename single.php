<?php


namespace AcMarche\Theme;

use AcMarche\Common\Twig;
use AcMarche\Common\WpRepository;

get_header();
global $post;

$image = null;
if (has_post_thumbnail()) {
    $images = wp_get_attachment_image_src(get_post_thumbnail_id(), 'original');
    if ($images) {
        $image = $images[0];
    }
}

$currentCategory = get_category_by_slug(get_query_var('category_name'));
$urlBack = get_category_link($currentCategory);

$tags = WpRepository::getTags($post->ID);
$relations = WpRepository::getRelations($post->ID);
$next = null;
if (count($relations) > 0) {
    $next = $relations[0];
}
$content = get_the_content(null, null, $post);
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);

Twig::rendPage(
    'article/show.html.twig',
    [
        'post' => $post,
        'currentCategory' => $currentCategory,
        'tags' => $tags,
        'image' => $image,
        'title' => $post->post_title,
        'relations' => $relations,
        'urlBack' => $urlBack,
        'content' => $content,
        'next' => $next,
    ]
);
get_footer();
