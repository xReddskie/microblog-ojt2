function openNav(postId) {
    document.getElementById("mySidenav" + postId).style.width = "100px";
    document.getElementById("filter" + postId).style.display = "block";
}

function closeNav(postId) {
    document.getElementById("mySidenav" + postId).style.width = "0";
    document.getElementById("filter" + postId).style.display = "none";
}
