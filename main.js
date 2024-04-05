// Fungsi untuk menampilkan popup
function showPopup() {
    document.getElementById('searchPopup').style.display = 'block';
}

// Fungsi untuk menutup popup
function closePopup() {
    document.getElementById('searchPopup').style.display = 'none';
}

// Fungsi untuk menutup popup jika klik dilakukan di luar popup atau di dalam form pencarian
// window.addEventListener('click', function(event) {
//     var popup = document.getElementById('searchPopup');
//     var button = document.getElementById('showPopup');
//     var form = document.getElementById('formsearch');
//     if (event.target != popup && event.target != button && event.target.form != form) {
//         popup.style.display = 'none';
//     }
// });

// Mengaitkan fungsi showPopup dengan event klik pada objek
document.getElementById('showPopup').addEventListener('click', showPopup);



document.getElementById('hamburger').addEventListener('click', function() {
    document.getElementById('sidebar').style.left = '0';
});

document.body.addEventListener('click', function(event) {
    if (event.target.id !== 'hamburger' && event.target.closest('.sidebar') === null) {
        document.getElementById('sidebar').style.left = '-250px';
    }
});
