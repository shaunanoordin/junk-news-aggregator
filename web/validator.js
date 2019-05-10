<script>
function validateForm(){
	$(".check").hide();
	
		var specialChars = "<>#$^*()_+[]{}|~-="
var check = function(string){
    for(i = 0; i < specialChars.length;i++){
        if(string.indexOf(specialChars[i]) > -1){
            return false
        }
    }
    return true;
}

if(check($('#reason').val()) == false){
    alert('Your form contains illegal characters and cannot be submitted.');
	return false;
}
	
	
	
	
	if (!$("#firstname").val()){
	$("#firstnamecheck").show();
	}
	if (!$("#lastname").val()){
	$("#lastnamecheck").show();
	}
	if (!$("#email").val()){
	$("#emailcheck").show();
	}
	if (!$("#telephone").val()){
	$("#telephonecheck").show();
	}

	if (!$("#reason").val()){
	$("#reasoncheck").show();
	}
	if ((!$("#firstname").val())||(!$("#lastname").val())||((!$("#email").val()))||(!$("#reason").val())){
		return false;
	}
	if ($("#email").val().indexOf('@') == -1){
	    $("#emailcheck").show();	
		return false;
	}
	if ($("#telephone").match(/^\d+$/)){
	    $("#telephonecheck").show();	
		return false;
	}
	

	}
</script>