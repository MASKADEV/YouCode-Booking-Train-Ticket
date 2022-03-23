
var popup = document.querySelector('#popup-wrapper');
var btn_cancel = document.querySelector('#btn-cancel');
var btn = document.getElementById("popup-btn");
btn.onclick = function() {
    popup.classList.add('show');
    // console.log('maska');
}
btn_cancel.onclick = function() {
    popup.classList.remove('show');
}

window.onclick = function(event) {
    if (event.target == popup) {
        popup.classList.remove('show');
    }
}