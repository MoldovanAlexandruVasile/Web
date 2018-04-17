function myFunction(myParam) {
    document.getElementById(myParam).classList.toggle("show");
}

window.onmouseout = function(event) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains("show")) {
                openDropdown.classList.remove("show");
            }   
        }
}