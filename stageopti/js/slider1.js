 
  var i=0;
  var imge = [];
  var timeout=4000;
  // ______________________________
  var textar =[];
  var j=0;


imge[0] = 'url(img/slider/P1230068.jPG';
imge[1] = 'url(img/slider/P1230063.JPG';
imge[2] = 'url(img/slider/P1230067.JPG';
imge[3] = 'url(img/slider/P1230097.JPG';
imge[4] = 'url(img/slider/P1230098.JPG';
imge[5] = 'url(img/slider/P1230110.JPG';
imge[6] = 'url(img/slider/P1230124.JPG';

function changeim(){
document.getElementById('slider1img').style.backgroundImage = imge[i];
if(i < imge.length - 1){
i++
}else{
i=0;
}
setTimeout ("changeim()", timeout);
}
 window.onload = changeim();


//_______________________________________

textar[0] = 'Un Bon Espace Pour Vous';
textar[1] = 'Un service professionel';
textar[2] = 'Tous dans Elhouusnna';

function changetxt(){
   document.getElementById('changedtitel').innerHTML = textar[j];

   if(i < textar.length - 1){
    j++;
    }else{
    j=0;
    }
    setTimeout ("changetxt()", timeout);

}

window.onload = changetxt ;