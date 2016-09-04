/**
 * YouTube Embedded Video Resizer
 * 
 * Written by Trevor Fitzgerald
 * http://trevorfitzgerald.com/
 *
 * This jQuery plugin will automatically resize all of
 * your YouTube video embeds to fill their container's
 * width. The width-height proportion will be maintained.
 *
 */

(function($){
	$.youtubeResize = function() {
		$('embed[src*="youtube.com"]').each(function(){
			sizeRatio = $(this).attr('width') / $(this).attr('height');
			newWidth = $(this).parent().parent().width();
			newHeight = Math.round(newWidth / sizeRatio);
			$(this)
				.attr('width', newWidth)
				.attr('height', newHeight)
				.parent()
					.attr('width', newWidth)
					.attr('height', newHeight);
		});
	};
})(jQuery);
