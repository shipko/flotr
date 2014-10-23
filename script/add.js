function changeSubject() {
	var subjectId = $('#subjectAction').val();
	$.get('test.php?sec=add&cat=load&load=category',{id: subjectId, categoryId: cat_id }, 
	function(result) {
		$('#catAction').html(result);
	});
}

changeSubject();
$('#subjectAction').change(function() {
	changeSubject();
});

