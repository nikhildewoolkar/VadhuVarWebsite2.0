$(function(){

	$("#drop-box2").click(function(){
		$("#upl2").click();
	});

	// To prevent Browsers from opening the file when its dragged and dropped on to the page
	$(document).on('drop dragover', function (e) {
        e.preventDefault();
    }); 

	// Add events
	$('input[type=file]').on('change', fileUpload);

	// File uploader function

	function fileUpload(event){  
		$("#drop-box2").html("<p>"+event.target.value+" uploading...</p>");
		files = event.target.files;
		var data = new FormData();
		var error = 0;
		for (var i = 0; i < files.length; i++) {
  			var file = files[i];
  			console.log(file.size);
			//if(!file.type.match('image.*|application/pdf.*')) {
			  if(!file.type.match('application/pdf.*')) {
		   		$("#drop-box2").html("<p style='color:white; background-color:red'> PDF only. Select another file</p>");
		   		error = 1;
		  	}else if(file.size > 1048576){
		  		$("#drop-box2").html("<p style='color:white; background-color:red'> Too large Payload. Select another file</p>");
		   		error = 1;
		  	}else{
		  		data.append('upfile', file, file.name);
		  	}
	 	}
	 	if(!error){
		 	var xhr = new XMLHttpRequest();
		 	xhr.open('POST', 'upload2.php', true);
		 	xhr.send(data);
		 	xhr.onload = function () {
				if (xhr.status === 200) {
					$("#drop-box2").html("<p style='color:white; background-color:green'> File Uploaded Succesfully</p>");
					//The above line uploads more file one by one in the same form.
				} else {
					$("#drop-box2").html("<p style='color:white; background-color:red'> Error in upload, Try again.</p>");
				}
			};
		}
		
	}
});