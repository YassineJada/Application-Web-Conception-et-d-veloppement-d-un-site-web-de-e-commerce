
     
var el;                                                    

function countCharacters() {                                    
var textEntered, countRemaining, counter;          
textEntered = document.getElementById('frm2id').value;  
counter = (500 - (textEntered.length));
countRemaining = document.getElementById('lng'); 
countRemaining.innerHTML = counter;    
if(500 - (textEntered.length) >= 0){
    countRemaining = document.getElementById('lng'); 
    countRemaining.style.color = "green";
}else{
    countRemaining = document.getElementById('lng'); 
    countRemaining.style.color = "red";
}   
} 

el = document.getElementById('frm2id');                   
el.addEventListener('keyup', countCharacters, false);

textEntered = document.getElementById('frm2id').value; 


if(500 - (textEntered.length) >= 0){
    countRemaining = document.getElementById('lng'); 
    countRemaining.style.color = "green";
}


