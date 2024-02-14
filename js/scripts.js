function openNav() {
    document.getElementById("sidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("sidenav").style.width = "0";
}

document.addEventListener('DOMContentLoaded', function () {
    var openSidenavButton = document.getElementById("openSidenavButton");
    openSidenavButton.addEventListener("click", openNav);

    var closeSidenavButton = document.querySelector(".closebtn");
    closeSidenavButton.addEventListener("click", closeNav);
});
