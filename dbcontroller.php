<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
                        <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
                <link rel="stylesheet" href="css/bootstrap.min.css">
‪<!-- Optional Bootstrap theme -->
‪<link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
    </head>
    <body>
        <?php
        class DBController {
            private $host = "localhost";
            private $user = "staff";
            private $pswd = "angela";
            private $database = "ejhil_app";
            private $conn;
            
            function __construct() {
                
                $this->conn = $this->connectdb();
            }
            
            function connectdb()
            {
                $conn = mysqli_connect($this->host,$this->user,$this->pswd,$this->database);
                //mysql_select_db($this->database);
                return $conn;
            }
            
            function runquery($query)
            {
                $result = mysqli_query($this->conn,$query);
                
                while ($row = mysqli_fetch_assoc($result))
                {
                    $resultset[] = $row;
                    //echo $row;
                }
                
                if(!empty($resultset))
                {  
                    //echo $resultset[];
                    return $resultset;
                    
                }
                
            }
            
            function numrows($query)
            {
                $result = mysqli_query($this->conn,$query);
                
                $rowcount = mysqli_num_rows($result);
                return $rowcount;
                
            }
            
            
            function executeUpdate($query)
            {
               $result = mysqli_query($this->conn,$query);
               return $result;
            }
        
        }
        ?>
    </body>
</html>
