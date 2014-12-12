
/*
$(document).ready(function () {
    
   
  

    $(document).on("click", ".row", function (e) {
        $(this).fadeOut("slow");
    });
    $(".button").click(function () {
        var col = vettore[Math.floor((Math.random() * vettore.length))];
		var zoz = vett[Math.floor((Math.random() * vett.length))];
        var $append = $(".result");
		col=$(window).height();
		zoz=$(window).width();
        $append.after("<div class='row'><div class='room'>"+col+"</div><div class='hours'>"+zoz+"</div></div>");
		
    });
    $(document).on("mouseenter", ".row", function (e) {
        $(this).animate({borderSpacing: -360}, {
            step: function (now, fx) {
                $(this).css('-webkit-transform', 'rotate(' + now + 'deg)');
                $(this).css('-moz-transform', 'rotate(' + now + 'deg)');
                $(this).css('transform', 'rotate(' + now + 'deg)');
            },
            duration: 1000
        }, 'linear');
    });
  
});*/
var rot=0;
var d = new Date();
var weekday = new Array(7);
weekday[0]=  "Sunday";
weekday[1] = "Monday";
weekday[2] = "Tuesday";
weekday[3] = "Wednesday";
weekday[4] = "Thursday";
weekday[5] = "Friday";
weekday[6] = "Saturday";

var polo="";
var orai=1417424400;
var oraf=1417460400;
 $(document).ready(function() {
	 $(".list li a").on("click", function(e){  
			 e.preventDefault();  
			 var hrefval = $(this).attr("href");  
			   
			 if(hrefval == "#about") {   
			 $(".location").html($(this).html());
			
			   closeSidepage();
			   polo=$(this).html();		   
			   abomba();
			  }
	 }); 
	/* 	 $(".list li").on("click", function(e){  
		 	 e.preventDefault();  
			 var distance = $('.menu1').css('width');  
			$(".location").html($(this).html());
			 if(distance == "0px") {   
			   openSidepage();  
			  } else { 
			   closeSidepage();  
			 }  
			  
			
	 }); */
	  $(".home").on("click", function(e){  
			 e.preventDefault();
			if(rot==1){
			 openSidepage();  
				rot=0;
			}else{
				closeSidepage();	
				rot=1
			}
			
			
	 }); 
  });

function lol(){
   /* var col = vettore[Math.floor((Math.random() * vettore.length))];
	var zoz = vett[Math.floor((Math.random() * vett.length))];
	document.getElementById("az").innerHTML+="<div class='row'><div class='room'>"+col+"</div><div class='hours'>"+zoz+"</div></div>";*/
}

function abomba(){
	   xmlhttpContenuti=GetXmlHttpObject();
	    if (xmlhttpContenuti==null){
			alert ("Your browser does not support Ajax HTTP");
			return;
			}
		var url="ora/req.php?polo="+polo+"&orai="+orai+"&oraf="+oraf;
		xmlhttpContenuti.onreadystatechange=boomerang;
		xmlhttpContenuti.open("GET",url,true);
		xmlhttpContenuti.send(null);
}
function boomerang(){
		if (xmlhttpContenuti.readyState==4){
			var stringa= xmlhttpContenuti.responseText.trim();
			var Re = new RegExp("%0D%0A","g");
			stringa = stringa.replace(Re,"");
		    var arr=stringa.split("<removekebab>");
		    for(var i=0; i<arr.length;i++){
				var temp=arr[i].split("/"); 
				$(".result ul").append("<li><div class='hours'>"+temp[1]+"-"+temp[2]+"</div><div class='room'>"+temp[0]+"</div></li>")
			}
		    
			//document.write(stringa);
			
		}
}
function GetXmlHttpObject(){
		if (window.XMLHttpRequest){
        return new XMLHttpRequest();
		}
		if (window.ActiveXObject){
			return new ActiveXObject("Microsoft.XMLHTTP");
		}
		return null;
	}


 
 function openSidepage() {  
	//Desktop version
	 var col=$(".mob").css('display');
	 if(col=="none"){
				$('.menu1').animate({  
			width: '20%'  
			}, 400, 'easeOutBack'); 
			$('.menu2').animate({  
				right: '1%'    
			}, 400, 'easeOutBack'); 
	 		}else{//Mobile version
					$('.menu1').animate({  
			width: '100%'  
			}, 400, 'easeOutBack'); 
			
		}
	 if(rot==1){
		$('.home').animate({  borderSpacing: 0}, {
    step: function(now,fx) {
      $(this).css('transform','rotate('+now+'deg)');
    },
    duration:'slow'
			},'easeIn');
		 //$('.home').css("transform","rotate(0deg)");
		 rot=0;
	
	 }
 }
  
function closeSidepage(){  
	//Desktop version 
	var col=$(".mob").css('display');
	
	 if(col=="none"){
		 
		$('.menu1').animate({  
		width: '0px'  
		}, 400, 'easeOutQuint');   
		$('.menu2').animate({  
		right: '11%'  
		}, 400, 'easeOutQuint');
	 
	 }else{//Mobile version
		 	$('.menu1').animate({  
				width: '0px'  
				}, 400, 'easeOutQuint');  
	 }
	
	if(rot==0){
	$('.home').animate({  borderSpacing: 180}, {
    step: function(now,fx) {
      $(this).css('transform','rotate('+now+'deg)');
    },
    duration:'slow'
			},'easeIn');
		// $('.home').css("transform","rotate(-180deg)");
			rot=1;
	 }
	


}  


















