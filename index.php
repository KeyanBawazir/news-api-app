<?php 
    //require_once 'database.php';
    /* ======================== to get url news api ===========================*/
    $url = "https://newsapi.org/v2/everything?q=bitcoin&from=2021-03-17&sortBy=publishedAt&apiKey=0a24a4e7148c4fb2b44c60ac4ca188b6";
    // To read Json file 
    $response = file_get_contents($url);

    // Decode Json file to  php associative arrayoc
    $arr_data = json_decode($response, true);
  
   
    //calling insert function
    insertion($arr_data);
    
    /* ===========================================================================*/

    /* ====================== function connection database ======================= */
    function connection(){
        // start connect
        $connect = mysqli_connect("localhost", "root", "", "news");
        return $connect; 
    
    }    
    /* ====================== function insert query ============================ */ 
    function insertion($data){
        $connect = connection();
        
        // when connection success so insert
        if ($connect){
            
            if(!empty($data)){
                //insert query 
                foreach($data as $row)
                {
                    $title = $row['articles']['title'];
                    $content = $row['articles']['content'];
                    $author = $row['articles']['author'];
                    $query = "INSERT INTO artical (title, description)
                    VALUES ('$title', '$content') ";
                    //insert author
                    mysqli_query($connect, $query);
                    $query1 = "INSERT INTO artical (title, description)
                    VALUES ('$title', '$content') ";
                    mysqli_query($connect, $query1);
                    
                } 
                  
            }else{
                //header("LOCATION: empty.php");
                echo "empty data";
            }

        }else{
            echo "connection failed";
        }
    }

    /* ====================== function get query from tables ========================= */ 

?>
<!-- ================================= start html structure ======================================-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="News Api">
        <meta name="keywords" content="api,news,php">
        <meta name="author" content="Keyan Bawazir">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>News Api</title>
    
    </head>
    <body>
       
    </body>
</html>





