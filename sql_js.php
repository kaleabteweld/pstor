<?php

require("./php/functions.php");
require("./php/python_php.php");
require("./php/sql_include.php");


function get_key($tabel){

    $INIT =  mysqli_connect("localhost","pain","pain","datapstor");


   $Q = "SELECT * FROM {$tabel}";
   $to = mysqli_query($INIT,$Q);
   $t = mysqli_fetch_assoc($to);

   return array_keys($t);

}


function read_data($query){

   $Result = [];

   $INIT =  mysqli_connect("localhost","pain","pain","datapstor");

   if ($result = mysqli_query($INIT, $query)) {
       while ($row = mysqli_fetch_row($result)) {

           array_push($Result,$row);
       }

       mysqli_free_result($result);
   }

   return $Result;
}

$key = get_key("allData");

if ((isset($_POST))) {

    if ((isset($_POST["req_Type"]))) {


        if ($_POST["req_Type"] == "column_date") {
               
            if (isset($_POST["req_Data"])) {
                      
                if (in_array($_POST["req_Data"],$key)) {

                    $data = read_data("SELECT ".$_POST["req_Data"]." FROM `alldata`");


                    $temp[$_POST["req_Data"]] = $data;
                    $temp = json_encode($temp);

                    echo "<h1 id=\"data\"> {$temp} </h1>";


                }
                else{
                    echo "<h1>no {$_POST["req_Data"]} in db </h1>";
                }
            }
            else{
                echo "<h1>no req_Data input</h1>";
            } 
        }

        if ($_POST["req_Type"] == "column_dates") {

            if (isset($_POST["req_Data"])) {
                      

                $data = read_data("SELECT ".$_POST["req_Data"]." FROM `alldata`");

                $temp[$_POST["req_Data"]] = $data;
                $temp = json_encode($temp);

                 echo "<h1 id=\"data\"> {$temp} </h1>";


            }

        }

        if ($_POST["req_Type"] == "columns") {
            
            $temp["key"] = $key;
            $temp = json_encode($temp);

             echo "<h1 id=\"data\"> {$temp} </h1>";
        }
        
        else{
            echo "<h1>unknow req_Type {$_POST["req_Type"]} </h1>";
        }
        
    }
    else{
        echo "<h1> no req_Type input</h1>";
    }
    
}



?>