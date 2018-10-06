<?php
/**
 * Created by PhpStorm.
 * User: toral
 * Date: 9/25/18
 * Time: 9:34 PM
 */
main::start('myfile.csv');

class main{

    static public function start($filename){
        $records = csv::getRecords($filename);
       $table =html::build_table($records);
        system::printpage($table);

    }
}

class csv
{
    static public function getRecords($filename)
    {
        $file =fopen($filename,'r');
        $fields = array();
        $count = 0;

        while(! feof($file))
        {
            $record = fgetcsv($file);
            if ($count == 0) {
                $fields = $record;
            }
            else
            {
                $records[] = recordFactory::create($fields, $record);
            }
            $count++;
        }
        fclose($file);
        return $records;

    }


}
class record
{
    public function __construct(Array $fieldNames = null, Array $value = null)
    {
        $record = array_combine($fieldNames, $value);
        foreach ($record as $property => $value) {
            $this->createProperty($property, $value);
        }
    }

    public function returnArray()
    {
        $array = (array)$this;
        return $array;
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

   public static function build_table($array)
{

}
}

 class system {
    public static function printpage($page){
 echo $page;
    }
}



