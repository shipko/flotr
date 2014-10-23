options = {animation : true, title: 'Результаты тестирования', content: '&nbsp;<br />&nbsp;<br />&nbsp;<br /><div class="popover_center"><img src="template/images/search-preloader.gif" /> <br />Секундочку, результаты загружаются</div><br />&nbsp;', placement: 'left', trigger: 'manual'};
var isDisplay = false;
$('.full_result').click(function() {
	$('.full_result').popover('destroy');
	if (!$(this).hasClass('load')) {
		$(this).popover(options).popover('show');
		var id_result = $(this).attr('data-id');
		$.ajax({
			type: 'POST',
			url: 'home.php?act=get_result',
			data: ({id: id_result}),
			success: function(data) {
				$('.popover-content p').html(data);
			}
		});
		$('.full_result').removeClass('load');
		$(this).addClass('load');
	} else {
	$('.full_result').removeClass('load');
	}/*  else {
		$('.full_result').popover('destroy');
		$(this).removeClass('load');
	} */

});