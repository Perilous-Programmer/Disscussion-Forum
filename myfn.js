/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function addDisc() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            document.getElementById("postlist").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("post", "dbmethodmain.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("Insert=1&title=" + document.getElementById("disname").value + "&desc=" + document.getElementById("question").value);
}
function getdisclist() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("postlist").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET", "dbmethodmain.php", true);
    xmlhttp.send();
}

function addcomment() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            document.getElementById("comms").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("post", "dbmethodcomments.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("Insert=1&post=" + getParameterByName("post") + "&name=" + document.getElementById("name").value + "&Comment=" + document.getElementById("Comment").value);
}
function getpostdetail() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            document.getElementById("post_Discription").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET", "dbmethoddetail.php?post=" + getParameterByName("post"), true);
    xmlhttp.send();
}
function getpostcomments() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            document.getElementById("comms").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET", "dbmethodcomments.php?post=" + getParameterByName("post"), true);
    xmlhttp.send();
}
function getParameterByName(name, url) {
    if (!url)
        url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
    if (!results)
        return null;
    if (!results[2])
        return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}