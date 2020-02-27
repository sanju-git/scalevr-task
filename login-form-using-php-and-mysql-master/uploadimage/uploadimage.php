<?php
$conn=mysqli_connect("localhost","root","","uploadFile");
if($conn){
    echo "connected";
}
    if(isset($_POST['uploadfilesub'])){
        $filename=$_FILES['uploadfile']['name'];
        $filetmpname=$_FILES['uploadfile']['tmp_name'];
        $folder='imagesuploadedf/';

        move_uploaded_file($filetmpname,$folder.$filename);
    }

    $sql ="INSERT INTO `uploadedimage` ( `imagename`) VALUES (' $filename')";
    $qry =mysqli_query($conn,$sql);
    if($qry){
        echo"image uploaded";
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>upload</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <style>
    body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

.bg-image {
  /* The image used */
  background-image: url("bg2.webp");
  
  /* Add the blur effect */
  filter: blur(8px);
  -webkit-filter: blur(8px);
  
  /* Full height */
  height: 100%; 
  
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/* Position text in the middle of the page/image */
    .main{
  border-radius: 10px;
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: #905353;
  font-weight: bold;
  border: 1px solid#864a4a;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 30%;
  padding: 20px;
  text-align: center;
    }
    h1{
      font-family:inherit;
    }
  </style>
</head>
<body>
  <div class="bg-image"></div>
<div class="container main" >
  <form action="" method="POST" enctype="multipart/form-data">
    <h1>UPLOAD PANORAMA</h1>
    <br>
    <div class="custom-file lg-3">
      <input type="file" class="custom-file-input" id="customFile" name="uploadfile">
      <label class="custom-file-label" for="customFile">Choose file</label>
    </div>
    <br><br>
    <div class="mt-3">
        <button type="submit" class="btn btn-success" name="uploadfilesub" value="Upload">Submit</button>
        <br>
        
      </div>
</div>

<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>

</body>
</html>
