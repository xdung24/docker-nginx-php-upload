<!DOCTYPE html>
<html>
<head>
  <title>Upload your files</title>
  <style>
html {
  height: 100%;
}
p { text-align: center }
body {
  background-color: #2590EB;
  height: 100%;
}

.wrapper {
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}
.wrapper .file-upload {
  height: 200px;
  width: 200px;
  border-radius: 100px;
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  border: 4px solid #FFFFFF;
  overflow: hidden;
  background-image: linear-gradient(to bottom, #2590EB 50%, #FFFFFF 50%);
  background-size: 100% 200%;
  transition: all 1s;
  color: #FFFFFF;
  font-size: 100px;
}
.wrapper .file-upload input[type=file] {
  height: 200px;
  width: 200px;
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
  cursor: pointer;
}
.wrapper .file-upload:hover {
  background-position: 0 -100%;
  color: #2590EB;
}

.vertical-center {
  text-align:center;
}
.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
  </style>
</head>
<body>
  <form enctype="multipart/form-data" action="index.php" method="POST">
    <div class="wrapper">
      <div class="file-upload">
        <input type="file" name="uploaded_file"/>
        <i class="fa fa-arrow-up"></i>
      </div>
    </div>
    <div class="vertical-center">
      <input type="submit" class="button" value="Upload"/>
    </div>
  </form>
</body>
</html>
<?PHP
  if(!empty($_FILES['uploaded_file']))
  {
    $path = "/var/www/html/uploads/";
    $path = $path . basename( $_FILES['uploaded_file']['name']);

    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
      echo "<p>The file ".  basename( $_FILES['uploaded_file']['name']). 
      " has been uploaded</p>";
    } else{
        echo "<p>There was an error uploading the file, please try again!</p>";
    }
  }
?>
