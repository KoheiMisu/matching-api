<?php

return [
    'bulkTeamRequest' => [
        'repository'  => \App\Repository\TeamRequestRepository::class,
        'transformer' => \App\Application\Services\Transeformer\Request\TeamRequestTransformer::class,
    ],
];
