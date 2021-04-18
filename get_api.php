<?php
/*
require_once 'database.php';

// ===== This google news api for exaple =====
$url = "https://newsapi.org/v2/everything?q=bitcoin&from=2021-03-15&sortBy=publishedAt&apiKey=0a24a4e7148c4fb2b44c60ac4ca188b6";
// ===== To read Json file =====
$response = file_get_contents($url);
// ===== Decode Json file to object in php =====
$data = json_decode($response);
*/



    //require_once 'database.php';
    $data = getData();
  
   
      
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
    function getData(){
        $connect = connection() ;
        if ($connect){
            $get_data = [];
            $selectquery = "SELECT artical.title, artical.description, author.author
             FROM artical INNER JOIN author 
             ON author_id=author.id limit 2";
             $query = mysqli_query($connect, $selectquery);
             //to convert associative array 
             while($result = mysqli_fetch_assoc($query)){
                $get_data[] = $result;
             }
             
             return $get_data;
        }else{
            echo"failed connection";
        }

    }

?>



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
    <table border="1" style="width:100%">
    <tr>
      <th>title</th>
      <th>author</th>
      <th>description</th>
    </tr>
    <?php
    foreach($data as $val):?>
        <?php echo 
        "<tr>
                <td>" . $val['title'] . "</td>"?>;
            <?php echo "<td>" . $val['author'] . "</td>" ?>;
            <?php echo "<td>" . $val['description'] . "</td>
        </tr>"?>;
    
           
      
    <?php endforeach; ?>
    
 
  </table> 
    </body>
</html>
