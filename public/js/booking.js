const booking_btn = document.querySelectorAll('#booking-btn');
var popup = document.querySelector('#popup-wrapper');
var btn_cancel = document.querySelector('#btn-cancel');

function booking_now(id) {
    document.getElementById("trip_id").value = id;
    popup.classList.add('show');
}

btn_cancel.onclick = function () {
    popup.classList.remove('show');
}