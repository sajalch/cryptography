<!DOCTYPE html>
<html>
<head>
	<title>Security Lab Project</title>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="bg-light">
	<nav class="bg-dark site-header sticky-top py-1">
      <div class=" container d-flex flex-column flex-md-row justify-content-between">

     
      		<label class="py-2 d-none d-md-inline-block text-white btn btn-outline-secondary" href="#">#Enc-Dec WebEngine</label>
      </div>
    </nav>
  <main>
  	<div id="mainDiv">
	  	<div id="postDiv" align="center" class="container col align-self-center">
	  		<form action="" method="post" >
	  			<div class="form-group">
	  			<input class="form-control" id="mainVal" type="text" placeholder="Enter the Text" value="" name="mainVal" required>
	  			</div>
	  			<div class="form-group">
	  			<input class="form-control" id="key" type="password" placeholder="Enter the Key" value="" name="key" required>
	  			</div>
	  			<div class="form-group">
	  				<label class="">#Choose an Algorithm#</label><br>
	  				<label> Caeser Cipher:</label> <input type="radio" name="algo" value="1">&#160;&#160;&#160;
	  				<label>Playfair Cipher:</label> <input  type="radio" name="algo" value="2">&#160;&#160;&#160;
	  				<label>Des:</label> <input type="radio" name="algo" value="3">
	  			</div>
	  			<div >
	  				<label> Encryption:</label> <input  type="radio" name="EncDec" value="1">&#160;&#160;&#160;
	  				<label>Decryption:</label> <input   type="radio" name="EncDec" value="0">
	  			</div>
	  			<div >
	  			<button class="btn btn-warning" type="button" name="submit"  onclick="btnsubmit()">Submit</button>
	  			</div>
	  		</form>
	  		
	  	</div>
	  	
  	</div>
  	

  </main>
  <!-- The Modal -->
  <style type="text/css">
  	/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 200px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  /*background-color: rgba(0,0,0,0.4);  /*Black w/ opacity */*/
  /*background: rgba(220,220,220,.6);*/

}

/* Modal Content */
.modal-content {
  background-color: #f3f3f3;
  margin: auto;
  padding-right: 26px;
  padding-left: 26px;
  padding-top: 30px;
  padding-bottom: 250px;
  border: 1px solid #888;
  width: 80%;
 

}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
  </style>
	<div id="myModal" class="modal">
	  <!-- Modal content -->
	  	<div class="modal-content">
	    		<span class="close">&times;</span>
	    		<br><br>
	    		<div align="center">
	    			<span><b>Input Text:</b>&#160;<span id="set-text"></span></span><br>
	    			<span><b>Key Given:</b>&#160;<span id="set-key"></span></span>
	    		</div>
	    		<div id="result" align="center" class="container col align-self-center">

	  			</div>
	  	</div>
	</div>
  <script type="text/javascript">

  	// function validate()
  	// {
  	// 	if($.('#EncDec').val()=="")
  	// 	{   
  	// 		alert("Choose Encryption or Decryption");
  	// 		return false;
  	// 	}
  	// 	if($.('#algo').val()=="")
  	// 	{
  	// 		alert("Choose an Algorithm");
  	// 		return false;
  	// 	}
  	// 	//return true;
  	// }
  	// Get the modal
var modal = document.getElementById("myModal");
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
  	function btnsubmit()
  	{   document.getElementById("result").innerHTML=""
  		var mainVal = document.getElementById("mainVal").value;
  		if(mainVal=='')
  		{   alert("Enter Text");
  			return;
  		}
  		var key = document.getElementById("key").value;
  		if(key=='')
  		{   alert("Enter key");
  			return;
  		}
  		 
  		var algo;
  		for(var i = 0; i < document.getElementsByName('algo').length; i++) { 
                if(document.getElementsByName('algo')[i].checked) 
                     algo=document.getElementsByName('algo')[i].value; 
            } 
        if(algo=='')
  		{   alert("Select an Algorithm");
  			return;
  		}
  		var EncDec;
  		for(var i = 0; i < document.getElementsByName('EncDec').length; i++) { 
                if(document.getElementsByName('EncDec')[i].checked) 
                     EncDec= document.getElementsByName('EncDec')[i].value; 
            } 
         if(EncDec=='')
  		{   alert("Select Encryption/Decryption");
  			return;
  		}
    

  		
  		// alert(mainVal);
  		// alert(key);
  		// alert(algo);
  		// alert(EncDec);
  		jQuery.ajax({
	    type: "POST",
	    url: 'return.php',
	    dataType: 'text',
	    data: {mainVal:mainVal,key:key,algo:algo,EncDec:EncDec},
	    success: function (textstatus) {
	                  	//alert(textstatus);
	                  	  document.getElementById("set-text").innerHTML=mainVal;
	                  	  document.getElementById("set-key").innerHTML=key;
	                      document.getElementById("result").innerHTML=textstatus;
	                      modal.style.display = "block";
	            }
		});
  	}

  	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
	  modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
	  if (event.target == modal) {
	    modal.style.display = "none";
	  }
	}
  </script>
</body>
</html>