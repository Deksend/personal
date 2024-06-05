<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Personal Website</title>
        <style>
            body
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
                background-color: #fff;
                padding : 40px 20px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0,0,0,0.1);
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                width: 300px;
            }
            
            label
            {
                margin-bottom: 5px;
                font-weight: bold;
                width: 100%;
                text-align: left;
                
            }
            input[type="text"], input[type="password"]
            {
                width: 100%;
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 5px;
                box-sizing: border-box;
            }
            
            button
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
            
            buttom:hover
            {
                background-color: #45a049;
            }
            
            
            
            label input[type="ckeckbox"]
            {
                margin-right: 10px;
            }
            
        </style>
    </head>
    <body>
        <div claas="container">
            <form method="POST">
            <label for="user"><b>Email</b></label>
            <input type="text" placeholder="Enter Email :" name="user" required>
            
            <label for="userades"><b>Password</b></label>
             <input type="password" placeholder="Enter Password :" name="userades" required>
            
             <button type="submit">Login</button>
            
                    <div class="checkbox-container">
            
            <label for="remember">Remember me</label> 
            <input type="checkbox" checked="checked" name="remember">
            
        </div>
       </form>
                
            
        </div>
        <?php 
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
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
               
           $email = $_POST['user'];
           $passwords = $_POST['userades'];
           
           $sql = $conn->prepare("SELECT * FROM data  WHERE email = ? AND password = ?");
           $sql->bind_param("ss", $email, $passwords);
           $sql->execute();
           $result = $sql->get_result();
           
           if($result->num_rows > 0)
           {
               echo "<p> Welcome to your personal Page! </p>";
               header("Location: Profile.php");

           }
           else
           {
               echo "<p> Something is wrong please try again... </p> ";
           }
           
           $sql->close();
           $conn->close();
        }
           
        ?>
    </body>
</html>
