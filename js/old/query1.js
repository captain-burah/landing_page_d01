/*$('#overlay').modal('show');*/

$('#overlay').modal('hide');
      setTimeout(function() {
        $('#overlay').modal('show');
      }, 20000);

function Dat() {    
    $('#over').modal('show');
    }    

    function Data() {    
    $('#overlay').modal('hide');
      setTimeout(function() {
        $('#overlay').modal('show');
      }, 30000);
}    
   function insertData() {        
        var name2=$("#name2").val();
        var email2=$("#email2").val();
		var emailv=/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        var mobile2=$("#mobile2").val();
		var mobilev=(/^[0-9]+$/);
		var namev=/^[a-zA-Z ]*$/;
        var mess2=$("#mess2").val();
		var d = document.getElementById("email2").value;
		var e = document.getElementById("mobile2").value;
		var f = document.getElementById("name2").value;
		var c_code2=document.getElementsByClassName('selected-flag')[1].title;
		
	 if (name2==null || name2==""){ 
        alert("Please enter your name.");  
        return false;  
      }	
	else if (name2 != namev.test(f) == false || namev.test(f) == false){
            alert("Please enter name.");
            return false;  
      }else if(email2 != emailv.test(d) == false || emailv.test(d) == false){
			alert("Please enter email.");
			return false;
		}else if (mobile2 != mobilev.test(e) == false || mobilev.test(e) == false){  
        alert("Please enter your mobile.");  
        return false;  
      }
	  
	  //else if (mess==null || mess==""){  
//        alert("Please enter your Message.");  
//        return false;  
//      }       
        $.ajax({
            type: "POST",
            url: "popup_send.php",
            data: {
				name2,
				email2,
				mobile2,
				c_code2,
				mess2},
            //dataType: "JSON",
            success: function(data){               
             $("#message").html(data);
            $("p").addClass("alert-default");
                $("form").trigger("reset"); 
            },
            error: function(err) {
            alert(err);
            } 
        });  
       $('#message').fadeIn('fast').delay(3000).fadeOut('fast');
       $('#overlay').modal('hide');
}

