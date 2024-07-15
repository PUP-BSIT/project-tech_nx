document.addEventListener("DOMContentLoaded", function (event) {
    var approveButtons = document.querySelectorAll('input[name="approve"]');
    var deleteButtons = document.querySelectorAll('input[name="delete"]');

    approveButtons.forEach(function (button) {
        button.addEventListener("click", function (e) {
            if (!confirm("Are you sure you want to approve this request?")) {
                e.preventDefault();
            }
        });
    });

    deleteButtons.forEach(function (button) {
        button.addEventListener("click", function (e) {
            if (!confirm("Are you sure you want to delete this request?")) {
                e.preventDefault();
            }
        });
    });
});
