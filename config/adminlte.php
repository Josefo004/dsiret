<?php

return [

    /*
    |--------------------------------------------------------------------------
    | SERVIDOR
    |--------------------------------------------------------------------------
    |
    */
    'host' => $_SERVER['SERVER_NAME'] ,
    //'host' => 'http://localhost/template_app9/public/', //Habilitar en local (revisar luego JOSE)
    //'host' => 'http://192.168.14.49/archivos/public/', //Habilitar para subir a la red GADCH y cambiar IP + nombre de aplicacion
    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#61-title
    |
    */

    'title' => 'SIRET',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#62-favicon
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#63-logo
    |
    */

    'logo' => '<b>SIRET</b>',
    'logo_img' => 'images/logo_app_gadch.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'Nombre aplicacion',
    'user_login_img' => 'images/users/user.png',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#64-user-menu
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => true,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => true,
    'usermenu_desc' => true,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#71-layout
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => true,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#721-authentication-views-classes
    |
    */

    'classes_auth_card' => '' ,//'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#722-admin-panel-classes
    |
    */

    'classes_body' => '', //Clases extra para el body
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4 gadch-22',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light navbar-gadch', //navbar-light
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#73-sidebar
    |
    */

    'sidebar_mini' => true,
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#74-control-sidebar-right-sidebar
    |
    */

    'right_sidebar' => false, //Panel derecho
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#65-urls
    |
    */

    'use_route_url' => false,

    'dashboard_url' => 'home',

    'logout_url' => 'logout',

    'login_url' => 'login',

    'register_url' => false, //'register',

    'password_reset_url' => false, //'password/reset',

    'password_email_url' => false, //'password/email',

    'profile_url' => 'perfil',

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#92-laravel-mix
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#8-menu-configuration
    |
    */

    'menu' => [
        [
            'text'    => 'REPORTES',
            'icon'    => 'fa fa-info',
            'submenu' => [
                [
                    'text' => 'personas',
                    'icon' => 'fa fa-users',
                    'url'  => 'siret/formularios'
                ],
                [
                    'text' => 'Trabajos',
                    'icon' => 'fa fa-folder',
                    'url'  => 'siret/trabajos'
                ],
            ],
        ],
        [
            'text'    => 'EMPRESAS',
            'icon'    => 'fa fa-home',
            'submenu' => [
                [
                    'text' => 'Empresas',
                    'icon' => 'fa fa-users',
                    'url'  => 'siret/empresas'
                ],
                [
                    'text' => 'Trabajos',
                    'icon' => 'fa fa-folder',
                    'url'  => 'siret/trabajos'
                ],
            ],
        ],
        [
            'text'    => 'CONFIGURACION',
            'icon'    => 'fa fa-cogs',
            'can'  => ['config-emp'],
            'submenu' => [
                [
                    'text' => 'Perfil Empresa',
                    'url'  => 'empresa',
                    'icon'    => 'fa fa-building',
                    'can'  => 'config-emp',
                ],
            ],
        ],
        [
            'text'    => 'ADMINISTRACIÓN',
            'icon'    => 'fa fa-home',
            'can'  => ['view-users','view-roles'],
            'submenu' => [
                [
                    'text' => 'Usuarios',
                    'icon' => 'fa fa-users',
                    'url'  => 'administracion/usuarios',
                    'can'  => 'view-users',
                ],
                [
                    'text' => 'Roles',
                    'icon' => 'fa fa-book',
                    'url'  => 'administracion/roles',
                    'can'  => 'view-roles',
                ],
                [
                    'text' => 'Actividad',
                    'icon' => 'fa fa-users',
                    'url'  => 'administracion/actividad',
                    'can'  => '',
                ],
            ],
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#83-custom-menu-filters
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#91-plugins
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' =>true,
                    'location' => 'plugins/datatables/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'plugins/datatables/dataTables.bootstrap5.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'plugins/datatables/dataTables.bootstrap5.min.css',
                ],
            ],
        ],
        'Search Builder Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'plugins/searchbuilder100/js/dataTables.searchBuilder.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => 'plugins/searchbuilder100/css/searchBuilder.dataTables.min.css',
                ],
            ],
        ],
        'datatablesbutton' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'plugins/buttons165/js/dataTables.buttons.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'plugins/buttons165/pdfmake/0.1.53/pdfmake.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'plugins/buttons165/pdfmake/0.1.53/vfs_fonts.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'plugins/buttons165/jszip/jszip.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'plugins/buttons165/js/buttons.html5.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'plugins/buttons165/js/buttons.print.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => 'plugins/buttons165/css/buttons.dataTables.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'plugins/select2/403/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'plugins/select2/403/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'plugins/sweetalert2/sweetalert2.all.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'plugins/sweetalert2/sweetalert2.min.css',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
        'toastr' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'plugins/toastr/toastr.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'plugins/toastr/toastr.min.js',
                ],
            ],
        ],
        'cropperjs' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'plugins/cropperjs/cropper.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'plugins/cropperjs/cropper.min.js',
                ],
            ],
        ],
        'iCheck' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'plugins/iCheck/square/blue.css',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'plugins/iCheck/icheck.min.js',
                ],
            ],
        ],
        'axios' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'plugins/axios/axios.min.js',
                ],
            ],
        ],
        'bootstrap' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' =>true,
                    'location' => 'vendor/bootstrap5/css/bootstrap.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/bootstrap5/js/bootstrap.bundle.js',
                ],
            ],
        ],
        'gadch' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' =>true,
                    'location' => 'js/script.js',
                ],
                /*
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'css/app.css',
                ],*/
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'css/style.css',
                ],
            ],
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#93-livewire
    */

    'livewire' => false,
];
