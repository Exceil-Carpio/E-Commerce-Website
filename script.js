function SendMail(){
    var params = {
        from_name : document.getElementById("from_name").value,
        email_add : document.getElementById("email_add").value,
        message : document.getElementById("message").value
    }
    emailjs.send("service_ujn9fb5", "template_myjiabm", params).then(function(res){
        alert("Message Successfully Sent!")
    }
    )
}