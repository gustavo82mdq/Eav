<?php
/**
 * Created by PhpStorm.
 * User: gus
 * Date: 22/05/17
 * Time: 09:30
 */
declare(strict_types=1);

return [
    'tables' => [ // key => table_name
        'entity_types' => 'entity_types',
    ],
    'default_namespace' => '\Eav\Models',
    'types_location' => base_path('vendor/rinvex/attributable/src/Models/Type'),
    'maps' => [
        'fields' => [
            "Rinvex\Attributable\Models\Type\Text" => 'textarea',
            "Rinvex\Attributable\Models\Type\Boolean" => 'checkbox',
            "Rinvex\Attributable\Models\Type\Integer" => 'number',
            "Rinvex\Attributable\Models\Type\Varchar" => 'text',
            "Rinvex\Attributable\Models\Type\Datetime" => 'datetime_picker'
        ],
        'columns' => [
            "Rinvex\Attributable\Models\Type\Text" => 'text',
            "Rinvex\Attributable\Models\Type\Boolean" => 'boolean',
            "Rinvex\Attributable\Models\Type\Integer" => 'text',
            "Rinvex\Attributable\Models\Type\Varchar" => 'text',
            "Rinvex\Attributable\Models\Type\Datetime" => 'text'
        ]
    ]
];