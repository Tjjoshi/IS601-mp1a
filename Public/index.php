<?php
/**
 * Created by PhpStorm.
 * User: toral
 * Date: 9/25/18
 * Time: 9:34 PM
 */

main::start('example.csv');
 class main{
static public function start ($filename){
    $records = csv::getRecords($filename);
    $table =html::createTable($records);
    system::printpage($table);

}
 }

 class csv {
     public static function getRecords($filename){

     }
 }

class record
{
    public function __construct(Array $fieldnames = null, Array $value = null)
    {
        foreach ($record as $property => $value) {
            $this->createProperty($property, $value);
        }
    }


    public function createProperty($name, $value)
    {
        $this->{$name} = $value;
        $name = '<th>' . $name . '</th>';
        $value = '<td>' . $value . '</td>';

    }
}


class recordFactory{
    public static function create (array $fieldNames=null , array $value=null){
        $record =new record ($fieldNames,$value);

        return $record;
    }
}


class html{
     public static function createTable($array){

     }

 }
 class system{
     public static function printPage($page){

     }

 }


