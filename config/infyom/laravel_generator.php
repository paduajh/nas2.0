<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Paths
    |--------------------------------------------------------------------------
    |
    */

    'path' => [

        'migration'         => database_path('migrations/'),

        'model'             => app_path('Models/PreCadastro'),

        'datatables'        => app_path('DataTables/PreCadastro'),

        'repository'        => app_path('Repositories/PreCadastro'),

        'routes'            => base_path('routes/web.php'),

        'api_routes'        => base_path('routes/api.php'),

        'request'           => app_path('Http/Requests/PreCadastro'),

        'api_request'       => app_path('Http/Requests/API/PreCadastro'),

        'controller'        => app_path('Http/Controllers/PreCadastro'),

        'api_controller'    => app_path('Http/Controllers/API/PreCadastro'),

        'api_resource'      => app_path('Http/Resources/PreCadastro'),

        'repository_test'   => base_path('tests/Repositories/PreCadastro'),

        'api_test'          => base_path('tests/APIs/PreCadastro'),

        'tests'             => base_path('tests/PreCadastro'),

        'views'             => resource_path('views/pre_cadastro'),

        'schema_files'      => resource_path('model_schemas/pre_cadastro'),

        'templates_dir'     => resource_path('infyom/infyom-generator-templates/'),

        'seeder'            => database_path('seeders/pre_cadastro'),

        'database_seeder'   => database_path('seeders/DatabaseSeeder.php'),

        'factory'           => database_path('factories/pre_cadastro'),

        'view_provider'     => app_path('Providers/ViewServiceProvider.php'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Namespaces
    |--------------------------------------------------------------------------
    |
    */

    'namespace' => [

        'model'             => 'App\Models\PreCadastro',

        'datatables'        => 'App\DataTables\PreCadastro',

        'repository'        => 'App\Repositories\PreCadastro',

        'controller'        => 'App\Http\Controllers\PreCadastro',

        'api_controller'    => 'App\Http\Controllers\API\PreCadastro',

        'api_resource'      => 'App\Http\Resources\PreCadastro',

        'request'           => 'App\Http\Requests\PreCadastro',

        'api_request'       => 'App\Http\Requests\API\PreCadastro',

        'seeder'            => 'Database\Seeders\PreCadastro',

        'factory'           => 'Database\Factories\PreCadastro',

        'repository_test'   => 'Tests\Repositories\PreCadastro',

        'api_test'          => 'Tests\APIs\PreCadastro',

        'tests'             => 'Tests\PreCadastro',
    ],

    /*
    |--------------------------------------------------------------------------
    | Templates
    |--------------------------------------------------------------------------
    |
    */

    'templates'         => 'adminlte-templates',

    /*
    |--------------------------------------------------------------------------
    | Model extend class
    |--------------------------------------------------------------------------
    |
    */

    'model_extend_class' => 'Eloquent',

    /*
    |--------------------------------------------------------------------------
    | API routes prefix & version
    |--------------------------------------------------------------------------
    |
    */

    'api_prefix'  => 'api',

    'api_version' => 'v1',

    /*
    |--------------------------------------------------------------------------
    | Options
    |--------------------------------------------------------------------------
    |
    */

    'options' => [

        'softDelete' => true,

        'save_schema_file' => true,

        'localized' => true,

        'tables_searchable_default' => true,

        'repository_pattern' => false,

        'resources' => false,

        'excluded_fields' => ['id'], // Array of columns that doesn't required while creating module
    ],

    /*
    |--------------------------------------------------------------------------
    | Prefixes
    |--------------------------------------------------------------------------
    |
    */

    'prefixes' => [

        'route' => 'precadastro',  // using admin will create route('admin.?.index') type routes

        'path' => '',

        'view' => 'precadastro',  // using backend will create return view('backend.?.index') type the backend views directory

        'public' => '',
    ],

    /*
    |--------------------------------------------------------------------------
    | Add-Ons
    |--------------------------------------------------------------------------
    |
    */

    'add_on' => [

        'swagger'       => false,

        'tests'         => false,

        'datatables'    => true,

        'menu'          => [

            'enabled'       => true,

            'menu_file'     => 'layouts/menu.blade.php',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Timestamp Fields
    |--------------------------------------------------------------------------
    |
    */

    'timestamps' => [

        'enabled'       => true,

        'created_at'    => 'created_at',

        'updated_at'    => 'updated_at',

        'deleted_at'    => 'deleted_at',
    ],

    /*
    |--------------------------------------------------------------------------
    | Save model files to `App/Models` when use `--prefix`. see #208
    |--------------------------------------------------------------------------
    |
    */
    'ignore_model_prefix' => false,

    /*
    |--------------------------------------------------------------------------
    | Specify custom doctrine mappings as per your need
    |--------------------------------------------------------------------------
    |
    */
    'from_table' => [

        'doctrine_mappings' => [],
    ],

];
