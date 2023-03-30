<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>  
.error {color: #FF0001;}  
</style>  
</head>
<body>
<?php 

// define variables and set to empty values
/*$nameErr = $lnameErr = $emailErr = $mobilenoErr = $genderErr = $cityErr = $hobbyErr = $profileErr =  $addressErr = "";
$name = $lname = $email = $mobileno = $gender = $city = $hobby = $profile = $address =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fname"])) {
    $nameErr = "FirstName is required";
  } else {
    $name = test_input($_POST["fname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
   if (empty($_POST["lname"])) {
    $lnameErr = "LastName is required";
  } else {
    $lname = test_input($_POST["lname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
      $lnameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["phone"])) {  
            $mobilenoErr = "Mobile no is required";  
    } else {  
            $mobileno = input_data($_POST["phone"]);  
            // check if mobile no is well-formed  
            if (!preg_match ("/^[0-9]*$/", $mobileno) ) {  
            $mobilenoErr = "Only numeric value is allowed.";  
            }  
        //check mobile no length should not be less and greator than 10  
        if (strlen ($mobileno) != 10) {  
            $mobilenoErr = "Mobile no must contain 10 digits.";  
            }  
    }  

    if (empty($_POST["optradio"])) {
      $genderErr = "Gender is required";
    } else {
      $gender = test_input($_POST["optradio"]);
    }

    if (empty($_POST["city"])) {
     $cityErr = "City is required";
    }else {
       $city = test_input($_POST["city"]);
    }

   if (empty($_POST["chk"])) {
               $hobbyErr = "Hobby is required";
      }else {
         $hobby = test_input($_POST["chk"]);
          // check if e-mail address is well-formed
         $no_checked = count($_POST['chk']);
         if($no_checked<=3) {
            $hobby = "Select at least two options"; 
         }
    }
    if (empty($_POST["image"])) {
     $profileErr = "Image is required";
    }else {
       $profile = test_input($_POST["image"]);
    }


     if (empty($_POST["address"])) {
        $addressErr = "Address is required";
      } else {
        $address = test_input($_POST["address"]);
      }


  }
    

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  echo $data;
  action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>
}*/?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery"></script>

<script>
$(function() {
   $("form[name='registration']").validate({
  
    rules: {
      fname: "required",
      lname: "required",
      email: {
        required: true,
        email: true
      },
      phone: {
                required: true,
                number: true
            },
       optradio:{
         required: true,
       },  
     citydata: "required",
       'chk[]':{
                required: true,
                maxlength: 2,
            },       
       image: {
            required: true,
            extension: "jpg",
           accept: "jpg,png",
        }, 
       address:{
        required: true
      },  
    },
    // Specify validation error messages
    messages: {
      fname: "Please enter your firstname",
      lname: "Please enter your lastname",
      phone: {
                required: "Please enter your phone number"
            },
      optradio:{
            required: "Please Choose Gender",
       } ,
      citydata: {
        required:"Please Select the City",
      },
      ' chk[]': {
                required: "You must check at least 1 box",
                maxlength: "Check no more than {0} boxes",
            },
       image: {
            required: "Please select a Profile Image!",
            extension: "Choose only JPG format!",
            accept: "Only image type jpg/png/ is allowed", 
        }, 
      address:{
        required: "Please Enter Address",
      },   
      email: "Please enter a valid email address"
    },
    
    submitHandler: function(form) {
      form.submit();
    }
  });
});
</script>

<div class="container">
  <h2>Register form</h2>
  <form class="form-horizontal" method="POST" enctype="multipart/form-data" name='registration'>
    <div class="form-group">
       <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">FirstName:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="fname" placeholder="Enter FirstName" name="fname">
       
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">LastName:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="lname" placeholder="Enter LastName" name="lname">
      
      </div>
    </div>
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
        
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Phone:</label>
      <div class="col-sm-10">          
        <input type="number" class="form-control" id="phone" placeholder="Enter Phone" name="phone">  
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Gender:</label>
      <div class="col-sm-10">          
        <div class="radio">
          <label><input type="radio" name="optradio" value="Male">Male</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="optradio"  value="Female">Female</label>
        </div>       
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="sel1">City:</label>
        <div class="col-sm-10">        
          <select class="form-control" name="citydata">
            <option>--Select--</option>
            <option value="Ahmedabad" name="city">Ahmedabad</option>
            <option value="Surat" name="city">Surat</option>
            <option value="Vadodara" name="city">Vadodara</option>
          </select>          
        </div>
    </div>
     <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Hobby:</label>
        <div class="col-sm-10">          
           <div class="checkbox">
            <label><input type="checkbox" value="Reading" name="chk[]">Reading</label>
          </div>
          <div class="checkbox">
            <label><input type="checkbox" value="Writing" name="chk[]">Writing</label>
          </div>
          <div class="checkbox disabled">
            <label><input type="checkbox" value="Watching" name="chk[]">Watching</label>
          </div>
           
      </div>
    </div>
     <div class="form-group">
      <div class="col-sm-10"> 
        <label class="control-label col-sm-2" for="pwd">Profile Image:</label>
        <div class="col-sm-10">          
          <input type="file" name="image">
        </div>
      </div>
    </div>
      <div class="form-group">
        <div class="col-sm-10">   
        <label  class="control-label col-sm-2" for="comment">Address:</label>
         <div class="col-sm-10">  
        <textarea class="form-control" rows="5" id="comment" name="address"></textarea> 
      </div>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox" name="remember"> Accept Terms and Conditions</label>
        </div>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" class="btn btn-default"  name="sub" value="submit">
         <a href="displaydatatbale.php" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Show User List</span></a>
      </div>
    </div>
   </div>
  </form>
</div>
</body>
</html>
<body>    
<?php
  include 'connection.php';

  if(isset($_POST['sub']))
  {
    if($nameErr == "" && $emailErr == "" && $mobilenoErr == "" && $genderErr == "" && $websiteErr == "" && $agreeErr == "") {  

    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $gen=$_POST['optradio'];
    $city=$_POST['citydata'];
    $hob=implode(",",$_POST['chk']);
    $add=$_POST['address'];
    
    $profile=$_FILES['image']['name'];
    $tmp_profile=$_FILES['image']['tmp_name'];
    move_uploaded_file($tmp_profile, "img/".$profile);
    
    $query="INSERT INTO `demotbl`(`fname`, `lname`, `email`, `phone`, `gender`, `city`, `hobby`, `image`, `address`) VALUES ('$fname','$lname','$email','$phone','$gen','$city','$hob','$profile','$add')";
    
         $result=mysqli_query($conn,$query);

          if($result>0)
          {
            header('Location:displaydatatbale.php');
            echo 'Data successfully inserted!!!';
          }
          else
          {            
          echo "not";
        }
      }
    }

                                                                    
?>
