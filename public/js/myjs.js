function ValidateEmail(inputText)  
{  
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
if(inputText.value.match(mailformat))  
{  
return true;  
}  
else  
{  
alert("You have entered an invalid email address!");  
return false;  
}  
}
function hello()
{
	alert('helo');
}
function ValidatePhone(inputtxt)
{
  var phoneno = /^\d{10}$/;
  if((inputtxt.value.match(phoneno))
        {
      return true;
        }
      else
        {
			
alert("You have entered an invalid phone number!"); 
        return false;
        }
}

function ValidateForm(email,phone)
{
	if(ValidateEmail(email) && ValidatePhone(phone))
	{
		return true;
	}
	else 
	{
		return false;
	}
	
}