"use strict"
function valid(){
	var name=document.forms["f1"]["name"];
	var id=document.forms["f1"]["id"];
	var email=document.forms["f1"]["email"].value;	
	var pass=document.forms["f1"]["pass"];	
	var cpass=document.forms["f1"]["cpass"];
	var utype=document.forms["f1"]["utype"];
	
		if (pass.value!=cpass.value) {
			alert("password don't match");
			return false;
		}  
		else{
			if (fid(id))
			 {
			  document.getElementById('em1').innerHTML=id.value;
			  //alert(name.value);
			//return true;
		}
			if (femail(email))
			{	
				document.getElementById('em4').innerHTML=email;
			// return false;
			}
			if (fname(name))
			 {document.getElementById('em5').innerHTML=name.value;
			 	//return false;
			 }
			if (fpass(pass))
			 {document.getElementById('em2').innerHTML=pass.value;
			 	//return false;
			 }
			if (fcpass(cpass))
			 {
			 	document.getElementById('em3').innerHTML=cpass.value;
			 	//return false;
			 }		
			else{return false;}
			alert(name.value+"\n"+id+"\n"+name.value+"\n"+pass.value);
			return true;
				//
			
		}

		
return true;
}
function fid (id) {
	//var error = false;
		//var name=document.getElementById('name');
		
		//var n1 = document.getElementById('n1').textContent;
		//alert(name);
		if(id.value.length==0){
			//alert('empty');
			document.getElementById('em1').innerHTML="empty";
			return false;
		}
		else if(id.value.length<5){
			//alert('At least two words');
			document.getElementById('em1').innerHTML="At least two words";
			return false;
		}
}
function fname (name) {
	//var error = false;
		//var name=document.getElementById('name');
		
		//var n1 = document.getElementById('n1').textContent;
		//alert(name);
		if(name.value.length==0){
			//alert('empty');
			document.getElementById('em5').innerHTML="empty";
			return false;
		}
		else if(name.value.length<2){
			//alert('At least two words');
			document.getElementById('em5').innerHTML="At least two words";
			return false;
		}
		else if((name.value[0]<'A' || name.value[0]>'Z') && (name.value[0]<'a' || name.value[0]>'z')){
			//alert('starts with letter');
			document.getElementById('em5').innerHTML="starts with letter";
			return false;
		}
		else{
			document.getElementById('em5').innerHTML="&#10003";
			return true;
		}
		return name;
		
		}
		
		function femail(email) {
			//var email=document.getElementById('email').value;
    //alert(email);
    if (email=="") {
    	document.getElementById('em4').innerHTML="empty";
    return false;
    }
    else if (search(email)) {
    	return search(email);
    	//return true;
    }
    else{
    	var emailParts = email.split('@');
    	if(emailParts.length !== 2) {
       document.getElementById('em4').innerHTML="Wrong number of @ signs";
        return false;   
    }
    else{
    	 var emailName = emailParts[0];
    var emailDomain = emailParts[1];

    
    if(emailName.length < 1 || emailDomain.length < 3) {
       document.getElementById('em4').innerHTML="Wrong number of @ signs";
    	return false;
    }
    else{
    	 var validChars = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','.','0','1','2','3','4','5','6','7','8','9','_','-'];

    // emailName must only include valid chars
    for(var i = 0; i < emailName.length; i += 1) {
        if(validChars.indexOf(emailName.charAt(i)) < 0 ) {
             document.getElementById('em4').innerHTML="Invalid character in name section";
         	return false;
        }
    }
    for(var j = 0; j < emailDomain.length; j += 1) {
        if(validChars.indexOf(emailDomain.charAt(j)) < 0) {
             document.getElementById('em4').innerHTML="Invalid character in domain section";
             return false;
        }
    }
     if(emailDomain.indexOf('.') <= 0) {
         document.getElementById('em4').innerHTML="Domain must include but not start with .";
        return false;
    }
    else{
    	 var emailDomainParts = emailDomain.split('.');
    if(emailDomainParts[emailDomainParts.length - 1].length < 2) {
         document.getElementById('em4').innerHTML="Domain's last . should be 2 chars or more from the end";
        return false;
    }
    else{
			document.getElementById('em4').innerHTML="&#10003";
			return true;
		}
    }
    }
    }
    }
    return email;
}

function fpass (pass) {
		//var pass=document.getElementById('pass');
		//var n1 = document.getElementById('n1').textContent;
		//alert(name.value);
		if(pass.value==""){
			document.getElementById('em2').innerHTML="empty";
        return false;
		}
		else if(pass.value.length<8){
			document.getElementById('em2').innerHTML="must contain 8 characters";
        return false;
		}
		else{
			document.getElementById('em2').innerHTML="&#10003";
			return true;
		}
		return pass;
	}

		function fcpass (cpass) {
		//var cpass=document.getElementById('pass');
		//var n1 = document.getElementById('n1').textContent;
		//alert(name.value);
		if(cpass.value==""){
			document.getElementById('em3').innerHTML="empty";
        return false;
		}
		else if(cpass.value.length<8){
			document.getElementById('em3').innerHTML="must contain 8 characters";
        return false;
		}
		
	return cpass;
		
		}
		
		function search(val){
			
				var xhttp = new XMLHttpRequest();
				xhttp.open("POST", "search.php", true);
				xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				xhttp.send('key='+val);
			
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
					 	document.getElementById('em1').innerHTML = this.responseText;					 
						
					}
					else {
						return false;
					}
				};
		}