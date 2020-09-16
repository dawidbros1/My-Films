var managePanel = document.getElementsByClassName('managePanel');
var manageView = document.getElementsByClassName('manageView');

for (var i = 0; i < managePanel.length; i++) {
    (function (i) {
        managePanel[i].addEventListener('click', function () {
            manageView[i].classList.toggle('none');
        }, false);
    })(i);
}