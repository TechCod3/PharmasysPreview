var LogIn = document.getElementById("LoginButton");
var Tuser = document.getElementById("user");

LogIn.addEventListener("click", Loguear);

function Loguear()
{
    if(Tuser.value == "Daniel")
    {
        window.location.replace("Home");
    }
    else
    {
        alert("No existen datos de acceso para este usuario")
    }
}