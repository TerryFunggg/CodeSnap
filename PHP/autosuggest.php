
<?php
/**
 *  @return leaflet_title,leaflet_address,company_name,type
 
    TODO: try to search the content => show some words between the key word


*/

include "../lib/db.php";


$MAX_SUGGESTION_LENGTH = 10;  // max length of auto suggestion
$HAS_RESULT = true;          // A flag, if database return a set of data it will true . else false;

if(isset($_POST['query'])){
    $conn = db_connect();
    // For injection
    $conn->set_charset("utf8");
    $text = $conn->escape_string($_POST['query']);

    
    $sql = 'SELECT DISTINCT l.title,l.address,l.type,c.name as c_name '
         .'FROM `leaflet` AS l INNER JOIN `company` AS c '
         . 'ON c.id = l.company_id '
         .'WHERE l.title   LIKE \'%' . $text . '%\' '
         //. 'OR    l.content LIKE \'%' . $text . '%\' '
         . 'OR    l.type LIKE \'%' . $text . '%\' '
         . 'OR    l.address LIKE \'%' . $text . '%\' '
         . 'OR    c.name   LIKE \'%' . $text . '%\' '
         .'LIMIT ' . $MAX_SUGGESTION_LENGTH;

    $result = $conn->query($sql);
  
 
    $dbArray        = [];   // array to saving all sub array.
    $titleArr       = [];
    $addressArr     = [];
    $companyNameArr = [];
    $typeArr        = [];

    if($result->num_rows > 0){
        /* 
            use stripos to check all the data from each array whether data contain the $text key word.
            If yes , put data to specific sub-array belong to the type , like title,content,etc.
        */
        while($row = $result->fetch_assoc()){
            // Must use the '===' full check here 
            if(stripos($row['title'],$text) !== false){
                //$dbArray['title'][] = $row['title'];
                $titleArr[] = $row['title'];
            }

            if(stripos($row['type'],$text) !== false 
                // handle data duplicat
                    && array_search($row['type'] , $typeArr) === false){

                     $typeArr[] = $row['type']; 
            }

            if(stripos($row['address'],$text) !== false 
                    && array_search($row['address'] , $addressArr) === false){

                $addressArr[] = $row['address']; 
            }

            if(stripos($row['c_name'],$text) !== false 
                    && array_search($row['c_name'] , $companyNameArr) === false){
                        
                $companyNameArr[] = $row['c_name'];
            }
        }
    }else{
        $HAS_RESULT = false;
    }


    $dbArray["title"] = $titleArr;
    $dbArray["type"] = $typeArr;
    $dbArray["address"] = $addressArr;
    $dbArray["company"] = $companyNameArr;


    // Return result list to front end
    if($HAS_RESULT){
        $count = 0;
        foreach($dbArray as $key => $values){
            foreach($values as $value){
                if($count >= $MAX_SUGGESTION_LENGTH){break;}

                echo "<div href='#' class='list-group-item list-group-item-action border-1 d-flex justify-content-between align-items-center'>"
                    . "<a href='#'>" . $value . "</a>";
                $color = "";
                // different type with different colorx
                switch($key){
                  case "title":
                      $color = "badge-primary";
                      break;
                  case "address":
                      $color = "badge-secondary";
                      break;
                  case "type":
                      $color = "badge-info";
                      break;
                  case "company":
                      $color = "badge-success";
                      break;
                }
                echo '<span class="badge '.$color.' badge-pill">:' . $key . '</span>'
                        ." </div>";
                $count++;
            }
        }
    }


/*     if($total_result_length <= $MAX_SUGGESTION_LENGTH && $total_result_length > 0){

        foreach($dbArray as $key => $values){
            foreach($values as $value){
                echo "<a href='#' class='list-group-item list-group-item-action border-1 d-flex justify-content-between align-items-center'>"
                    . $value
                    . '<span class="badge badge-primary badge-pill">' . $key . '</span>'
                    ." </a>";
            }
        }
    }else{
 
    }

*/
 
 
}

