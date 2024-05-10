
$vars = $('.about_pay .tab_item');
$butts = $('.payment .butt_item');
$butts.on('click', function() {
	var id = $(this).attr('id');
	$vars.addClass('hide');

	$vars.each(function(){
		if($(this).hasClass(id))
		{
			$(this).removeClass('hide');
		}
	});

	$butts.removeClass('active');
	$(this).addClass('active');
});	