document.addEventListener("DOMContentLoaded", () => {
    // Example behavior: Alert for actions (customize as needed)
    const confirmButtons = document.querySelectorAll('.confirm-action');

    confirmButtons.forEach(btn => {
        btn.addEventListener('click', (e) => {
            if (!confirm("Are you sure you want to proceed?")) {
                e.preventDefault();
            }
        });
    });
});
