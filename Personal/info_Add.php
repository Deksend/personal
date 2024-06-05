<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add More Info About Yourself</title>
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
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="new">Add More Info About You:</label><br>
            
            <textarea id="info" name="info" rows="4" cols="50"></textarea><br>
            <label class="label" for="email"><b>Confirm with your email:</b></label>
            <input type="text" id="email" name="email" required>
            <input type="submit" value="Submit">
        </form> 
        <?php
           
            $servername = "localhost";
            $username = "root";
            $password = "Metkaros4@";
            $dbname = "personal";

           // Δημιουργία σύνδεσης
            $conn = new mysqli($servername, $username, $password, $dbname);

         
           if ($conn->connect_error) 
           {
             
             die("Connection Failed: " . $conn->connect_error);
           }  
          
         if ($_SERVER["REQUEST_METHOD"] == "POST")
         {
             $add = $_POST["info"];
             $emails = $_POST["email"];
             $sql = "UPDATE data SET additional_info='$add' WHERE email='$emails'";
             if($conn->query($sql) === TRUE)
             {
                 echo "Data Submited Successfully";
             }
             else
             {
                 echo "Error submiting your data";
             }
             $conn->close();
         }

        ?>
        <div class="Button">
            <a href="Profile.php">Back</a>
        </div>
    </body>
</html>
