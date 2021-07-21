<?php

use Crystal\PriorityStrategy\SortByDateCreatedPriorityStrategy;
use Crystal\RangeStrategy\UniqueIdRangeStrategy;
use Crystal\Test\Mock\Task\SuccessTask;

return [
    'enable' => true,
    'maxExecutionSlots' => 3,
    'maxErrorTries' => 5,
    'applicationPhpFile' => '/foo/bar.php',
    'sleepTimeSeconds' => 1,
    'runTimeSeconds' => 60,
    'priorityStrategy' => SortByDateCreatedPriorityStrategy::class,
    'mainProcesses' => [
        [
            'name' => 'SuccessTask',
            'tasks' => [
                [
                    'class' => SuccessTask::class,
                ],
            ],
        ],
    ],
    'tasks' => [
        [
            'class' => SuccessTask::class,
            'timeout' => 60,
            'cooldown' => 60,
            'resources' => 2,
            'entityUid' => 'some.id',
            'rangeStrategy' => UniqueIdRangeStrategy::class,
        ],
    ],
];