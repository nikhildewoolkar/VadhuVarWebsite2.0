	function lookup(txtSubcaste,txtCaste) {
		if(txtSubcaste.length == 0) {
			// Hide the suggestion box.
			$('#suggestions').hide();
		} else {
			// post data to our php processing page and if there is a return greater than zero
			// show the suggestions box
			$.post("string_search.php", {mysearchString: txtSubcaste, mysearchCaste: txtCaste }, function(data){
				if(data.length >0) {
					$('#suggestions').show();
					$('#autoSuggestionsList').html(data);
				}
			});
		}
	} //end
	
	// if user clicks a suggestion, fill the text box.
	function fill(thisValue) {
		$('#txtSubcaste').val(thisValue);
		setTimeout("$('#suggestions').hide();", 200);
	}