// Global Imports
import "alpinejs";

// React Components
import "@/admin/posts/Create";

const openSidebar = document.getElementById('open-sidebar');
const closeSidebar = document.getElementById('close-sidebar');
const sidebar: any = document.getElementById('sidebar');

if (openSidebar) {
  openSidebar.addEventListener('click', (e) => {
    e.stopPropagation();
    e.preventDefault();
    sidebar.classList.remove('-translate-x-full', 'ease-in', 'transition-medium');
    sidebar.classList.add('translate-x-0', 'ease-out', 'transition-slow');
  });
}

if (closeSidebar) {
  closeSidebar.addEventListener('click', (e) => {
    e.stopPropagation();
    e.preventDefault();
    sidebar.classList.remove('translate-x-0', 'ease-out', 'transition-slow');
    sidebar.classList.add('-translate-x-full', 'ease-in', 'transition-medium');
  });
}
