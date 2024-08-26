document.addEventListener('DOMContentLoaded', function() {
    setTimeout();
});

setTimeout(function() {
    var successMessage = document.getElementById('success-message');
    if (successMessage) {
        successMessage.classList.add('fade-out');
        setTimeout(function() {
            successMessage.style.display = 'none';
        }, 500);
    }
}, 2000);