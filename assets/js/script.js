const sidebar = document.getElementById('default-sidebar');
const toggleBtn = document.getElementById('sidebarToggle');
const overlay = document.getElementById('sidebarOverlay');

function openSidebar() {
    sidebar.classList.remove('-translate-x-full');
    overlay.classList.remove('hidden');
}

function closeSidebar() {
    sidebar.classList.add('-translate-x-full');
    overlay.classList.add('hidden');
}

toggleBtn.addEventListener('click', () => {
    sidebar.classList.contains('-translate-x-full')
        ? openSidebar()
        : closeSidebar();
});

overlay.addEventListener('click', closeSidebar);

