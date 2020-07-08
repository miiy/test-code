<?php

$tree = [
    [
        'id' => 1,
        'pid' => 0,
        'users' => [1,2],
        'children' => [
            [
                'id' => 2,
                'pid' => 1,
                'users' => [3,4],
                'children' => [
                    [
                        'id' => 4,
                        'pid' => 2,
                        'users' => [7,8],
                        'children' => [
                        ],
                    ]
                ],
            ],
            [
                'id' => 3,
                'pid' => 1,
                'users' => [5,6],
                'children' => [
                    [
                        'id' => 5,
                        'pid' => 3,
                        'users' => [9,10],
                        'children' => [
                        ],
                    ],
                    [
                        'id' => 6,
                        'pid' => 3,
                        'users' => [11,12],
                        'children' => [
                        ],
                    ]
                ]
            ]
        ]
    ]
];


function mergeRecursion(&$tree, &$parent = null)
{
    foreach($tree as $key => &$item) {
        if (isset($item['children']) && count($item['children']) > 0) {
            mergeRecursion($item['children'], $item);
        }
        if ($parent) {
            $parent['users'] = array_merge($parent['users'], $item['users']);
        }
    }
    return $tree;
}

$rst = mergeRecursion($tree);

print_r($rst);

/*
Array
(
    [0] => Array
        (
            [id] => 1
            [pid] => 0
            [users] => Array
                (
                    [0] => 1
                    [1] => 2
                    [2] => 3
                    [3] => 4
                    [4] => 7
                    [5] => 8
                    [6] => 5
                    [7] => 6
                    [8] => 9
                    [9] => 10
                    [10] => 11
                    [11] => 12
                )

            [children] => Array
                (
                    [0] => Array
                        (
                            [id] => 2
                            [pid] => 1
                            [users] => Array
                                (
                                    [0] => 3
                                    [1] => 4
                                    [2] => 7
                                    [3] => 8
                                )

                            [children] => Array
                                (
                                    [0] => Array
                                        (
                                            [id] => 4
                                            [pid] => 2
                                            [users] => Array
                                                (
                                                    [0] => 7
                                                    [1] => 8
                                                )

                                            [children] => Array
                                                (
                                                )

                                        )

                                )

                        )

                    [1] => Array
                        (
                            [id] => 3
                            [pid] => 1
                            [users] => Array
                                (
                                    [0] => 5
                                    [1] => 6
                                    [2] => 9
                                    [3] => 10
                                    [4] => 11
                                    [5] => 12
                                )

                            [children] => Array
                                (
                                    [0] => Array
                                        (
                                            [id] => 5
                                            [pid] => 3
                                            [users] => Array
                                                (
                                                    [0] => 9
                                                    [1] => 10
                                                )

                                            [children] => Array
                                                (
                                                )

                                        )

                                    [1] => Array
                                        (
                                            [id] => 6
                                            [pid] => 3
                                            [users] => Array
                                                (
                                                    [0] => 11
                                                    [1] => 12
                                                )

                                            [children] => Array
                                                (
                                                )

                                        )

                                )

                        )

                )

        )

)
*/