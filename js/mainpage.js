if (document.readyState == "loading") {
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready()
    alert("loaded")
}



function ready() {
    alert("loaded")
}

alert("WTF")