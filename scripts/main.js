// This is in main.js
const sidebar = document.getElementById('sidebar');
const sidebarToggle = document.getElementById('sidebarToggle');

// Add event listener to the toggle button
sidebarToggle.addEventListener('click', function() {
    // Toggle the "closed" class on the sidebar
    sidebar.classList.toggle('closed');
});
