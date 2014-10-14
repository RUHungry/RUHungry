$(document).ready(function() {

    function popup() {
        $("#logindiv").css("display", "block");
    }

    $("#login #cancel").click(function() {
        $(this).parent().parent().hide();
    });

    $("#add").click(function() {
        $("#adddiv").css("display", "block");
    });
	
	$("#edit").click(function() {
        $("#editdiv").css("display", "block");
    });
	
	$("#delete").click(function() {
        $("#deletediv").css("display", "block");
    });
	
    $("#add_form #cancel").click(function() {
        $(this).parent().parent().hide();
    });
	
	$("#delete_form #cancel").click(function() {
        $(this).parent().parent().hide();
    });
	$("#edit_form #cancel").click(function() {
        $(this).parent().parent().hide();
    });

//contact form popup send-button click event
	$("#delete_submit").click(function() {
        var ID = $("#delete_ID").val();
        if (ID == "")
        {
            alert("Restaurant ID Required");
			return false;
        } 
		$(this).parent().parent().hide();;
		$("#delete_form").submit();
		return true;
	});	
   $("#add_submit").click(function() {
        var ID = $("#add_ID").val();
        var name = $("#add_name").val();
        if (name == "" || ID == "" )
        {
            alert("Restaurant ID and Name Required");
			return false;
        }
        
		$(this).parent().parent().hide();;
		$("#add_form").submit();
		return true;
        
    });
	
	$("#edit_submit").click(function() {
        var ID = $("#edit_ID").val();
        var name = $("#edit_name").val();
        if (name == "" || ID == "" )
        {
            alert("Restaurant ID and Name Required");
			return false;
        }
        
		$(this).parent().parent().hide();;
		$("#edit_form").submit();
		return true;
        
    });

//login form popup login-button click event
    $("#loginbtn").click(function() {
        var name = $("#username").val();
        var password = $("#password").val();
        if (username == "" || password == "")
        {
            alert("Username or Password was Wrong");
        }
        else
        {
            $("#logindiv").css("display", "none");
        }
    });

});

 