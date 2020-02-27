
<html>
    <?php
$connect = mysqli_connect("localhost", "root", "", "scalevr");  
if(isset($_POST["insert"]))  
{  
     $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
     $query = "INSERT INTO uploadedimage(imagename) VALUES ('$file')";  
     if(mysqli_query($connect, $query))  
     {  
          echo '<script>alert("Image Inserted into Database")</script>';  
     }  
}  
?> 

<?php  
                $query = "SELECT imagename FROM uploadedimage ORDER BY id DESC";  
                $result = mysqli_query($connect, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                     echo '  
                     <a-scene>
                     <a-assets>
                         <img id="my-image" src="data:image/jpeg;base64,'.base64_encode($row['imagename'] ).'" crossorigin="anonymous"/> 
                     </a-assets>
         
                     <a-sky src="data:image/jpeg;base64,'.base64_encode($row['imagename'] ).'">
             
                     </a-sky>
                     <a-image src = "#my-image" width="12" height="9" crossorigin="anonymous"></a-image> 
                 </a-scene>   
                     ';  
                }  
?>  
    <head>
        <script src="https://aframe.io/releases/0.7.0/aframe.min.js"></script>
    </head>

    <body>
  
    </body>
</html> 


