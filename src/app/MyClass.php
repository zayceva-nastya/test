<?php

namespace app;

use mysqli;
use app\DbTable;

class MyClass
{

    public $id = [];


    public function __construct(DBTable $dbTable, mysqli $mysqli, $tableName, $name, $surname, $date, $gender, $city)
    {
        $this->dbTable = $dbTable;
        $this->mysqli = $mysqli;
        $this->tableName = $tableName;

        $this->result =$this->mysqli->query("SELECT `id` FROM `$tableName` WHERE `name`='$name' or `surname`='$surname' or `date`='$date' or `gender`='$gender' or `city_of_birth`='$city' ;");

        $this->id = [];
        while ($row = $this->result->fetch_assoc()) {
            $this->id[] = $row;
        }
    }


    public function dellete()
    {
        if (!empty($this->id)) {
            foreach ($this->id as $row) {
                foreach ($row as $value) {
                    $this->dbTable->dell($value);
                }
            }
        }


        return $this;
    }

    public function getArr()
    {
        $array = [];

        foreach ($this->id as $row) {
            foreach ($row as $value) {

                $arrDB = $this->mysqli->query("SELECT * FROM $this->tableName WHERE `id`= '$value';");
            }
            while ($row = $arrDB->fetch_assoc()) {
                $array[] = $row;
            }
        }


        return $array;
    }
}
