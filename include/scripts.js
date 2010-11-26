$(document).ready(function(){
	//hide message_body after the first one
	$("#morefeatures").hide()

	//toggle message_body
	$(".moreinfo").click(function(){
	if ($("#morefeatures").is(":hidden")) 
	{
	$("#morefeatures").slideDown("slow");
	}
	else
	{
	$("#morefeatures").slideUp("slow");
	}
	});
	
	//image popup fancy nasamnatam
	$("a#slideimg").fancybox({
		'titleShow'		: false
	});
	
	$("a#bbfolders").fancybox({
		'titleShow'		: false
	});

	
	$("#addform").fancybox({
		'scrolling'		: 'no',
		'titleShow'		: false,
	});
	$("a.addform").fancybox({
		'scrolling'		: 'no',
		'titleShow'		: false,
	});

});