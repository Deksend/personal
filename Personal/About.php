<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>About </title>
        <style>
            body
            {
                font-family: Arial, sans-serifl;
                margin: 0;
                padding: 20px;
            }
            
            form
            {
                max-width: 600px;
                margin: 0 auto;
            }
            
            label
            {
                display: block;
                margin-bottom: 5px;
            }
            
            textarea
            {
                width: 100%;
                height: 100px;
                resize: vertical;
                margin-bottom: 10px;
            }
            
            input[type="submit"]
            {
                padding: 10px 20px;
                background-color: #333;
                color: #fff;
                border: none;
                cursor: pointer;
            }
            
            input[type="submit"]:hover
            {
                background-color: #555;
            }
            
            .Button
            {
                display: block;
                margin-top: 20px;
                text-align: center;
            }
            
            .Button a
            {
                padding: 10px 20px;
                background-color: #333;
                color: #fff;
                text-decoration: none;
                border-radius: 5px;
            }
            
            .Button a:hover
            {
                background-color: #555;
            }
           </style>
    </head>
    <body>
        <body>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="new"> About You:</label><br>
            <textarea id="about" name="about" rows="4" cols="50"></textarea><br>
            <input type="text" id="email" name="email" required>
            <input type="submit" value="Submit">
        </form> 
        <?php
          session_start();
           if ($_SERVER["REQUEST_METHOD"] == "POST") 
           {
               $servername = "localhost";
               $username = "root";
               $password = "Metkaros4@";
               $dbname = "personal";
               
               $conn = new mysqli($servername, $username, $password, $dbname);
               
               if($conn->connect_error)
               {
                   die("Connection Failed : " .$conn->connect_error);
               }
               
               $abouts = $_POST["about"];
               $emaile = $_POST["email"];
               
               $stmt = $conn->prepare("UPDATE data SET about = ? WHERE email = ?");
               $stmt->bind_param("ss", $abouts, $emaile);

               
               if($stmt->execute())
               {
                   echo "About informations updated successfully";
               }
               else
               {
                   echo "Error updating your info";
               }
               
               $stmt->close();
               $conn->close();
           }
        ?>
            <div class="Button">
            <a href="Profile.php">Back</a>
        </div>
    </body>
</html>
