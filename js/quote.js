"use strict";

document.addEventListener("DOMContentLoaded", function () {
    var buttons = document.querySelectorAll(".quote-btn");
    var forms = document.querySelectorAll(".quote-form");

    function openForm(target) {
        // activate button
        buttons.forEach(function (b) { b.classList.remove("active"); });
        var activeBtn = document.querySelector(".quote-btn[data-form=\"" + target + "\"]");
        if (activeBtn) activeBtn.classList.add("active");

        // show form
        forms.forEach(function (f) { f.classList.remove("active"); });
        var form = document.getElementById(target);
        if (form) form.classList.add("active");

        // update URL hash
        window.location.hash = target;
    }

    // click handler
    buttons.forEach(function (btn) {
        btn.addEventListener("click", function () {
            openForm(this.dataset.form);
        });
    });

    // open form from URL hash on load
    var hash = window.location.hash.replace("#", "");
    if (hash) {
        openForm(hash);
    }
});
