document.addEventListener('DOMContentLoaded', function() {
    const openFormBtn = document.getElementById('openFormBtn');
    const closeFormBtn = document.getElementById('closeFormBtn');
    const formContainer = document.getElementById('formContainer');

    openFormBtn.addEventListener('click', function() {
        formContainer.style.display = 'block';
        openFormBtn.style.display = 'none';
    });

    closeFormBtn.addEventListener('click', function() {
        formContainer.style.display = 'none';
        openFormBtn.style.display = 'block';
    });
});