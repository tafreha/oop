<?php 

 class Validator{

    
function Clean($input)
{

    return  stripslashes(strip_tags(trim($input)));
}





function Validate($input, $flag, $length = 6)
{

    $status = true;

    switch ($flag) {

        case "required":
            # code...
            if (empty($input)) {

                $status = false;
            }
            break;


    
        case "length":
            # Code ... 
            if (strlen($input) < $length) {
                $status = false;
            }
            break;



        case "image":
            # code 

            $imgType    = $input['image']['type'];
            # Allowed Extensions 
            $allowedExtensions = ['jpg', 'png', 'jpeg'];

            $imgArray = explode('/', $imgType);

            # Image Extension ...... 
            $imageExtension =  strtolower(end($imgArray));


            if (!in_array($imageExtension, $allowedExtensions)) {
                $status = false;
            }

            break;


          case "string" : 
      # code .... 
        
      if (!preg_match("/^[a-zA-Z\s']*$/",$input)) {
       $status = false;
      }

       break; 
   
    }

    return $status;
}
function Upload($input)
{


    # Upload Image ..... 

    $image = null;

    $imgType    = $input['image']['type'];

    $imgArray = explode('/', $imgType);

    # Image Extension ...... 
    $imageExtension =  strtolower(end($imgArray));



    $FinalName = time() . rand() . '.' . $imageExtension;

    $disPath = 'Upload/' . $FinalName;

    $imgTemName = $_FILES['image']['tmp_name'];


    if (move_uploaded_file($imgTemName, $disPath)) {

        $image = $FinalName;
    }

    return $image;
}



 }
