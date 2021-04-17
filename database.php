<?php

/* 
function connection(){
    // start connect
    $connect = mysqli_connect("localhost", "root", "", "news");
    // check connect
    if($connect){
       return $connect;
    }else{
        return $connect;
    }
       
  
/* ====================== function insert query 
function insertion($connect, $data){
    // when connection success so insert
    if ($connect){
        if(!empty($data)){
            //insert query 
            foreach($data as $item) {
                $query = "ISERT INTO 'authors' ('name') VALUES ($item['name']) ";
                mysqli_query($connect, $query);
        else{
            //header("LOCATION: empty.php");
            echo "empty data";
        }

   }else{
       echo "connection failed";
   }
}

/* ====================== function get query from tables ========================= */ 

