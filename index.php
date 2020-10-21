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
//     14,
//     'Kate',
//     'Fifa',
//     '1999-02-25',
//     '1',
//     'Vitebsk'
// );

//вернет пользователя с id = 14


print_r($person1->select);

//

$table = new DbTable(
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

$table->edit(
    67,
    [
        "name" => "nins",
        "date" => $table::getAge('2015-09-30'),
        "gender" => $table::getGender('1')
    ]
);
//удалит пользователя с id=62
$table->dell(62);

echo "<pre>";
// print_r($table->get());


if (class_exists('app\DbTable')) {
    $table2  = new MyClass(
        new mysqli(
            "localhost",
            "root",
            "root",
            "test"
        ),
        "people"
    );

    //вернет список id по указанному условию
    // print_r($table2->id);

    // $table2->add([
    //         "name" => "Olha",
    //         "surname" => "Ivanova",
    //         "date" => '1985-09-30',
    //         "gender" => 1,
    //         "city_of_birth" => 'Vitebsk'
    //     ]);

    print_r($table2->get());
} else {
    echo "error";
}

// $table2->dellete();
print_r($table2->getArr());
