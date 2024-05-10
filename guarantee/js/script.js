$('.quest_box .tab_item').on('click', function() {
	$(this).find('.answer').slideToggle('slow');
	$(this).find('.arrow').toggleClass('active');
});

$form = $('#top-form');
$('.garanty .adv_button').on('click', function() {
	$form[0].scrollIntoView({
	    behavior: 'smooth',
	    block: 'start'
	});
});

