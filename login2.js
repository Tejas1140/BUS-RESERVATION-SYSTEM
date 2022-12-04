function validate()
{
	var username=document.getElementById("username").value;
	var password=document.getElementById("password").value;

	if (username=="admin" && password=="user") 
	{
		alert("Login Successfully");
		window.open("file:///C:/Users/ABC/Desktop/Temp/webpage/index.html");
	}

	else if(username.length < 1)
	{
		alert("Please Enter Username");
	    return false;
	}
	else if (password.length < 1)
	{
		alert("Please Enter Password");
	    return false;
	}
	else
	{
		alert("Login Failed");
	}	
}