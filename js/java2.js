var rot=0;
var d = new Date();
var cmp = new Array(5);
cmp[0]="Lunedì";
cmp[1]="Martedì";
cmp[2]="Mercoledì";
cmp[3]="Giovedì";
cmp[4]="Venerdì";
var week= new Array(5);
week["lun"]=0 ;
week["mar"]=1 ;
week["mer"]=2 ;
week["gio"]=3 ;
week["ven"]=4;
var comp= new Array(5);
comp[0]="lun";
comp[1]="mar";
comp[2]="mer";
comp[3]="gio";
comp[4]="ven";
var iniz=1417388400;
var d = new Date();
var n = d.getTime()/1000; 
var begin,end;

$(document).ready(function () {
    while(n>=(iniz+604800)){
		iniz+=604800;	
}
for(var i=0;i<comp.length;i++){
      $(".day").append("<option value="+comp[i]+">"+cmp[i]+"</option>");
	}
for(var i=9;i<=18;i++){
      $(".orainizio").append("<option value="+i+">"+i+":00</option>");
	  $(".orafine").append("<option value="+(i+1)+">"+(i+1)+":00</option>");
	}
		var g=$(".day").val();
		var hi=$(".orainizio").val();
		var hf=$(".orafine").val();
		var secg= week[g]*(3600*24);
		var sechi= hi*3600;
		var sechf= hf*3600;
		begin= secg+sechi+iniz;
		end=secg+sechf+iniz;
		
function dataWeek(){
		 g=$(".day").val();
		 hi=$(".orainizio").val();
		 hf=$(".orafine").val();
		 secg= week[g]*(3600*24);
		 sechi= hi*3600;
		 sechf= hf*3600;
		 begin= secg+sechi+iniz;
		 end=secg+sechf+iniz;
		 abomba();
}	

 $(".day").click(function () {
	     dataWeek()
    });
    $(".orainizio").click(function () {
			dataWeek()
		
    });
   $(".orafine").click(function () {
		dataWeek()
    });
});

var polo="";
var orai=1417694400;
var oraf=1417775400;
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
		if(polo!=""){
		var url="req.php?polo="+polo+"&orai="+begin+"&oraf="+end;
		xmlhttpContenuti.onreadystatechange=boomerang;
		xmlhttpContenuti.open("GET",url,true);
		xmlhttpContenuti.send(null);}
}
function boomerang(){
		if (xmlhttpContenuti.readyState==4){
			var stringa= xmlhttpContenuti.responseText.trim();
			var Re = new RegExp("%0D%0A","g");
			stringa = stringa.replace(Re,"");
		    var arr=stringa.split("<removekebab>");
			$(".result ul").html("");
		    for(var i=0; i<arr.length-1;i++){
				var temp=arr[i].split("/"); 
				$(".result ul").append("<li><div class='hours'>"+temp[1]+"-"+temp[2]+"</div><div class='room'>"+temp[0]+"</div></li>");
	
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


















