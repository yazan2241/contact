function deleteUser(params) {
    var httpc = new XMLHttpRequest();
    var url = '../backend/deleteContact.php';
    httpc.open("POST" , url , true);

    httpc.onreadystatechange = function() {
        if(httpc.readyState == 4 && httpc.status == 200) {
            console.log(httpc.responseText);
        }
    };
    httpc.send(params);
}