<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile</title>
        <style>
            body
            {
                display: flex;
                justify-content: center;
                align-items: flex-start;
                height: 100vh;
                margin: 0;
                font-family: Arial, sans-serif;
                background-color: #f0f0f0;
                 padding-top: 20px;
            }
            
            .container 
            {
              display: flex;
              flex-direction: column;/*α στοιχεία τοποθετούνται σε γραμμή */
              align-items: flex-start;
              padding: 20px;
              padding-bottom: 100px;
              background-color: #fff;
              border-radius: 10px;
              box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
              width: 100%;
              max-width: 800px;
              margin-left: 100px;
              margin-top: 20px;
           }
           
           .about
           {
               margin-top: 100px;
               padding: 20px;
               background-color: #fff;
               border-radius: 10px;
               box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
               width: 90%;
           }
           
           .about h2
           {
               margin-top: 0;
           }
           
           .about p
           {
               margin-bottom: 0;
           }

            
            .photo-container
            {
                position: absolute;
                top: 20px;
                left: 20px;
                width: 300px;
                height: 355px;
                background-color: #fff;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0,0,0,0.1);
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 5px;
                margin-right: 20px;
                flex: 0 0 auto; 
            }
            
            .photo-container img
            {
                max-width: 100%;
                max-height: 100%;
                object-fit: cover;
                border-radius: 10px;
            }
            
            .info
            {
                background-color: #fff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0,0,0,0.1);
                width: 300px; 
                flex: 1;
                margin-left: 20px;
                width: calc(100% - 300px);
            }
            
            .info-item
            {
                display: flex;
                margin-bottom: 10px;
            }
            
            .info-item label 
            {
                font-weight: bold;
                margin-right: 10px;
            }
            
            .info-item span  
            {
                flex: 1;
            }
            
           .info-container
           {
               display: flex;
               flex-direction: row;
               width: 100%;
           }
           .header
           {
               text-align: center;
               margin-bottom: 20px;
           }
           
           .header h1
           {
               margin: 0;
               font-size: 24px;
               color: #333;
           }
           body, ul
           {
               margin: 0;
               padding: 0;
           }
           .navbar
           {
               position: fixed;
               top: 0;
               right: 0;
               background-color: #fff;
               color: #fff;
               padding: 10px;
               margin-right: 300px;
               margin-top: 50px;
           }
           
           .dropdown
           {
               position: relative;
               display: inline-block;
               background-color: #fff;
               
           }
           .dropbtn
           {
               color: #333;
               padding: 10px 20px;
               text-decoration: none;
           }
           
           .content
           {
               display: none;
               position: absolute;
               background-color: #333;
               min-width: 160px;
               z-index: 1;
           }
           
           .content a
           {
               color: white;
               padding: 10px 20px;
               display: block;
               text-decoration: none;
           }
           
           .dropdown:hover .content
           {
               display: block;
           }
        </style>
        
    </head>
    <body>
        
        <div class="container">
        <div class="photo-container">
            <img src="prof.jpg" alt="Profile Picture">
        </div>
            <div class="header">
                <h1> My Personal Profile </h1>
            </div>
        <div class="info">
        <?php
        
               $servername = "localhost";
               $username = "root";
               $password = "Metkaros4@";
               $dbname = "personal";
               
               $conn = new mysqli($servername, $username, $password, $dbname);
               
               if($conn->connect_error)
               {
                   die("Connection Failed : " .$conn->connect_error);
               }
               
               $sql = "SELECT name, surname, email, Age, About,additional_info FROM data WHERE email = 'kyrSav@gmail.com'";
               $result = $conn->query($sql);
               
               
               if($result->num_rows > 0)
               {
                   while($row =  $result->fetch_assoc())
                   {
                       echo"<div class='info-item'><label>Name :</label><span>" .$row["name"] . "</span></div>";
                       echo"<div class='info-item'><label>Surname :</label><span>" .$row["surname"] . "</span></div>";
                       echo"<div class='info-item'><label>Age :</label><span>" .$row["Age"] . "</span></div>";
                       echo"<div class='info-item'><label>Email :</label><span>" .$row["email"] . "</span></div>";
                       echo"<div class='info-item'><label>Additional Information :</label><span>" .$row["additional_info"] . "</span></div>";
                       $about = $row["About"];
                   }
               }
               else
               {
                   echo"<p>Error404 no user found...</p>";
               }
              $conn->close(); // Κλείσιμο της σύνδεσης με τη βάση δεδομένων 
        
      

        ?>
        </div>
            <div class="about">
                <h2>About</h2>
                <p><?php echo isset($about) ? $about : 'No Information Available'; ?></p>
            </div>
            <div class="navbar">
            <ul>
                <li class="dropdown">
                    <a href="#" class="dropbtn">Menu</a>
                    <div class="content">
                        <a href="info_Add.php">Add More Info About you</a>
                        <a href="Names.php">Change your Name and Surname</a>
                        <a href="About.php">Change About</a>
                        <a href="Password.php">Change Password</a>
                    </div>
                </li>
            </ul>
        </div>
        </div>
    </body>
</html>
