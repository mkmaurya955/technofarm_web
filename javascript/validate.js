function isDigits(argvalue) {
    argvalue = argvalue.toString();
    var validChars = "0123456789";
    var startFrom = 0;
    if (argvalue.substring(0, 2) == "0x") {
       validChars = "0123456789abcdefABCDEF";
       startFrom = 2;
    } else if (argvalue.charAt(0) == "0") {
       validChars = "01234567";
       startFrom = 1;
    }
    for (var n = 0; n < argvalue.length; n++) {
        if (validChars.indexOf(argvalue.substring(n, n+1)) == -1) return false;
    }
  return true;
}

function checkEmail(emailStr) {
       if (emailStr.length == 0) {
           return true;
       }
       var emailPat=/^(.+)@(.+)$/;
       var specialChars="\\(\\)<>@,;:\\\\\\\"\\.\\[\\]";
       var validChars="\[^\\s" + specialChars + "\]";
       var quotedUser="(\"[^\"]*\")";
       var ipDomainPat=/^(\d{1,3})[.](\d{1,3})[.](\d{1,3})[.](\d{1,3})$/;
       var atom=validChars + "+";
       var word="(" + atom + "|" + quotedUser + ")";
       var userPat=new RegExp("^" + word + "(\\." + word + ")*$");
       var domainPat=new RegExp("^" + atom + "(\\." + atom + ")*$");
       var matchArray=emailStr.match(emailPat);
       if (matchArray == null) {
           return false;
       }
       var user=matchArray[1];
       var domain=matchArray[2];
       if (user.match(userPat) == null) {
           return false;
       }
       var IPArray = domain.match(ipDomainPat);
       if (IPArray != null) {
           for (var i = 1; i <= 4; i++) {
              if (IPArray[i] > 255) {
                 return false;
              }
           }
           return true;
       }
       var domainArray=domain.match(domainPat);
       if (domainArray == null) {
           return false;
       }
       var atomPat=new RegExp(atom,"g");
       var domArr=domain.match(atomPat);
       var len=domArr.length;
       if ((domArr[domArr.length-1].length < 2) ||
           (domArr[domArr.length-1].length > 3)) {
           return false;
       }
       if (len < 2) {
           return false;
       }
       return true;
}




function dateValidate()
{
  var dt = new Date();
  mt = dt.getMonth();
  dy = dt.getDate();
  yy = dt.getFullYear();
  today = mt+"/"+dy+"/"+yy;
 
  var dValidate=document.frm.dateValidate.value;
  if(dValidate!="")
  {
    var arDValidate=dValidate.split("/");
    if(arDValidate.length==3)
    {
      if(arDValidate[0].length!=2 || (arDValidate[0]>32))
      {
         alert("Wrong Date format");
         return false;
      }
      else if(arDValidate[1].length!=2 || (arDValidate[1]>13))
      {
         alert("Wrong Month format");
         return false;
      }
      else if(arDValidate[2].length!=4 || (arDValidate[2]<1900))
      {
         alert("Wrong Year format");
         return false;
      }
      else
      {
        var dateDate=new Date(arDValidate[2],arDValidate[1]-1,arDValidate[0]);
        if((arDValidate[0]!=dateDate.getDate()))
        {
          alert("Wrong Date Enter e.g date month year is not correct 31 feb 2009");
          return false;
        }
      }
    }
    else
    {
    alert("Wrong Format");
    return false;
    }
  }
  else
  {
   alert("Date is blank");
   return false;
  }
}

function isAlpha(argvalue) {
  argvalue = argvalue.toString();
  var validChars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

    for (var n = 0; n < argvalue.length; n++) {
        if (validChars.indexOf(argvalue.substring(n, n+1)) == -1)
         return false;
    }
  return true;
}