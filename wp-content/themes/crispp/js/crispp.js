jQuery(document).ready(function($){
	var searchDefault = $('.searchInput:first').val();
	$('.searchInput').bind('focus blur', function(){
		switch ( $(this).val() ) {
			case '':
				$(this).val(searchDefault);
				break;
			case searchDefault:
				$(this).val('');
		}
	});

	$('.edit,.actions').hide();
	$('.post,.comment')
		.bind('mouseenter', function(){
			$(this).children('.edit,.actions').show();
		})
		.bind('mouseleave', function(){
			$(this).children('.edit,.actions').hide();
		});

	$.youtubeResize();
});
