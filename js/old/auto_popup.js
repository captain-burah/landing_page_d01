function validateEmail(email) {
var filter = /^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;
if (filter.test(email)) {
return true;
}else {
return false;
}
}

function getCookie(cname) {
	var name = cname + "=";
	var decodedCookie = decodeURIComponent(document.cookie);
	var ca = decodedCookie.split(';');
	for(var i = 0; i <ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == ' ') {
			c = c.substring(1);
		}
		if (c.indexOf(name) == 0) {
			return c.substring(name.length, c.length);
		}
	}
	return "";
}

$(document).ready(function() {
setTimeout(popup, 20000);
setInterval(popup, 2000*30);
function popup() {
var x = getCookie('popup_sent');
if(x==''){   
$("#logindiv").modal("show");
//$("#logindiv").css("display", "block");
}
}
//$("#login #cancel").click(function() {
//$(this).parent().parent().hide(); 
    
//});
$("#onclick").click(function() {
$("#contactdiv").css("display", "block");
});
$("#contact #cancel").click(function() {
$(this).parent().parent().hide();
});
// Contact form popup send-button click event.



$("#send").on('click',function() {
var name2 = $("#name2").val();
var email2 = $("#email2").val();
var mobile2 = $("#mobile2").val();
var mess2 = $("#mess2").val();
var emailv=/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
var mobilev=(/^[0-9]+$/);
var namev=/^[a-zA-Z ]*$/;
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
}else{
document.cookie = 'popup_sent=1; expires=Thu, 01 Jan 2029;?> 00:00:00 UTC';
}

//$.post('popup_send.php',$('#login_pop').serialize());
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
                $("#message").css('display','block');
                $('#login').html($("#message"));
                
                $("#message.p").addClass("alert-default");
               
			    setTimeout(function() { $('#logindiv').modal('hide'); },3000);
			   
            },
            error: function(err) {
            alert('Some Error Occurred');
            } 
        });  
});



});
// Login form popup login-button click event.


