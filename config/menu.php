<?php

return [

    [
        'title' => 'Inicio',
        'route' => 'inicio',
        'children' => [],
    ],

    [
        'title' => 'Comunicados',
        'route' => 'comunicados',
        'children' => [],
    ],

    [
        'title' => 'Institucional',

        'children' => [

            [
                'title' => 'Nuestra Historia',
                'route' => 'historia',
            ],

            [
                'title' => 'Administrativo',
                'route' => 'administrativo',
            ],

            [
                'title' => 'Junta Escolar',
                'route' => 'junta',
            ],

            [
                'title' => 'Gobierno Estudiantil',
                'route' => 'gobierno',
            ],

        ],

    ],

    [
        'title' => 'Académico',

        'children' => [

            [
                'title' => 'Publicaciones',
                'route' => 'publicaciones',
            ],

            [
                'title' => 'Reglamento',
                'route' => 'reglamento',
            ],

            [
                'title' => 'Uniforme',
                'route' => 'uniforme',
            ],

        ],

    ],

    [
        'title' => 'Calificaciones',
        'route' => 'calificaciones',
        'children' => [],
    ],

];
