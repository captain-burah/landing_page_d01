


function insert() {   
              
        var name1=$("#name1").val();
        var email1=$("#email1").val();
		var emailv=/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        var mobile1=$("#mobile1").val();
		var mobilev=(/^[0-9]+$/);
		var namev=/^[a-zA-Z ]*$/;
        var mess1=$("#mess1").val();
		var d = document.getElementById("email1").value;
		var e = document.getElementById("mobile1").value;
		var f = document.getElementById("name1").value;
		var c_code1=document.getElementsByClassName('selected-flag')[2].title;
       
       	if (name1==null || name1==""){ 
        alert("Please enter your name.");  
        return false;  
      }	
       
       else if (name1 != namev.test(f) == false || namev.test(f) == false){
            alert("Please enter name.");
            return false; 
      }else if(email1 != emailv.test(d) == false || emailv.test(d) == false){
			alert("Please enter email.");
			/*document.getElementById("email1").innerHTML="Invalid Email"*/
			return false;
		}else if (mobile1 != mobilev.test(e) == false || mobilev.test(e) == false){  
        alert("Please enter your mobile.");  
        return false;  
      }
	  
	  //else if (mess1==null || mess1==""){  
//        alert("Please enter your Message.");  
//        return false;  
//      }
          
        $.ajax({
            type: "POST",
            url: "download_send.php",
            data: {name1,email1,mobile1,c_code1,mess1},
            //dataType: "JSON",
            success: function(data){               
             $("#mess").html(data);
            $("p").addClass("alert-default");
                $("form").trigger("reset"); 
            },
            
        }); 
       document.getElementById('link').click()
       $('#mess').fadeIn('fast').delay(3000).fadeOut('fast');
    $('#over').modal('hide');

       
       
}

