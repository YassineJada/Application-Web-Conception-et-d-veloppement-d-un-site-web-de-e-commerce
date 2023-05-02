var k=0;
var colle = [];


colle[0] = 'url(../img/slider/P1230068.jPg)';
colle[1] = 'url(../img/slider/P1230063.JPG)';
colle[2] = 'url(../img/slider/P1230067.JPG)';
colle[3] = 'url(../img/slider/P1230097.JPG)';
colle[4] = 'url(../img/slider/P1230098.JPG)';
colle[5] = 'url(../img/slider/P1230110.JPG)';
colle[6] = 'url(../img/slider/P1230124.JPG)';

function nextslide(){
    if(k == colle.length ){
        k=0;
    }

    document.getElementById('slider2').style.backgroundImage = colle[k];
    k++;
}

function backslide(){
    
    document.getElementById('slider2').style.backgroundImage = colle[k];
    k--;
    if(k < 0){k = colle.length -1 } 

}

