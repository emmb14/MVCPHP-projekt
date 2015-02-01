<?php 
/**
 * This is a Anax frontcontroller.
 *
 */
 
require __DIR__.'/config_with_app.php'; 


// Create services and inject into the app. 
$di  = new \Anax\DI\CDIFactoryDefault();

$di->set('CommentController', function() use ($di) {
    $controller = new Phpmvc\Comment\CommentController();
    $controller->setDI($di);
    return $controller;
});


$app = new \Anax\Kernel\CAnax($di);

//get configuration for the theme
$app->theme->configure(ANAX_APP_PATH . 'config/theme-grid.php');


//get configuration for the navbar
$app->navbar->configure(ANAX_APP_PATH . 'config/navbar_theme_grid.php');


$app->router->add('regioner', function() use ($app) {
 
    $app->theme->addStylesheet('css/regions_demo.css');
    $app->theme->setTitle("Regioner");
 
    $app->views->addString('flash_1', 'flash_1')
               ->addString('featured-1', 'featured-1')
               ->addString('featured-2', 'featured-2')
               ->addString('featured-3', 'featured-3')
			   ->addString('flash_2', 'flash_2')
               ->addString('main_1', 'main_1')
               ->addString('main_2', 'main_2')
               ->addString('triptych-1', 'triptych-1')
               ->addString('triptych-2', 'triptych-2')
               ->addString('triptych-3', 'triptych-3');
 
});


$app->router->add('tema', function() use ($app) {
 
    //$app->theme->addStylesheet('css/regions_demo.css');
    $app->theme->setTitle("Ett nytt tema");
	
	$flash_1 = $app->fileContent->get('flash_1.md');
	$flash_1 = $app->textFilter->doFilter($flash_1, 'shortcode, markdown');

	$featured1 = $app->fileContent->get('featured1.md');
	$featured1 = $app->textFilter->doFilter($featured1, 'shortcode, markdown');
	
	$featured2 = $app->fileContent->get('featured2.md');
	$featured2 = $app->textFilter->doFilter($featured2, 'shortcode, markdown');
	
	$featured3 = $app->fileContent->get('featured3.md');
	$featured3 = $app->textFilter->doFilter($featured3, 'shortcode, markdown');
	
	$flash_2 = $app->fileContent->get('flash_2.md');
	$flash_2 = $app->textFilter->doFilter($flash_2, 'shortcode, markdown');

	
	$main_1 = $app->fileContent->get('main.md');
	$main_1 = $app->textFilter->doFilter($main_1, 'shortcode, markdown');
	
	$main_2 = $app->fileContent->get('sidebar.md');
	$main_2 = $app->textFilter->doFilter($main_2, 'shortcode, markdown');
	
	$triptych1 = $app->fileContent->get('triptych1.md');
	$triptych1 = $app->textFilter->doFilter($triptych1, 'shortcode, markdown');
	
	$triptych2 = $app->fileContent->get('triptych2.md');
	$triptych2 = $app->textFilter->doFilter($triptych2, 'shortcode, markdown');
	
	$triptych3 = $app->fileContent->get('triptych3.md');
	$triptych3 = $app->textFilter->doFilter($triptych3, 'shortcode, markdown');

	
	$app->views->add('anax-grid/flash_1', [ 'flash_1' => $flash_1], 'flash_1');
	
    $app->views->add('anax-grid/featured', [
        'featured1' => $featured1,
		'featured2' => $featured2,
		'featured3' => $featured3,
    ], 'featured'); 
	
	$app->views->add('anax-grid/flash_2', [ 'flash_2' => $flash_2], 'flash_2');
	
	$app->views->add('anax-grid/main', [ 'main' => $main_1], 'main_1');
	
	$app->views->add('anax-grid/main', [ 'main' => $main_2], 'main_2');
	
	$app->views->add('anax-grid/triptych', [
        'triptych1' => $triptych1,
		'triptych2' => $triptych2,
		'triptych3' => $triptych3,
    ], 'triptych'); 
 
});


$app->router->add('typography', function() use ($app) {
	$app->theme->setTitle("Typography");
	
    $content = $app->fileContent->get('typography.html');

    $app->views->addString($content, 'main')
               ->addString($content, 'sidebar');
	
	/*$app->views->addString('flash_1', 'flash_1')
               ->addString('featured-1', 'featured-1')
               ->addString('featured-2', 'featured-2')
               ->addString('featured-3', 'featured-3')
			   ->addString('flash_2', 'flash_2')
               ->addString('triptych-1', 'triptych-1')
               ->addString('triptych-2', 'triptych-2')
               ->addString('triptych-3', 'triptych-3')
               ->addString('footer-col-1', 'footer-col-1')
               ->addString('footer-col-2', 'footer-col-2')
               ->addString('footer-col-3', 'footer-col-3')
               ->addString('footer-col-4', 'footer-col-4');*/
});


$app->router->add('font-awesome', function() use ($app) {
	$app->theme->setTitle("Font Awesome");
	
    $main_1 = $app->fileContent->get('font-awesome-main.html');
	$sidebar = $app->fileContent->get('font-awesome-sidebar.html');

    $app->views->addString($main_1, 'main')
               ->addString($sidebar, 'sidebar');
	
	/*$app->views->addString('', 'flash_1')
               ->addString('', 'featured-1')
               ->addString('', 'featured-2')
               ->addString('', 'featured-3')
			   ->addString('', 'flash_2')
               ->addString('', 'triptych-1')
               ->addString('', 'triptych-2')
               ->addString('', 'triptych-3')
               ->addString('', 'footer-col-1')
               ->addString('', 'footer-col-2')
               ->addString('', 'footer-col-3')
               ->addString('', 'footer-col-4');*/
});

 
 
$app->router->handle();
$app->theme->render();