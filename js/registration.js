$(document).ready(function() {
    
    $("#register").click(function() {
        var name = $("#name").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var verify = $("#verify").val();
        var photo = $("#photo").val();
        var bio = $("#bio").val();
        
        if (name == '' || email == '' || password == '' || verify == '') {
            alert("Please fill all fields!");
        }
        
        else if ((password.length) < 6) {
            alert("Password should at least 6 character in length!");
        }
        else if (!(password).match(verify)) {
            alert("Your passwords don't match. Try again?");
        }
        else {
            $.post("register.php", {
            name1: name,
            email1: email,
            password1: password,
            photo: photo,
            bio: bio
        },
        function(data) {
            if (data == 'You have Successfully Registered.....') {
            $("form")[0].reset();
        }
            alert(data);
        });
    }
});
});