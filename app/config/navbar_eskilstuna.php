<?php
/**
 * Config-file for navigation bar.
 *
 */
return [

    // Use for styling the menu
    'class' => 'navbar',
 
    // Here comes the menu strcture
    'items' => [

        // This is a menu item
        'questions'  => [
            'text'  => 'Frågor',
            'url'   => $this->di->get('url')->create('questions/list'),
            'title' => 'Frågor'
        ],
		
		// This is a menu item
        'tags'  => [
            'text'  => 'Taggar',
            'url'   => $this->di->get('url')->create('tags/list'),
            'title' => 'Taggar'
        ],
		
		// This is a menu item
        'users'  => [
            'text'  => 'Användare',
            'url'   => $this->di->get('url')->create('users/list'),
            'title' => 'Användare'
        ],
		
		// This is a menu item
        'ask-question'  => [
            'text'  => 'Ställ en fråga',
            'url'   => $this->di->get('url')->create('questions/add'),
            'title' => 'Ställ en fråga'
        ],
		
    ],
 
    // Callback tracing the current selected menu item base on scriptname
    'callback' => function ($url) {
        if ($url == $this->di->get('request')->getRoute()) {
                return true;
        }
    },

    // Callback to create the urls
    'create_url' => function ($url) {
        return $this->di->get('url')->create($url);
    },
];
