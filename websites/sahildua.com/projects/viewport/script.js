
var danceTimer = 0;
var minWidth = 290;
var minEms = (minWidth/16).toFixed(2);
var width = $(window).width();
//console.log(width);
var minWidth = width*0.2;
var pixels = width;
var ems = (width/16).toFixed(2);

$(document).ready(function(){
	$('#vp-pixels').val(pixels);
	$('#vp-ems').val(ems);
	
});

function random(from,to){
    return Math.floor(Math.random()*(to-from)+from);
}

$(function(){
var widthpx = $('#vp-pixels').val();
	//console.log(widthpx);
	$("#viewport").animate({
		"width":widthpx+"px"
	},500);
	})

$(function() {
    $('#vp-small').click(function() {
		var rand = random(25,35);
		var pixels = (rand*width/100).toFixed(2);
		var ems = (rand*width/1600).toFixed(2);
		$('#vp-pixels').val(pixels);
		$("#vp-ems").val(ems);
		$("#viewport").animate({
			"width":rand+"%"
		},500);
    });
})
$(function() {
    $('#vp-medium').click(function() {
        var rand = random(45,55);
		var pixels = (rand*width/100).toFixed(2);
		var ems = (rand*width/1600).toFixed(2);
		$('#vp-pixels').val(pixels);
		$("#vp-ems").val(ems);
		$("#viewport").animate({
			"width":rand+"%"
		},500);
    });
})
$(function() {
    $('#vp-large').click(function() {
        var rand = random(65,75);
		var pixels = (rand*width/100).toFixed(2);
		var ems = (rand*width/1600).toFixed(2);
		$('#vp-pixels').val(pixels);
		$("#vp-ems").val(ems);
		$("#viewport").animate({
			"width":rand+"%"
		},500);
    });
})

$(function() {
    $('#vp-full').click(function() {
        var pixels = (width).toFixed(2);
		var ems = (width/16).toFixed(2);
		$('#vp-pixels').val(pixels);
		$("#vp-ems").val(ems);
		$("#viewport").animate({
			"width":"100%"
		},500);
    });
})

function killDance(){
	clearInterval(danceTimer);
	var danceMode = true;
	return danceMode;
}
$(function(){
	$('#vp-random').click(function(){
		killDance();
		var rand = random(20,100);
		var pixels = (rand*width/100).toFixed(2);
		var ems = (rand*width/1600).toFixed(2);
		$('#vp-pixels').val(pixels);
		$("#vp-ems").val(ems);
		$("#viewport").animate({
			"width": rand+"%"
		},500);
	});
})

$(function(){
	$("#vp-dance").click(function(){
		var danceTimer = window.setInterval(function(){
			var rand = random(20,100);
			var pixels = (rand*width/100).toFixed(2);
			var ems = (rand*width/1600).toFixed(2);
			$('#vp-pixels').val(pixels);
			$("#vp-ems").val(ems);
			$("#viewport").animate({
				"width": rand+"%"
			},1000);
		},1000);
	});
})

$(function(){
	$("#vp-increase").click(function(){
		var incWidth = 290;
		var incTimer = window.setInterval(function(){
			var viewWidth = $("#viewport").width();
			$('#vp-pixels').val(viewWidth);
			$("#vp-ems").val((viewWidth/16).toFixed(2));
			$("#viewport").animate({
				"width": incWidth+"px"
			},20);
			incWidth += 10;
			if(incWidth>(width)) clearInterval(incTimer);
		},100);
	});
})

$(function(){
	$("#vp-decrease").click(function(){
		var decWidth = width;
		var decTimer = window.setInterval(function(){
			var viewWidth = $("#viewport").width();
			$('#vp-pixels').val(viewWidth);
			$("#vp-ems").val((viewWidth/16).toFixed(2));
			$("#viewport").animate({
				"width": decWidth+"px"
			},20);
			decWidth -= 10;
			if(decWidth<minWidth) clearInterval(decTimer);
		},100);
	});
})


//Pixel Input
$(document).keydown(function(e){
	var val = Math.floor(parseInt($("#vp-pixels").val()));
	
	if(e.which === 38){ //up key
		val++;
		$("#viewport").animate({
				"width": val+"px"
		},0.1);
		$("#vp-pixels").val(val);
		var ems = (val/16).toFixed(2);
		$('#vp-ems').val(ems);
	}
	else if(e.which === 40){ //down key
		val--;
		$("#viewport").animate({
				"width": val+"px"
		},0.1);
		$("#vp-pixels").val(val);
		var ems = (val/16).toFixed(2);
		$('#vp-ems').val(ems);
	}
	
	if(val<minWidth){
		$("#vp-pixels").val(minWidth);
		$("#vp-ems").val(minEms);
		$("#viewport").animate({
				"width": minWidth+"px"
		},500);
	}
	/*$(".vp-pixels").focusout(function(){
		var value = $("#vp-pixels").val();
		$("#viewport").animate({
				"width": value+"px"
		},500);
		if(val<minWidth){
			$("#vp-pixels").val(minWidth);
			$("#vp-ems").val(minEms);
			$("#viewport").animate({
				"width": minWidth+"px"
			},500);
		}
	});*/
});

