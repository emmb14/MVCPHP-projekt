<?php 
/**
 * This is a Anax frontcontroller.
 *
 */
 
require __DIR__.'/config_with_app.php'; 


// Create services and inject into the app. 
$di  = new \Anax\DI\CDIFactoryDefault();

$di->set('form', '\Mos\HTMLForm\CForm');

$di->setShared('db', function() {
    $db = new \Mos\Database\CDatabaseBasic();
    $db->setOptions(require ANAX_APP_PATH . 'config/database_mysql.php');
    $db->connect();
    return $db;
});

$di->set('message', function() use ($di) {
    $message = new \Isa\CMessage\CMessage($di);
	//$message->setDI($di); 
    return $message;
});


$di->set('CommentController', function() use ($di) {
    $controller = new Phpmvc\Comment\CommentController();
    $controller->setDI($di);
    return $controller;
});

$di->set('UsersController', function() use ($di) {
    $controller = new \Anax\Users\UsersController();
    $controller->setDI($di);
    return $controller;
});

$di->set('QuestionsController', function() use ($di) {
    $controller = new \Anax\Questions\QuestionsController();
    $controller->setDI($di);
    return $controller;
});

$di->set('TagsController', function() use ($di) {
    $controller = new \Anax\Tags\TagsController();
    $controller->setDI($di);
    return $controller;
});


$app = new \Anax\Kernel\CAnax($di);
//$app = new \Anax\MVC\CApplicationBasic($di);

//get configuration for the theme
$app->theme->configure(ANAX_APP_PATH . 'config/theme_eskilstuna.php');


//get configuration for the navbar
$app->navbar->configure(ANAX_APP_PATH . 'config/navbar_eskilstuna.php');

$app->session(); // Will load the session service which also starts the session




$app->router->add('', function() use ($app) {
	$app->theme->setTitle("Start");
	
	/*$content = $app->fileContent->get('me.md');
	$content = $app->textFilter->doFilter($content, 'shortcode, markdown');*/
	//$latestQuestions = $app->Question->findLatestQuestions();
	//$tags = 'Kommer snart';
	//$users = 'Kommer snart';
	
    /*$app->views->add('eskilstuna/start', [
        'questions' => $latestQuestions,
        'tags' 		=> $tags,
		'users' 	=> $users,
    ]);*/
	
	$app->dispatcher->forward([
		'controller' => 'questions',
		'action' => 'firstpage',
		'params' => [],
	]);

});
 
 
$app->router->add('about', function() use ($app) {
	$app->theme->setTitle("Om Allt om Eskilstuna");
	
	$content = $app->fileContent->get('about.md');
	$content = $app->textFilter->doFilter($content, 'shortcode, markdown');
	
    $byline  = $app->fileContent->get('byline.md');
	$byline = $app->textFilter->doFilter($byline, 'shortcode, markdown');
	
    $app->views->add('eskilstuna/page', [
        'content' => $content,
        'byline' => $byline,
    ]);
});

  
$app->router->add('source', function() use ($app) {
	$app->theme->addStylesheet('css/source.css');
	$app->theme->setTitle("Källkod");
	
	//$content = $app->fileContent->get('source.md');
	
	$source = new \Mos\Source\CSource([
        'secure_dir' => '..', 
        'base_dir' => '..', 
        'add_ignore' => ['.htaccess'],
    ]);
	
    $app->views->add('me/source', [
        'content' => $source->View(),
    ]);
});
 

$app->router->add('setup', function() use ($app) {
	
	//$app->db->setVerbose();
 
    $app->db->dropTableIfExists('user')->execute();
 
    $app->db->createTable(
        'user',
        [
            'id' => ['integer', 'primary key', 'not null', 'auto_increment'],
            'acronym' => ['varchar(20)', 'unique', 'not null'],
            'email' => ['varchar(80)'],
            'name' => ['varchar(80)'],
            'password' => ['varchar(255)'],
            'created' => ['datetime'],
            'updated' => ['datetime'],
            'deleted' => ['datetime'],
            'active' => ['datetime'],
        ]
    )->execute();
	
	$app->db->insert(
        'user',
        ['acronym', 'email', 'name', 'password', 'created', 'active']
    );
 
    $now = gmdate('Y-m-d H:i:s');
 
    $app->db->execute([
        'admin',
        'admin@dbwebb.se',
        'Administrator',
        password_hash('admin', PASSWORD_DEFAULT),
        $now,
        $now
    ]);
 
    $app->db->execute([
        'doe',
        'doe@dbwebb.se',
        'John/Jane Doe',
        password_hash('doe', PASSWORD_DEFAULT),
        $now,
        $now
    ]);
	
	$links = [
		'back' => [
			'href' => $app->url->create('users/list'),
			'text' => 'Tillbaka'
		]
	];
		
	
	$app->theme->setTitle("Återställ databas");
	$app->views->add('default/page', [
			'title' 	=> "Databasen är nu återställd",
			'content'	=> "",
			'links' 	=> $links
	]);
	
 });
 
 $app->router->add('test_message', function() use ($app) {
	$app->theme->addStylesheet('css/font-awesome/css/font-awesome.css');
	$app->theme->addStylesheet('../vendor/isa/cmessage/webroot/css/message.css'); 
	
	$app->theme->setTitle("Prova CMessage");
	
	$app->message->addInfoMessage('Detta är ett infomeddelande');
	$app->message->addErrorMessage('Detta är ett felmeddelande');
	$app->message->addSuccessMessage('Detta är ett meddelande om att allt gick bra');
	
	$messages = $app->message->printMessage(); 
	
	$app->views->add('default/page', [
		'title' => "Prova CMessage",
		'content' => "Här kan du prova om CMessage fungerar"
	]);

	$app->views->addString($messages); 
});


$app->router->handle();
$app->theme->render();