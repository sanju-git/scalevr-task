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

<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    body{
        background-color:#4361a2;
    }
img {
  border: 8px solid #ddd;
  border-radius: 10px;
  padding: 5px;
  width: 500px;
}

img:hover {
  box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
}

h2,p,#click-counter{
    color:white;
    font-family:monospace;
}

</style>
</head>
<body>
<br>
<center>  <h2>Image Thumbnails</h2> 
            <p>(Click on the images to view in 360 deg)</p>
</center>
<hr>
<br>
<?php  
                $query = "SELECT * FROM uploadedimage ORDER BY id DESC";  
                $result = mysqli_query($connect, $query);  

                while($row = mysqli_fetch_array($result))  
                {  
                     echo '   
                     <center>
                     <a target="_blank" href="panorama.php">
                         <img id="myImg" src="data:image/jpeg;base64,'.base64_encode($row['imagename'] ).'" height="500" width="500" class="img-thumnail" /> 
                         <br>
                    </a>
                    <p>Views:                     <span id="click-counter">1</span> </p>

                    <br>
                    </center>
                     '; 
                     
                }  
?>  
<script>
    $(function() {
    let i = 0;
    $('#myImg').click(function() {
        i++;
        $('#click-counter').text(i);
    });
});
    </script>


</body>

</html>