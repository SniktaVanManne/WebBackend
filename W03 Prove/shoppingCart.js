<script type="text/javascript">

var addressPass    = false;
var cityPass       = false;
var zipPass        = false;

var address_message     = document.getElementsByName("address_message")[0];
var city_message        = document.getElementsByName("phone_message")[0];
var zip_message         = document.getElementsByName("credit_message")[0];

function validateCity()
{
    var city          = document.getElementsByName("city")[0];

    if (city.value == "")
    {
      firstPass = false;
      first_name_message.innerText = "First Name Cannot Be Blank.";
    }
    else
    {
       city_message.innerText = "";
       cityPass = true;
    }

    return cityPass;
}

function validateAddress()
{
    var address          = document.getElementsByName("address")[0];

    if (address.value == "")
    {
       addressPass = false;
       address_message.innerText = "Address Cannot Be Blank.";
    }
    else
    {
       address_message.innerText = "";
       addressPass = true;
    }

    return addressPass;
}


function validateZip()
{
    var zip          = document.getElementsByName("zip")[0];
    var zipPattern   = /\d{5}?/;

    if (zip.value == "")
    {
       zipPass = false;
       zip_message.innerText = "Zip Code Cannot Be Blank.";
    }
    else if (zip.value.search(expPattern) != 0)
    {
      zipPass = false;
      zip_message.innerText = "Wrong format. Zip Codes are 5 Numbers";
    }
    else if (zip.value.search(expPattern) == 0)
    {
       zip_message.innerText = "";
       zipPass = true;
    }

  return zipPass;
}

function validateSubmit()
{
  var submit_message = document.getElementsByName("submit_message")[0];

  if(addressPass == false)
  {
    document.getElementsByName("first_name")[0].focus();
    submit_message.innerText = "One or more fields are invalid.";
    first_name_message.innerText = "First Name field cannot be blank.";
    return false;
  }
  else if(cityPass == false)
  {
    document.getElementsByName("last_name")[0].focus();
    submit_message.innerText = "One or more fields are invalid.";
    last_name_message.innerText = "Last Name field cannot be blank.";
    return false;
  }
  else if(zipPass == false)
  {
    document.getElementsByName("address")[0].focus();
    submit_message.innerText = "One or more fields are invalid.";
    address_message.innerText = "Address field cannot be blank.";
    return false;
  }
  else
  {
    document.getElementById("myForm").submit();
    return false;
  }

}

</script>
