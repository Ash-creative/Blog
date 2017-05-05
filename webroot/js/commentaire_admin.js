document.getElementById("listusers").onchange = function() {
    if (document.getElementById("listusers").value == 0) {
        var url = "?module=commentaires&action=admin";
    } else {
        var url = "?module=commentaires&action=admin&user=" + document.getElementById("listusers").value;
    }
    window.location = url;
}