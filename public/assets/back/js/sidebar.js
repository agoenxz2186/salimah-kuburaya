// Menangani klik dropdown pada sidebar
const dropdownToggle = document.querySelectorAll('.dropdown-toggle');

dropdownToggle.forEach(toggle => {
    toggle.addEventListener('click', () => {
        const dropdownMenu = toggle.nextElementSibling;
        if (dropdownMenu.style.display === 'none' || dropdownMenu.style.display === '') {
            dropdownMenu.style.display = 'block';
        } else {
            dropdownMenu.style.display = 'none';
        }
    });
});
