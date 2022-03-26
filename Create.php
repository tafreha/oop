<?php

require './BlogClass.php';


if ($_SERVER['REQUEST_METHOD'] == "POST") {
   

      $obj = new Blog(); 
     $Result =  $obj->create($_POST);

     foreach ($Result as $key => $value) {
         # code...
         echo '- '.$key.' : '.$value.'<br>';
     }
   
    }

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <title>add subject</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>Add Subject</h2>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="exampleInputName">title</label>
                <input type="text" class="form-control" required id="exampleInputName" aria-describedby="" name="title" placeholder="Enter your title">
            </div>


            <div class="form-group">
                <label for="exampleInputName">content</label>
                <textarea type="" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp" name="content" placeholder="Enter your message"></textarea>
            </div>

            <div class="form-group">
                <label >image</label>
                <input type="file" required  name="image" >
            </div>



            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>


</body>

</html>