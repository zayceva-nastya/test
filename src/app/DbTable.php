<?php

namespace app;

use mysqli;

class DbTable
{
    protected $mysqli;
    protected $tableName;
    protected $id;
    protected $name;
    protected $surname;
    protected $date;
    protected $gender;
    protected $city;


    public function __construct(mysqli $mysqli, $tableName, $id = Null, $name = Null, $surname = Null, $date = Null, $gender = Null, $city = Null)
    {
        $this->mysqli = $mysqli;
        $this->tableName = $tableName;
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->date = $date;
        $this->gender = $gender;
        $this->city = $city;

        //записывает строку в бд
        if ($name != NULL && $surname != NULL && $date != Null && $gender != Null && $city != Null) {
            $this->addd = $this->mysqli->query("INSERT INTO `$this->tableName` (`id`, `name`, `surname`, `date`, `gender`, `city_of_birth`)" .
                " VALUES (Null,'$this->name', '$this->surname', '$this->date', '$this->gender', '$this->city');");
        }
        //вернет строку из бд 
        if ($id != NULL) {
            $this->result = $this->mysqli->query("SELECT * FROM $this->tableName WHERE `id` = $this->id ;");
            $this->select = [];
            while ($row = $this->result->fetch_assoc()) {
                $this->select[] = $row;
            }
        }
    }

    //метод,выводит все записи из табл
    public function get(): array
    {
        $arrDB = $this->mysqli->query("SELECT * FROM $this->tableName;");

        $array = [];
        while ($row = $arrDB->fetch_assoc()) {
            $array[] = $row;
        }
        return $array;
    }

    // public function add2()
    // {
    //     $sql = "INSERT INTO `people` (`id`, `name`, `surname`, `date`, `sex_id`, `city_of_birth`)" .
    //         " VALUES (Null,'$this->name', '$this->surname', '$this->date', '$this->sex', '$this->city');";

    //     return $this->mysqli->query($sql);
    // }

    //метод добавления записи в таблицу(помимо конструктора)
    public function add(array $data)
    {

        $fildNames = [];

        foreach (array_keys($data) as $value) {
            $fildNames[] = $value;
        }

        $sql = "INSERT INTO `$this->tableName` (`" . implode("`, `", $fildNames) . "`)" .
            " VALUES ('" . implode("', '", $data) . "');";

        $this->mysqli->query($sql);

        return $this->mysqli->insert_id;
    }


    //метод редактирования данных 
    public function edit(int $id, array $data)
    {
        $editData = [];
        foreach ($data as $key => $value) {
            $editData[] = " `$key` = '$value' ";
        }

        $sql = "UPDATE `$this->tableName` SET " . implode(", ", $editData) . " WHERE id = $id;";
        $this->mysqli->query($sql);
        return $this;
    }

    //метод удаляет строку из таблицы БД по id
    public function dell(int $id)
    {
        $sql = "DELETE FROM `$this->tableName` WHERE `id` = $id";
        $this->mysqli->query($sql);
        return $this;
    }

    //метод, который считает возраст 
    public static function getAge($date)
    {
        return floor((time() - strtotime($date)) / (60 * 60 * 24 * 365));
    }
    public static function getGender(int $gender)
    {
        $gender  = '';
        if ($gender == 0) {
            $gender .= "муж";
        }
        if ($gender == 1) {
            $gender .= "жен";
        }
        return $gender;
    }
    //     function makeModel($ModelName){
    //         $model = new $ModelName;
    //         return  $model;
    // }
}
