/*--
	Descripción: Valiciones JS para formulario.
	Autor: Salvador Menchú Azurdia 
	Email: smdevsys@gmail.com 
	https://github.com/smdevsys
--*/

//Border color for the field
function validColor(borderColor){
    
     if(borderColor == 0){	    
		badBorder = "#F40000";
		return badBorder;
	 }
	 
     if(borderColor == 1){
		 okBorder = "#62b9d9";
		 return okBorder;
	 }
	 
}

//Validate border color of the general field  [A-Z]
function validField(frmField){
   var expreg = /^[A-Za-z\s\xF1\xD1]+$/;
   if (frmField.value == "" || frmField.value.match(/^\s+$/) || !(expreg.test(frmField.value))) {
	   var bad = 0;
	   badBorder = validColor(bad);	   
       frmField.focus();
       frmField.style.borderColor = badBorder;
       return false;
   } else {        
        var ok = 1;
        okBorder = validColor(ok);
        frmField.style.borderColor = okBorder;
        return true;
   }          
           
}

//Validate border color of the general field  [A-Z  0-9  Char]
function validFieldAlpha(frmField){
   if (frmField.value == "" || frmField.value.match(/^\s+$/)) {
	   var bad = 0;
	   badBorder = validColor(bad);	   
       frmField.focus();
       frmField.style.borderColor = badBorder;
       return false;
   } else {        
        var ok = 1;
        okBorder = validColor(ok);
        frmField.style.borderColor = okBorder;
        return true;
   }          
           
}

//Validate border color of the password and confirm password field
function validPass(frmField, frmFieldConfirm){
   
   if (frmFieldConfirm.value == "" || frmFieldConfirm.value.match(/^\s+$/)) {
	   var bad = 0;
	   badBorder = validColor(bad);	   
       frmFieldConfirm.focus();
       frmFieldConfirm.style.borderColor = badBorder;
	   return false;
   } else {   

		if (frmField.value != frmFieldConfirm.value ){
              var bad = 0;
			  badBorder = validColor(bad);       
			  frmFieldConfirm.focus();
              frmFieldConfirm.style.borderColor = badBorder;
		      return false;
         } else {
              var ok = 1;
			  okBorder = validColor(ok);            		 
			  frmFieldConfirm.style.borderColor = okBorder;
              return true;
         }            		
   }          
           
}

//Validate Email 
function validEmail(frmField) {
       //var expreg = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/; 
	     var expreg = /^\w{3,}(['\.\-\+]?\w{3,})*@\w{3,}([\.-]?\w+)*(\.\w{2,})+$/;
        if ( !expreg.test(frmField.value) ) {
              var bad = 0;
			  badBorder = validColor(bad);
			  frmField.focus();
              frmField.style.borderColor = badBorder;
              return false;
        } else {
              var ok = 1;
			  okBorder = validColor(ok);
			  frmField.style.borderColor = okBorder;
              return true;
        }
}
      
//Validate Phone	  
function validPhone(frmField){
        var expreg = /^([0-9\+\s\+\-\(\)])+$/; 
          if(frmField.value == "" || !expreg.test(frmField.value)){  		
				var bad = 0;
				badBorder = validColor(bad);
				frmField.focus();
                frmField.style.borderColor = badBorder;
                return false;  
           } else {
		        var ok = 1;
				okBorder = validColor(ok);
                frmField.style.borderColor = okBorder;
                return true;
           }
}
            
function validZipCode(frmField){
		  var expreg = /^([0-9]{5})(?:[-\s]*([0-9]{4}))?$/;
          var cont = frmField.value.length; 
           if(cont < 5 || !expreg.test(frmField.value)){ 
		            var bad = 0;
					badBorder = validColor(bad);
            		frmField.focus();
                    frmField.style.borderColor = badBorder;
                    return false;   
            	} else {
					var ok = 1;
					okBorder = validColor(ok);        		
                    frmField.style.borderColor = okBorder;
                    return true;
            	}
}

function validFieldNumeric(frmField){
          var expreg = /^([0-9])+$/;
           if(frmField.value == "" || !expreg.test(frmField.value)){ 
		            var bad = 0;
					badBorder = validColor(bad);
            		frmField.focus();
                    frmField.style.borderColor = badBorder;
                    return false;   
            	} else {
					var ok = 1;
					okBorder = validColor(ok);        		
                    frmField.style.borderColor = okBorder;
                    return true;
            	}
}



function validCreditCardNumber(frmField){
          var expreg = /^([0-9]{16})+$/;
           if(frmField.value == "" || !expreg.test(frmField.value)){ 
		            var bad = 0;
					badBorder = validColor(bad);
            		frmField.focus();
                    frmField.style.borderColor = badBorder;
                    return false;   
            	} else {
					var ok = 1;
					okBorder = validColor(ok);        		
                    frmField.style.borderColor = okBorder;
                    return true;
            	}
}

function validVerifNumber(frmField){
          var expreg = /^([0-9])+$/;
           if(frmField.value == "" || !expreg.test(frmField.value) || frmField.value < 5){ 
		            var bad = 0;
					badBorder = validColor(bad);
            		frmField.focus();
                    frmField.style.borderColor = badBorder;
                    return false;   
            	} else {
					var ok = 1;
					okBorder = validColor(ok);        		
                    frmField.style.borderColor = okBorder;
                    return true;
            	}
}
			
function validAmount(frmField){
          var expreg = /^([0-9])*[.]?[0-9]*$/;
           if(frmField.value == "" || !expreg.test(frmField.value)){ 
		            var bad = 0;
					badBorder = validColor(bad);
            		frmField.focus();
                    frmField.style.borderColor = badBorder;
                    return false;   
            	} else {
					var ok = 1;
					okBorder = validColor(ok);        		
                    frmField.style.borderColor = okBorder;
                    return true;
            	}
}
			
            
function validForm(myForm, nameForm) {
	if (
	
     //Order Detail
	 validField(myForm['nomclient']) &&
	 validFieldAlpha(myForm['CIN']) &&

	 validEmail(myForm['clientemail']) &&
	 validFieldAlpha(myForm['adressclient']) &&
	 validField(myForm['ville']) &&
	 validZipCode(myForm['zipcode']) &&
	 validPhone(myForm['clientphone']) 

	  
	 )
	 
	 //return true - submit form
	  document.getElementById(nameForm).submit();
	 
	 }

