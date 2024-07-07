function verifyForm(form) {
    var userName = form.senderName.value;
    var userEmail = form.senderEmail.value;
	var userMessage = form.senderMessage.value;
    var success = 1;
    if (!userName) {
        document.getElementById("usernameMsg").style.display = "block";
        form.senderName.style.backgroundColor = "";
        form.senderName.style.border = "2px red solid";
        success = 0;
    }
    else {
        form.senderName.style.backgroundColor = "";
        form.senderName.style.border = "";
        document.getElementById("usernameMsg").style.display = "none";
    }
    if (!userEmail) {
        document.getElementById("emailMsg").style.display = "block";
        form.senderEmail.style.backgroundColor = "";
        form.senderEmail.style.border = "2px red solid";
        success = 0;
    }
    else {
        form.senderEmail.style.backgroundColor = "";
        form.senderEmail.style.border = "";
        document.getElementById("emailMsg").style.display = "none";
    }
	if (!userMessage) {
		document.getElementById("messageMsg").style.display = "block";
		form.senderMessage.style.backgroundColor = "";
		form.senderMessage.style.border = "2px red solid";
		success = 0;
	}
	else {
		form.senderMessage.style.backgroundColor = "";
		form.senderMessage.style.border = "";
		document.getElementById("messageMsg").style.display = "none";	
	}
    if(!success) {
        alert("The form is incomplete.  Please read the error message(s).");
        return false;
    }
    else {
        alert("The form was submitted succesfully!");
        return true;
    }
}