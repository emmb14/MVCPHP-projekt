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
        'theme'  => [
            'text'  => 'Tema-exempel',
            'url'   => $this->di->get('url')->create('tema'),
            'title' => 'Tema-exempel'
        ],
		
		// This is a menu item
        'regions'  => [
            'text'  => 'Regioner',
            'url'   => $this->di->get('url')->create('regioner'),
            'title' => 'Regioner'
        ],
		
		// This is a menu item
        'typography'  => [
            'text'  => 'Typografi',
            'url'   => $this->di->get('url')->create('typography'),
            'title' => 'Typografi'
        ],
		
		// This is a menu item
        'font-awesome'  => [
            'text'  => 'Font-awesome',
            'url'   => $this->di->get('url')->create('font-awesome'),
            'title' => 'Font-awesome'
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
