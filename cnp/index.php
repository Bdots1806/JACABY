<?php
    $pass = 0;
    $fail = 1;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $enrollment = $_POST["enrollment"];
        if(file_exists("pdf/".$enrollment.".pdf")){
            $imgname = $enrollment;
            $pass = 1;    
            //-----------------------------------------------------------------------------------------
            $image = "pdf/".$imgname.".pdf";
            $img = "pdf/d1.png";//image path
            $imageData = base64_encode(file_get_contents($image));            //base64 encoding
            $src = 'data: '.mime_content_type($image).';base64,'.$imageData;  //formate path of image
            //----------------------------------------------------------------------------------------- 
        }
        else {
            //$pass = 1;
            $fail = 0;
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>HTML/CSS eCertificate</title>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="w3.css?v=1">
	<link rel="stylesheet" type="text/css" href="stylesheet.css?v=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

.responsive {
  width: 100%;
  height: auto;
}

.btn {
  background-color: #2196F3;
  border: none;
  color: white;
  padding: 12px 30px;
  cursor: pointer;
  font-size: 20px;
}

/* Center the loader */
#loader {
  border: 5px solid #fff;
  border-radius: 50%;
  border-top: 5px solid #dd0f27;
  width: 80px;
  height: 80px;
  -webkit-animation: spin 1s linear infinite;
  animation: spin 1s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}
</style>
</head>

<body onload="myFunction()">
    <div>
        <video autoplay muted loop id="myvideo">
            <source src="01.mp4" type="video/mp4">
        </video>

        <div class="w3-white w3-padding-16">
            <div class="w3-center w3-xxxlarge animate-top-1">
                <a href="http://ronak.ml/project/">
                    <span class="thin w3-tag w3-black">C</span><span class="thick" style="padding-left: 7px;padding-right: 7px;">N</span>
                </a>
            </div>
        </div>

        <div class="w3-center w3-padding-16 s-white-text w3-xxlarge">
            <div class="animate-top-2">
                <span class="thick">Enter Your Enrollment & </span><span class="thick">Get Your Practical</span>
            </div>
        </div>
<?php
    if( $pass == 0) {
?>
    <?php
    if($pass == 0 && $fail == 1) {
        ?>
        <div class="w3-center w3-padding-16">
            <button onclick="document.getElementById('id01').style.display='block'" class="w3-btn w3-red w3-large animate-top-2">
                <span class="thick">  
                    Click Here
                </span>
            </button>
        </div>
    <?php
    }
    ?>

        <div id="id01" class="w3-modal">
            <div class="w3-modal-content w3-card-4  w3-animate-zoom">
                <header class="w3-container w3-blue"> 
                    <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                    <center><h2>Your Practical</h2></center>
                </header>
                <form action="index.php" method="POST">
                    <div class="w3-container">
                        <p> <input class="w3-input" type="text" placeholder="Enrollment" name="enrollment" required> </p>
                    </div>
                
                    <footer class="w3-container w3-blue w3-center">
                        <p><button class="w3-button w3-indigo thick">GET</button></p>
                    </footer>
                </form>
            </div>
        </div>
    
<?php 
    }
    else {
        if($fail == 1) { // try 
            ?>
            <center>
            <div id="loader"></div>
            </center> 
            <div style="display:none;" id="myDiv" class="animate-bottom">
                <div class=" w3-padding-small w3-center">
                    <?php  
                        echo '<img class="w3-image" alt="Certificate" src="',$img,'" width="75"/>';
                    ?>
                        <div class="w3-animate-bottom w3-center">
                            <?php 
                                echo '<a href="',$image,'" download="'.$imgname.'">'
                            ?> 
                            <div class="w3-padding">
                                <button class="btn large w3-red" style=" padding-left: 15px; padding-right: 15px;"><i class="fa fa-download"></i>&nbsp; <span class="thick">Download</span></button>
                        </div>

                    <?php echo 
                        '</a>';
                    ?> 
                </div>
            </div>
        </div>
        <?php
        }
    }
    if($fail == 0) {
    ?>
        <center>
        <div id="loader"></div>
        </center>
        <div style="display:none;" id="myDiv" class="animate-bottom">
            <div class="w3-center w3-padding">
                    <button onclick="document.getElementById('id01').style.display='block'" class="w3-btn w3-blue w3-large animate-top-2">
                        <span class="thick">
                            <?php
                                if($fail == 0) {
                                    echo "Try again";
                                }
                                if($pass == 0 && $fail == 1) {
                                    echo "Click Here";
                                }
                            ?>
                        </span>
                    </button>
                </div>
            <div class="w3-center w3-xlarge s-red-text">
                Ooops...!<br>
                These credentials do not match our records<br>
                OR<br>
                contact to admin.
            <div>
        </div>
    </div>
    <?php
    }
?>
    <?php
        if($fail == 9){ // 2nd condition || $fail == 0
    ?>
    <div class="w3-large w3-center w3-padding w3-animate-bottom">
        <a class="w3-btn w3-blue" href="http://ronak.ml/project/"><i class="fa fa-home fa-fw" aria-hidden="true"></i>&nbsp; <span class="thick">Home</span></a>
    </div>
    <?php
        }
    ?>
<div class="">

</div>
<script>
var myVar;

function myFunction() {
    myVar = setTimeout(showPage, 1000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
</script>
</body>
</html>
