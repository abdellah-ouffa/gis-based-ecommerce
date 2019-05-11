$(document).ready(function () {
	// body...
	$('.btn-remove').click(function () {
		var tragetFormId = $(this).parent().attr('id');
		var resourceName = $(this).parent().data('resource-name');
		deleteResource(resourceName, tragetFormId);
	});

	function deleteResource(resourceName, tragetFormId) {
		Swal.fire({
			title: 'Are you sure?',
			text: "You won't be able to revert this " + resourceName + " !",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			if (result.value) {
				console.log('Tehdsfgsdhfgsd')
				$('#' + tragetFormId).submit();
			}
		});
	}
})

