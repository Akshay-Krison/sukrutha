$(".custom-file-input").on("change", function() {
	var fileName = $(this).val().split("\\").pop();
	$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

//------SHOW-PASSWORD-------//

$(document).ready(function () {
	$('.pass_show').append('<span class="ptxt">Show</span>');
});
$(document).on('click', '.pass_show .ptxt', function () {
	$(this).text($(this).text() == "Show" ? "Hide" : "Show");
	$(this).prev().attr('type', function (index, attr) { return attr == 'password' ? 'text' : 'password'; });
});

// Loading button plugin (removed from BS4)
(function ($) {
	$.fn.button = function (action) {
		if (action === 'loading' && this.data('loading-text')) {
			this.data('original-text', this.html()).html(this.data('loading-text')).prop('disabled', true);
		}
		if (action === 'reset' && this.data('original-text')) {
			this.html(this.data('original-text')).prop('disabled', false);
		}
	};
}(jQuery));	


$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

$('.selectpicker').selectpicker();

$('input[type="text"], textarea').keyup(function () {
	$(this).removeClass('input-error');
	$("#div_ajax_res").slideUp();
});
$('input[type="file"]').keyup(function () {
	$(this).siblings('.custom-file-label').removeClass('input-error');
	$("#div_ajax_res").slideUp();
});
$('.selectpicker').change(function(){
	$(this).siblings('.dropdown-toggle').removeClass('input-error');
	$("#div_ajax_res").slideUp();
});

