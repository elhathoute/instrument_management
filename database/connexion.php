<?php
// crer une objet de connexion(PDO=>une classe qui nous permet de connecter a quelque soit le type de db mysql- oracle-sqlServer)

$dsn='mysql:host=localhost;dbname=instrument_management';         //data source name

$user='root';                                                     //the user to connect a db

$password='';                                                    //password of this user

        try{
            $pdo=new PDO($dsn,$user,$password); 
             
            echo 'Success Connect To Database !';

        } catch(PDOException $exc){                                //PDOException => class to handle the exception 

            echo 'Error in data base'.$exc->getMessage().'<br>';   //The exception message
            echo 'Error in data base'.$exc->getLine().'<br>';      //The exception line
        }


?>