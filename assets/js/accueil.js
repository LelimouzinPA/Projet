let veil = document.getElementById("veil")
let veilText = document.getElementById("veilText")
veil.addEventListener("click", function() {
    veilText.style.opacity = 0
    veilText.style.transition = "opacity 1s ease-in-out 0s"
    setTimeout(veilWidth, 1001)
        /* veil.style.transition = "display 15s ease-in-out 10s"*/
    setTimeout(veilClear, 4001)
})

function veilWidth() {
    veil.style.width = "0%"
    veil.style.transition = "width 3s ease-in-out 0s"
}

function veilClear() {
    veil.style.display = "none"
}