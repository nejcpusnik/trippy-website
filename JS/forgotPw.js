/**
 * Created by Puska on 27. 11. 2016.
 */
function emailCheck(){
	
	var curLang = document.getElementById('lang').value;
	
    var email = document.getElementById('forgotmail');
    var war = document.getElementById('emailWarning');
    if(email.value == "") {
        email.className = "redBorder";
		
		console.log("curLang: " + curLang);
		
		if(curLang == "slovenian"){
			
			war.innerHTML = "Vnesi e-poštni naslov.";
			
		}else{
			war.innerHTML = "Enter e-mail.";
		}
        

    }else if(checkEmail(email) == false){
        email.className = "redBorder";
		
		if(curLang == "slovenian"){
			
			war.innerHTML = "E-poštni naslov ni veljaven.";
			
		}else{
			war.innerHTML = "E-mail address is not valid.";
		}
		
        

    }else{
        return true;
    }
    document.getElementById('emailWarning').style.display="block";
    return false;
}


function checkEmail(email) {
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (!filter.test(email.value)) {
        return false;
    }
}