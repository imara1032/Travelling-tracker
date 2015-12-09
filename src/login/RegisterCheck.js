function checkData(){
	
	//alert("yes");
	/*
	var correctData=true;
	if($("#fName").val()!=""){
		
	}else{
		
		$("#fNameMe").html("please enter your First Name");
      		$("#fNameMe").css("color","red");
      		correctData=false;
      		//return;
	}
	if($("#lName").val()!=""){
		
	}else{
		$("#lNameMe").html("please enter your Last Name");
      		$("#lNameMe").css("color","red");
      		//return;
      		correctData=false;
	}
	if($("#address").val()!=""){
		
	}else{
		$("#addressMe").html("please enter the Address");
      		$("#addressMe").css("color","red");
      		//return;
      		correctData=false;
	}
	if($("#dob").val()!=""){
		
	}else{
		$("#dobMe").html("please enter a Date");
      		$("#dobMe").css("color","red");
      		correctData=false;
      		//return;		
	}
	if($("#country").val()!=""){
		
	}else{
		$("#countryMe").html("please enter a Date");
      		$("#countryMe").css("color","red");
      		correctData=false;
      		//return;		
	}
	if($("#rName").val()!=""){
		
	}else{
		$("#rNameMe").html("please enter a Date");
      		$("#rNameMe").css("color","red");
      		correctData=false;
      		//return;		
	}
	if($("#rAddress").val()!=""){
		
	}else{
		$("#rAddressMe").html("please enter a Date");
      		$("#rAddressMe").css("color","red");
      		correctData=false;
      		//return;		
	}
	*/
	//if(correctData==true){
	
	 $.ajax({
            type: "get",
            url: "http://hosting.otterlabs.org/dharmakirthimudiyanselageimarau/travelling/Travelling-tracker/rigister.php",
            dataType: "json",
            data: {"fName":$("#fName").val(), "lName":$("#lName").val(), "address":$("#address").val(),
            "dob":$("#dob").val()//, "country":$("#country").val()
            },
            success: function(data,status) {
             //    alert(status);
                // $("#city").html(data['city']);
                // $("#latitude").html(data['latitude']);
               //  $("#longitude").html(data['longitude']);
                

              },
              complete: function(data,status) { //optional, used for debugging purposes
                  //alert(status);
              }
         }); //end Ajax          
      //   }
     
}
$( document ).ready(function() {
     	//document.getElementById("submit").checkData();
        $("#submit").change(function(){checkData()});
     });
     
 function redirect() {
               window.location="login.php";
            }