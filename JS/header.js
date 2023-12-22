document.addEventListener('DOMContentLoaded', function() {
    var image = document.querySelector('.menuheader img');
    var sousmenu = document.querySelector('.sousmenu');

    image.addEventListener('click', function() {
        sousmenu.style.display = (sousmenu.style.display === 'block') ? 'none' : 'block';
    });
});