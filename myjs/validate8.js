        function isFNameValid() {
			var name = reg_form.txtFName.value;
			const name_pattern = /^[A-Za-z]+$/;
           	if(!(name_pattern.test(name)))
			{
				alert ("Invalid First Name");	
				reg_form.txtFName.focus();
			}
			else{
				
				reg_form.txtMName.focus();
			}
        }
		
		function isMNameValid() {
			var name = reg_form.txtMName.value;
			const name_pattern = /^[A-Za-z]+$/;
           	if(!(name_pattern.test(name)))
			{
				alert ("Invalid Middle Name");	
				reg_form.txtMName.focus();
			}
			else{
				
				reg_form.txtLastName.focus();
			}
        }
		function isLNameValid() {
			var name = reg_form.txtLastName.value;
			const name_pattern = /^[A-Za-z]+$/;
           	if(!(name_pattern.test(name)))
			{
				alert ("Invalid Last Name");	
				reg_form.txtLastName.focus();
			}
			else{
				
				reg_form.txtGender.focus();
			}
        }
		function isHeightValid() {
            var height = reg_form.txtHeight1.value;
			const height_pattern = /^[0-9]+$/;
            if(!(height_pattern.test(height)))
			{
				alert ("Please Enter Height in cm e.g 178");	
				reg_form.txtHeight1.focus();
			}
			else
			{
				return true;
			}
			
        }
		
		function isEditHeightValid() {
            var height = editForm5.txtHeight1.value;
			const height_pattern = /^[0-9]+$/;
            if(!(height_pattern.test(height)))
			{
				alert ("Please Enter Height in cm e.g: 178");	
				editForm5.txtHeight1.focus();
			}
			else
			{
				return true;
			}
			
        }
        
        function validator() {
            var problem = false;
            if(!isEmailValid()){
                alert("Email is not valid");
                problem = true;
            }
            if(!isNameValid()){
                alert("Name is not valid");
                problem = true;
            }
            if(!isPhoneValid()){
                alert("Phone no is not valid");
                problem = true;
            }
            if(!problem){
                window.location.replace("success.html");
            }
        }