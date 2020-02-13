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


function search($Price = "1000",$t ="phone"){

    settype($Price,"integer");
    $min = 1000 ;
    if ($Price >= 6000) {
       $min = $Price - 5000; 
    }
    $max = $Price + 5000;
    if ($max >= 50000) {
        $max = 50000;
    }
    $DATA = [];

    // echo "<br>";
    // echo $min;
    // echo "<br>";
    // echo $max;
    // echo "<br>";

    $con_row_data = 0;
    $con_main_data = 0;
    $INIT = mysqli_connect("localhost","pain","pain","datapstor");
    $row_data = read_data("SELECT * FROM `alldata` WHERE {$max} >= `Price` AND `Price` >= {$min} AND `Type` = '{$t}' ");

    if (len($row_data) == 0) {
        return "none";
    }
    
    $key = get_key("allData");
    $link = "";
    while(len($row_data) != $con_row_data){
        while (len($row_data[$con_row_data]) != $con_main_data) {   
               
            $data = $row_data[$con_row_data][$con_main_data];
            $print = str_replace("_"," ", $data);    
            
            // echo $data;
            $con_main_data++;
           
            if (len($row_data[$con_row_data]) != $con_main_data) {
                array_push($DATA,$row_data[$con_row_data]);
                 break;
            }
        }
        $con_row_data++;     
        $con_main_data = 0;  
          
        
    }
    // print_r($DATA);
    return $DATA;
}


if ((isset($_POST))) {

    
    $name = " ";
    $name_print = " ";
    $Price = " ";
    $Description = " ";
    $Description_print = " ";
    $Type = " ";
    $img_src = " ";
    $link = "../pstor/get.php?&";


    

    $data = search("{$_POST['Amout']}","{$_POST['NAme']}");
    $key = get_key("allData");
   



    $data_data_c = 0;
    $data_main_c = 0;


    if ($data != "none") {

        $card = "<div class=\"col-md-4 col-sm-7\"> <div class=\"card\">  <img src=\"{$img_src}\" class=\"card-img-top \"> <div class=\"card-block\">  <h3 class=\"card-title\">{$name}</h3>  <p class=\"out_put_p\">{$Description}</p>  <div class=\"card-footer\"> <a href=\"{$link}\" class=\"btn btn-primary\" role=\"button\">GET</a> </div> </div> </div> </div> ";

        while (len($data) != $data_data_c) {
        

            $data_main = $data[$data_data_c];
            
            if (len($data) == 1) {

                $name = $data[0][1];
                $name_print = str_replace("_"," ",$name);
                $Price =  $data[0][2];
                $Description =  $data[0][3];
                $Description_print  = str_replace("_"," ",$Description);
                $img_src =  $data[0][4];
                $Type =  $data[0][5];

                $c = 0;
                while (len($key) != $c) {

                    $temp =  "{$key[$c]}={$data[0][$c]}&";
                    $link = $link.$temp; 
                    $c++;
                }
    
                $card = "<div class=\"col-md-4 col-sm-7\"> <div class=\"card\">  <img src=\"{$img_src}\" class=\"card-img-top \"> <div class=\"card-block\">  <h3 class=\"card-title\">{$name_print}</h3>  <p class=\"out_put_p\">{$Description_print}</p> <div class=\"card-footer\"> <a href=\"{$link}\" class=\"btn btn-primary\" role=\"button\">GET</a> </div> </div> </div> </div>";
                echo $card;
            }
    
            if (len($data) > 1) {

                $cards = " ";
                // print_r($data);
                while (len($data) != $data_main_c) {



                    $name = $data[$data_main_c][1];
                    $name_print = str_replace("_"," ",$name);
                    $Price =  $data[$data_main_c][2];
                    $Description =  $data[$data_main_c][3];
                    $Description_print  = str_replace("_"," ",$Description);
                    $img_src =  $data[$data_main_c][4];
                    $Type =  $data[$data_main_c][5];
                    
                    $c = 0;

                    while (len($key) != $c) {
                        $temp =  "{$key[$c]}={$data[$data_main_c][$c]}&";
                        $link = $link.$temp; 
                        $c++;
                    }
                    $card = "<div class=\"col-md-4 col-sm-7\"> <div class=\"card\">  <img src=\"{$img_src}\" class=\"card-img-top \"> <div class=\"card-block\">  <h3 class=\"card-title\">{$name_print}</h3>  <p class=\"out_put_p\">{$Description_print}</p> <div class=\"card-footer\"> <a href=\"{$link}\" class=\"btn btn-primary\" role=\"button\">GET</a> </div> </div> </div> </div>";
                    $link = "get.php&";

                    $cards = $cards." ".$card;

                    $data_main_c++;
 
                }
                echo $cards;
            }
            
            $data_data_c++;
        }

       
    }
    else{
        $card = "<div class=\"col-md-4 col-sm-7\"> <div class=\"card\">  <img src=\"../pstor/IMG/main/0.jpg\" class=\"card-img-top \"> <div class=\"card-block\">  <h3 class=\"card-title\">looks like we dont have it yet</h3>  </div> </div> </div> </div>";
        echo $card;
    }



    
}
    
?>





