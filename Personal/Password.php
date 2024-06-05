<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            .body
            {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
                font-family: Arial, sans-serif;
        
        background-color: #f0f0f0;
            }
            
            .container
            {
                display: flex;
                justify-content: center;
                align-items:center;
                height: 100vh;
                margin: 0;
                font-family: Arial, sans-serif;
                background-color: #f0f0f0;
           }
            
            .form
            {
                background-color: #fff;
                padding: 40px 20px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0,0,0 0.1);
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                justify-content: center;
                width: 500px;
            }
            
            .label
            {
                
                margin-bottom: 10px;
                font-weight: bold;
                width: 100%;
                text-align: left;
                margin-right: 0px;
            }
            
            .input[type="text"]
            {
                width: 100%;
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 5px;
                box-sizing: border-box;
            }
            
            .button
            {
                width: 100%;
                padding: 10px;
                background-color: #4CAF50;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                margin-top: 20px;
            }
            
             
            .Button
            {
                display: flex;
                justify-content:center;
                margin-top: 20px;
               
            }
            
            .Button a
            {
                padding: 20px 40px;
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
        <div class="container">
        <form action="Password.php" method="post" class="form">
               
                <label class="password" for="passwor"><b>New Password:</b></label>
                <input type="text" id="password" name="password" required>
                <label class="label" for="email"><b>Confirm with your email:</b></label>
                <input type="text" id="email" name="email" required>
                <button type="submit" class="button">Update</button>
                <div class="Button">
                   <a href="Profile.php">Back</a>
               </div>
         
            </form>
        </div>
        <?php
            session_start(); // Ξεκίνημα συνεδρίας
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
    
   
            $servername = "localhost";
            $username = "root";
            $password = "Metkaros4@";
            $dbname = "personal";

           // Δημιουργία σύνδεσης
          $conn = new mysqli($servername, $username, $password, $dbname);

         // Έλεγχος σύνδεσης
         if ($conn->connect_error) 
         {
             
           die("Connection Failed: " . $conn->connect_error);
        }

        // Λήψη του email του συνδεδεμένου χρήστη από τη συνεδρία
    
        $pass = $_POST["password"];
        $emails = $_POST["email"];
  

        // Ενημέρωση της βάσης δεδομένων
       $stmt = $conn->prepare("UPDATE data SET password= ? WHERE email=?");
       $stmt->bind_param("ss", $pass, $emails);
       if ($stmt->execute()) 
       {
        
          
           echo "Record updated successfully";
        
           
        } 
    
        else 
        {
            echo "Error processing your request. Please try again later.";
        }

         $stmt->close();
         $conn->close();
      }
       
        ?>
    </body>
</html>
