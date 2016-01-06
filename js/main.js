// JavaScript Document
$(document).ready(function(){
	
	$(".IPTxT").on("keyup", function(){
		$(this).val($(this).val().toUpperCase());
	});
	
	$(".TTE").on("click", function(){
		var id = $(this).attr("id");
		var tru= $("#C"+id).hasClass("A");
		
		//var altoDiv = $("#C"+id).height();
		//alert(altoDiv)
		var y = "#C"+id;
		if(y=='#CEST1'){y = 78;}
		else{ if(y=='#CEST2'){y=98;}
			  else{
			  }
		}
		
		if(tru == true){
			$("#C"+id).css("display","block");
			$("#C"+id).animate({
				height: y,
				opacity: "1",			
			},500, function(){
						$("#C"+id).removeClass().addClass('B');
					});
			$("#M"+id).css("display","none");
			$("#O"+id).css("display","block");
		}else{
			
			$("#C"+id).animate({
				height: "0",
				opacity: "0",			
			},500, function(){
						$("#C"+id).removeClass().addClass('A');
						$("#C"+id).css("display","none");
					});
			$("#M"+id).css("display","block");
			$("#O"+id).css("display","none");
		}
	});
	
	$(".TT").click(function(){
		var id = $(this).attr("id");
		var tru= $("#C"+id.slice(1,3)).hasClass("A");
		//#CS1
		//var altoDiv = $("#C"+id.slice(1,3)).height();
		//alert(altoDiv)
		
		var y = "#C"+id.slice(1,3);
		if((y =='#CS1') || (y=='#CS2')){
		//if(y =='#CS1'){
			y = 289;
		}else{
			y=134;
		}
		
		if(tru == true){
			$("#C"+id.slice(1,3)).animate({
				height:"0",
				opacity: "0",			
			},500, function(){
						$("#C"+id.slice(1,3)).removeClass().addClass('B');
						$("#C"+id.slice(1,3)).css("display","none");
					});
			$("#IOT"+id.slice(1,3)).css("display","none");
			$("#IMT"+id.slice(1,3)).css("display","block");

		}else{
			$("#C"+id.slice(1,3)).css("display","block");
			$("#C"+id.slice(1,3)).animate({
				height: y,
				opacity: "1",		
			},800, function(){
						$("#C"+id.slice(1,3)).removeClass().addClass('A');
					});
			$("#IOT"+id.slice(1,3)).css("display","block");
			$("#IMT"+id.slice(1,3)).css("display","none");
		}
	});
	
	$('#button').on("click",function(){
		$('.TXTCTs').css("display","none");
		$('.IPTMDF').css("display","inline");
		$('.Modf').css("display","inline");
		$('#button').css("display","none");
	});
	
	$('.BTMDF').on("click",function(){
		$('.TXTCTs').css("display","inline");
		$('.IPTMDF').css("display","none");
		$('.Modf').css("display","none");
		$('#button').css("display","block");
	});
	
	$("#cancel").on("click",function(){
		history.back();
		return false;
	});
	
		/*
	$(".AOP").on("click", function(e){
		e.preventDefault();
		var id = $(this).attr("id");
		$(".PPP").css("display","block");
		$(".PPP").animate({
			opacity: "1"
			},500);
			
		$("#CPGOPC").load("protected/views/"+id+".php");
	});
	
	$(document).bind("keydown", function(e){
		if(e.which == 27){
			$(".PPP").animate({opacity: "0"},500, function(){$(".PPP").css("display","none");});
		}
	});
	
	$("form").on("submit", function(e){
		e.preventDefault();
		var id = $(this).attr("id");
		var dt = $(this).serializeArray();
		
		dt.push({name: 'idFrom', value: id});
		
		//alert('Enviado Form=>'+id );
		
		$.ajax({
			url: 'protected/recordingUnit.php',
			type: 'POST',
			dataType: "json",
			data: dt,
		})
		.done(function(){
		})
		.fail(function(){
		});
	});
*/
	
});