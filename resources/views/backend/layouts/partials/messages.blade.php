<script type="text/javascript">
	$(document).ready(function(){
		@if(Session::has('success'))
			messageBox("{{ Session::get('success') }}", "", "success");
		@endif

		@if(Session::has('error'))
			messageBox("{{ Session::get('error') }}", "", "error");
		@endif

		function messageBox(title, content, type) {
			Swal.fire(
				title,
				content,
				type
			);
		}
	});
</script>