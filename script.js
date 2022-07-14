function load() {
    document.getElementById("contentLoad").innerHTML = decodeURI(localStorage.getItem("content"));
}

function save() {
    localStorage.setItem("content", document.getElementById("contentSave").innerHTML);
}