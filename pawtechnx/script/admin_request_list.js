document.addEventListener("DOMContentLoaded", function (event) {
    let approveButtons = document.querySelectorAll('input[name="approve"]');
    let rejectButtons = document.querySelectorAll('input[name="reject"]');

    approveButtons.forEach(function (button) {
        button.addEventListener("click", function (e) {
            if (!confirm("Are you sure you want to approve this request?")) {
                e.preventDefault();
            }
        });
    });

    rejectButtons.forEach(function (button) {
        button.addEventListener("click", function (e) {
            if (!confirm("Are you sure you want to reject this request?")) {
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
