	subject_id = '';
	function handleHttpResponse()
	{
		if (http.readyState == 4)
		{
			if (subject_id != '')
			{
				document.getElementById(subject_id).innerHTML = http.responseText;
			}
		}
		else
		document.getElementById(subject_id).innerHTML = "<b><h3 align='center' style='color:#FF3300'>Loading...<img src='loading.gif'></h3></b>";
		
	}
	function getHTTPObject()
	{
		var xmlhttp;
		/*@cc_on
		@if (@_jscript_version >= 5)
			try {
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				try {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (E) {
					xmlhttp = false;
				}
			}
		@else
		xmlhttp = false;
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest != 'undefined')
		{
			try
			{
				xmlhttp = new XMLHttpRequest();
			}
			catch (e)
			{
				xmlhttp = false;
			}
		}
		return xmlhttp;
	}
	function getPage(div_id,url)
	{
		subject_id = div_id;
		//id = document.getElementById(id).value;
		//url = "?matid="+id;
		http.open("GET", url, true);
		http.onreadystatechange = handleHttpResponse;
		http.send(null);
		//hideEdit();
	}
	var http = getHTTPObject(); // We create the HTTP Object

	