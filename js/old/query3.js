

function insertEnquiry() {   
              
        var name3=$("#name3").val();
        var email3=$("#email3").val();
		var emailv=/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        var mobile3=$("#mobile3").val();
		var mobilev=(/^[0-9]+$/);
		var namev=/^[a-zA-Z ]*$/;
        var mess3=$("#mess3").val();
		var d = document.getElementById("email3").value;
		var e = document.getElementById("mobile3").value;
		var f = document.getElementById("name3").value;
		var c_code3=document.getElementsByClassName('selected-flag')[0].title;
      
      if (name3==null || name3==""){ 
        alert("Please enter your name.");  
        return false;  
      }	 
       
      else if (name3 != namev.test(f) == false || namev.test(f) == false){
            alert("Please enter name.");
            return false;   
      }else if(email3 != emailv.test(d) == false || emailv.test(d) == false){
			alert("Please enter email.");
			return false;
		}else if (mobile3 != mobilev.test(e) == false || mobilev.test(e) == false){  
        alert("Please enter your mobile.");  
        return false;  
      }
	  
	  //else if (mess3==null || mess3==""){  
//        alert("Please enter your Message.");  
//        return false;  
//      }
          
        $.ajax({
            type: "POST",
            url: "enquiry_send.php",
            data: {name3,email3,mobile3,c_code3,mess3},
            //dataType: "JSON",
            success: function(data){               
             $("#message1").html(data);
            $("p").addClass("alert-default");
                $("form").trigger("reset"); 
            },
            error: function(err) {
            alert(err);
            } 
        }); 
       //document.getElementById('link').click()
       //$('#mess').fadeIn('fast').delay(3000).fadeOut('fast');
    //$('#over').modal('hide');

       
       
}