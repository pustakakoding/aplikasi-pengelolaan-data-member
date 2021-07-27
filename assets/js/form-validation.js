// Fungsi untuk validasi form dengan menonaktifkan pengiriman form jika ada field yang kosong
(function () {
    'use strict'

    // ambil semua form yang ingin diterapkan fungsi validasi
    var forms = document.querySelectorAll('.needs-validation')

    // berikan keterangan pada form dan cegah pengiriman form
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
})()

// Fungsi untuk validasi file sebelum diunggah
function validasi_foto() {
    // mengambil value dari file
    var fileInput = document.getElementById('foto');
    var filePath = fileInput.value;
    var fileSize = fileInput.files[0].size;
    // tentukan extension file yang diperbolehkan
    var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

    // Jika tipe file yang diunggah tidak sesuai dengan "allowedExtensions"
    if (!allowedExtensions.exec(filePath)) {
        alert("Tipe file tidak sesuai. Harap unggah file yang memiliki tipe *.jpg atau *.png.");
        // reset input file
        fileInput.value = "";
    }
    // jika ukuran file yang diunggah lebih dari 1 Mb
    else if (fileSize > 1000000) {
        alert("Ukuran file lebih dari 1 Mb. Harap unggah file yang memiliki ukuran maksimal 1 Mb.");
        // reset input file
        fileInput.value = "";
    }
}

// Fungsi untuk validasi karakter yang boleh diinpukan pada form
function getkey(e) {
    if (window.event)
        return window.event.keyCode;
    else if (e)
        return e.which;
    else
        return null;
}

function goodchars(e, goods, field) {
    var key, keychar;
    key = getkey(e);
    if (key == null) return true;

    keychar = String.fromCharCode(key);
    keychar = keychar.toLowerCase();
    goods = goods.toLowerCase();

    // check goodkeys
    if (goods.indexOf(keychar) != -1)
        return true;
    // control keys
    if (key == null || key == 0 || key == 8 || key == 9 || key == 27)
        return true;

    if (key == 13) {
        var i;
        for (i = 0; i < field.form.elements.length; i++)
            if (field == field.form.elements[i])
                break;
        i = (i + 1) % field.form.elements.length;
        field.form.elements[i].focus();
        return false;
    };
    // else return false
    return false;
}