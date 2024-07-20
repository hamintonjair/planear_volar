
document.addEventListener('DOMContentLoaded', function() {
    var readMoreButtons = document.querySelectorAll('.read-more');
    var modalContent = document.getElementById('modalContent');

    readMoreButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var content = button.getAttribute('data-content');
            modalContent.innerHTML = content.replace(/([a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6})/g, '<span class="highlight-email">$1</span>');
        });
    });
});