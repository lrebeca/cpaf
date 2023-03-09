    <?php

    return [

        /*
        |--------------------------------------------------------------------------
        | Title
        |--------------------------------------------------------------------------
        |
        | Here you can change the default title of your admin panel.
        |
        | For detailed instructions you can look the title section here:
        | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
        |
        */

        'title' => '',
        'title_prefix' => '',
        'title_postfix' => '| CPCF',

        /*
        |--------------------------------------------------------------------------
        | Favicon
        |--------------------------------------------------------------------------
        |
        | Here you can activate the favicon.
        |
        | For detailed instructions you can look the favicon section here:
        | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
        |
        */

        'use_ico_only' => true,
        'use_full_favicon' => false,

        /*
        |--------------------------------------------------------------------------
        | Logo
        |--------------------------------------------------------------------------
        |
        | Here you can change the logo of your admin panel.
        |
        | For detailed instructions you can look the logo section here:
        | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
        |
        */

        'logo' => '<b>Admin</b>CPCF',
        'logo_img' => 'vendor/adminlte/dist/img/80sin.png',
        'logo_img_class' => 'brand-image img-circle elevation-3',
        'logo_img_xl' => null,
        'logo_img_xl_class' => 'brand-image-xs',
        'logo_img_alt' => 'AdminCPCF',

        /*
        |--------------------------------------------------------------------------
        | User Menu
        |--------------------------------------------------------------------------
        |
        | Here you can activate and change the user menu.
        |
        | For detailed instructions you can look the user menu section here:
        | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
        |
        */

        // parte de la administracion del perfil de usuario

        'usermenu_enabled' => true,
        'usermenu_header' => true,
        'usermenu_header_class' => 'bg-danger',
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
        | For detailed instructions you can look the layout section here:
        | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
        |
        */

        // Parte de la administracion del nav de costado

        'layout_topnav' => null,
        'layout_boxed' => null,
        'layout_fixed_sidebar' => true,
        'layout_fixed_navbar' => true,
        'layout_fixed_footer' => null,
        'layout_dark_mode' => null,

        /*
        |--------------------------------------------------------------------------
        | Authentication Views Classes
        |--------------------------------------------------------------------------
        |
        | Here you can change the look and behavior of the authentication views.
        |
        | For detailed instructions you can look the auth classes section here:
        | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
        |
        */

    // Esto es de la parte del login del usuario 

        'classes_auth_card' => 'card-outline card-primary',
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
        | For detailed instructions you can look the admin panel classes here:
        | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
        |
        */

        'classes_body' => '',
        'classes_brand' => '',
        'classes_brand_text' => '',
        'classes_content_wrapper' => '',
        'classes_content_header' => '',
        'classes_content' => '',
        'classes_sidebar' => 'sidebar-dark-danger elevation-4', // El danger es el color activo en este caso el rojo podemos cambiar
        'classes_sidebar_nav' => '',
        'classes_topnav' => 'navbar-white navbar-light',
        'classes_topnav_nav' => 'navbar-expand',
        'classes_topnav_container' => 'container',

        /*
        |--------------------------------------------------------------------------
        | Sidebar
        |--------------------------------------------------------------------------
        |
        | Here we can modify the sidebar of the admin panel.
        |
        | For detailed instructions you can look the sidebar section here:
        | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
        |
        */

        'sidebar_mini' => 'lg',
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
        | For detailed instructions you can look the right sidebar section here:
        | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
        |
        */

        'right_sidebar' => false,
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
        | For detailed instructions you can look the urls section here:
        | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
        |
        */

        'use_route_url' => false,
        'dashboard_url' => '/',
        'logout_url' => 'logout',
        'login_url' => 'login',
        'register_url' => 'register',
        'password_reset_url' => 'password/reset',
        'password_email_url' => 'password/email',
        'profile_url' => false,

        /*
        |--------------------------------------------------------------------------
        | Laravel Mix
        |--------------------------------------------------------------------------
        |
        | Here we can enable the Laravel Mix option for the admin panel.
        |
        | For detailed instructions you can look the laravel mix section here:
        | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
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
        | For detailed instructions you can look here:
        | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
        |
        */

        'menu' => [
            // Navbar items:
            [
                'type'         => 'navbar-search',
                'text'         => 'search',
                'topnav' => true,
            ],
            [
                'type'         => 'fullscreen-widget',
                'topnav_right' => true,
            ],

            // Sidebar items:
            [
                'type' => 'sidebar-menu-search',
                'text' => 'search',
            ],
            [
                'text' => 'blog',
                'url'  => 'admin/blog',
                'can'  => 'manage-blog',
            ],
            [
                'text'        => 'Panel',
                'route'         => 'admin.index',
                'icon'        => 'fas fa-fw fa-tachometer-alt',
                'label_color' => 'success',
                'can'         => 'Ver dashboard'
            ],

            ['header' => 'ADMINISTRADOR'],
            [
                'text' => 'Perfil ',
                'route'  => 'admin.profiles.index', 
                'icon' => 'fas fa-fw fa-user',
                'active' =>['admin/profiles*'],
                'icon_color' => 'warning'
            ],
            [
                'text' => 'Usuarios ',
                'route'  => 'admin.users.index',
                'icon' => 'fas fa-fw fa-users',
                'can'   => 'Leer Usuarios',
                'active' =>['admin/users*'],
                'icon_color' => 'warning'
            ],
            [
                'text' => 'Roles',
                'route' => 'admin.roles.index',
                'icon' => 'fas fa-fw fa-users-cog',
                'can' => 'Leer Role',
                'active' => ['admin/roles*'],
                'icon_color' => 'warning'
            ],
            // [
            //     'text' => 'Perfil ',
            //     'route'  => 'admin.profiles.index',
            //     'icon' => 'fas fa-fw fa-users',
            //     'active' =>['admin/profiles*']
            // ],
            //  [
            //     'text' => 'Perfiles de usuarios ',
            //     'route'  => 'admin.exhibitors.index',
            //     'icon' => 'fas fa-fw fa-users',
            //     'active' =>['admin/profiles*']
            //  ],

            //Esto es el multi nivel
            ['header' => 'OPCIONES DE EVENTOS'],

            [
                'text'    => 'Eventos',
                'icon'    => 'far fa-fw fa-calendar-alt',
                'route'  => 'admin.events.index',
                'can'   => 'Leer Eventos',
                'active' => ['admin/events*'],
                'icon_color' => 'primary'
            ],
            [
                'text' => 'Mas detalles',
                'icon' => 'far fa-fw fa-plus-circle', 
                'submenu' => [
                    [
                        'text' => 'Información',
                        'route'  => 'admin.details.index',
                        'icon' => 'fas fa-fw fa-info',
                        'can'   => 'Leer Detalles',
                        'icon_color' => 'info'
                    ],
                    [
                        'text'=> 'Documentos',
                        'route' => 'admin.documents.index',
                        'icon' => 'far fa-fw fa-folder-open',
                        'can' => 'Leer Documentos',
                        'icon_color' => 'info'
                    ],
                ],
            ],
            [
                'text' => 'Organizadores',
                'route'  => 'admin.organizers.index',
                'icon' => 'fas   fa-fw fa-sitemap',
                'active' => ['admin/organizers*'],
                'can'   => 'Leer Organizadores',
                'icon_color' => 'primary'
            ],
            [
                'text' => 'Provincias',
                'route'  => 'admin.provinces.index',
                'icon' => 'fas fa-fw fa-map-marked-alt',
                'active' => ['admin/provinces*'],
                'can'   => 'Leer Provincias',
                'icon_color' => 'primary'
            ],

            //Fin multinivel
            [
                'header' => 'OPCIONES DE PARTICIPANTES',
            ],

            [
                'text' => 'Pendientes de revisión',
                'route'  => 'admin.students.enviado.index',
                'icon' => 'fas fa-fw fa-exclamation-circle',
                'can' => 'Leer Participantes Pendientes',
                'icon_color' => 'danger'
            ],
            [
                'text' => 'Participantes aprobados',
                'route'  => 'admin.students.aprobado.index',
                'icon' => 'fas fa-fw fa-check-circle',
                'can' => 'Leer Participantes Aprobados',
                'icon_color' => 'danger'
            ],
            [
                'text' => 'Participantes Rechazados',
                'route'  => 'admin.students.rechazado.index',
                'icon' => 'fas fa-fw fa-times-circle',
                'can' => 'Leer Participantes Rechazados',
                'icon_color' => 'danger'
            ],
            ['header' => 'CERTIFICACIONES '],
            [
                'text' => 'Certificados',
                'route' => 'admin.certificates.index',
                'icon' => 'fas fa-fw fa-certificate',
                'can'   => 'Leer Certificados',
                'icon_color' => 'info'
            ],
            [
                'text' => 'Imagenes',
                'route' => 'admin.images.index',
                'icon' => 'far fa-fw fa-images',
                'can'   => 'Leer Imagenes',
                'icon_color' => 'info'
            ],
            ['header' => ''],
            [
                'text' => 'Copias de seguridad',
                'route' => 'admin.backups.index',
                'icon' => 'fas fad fa-database',
                'can'   => 'Leer Usuarios',
                'icon_color' => 'light'
            ],
            ['header' => ''],
        ],

        /*
        |--------------------------------------------------------------------------
        | Menu Filters
        |--------------------------------------------------------------------------
        |
        | Here we can modify the menu filters of the admin panel.
        |
        | For detailed instructions you can look the menu filters section here:
        | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
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
        | For detailed instructions you can look the plugins section here:
        | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
        |
        */

        'plugins' => [
            'Datatables' => [
                'active' => true,
                'files' => [
                    [
                        'type' => 'js',
                        'asset' => false,
                        'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                    ],
                    [
                        'type' => 'js',
                        'asset' => false,
                        'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                    ],
                    [
                        'type' => 'css',
                        'asset' => false,
                        'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                    ],
                ],
            ],
            'Select2' => [
                'active' => false,
                'files' => [
                    [
                        'type' => 'js',
                        'asset' => false,
                        'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                    ],
                    [
                        'type' => 'css',
                        'asset' => false,
                        'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
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
                        'location' => 'vendor/sweetalert2/sweetalert2.all.min.js',
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
        ],

        /*
        |--------------------------------------------------------------------------
        | IFrame
        |--------------------------------------------------------------------------
        |
        | Here we change the IFrame mode configuration. Note these changes will
        | only apply to the view that extends and enable the IFrame mode.
        |
        | For detailed instructions you can look the iframe mode section here:
        | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
        |
        */

        'iframe' => [
            'default_tab' => [
                'url' => null,
                'title' => null,
            ],
            'buttons' => [
                'close' => true,
                'close_all' => true,
                'close_all_other' => true,
                'scroll_left' => true,
                'scroll_right' => true,
                'fullscreen' => true,
            ],
            'options' => [
                'loading_screen' => 1000,
                'auto_show_new_tab' => true,
                'use_navbar_items' => true,
            ],
        ],

        /*
        |--------------------------------------------------------------------------
        | Livewire
        |--------------------------------------------------------------------------
        |
        | Here we can enable the Livewire support.
        |
        | For detailed instructions you can look the livewire here:
        | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
        |
        */

        'livewire' => false,
    ];
