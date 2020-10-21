<?php

namespace app;

use mysqli;
use app\DbTable;

class MyClass extends DbTable
{

    public $id = [];


    public function __construct(mysqli $mysqli, $tableName)
    {

        $this->mysqli = $mysqli;
        $this->tableName = $tableName;

        $this->result = $this->mysqli->query("SELECT `id` FROM $tableName WHERE `date`>= '5';");

        $this->id = [];
        while ($row = $this->result->fetch_assoc()) {
            $this->id[] = $row;
        }
    }
    public function add(array $data)
    {
        parent::add($data);
    }

    public function dellete()
    {

        foreach ($this->id as $row) {
            foreach ($row as $value) {
                $this->del_id = $value;
            }
        }
        $sql = "DELETE FROM `$this->tableName` WHERE `id` = $this->del_id";
        $this->mysqli->query($sql);
        return $this;
    }

    public function getArr()
    {
        foreach ($this->id as $row) {
            foreach ($row as $value) {
                $this->del_id = $value;
            }
        }

        $arrDB = $this->mysqli->query("SELECT * FROM $this->tableName WHERE `id` = $this->del_id;");

        $array = [];
        while ($row = $arrDB->fetch_assoc()) {
            $array[] = $row;
        }
        return $array;
    }
}
