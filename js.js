$(function() {
	var dragInProgress = false;

    $("#draggable").draggable();

	$('#uploaded_image').mousedown(function(evt) {
		dragInProgress = true;
		mouseDown_left = evt.clientX;
		mouseDown_top = evt.clientY;
		$('#drag_box').remove();
		$('<div>').appendTo('body').attr('id', 'drag_box').css({left: evt.clientX, top: evt.clientY});
		return false;
	});
	$(document).mouseup(function() {
		dragInProgress = false;
		var db = $('#drag_box');
		if (db.width() == 0 || db.height() == 0 || db.length == 0) return;
		var img_pos = $('#uploaded_image').offset();
		var db_data = {left: db.offset().left - img_pos.left, top: db.offset().top - img_pos.top, width: db.width(), height: db.height()};
		if (confirm("Crop the image using this drag box?")) {
			location.href = 'index.php?crop_attempt=true&crop_l='+db_data.left+'&crop_t='+db_data.top+'&crop_w='+db_data.width+'&crop_h='+db_data.height;
		} else {
			db.remove();
		}
	});
	$('#uploaded_image').mousemove(function(evt) {
		if (!dragInProgress) return;
		var newLeft = mouseDown_left < evt.clientX ? mouseDown_left : evt.clientX;
		var newWidth = Math.abs(mouseDown_left - evt.clientX);
		var newTop = mouseDown_top < evt.clientY ? mouseDown_top : evt.clientY;
		var newHeight = Math.abs(mouseDown_top - evt.clientY);
		$('#drag_box').css({left: newLeft, top: newTop, width: newWidth, height: newHeight});
		return false;
	});
});