<?php
try{
    $dsn = 'mysql:dbname=DV4L_schema; host=127.0.0.1';//local host
    $user = 'root';
    $password = 'DV4L@uofm9163';//change

    $dbh = new PDO($dsn, $user, $password);
    //echo $dbh;
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $result = $dbh->prepare("SELECT * FROM customCodes");
    $result -> execute();

    echo "Number of Teachers: ";
    echo $result -> rowCount();

    echo "<br><br>";
    echo "code<br>";
    echo "databases<br>";
    echo "driving questions";
    echo "<br><br>";


    //error getting 0 rows going into else
    //if ($result -> num_rows >0){
    while($row = $result->fetch()) {
        
        
        echo $row["code"], ", ";
        echo "<br>";
        echo $row["dbs"], ", ";
        echo "<br>";
        echo $row["dqs"];
        
        
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
    }//while

    
    
}catch(PDOException $ex){
    echo $ex;
    echo '{"status":0, "line":'.__LINE__.'}';
    exit;
}
?>


