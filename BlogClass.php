<?php 

  require 'DBClass.php';
  require 'validatorClass.php';

class Blog{

   private $title; 
   private $content; 
   private $image; 


   public function create($data){

       # Create Validator Class .... 
       $validator = new Validator();
      
       $this->title      = $validator->Clean($data['title']);
       $this->content     = $validator->Clean($data['content']); 


       # Validate Data .... 
        $errors = []; 

    # Valoidate name .... 
    if (!$validator->Validate($this->title, 'required')) {      
        $errors['title'] = "Field Required";
    }elseif (!$validator->Validate($this->title, 'string')) {      
        $errors['title'] = "InValid String";
    }
    if (!$validator->Validate($this->content, 'required')) {      
        $errors['content'] = "Field Required";

    }elseif(!$validator->validate($this->content,"length",50)){
        $errors['content'] = "Length must Be >= 50 Chars";
    }
    if (!$validator->Validate($this->image,'required')) {      
        $errors['image'] = "Field Required";

    }elseif(!$validator->validate($this->image,'image')){
        $errors['image'] = "image must to be jpg or png extention";
    }



     # Check ...... 
     if (count($errors) > 0) {
        
        $Message = $errors;

    } else {

      // code ..... 

      $this->image = Upload($FILES);
     # Create DB Object ... 

     $db = new DB();

     $sql = "insert into articles (title,content,image) values ('$this->title','$this->content','$this->image')"; 

     $op = $db->doQuery($sql);

      if($op){
          $Message = ["Message" => "Raw Inserted"]; 
      }else{
        $Message = ["Message" => "Error Try Again"]; 
      }


   }
   
        return $Message;
}

}



?>