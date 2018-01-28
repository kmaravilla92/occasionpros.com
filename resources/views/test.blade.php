<form method="POST" action="/test-multi-upload" enctype="multipart/form-data">
{{csrf_field()}}
	<input type="file" name="files[]">
	<input type="file" name="files[]">
	<input type="file" name="files[]">
	<input type="file" name="files[]">
	<button type="submit">SUBMIT</button>
</form>