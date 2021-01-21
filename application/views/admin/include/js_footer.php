<script>
$(document).ready(function(){
  $('input').iCheck({
    checkboxClass: 'icheckbox_square',
    radioClass: 'iradio_square',
    increaseArea: '20%' // optional
  });
});
</script>


<script>
CKEDITOR.replace( 'editor-ckeditor' ,{
  filebrowserBrowseUrl : '<?php echo base_url(); ?>filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
  filebrowserUploadUrl : '<?php echo base_url(); ?>filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
  filebrowserImageBrowseUrl : '<?php echo base_url(); ?>filemanager/dialog.php?type=1&editor=ckeditor&fldr='
});
</script>

<script>
	$(document).ready( function () {
    $('#datatable').DataTable();
} );
</script>

<!-- <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script> -->

 <script>
 	function delete_item(url, id, message) {
	swal({
		text: message,
		icon: "warning",
		buttons: true,
		dangerMode: true,
	}).then(function (willDelete) {
		if (willDelete) {
			var data = {
				'id': id,
			};
			data[csfr_token_name] = $.cookie(csfr_cookie_name);
			$.ajax({
				type: "POST",
				url: base_url + url,
				data: data,
				success: function (response) {
					location.reload();
				}
			});
		}
	});
};
 </script>

 <!-- page end--> 
 