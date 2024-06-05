document.addEventListener('DOMContentLoaded', function() {
    const profileLink = document.querySelector('.profile-link');
    const dropdownMenu = document.querySelector('.dropdown-menu');

    let isDropdownOpen = false;

    function showDropdown() {
        dropdownMenu.style.display = 'block';
        isDropdownOpen = true;
    }

    function hideDropdown() {
        dropdownMenu.style.display = 'none';
        isDropdownOpen = false;
    }

    profileLink.addEventListener('mouseenter', showDropdown);

    profileLink.addEventListener('mouseleave', function() {
        setTimeout(function() {
            if (!dropdownMenu.matches(':hover')) {
                hideDropdown();
            }
        }, 300);
    });

    dropdownMenu.addEventListener('mouseleave', hideDropdown);

    dropdownMenu.addEventListener('mouseenter', showDropdown);

    profileLink.addEventListener('click', function(event) {
        event.preventDefault();
        if (isDropdownOpen) {
            hideDropdown();
        } else {
            showDropdown();
        }
    });

    document.addEventListener('click', function(event) {
        if (!profileLink.contains(event.target) && !dropdownMenu.contains(event.target)) {
            hideDropdown();
        }
    });
});
