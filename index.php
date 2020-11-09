<?php

include 'src/autoload.php';

use app\DbTable;
use app\MyClass;

// записываем пользователей

// $person = new DbTable(
//     new mysqli(
//         "localhost",
//         "root",
//         "root",
//         "test"
//     ),
//     "people",
//     NULL,
//     'Serg',
//     'TRUE',
//     '25',
//     'муж',
//     'Vitebsk'
// );

//вернет пользователя с id = 14


// print_r($person1->select);

//

$table1 = new DbTable(
    new mysqli(
        "localhost",
        "root",
        "root",
        "test"
    ),
    "people",
);
//добавит еще одного человека в табл
// $table->add([
//     "name" => "Misha",
//     "surname" => "Zajcev",
//     "date" => '2015-09-30',
//     "gender" => 0,
//     "city_of_birth" => 'Vitebsk'
// ]);

// $table1->edit(
//     98,
//     [
//         "name" => "nins",
//         "date" => $table1::getAge('1998-12-12'),
//         "gender" => $table1::getGender('1')
//     ]
// );
//удалит пользователя с id=62
// $table1->dell(62);

echo "<pre>";
// print_r($table->get());


if (class_exists('app\DbTable')) {
    $table3  = new MyClass(
        $table1,
        new mysqli(
            "localhost",
            "root",
            "root",
            "test"
        ),
        "people",
        'Serg',
        NULL,
        NULL,
        NULL,
        NULL
    );
    // $table3->dellete();

    //вернет список id по указанному условию
    print_r($table3->id);
    print_r($table3->getArr());
} else {
    echo "error";
}

// $table2->dellete();
// print_r($table2->get());


print_r($table1->formater([
    "name" => "Serg",
    "surname" => "Zajcev",
    "date" => '21',
    "gender" => '0',
    "city_of_birth" => 'Vitebsk'
]));

print_r($table1->get());