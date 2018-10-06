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
       $table =html::createTable($records);
        system::printPage($table);

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

   public static function createTable($array)
{
        // start table
        $html = '<table>';
        // header row
        $html .= '<tr>';
        foreach($array[0] as $key=>$value){
            $html .= '<th>' . htmlspecialchars($key) . '</th>';
        }
        $html .= '</tr>';

        // data rows
        foreach( $array as $key=>$value){
            $html .= '<tr>';
            foreach($value as $key2=>$value2){
                $html .= '<td>' . htmlspecialchars($value2) . '</td>';
            }
            $html .= '</tr>';
        }

        // finish table and return it

        $html .= '</table>';
        return $html;


}
}

 class system {
    public static function printPage($page){
 echo $page;
    }
}



