$(document).ready(function() {
	var count = 1;
	var myVar = window.setInterval(function() {
		$(".flow_text").each(function() {
			$(this).css("display", "none");
		})
		$("#flow_text" + count.toString()).css("display", "inline-block");
		count += 1;
		if (count == $("#id_num_statements").val()) count = 0;
	}, 2000);

    $("#help_button").click(function(){
        $("#main_wrap").addClass("help_pushed");
        $("#help_wrap").addClass("help_pushed");
    })
    $("#help_return").click(function(){
        $("#main_wrap").removeClass("help_pushed");
        $("#help_wrap").removeClass("help_pushed");
    })

    $("#write_own").click(function(){
        $("#create_new").css("visibility","visible");
    })
    $("#close_create_new").click(function(){
        $("#create_new").css("visibility","hidden");
    })
})
