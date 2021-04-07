<?php

namespace AcMarche\Theme;

use AcMarche\Common\Router;
use AcMarche\Pivot\Repository\HadesRemoteRepository;
use AcMarche\Pivot\Repository\HadesRepository;
use AcMarche\Pivot\Utils\CategoryUtils;
use VisitMarche\Theme\Lib\Twig;
use VisitMarche\Theme\Lib\WpRepository;

get_header();

$hadesRemoteRepository = new HadesRemoteRepository();
$categoryUtils = new CategoryUtils();

$closeLvl1 = $closeLvl2 = $closeLvl3 = false;

$categoryUtils->initLvl();

$item = [];
foreach ($categoryUtils->categories as $category) {

    if ($category->lvl1) {
        if ($closeLvl1 == false) {
            $categoryUtils->initLvl1($category);
            continue;
        }
        $categoryUtils->tree[] = $categoryUtils->root;
        $categoryUtils->initLvl1($category);
    }

    if ($category->lvl2) {
        $categoryUtils->addLevel2($category);
        $closeLvl1 = true;
    }

    if (preg_match("#Événements#", $category->lvl1)) {
        break;
    }
}

dump($categoryUtils->tree);

//$offres = $hadesRepository->getOffres();
//dump($offres);


get_footer();
