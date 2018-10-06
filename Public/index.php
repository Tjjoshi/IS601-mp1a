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
    
}


class recordFactory{


}


class html{
     public static function createTable($array){

     }

 }
 class system{
     public static function printPage($page){

     }

 }


