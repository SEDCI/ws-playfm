/* PlayFM Admin JS */

$('.delrec').on('click', function() {
	return confirm('Are you sure you want to delete this record?');
});

$('#preview').on('hidden.bs.modal', function() {
	$('#preview img').attr('src', '');
});

$('.thumbs').on('click', function() {
	var src = $(this).attr('src').replace('thumb/', '');
	var desc = $(this).closest('tr').find('.description').text();
	$('#preview img').attr({ 'src' : src, 'title' : desc });
});

$('.remimg').on('click', function() {
	var d = $(this).closest('div').find('div');
	var txt = '<div class="alert alert-warning">Image removed. Update to complete removal.</div><input type="hidden" name="contidel" value="true">';
	d.empty().append(txt);
	//$('#curcontenti').fadeTo(200, 0.1);
});

$('.datepicker').datepicker({
	format: "yyyy-mm-dd",
	//endDate: "now",
	startView: 2,
	clearBtn: true,
	autoclose: true,
	todayHighlight: true,
	orientation: "top auto"
});
