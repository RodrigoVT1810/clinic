function acceder(){
    var welcome = document.getElementById("welcome");
    welcome.classList.add("none-welcome");
    var home = document.getElementById("home");
    home.classList.remove("none-home");
    home.classList.add("show-home");
}