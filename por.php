<?php

require("./php/functions.php");
require("./php/python_php.php");
require("./php/sql_include.php");


$INIT =  mysqli_connect("localhost","pain","pain","datapstor");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
 
?>


<?php



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

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="../pstor/css/Main.css">  

    <script src="../pstor/Thid Party/jquery-3.4.1.js"></script>
    <link href="../pstor/Thid Party/bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">
    <title>All por</title>
</head>
<body>
    

    
<a class="btn btn-primary" href="../pstor/php/add.php">add</a>


<dir>
 <table class="table table-striped">
    <tr>
        <?php
             $GLOBALS['MAIN_KEYS'] = get_key("allData");
             $GLOBALS['MAIN_DATA'] = [];           
             $key = get_key("allData");
             for ($c_key = 0; $c_key != len($key); $c_key++) { 
        ?>
        <th>

            <?php  
                echo $key[$c_key];
            ?>

        </th>

        <?php   

             }
        ?>

    </tr>
 
    <?php

        $con_row_data = 0;
        $con_main_data = 0;
        $row_data = read_data("SELECT * FROM allData");
        $key = get_key("allData");
        $link = "";
        while(len($row_data) != $con_row_data){

            ?>
    <tr>
            <?php
            while (len($row_data[$con_row_data]) != $con_main_data) {   
                   
                $data = $row_data[$con_row_data][$con_main_data];
                
                $temp =  "{$key[$con_main_data]}={$data}&";
                $link = $link.$temp;          
                $print = str_replace("_"," ", $data);

  
    ?>


           <td>
                <?php

                    echo ($print);
                    // echo "kolo";
                    
                    $con_main_data++;
             }
                ?>
            </td>

            <td><a class="link" href=<?php echo "php/edit.php?{$link}"; ?>> <?php echo"edit";echo "</br>"; ?> </a> </td>
			<td><a class="link" href=<?php echo "php/delete.php?{$link}"; ?>> <?php echo"delete";echo "</br>"; ?> </a> </td>
    </tr>
        <?php
            $con_row_data++;     
            $con_main_data = 0;                  
        }
        ?>
 </table>
</dir>



<div id="filter">
    
  <div class="container-fluid">
    <div class="row justify-content-center">
        <input 
        type="range" id="range" max="50000" min="1000"
        style="margin: 10px;">
        <img 
        id="pc_filter" src="../pstor/IMG/laptop-icon-isolated-on-transparent-background-vector-23606198.jpg" width="50px" height="50px"
        style="margin: 10px;">
        <img 
        id="android_filter" src="../pstor/IMG/android-software-development-computer-icons-android.jpg" width="50px" height="50px"
        style="margin: 10px;">
        <img
        id="others_filter" src="../pstor/IMG/Noun_Project_20Icon_5px_grid-13-512.png" width="50px" height="50px"
        style="margin: 10px;">  


        <script>

            var filter = "";
            var a = 0;
            var b = 0;
            var c = 0;
            var range_bar = $("#range");
            range_bar.val(1000);
            var pc_filter = $("#pc_filter");
            var android_filter = $("#android_filter");
            var others_filter = $("#others_filter");
                
                pc_filter.click(
                function (){

                    if (a == 0) {
                        a = 1
                        filter = "pc";
                        Filter(filter,range_bar.val());
                    }
                    if (a == 1) {
                        a = 0;
                    }

                });

                android_filter.click(
                    function (){
            
                        if (b == 0) {
                            b = 1
                            filter = "phone";
                            Filter(filter,range_bar.val());

                        }
                        if (b == 1) {
                            b = 0;
                        }
            
                    });

            others_filter.click(
                function (){

                    if (c == 0) {
                        c = 1
                        filter = "other";
                        Filter(filter,range_bar.val());

                    }
                    if (c == 1) {
                        c = 0;
                    }

                });

                range_bar.change(
                    function(){

                    Filter(filter,range_bar.val());
                });


            function Filter(name="",amout=0){

                console.log(name+amout);

                $(".container-fluid .row #data").load(
                                    "../pstor/main.php",
                                    {
                                        NAme:name,
                                        Amout:amout
                                    }
                );

            }

            
        </script>

    </div>
    <div class="container-fluid scrollbar scrollbar-lady-lips">

      <div class="row">

      <div class="sc" id="data">


        <div class="col-3">

            <div class="card">
                <img src="../pstor/IMG/main/6.jpg" class="card-img-top">
                <div class="card-block">

                  <h3 class="card-title">yo</h3>
                  <p class="out_put_p">ygfayuwgefuigawiufgawiuelgfiylawegfyigweygfygefyuwgyufgwey</p>
                  <a href="#" class="btn btn-primary" role="button">GET</a>
                </div>
            </div>
        </div>


        <div class="col-3 ">

            <div class="card">
                <img src="../pstor/IMG/main/1.jpg" class="card-img-top">
                <div class="card-block">
  
                  <h3 class="card-title">yo</h3>
                  <p>ygfayuwgefuigawiufgawiuelgfiylawegfyigweygfygefyuwgyufgwey</p>
                  <a href="#" class="btn btn-primary" role="button">GET</a>
                </div>
            </div>
        </div>

        
      <div class="col-3">

        <div class="card">
            <img src="../pstor/IMG/main/3.jpg" class="card-img-top">
            <div class="card-block">

              <h3 class="card-title">yo</h3>
              <p>ygfayuwgefuigawiufgawiuelgfiylawegfyigweygfygefyuwgyufgwey</p>
              <a href="#" class="btn btn-primary" role="button">GET</a>
            </div>
        </div>
    </div>


    <div class="col-3">

      <div class="card">
          <img src="../pstor/IMG/main/4.jpg" class="card-img-top img-fluid">
          <div class="card-block">

            <h3 class="card-title">yo</h3>
            <p>ygfayuwgefuigawiufgawiuelgfiylawegfyigweygfygefyuwgyufgwey</p>
            <a href="#" class="btn btn-primary" role="button">GET</a>
          </div>
      </div>
  </div>>

  <div class="col-3">

    <div class="card">
        <img src="../pstor/IMG/main/5.jpg" class="card-img-top img-fluid">
        <div class="card-block">

          <h3 class="card-title">yo</h3>
          <p>ygfayuwgefuigawiufgawiuelgfiylawegfyigweygfygefyuwgyufgwey</p>
          <a href="#" class="btn btn-primary" role="button">GET</a>
        </div>
    </div>
</div>

<div class="col-3">

  <div class="card">
      <img src="../pstor/IMG/main/9.jpg" class="card-img-top img-fluid">
      <div class="card-block">

        <h3 class="card-title">yo</h3>
        <p>ygfayuwgefuigawiufgawiuelgfiylawegfyigweygfygefyuwgyufgwey</p>
        <a href="#" class="btn btn-primary" role="button">GET</a>
      </div>
  </div>
</div>
            


        </div>


      </div>
  </div> 


</div>





<?php

    function search($Price = 1000,$t ="phone"){

    $min = 1000 ;
    if ($Price >= 6000) {
       $min = $Price - 5000; 
    }
    $max = $Price + 5000;
    if ($max >= 50000) {
        $max = 50000;
    }
    $DATA = [];

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
    return $DATA;
        }

    

?>

</body>

<?php


mysqli_close($INIT);

?>

</html>