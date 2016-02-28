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
})
