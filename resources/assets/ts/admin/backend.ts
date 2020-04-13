// Global Imports
import "alpinejs";
import "@grafikart/drop-files-element";

// React Components
import "@/admin/posts/Create";
import "@/admin/posts/Editor";

/**
 * Sidebar Toggle action.
*/
const openSidebar = document.getElementById('open-sidebar');
const closeSidebar = document.getElementById('close-sidebar');
const sidebar: any = document.getElementById('sidebar');
const overlay: any = document.getElementById('overlay');

if (openSidebar) {
  openSidebar.addEventListener('click', (e) => {
    e.stopPropagation();
    e.preventDefault();
    overlay.classList.remove('hidden');
    sidebar.classList.remove('-translate-x-full', 'ease-in', 'transition-medium');
    sidebar.classList.add('translate-x-0', 'ease-out', 'transition-slow');
  });
}

if (closeSidebar) {
  closeSidebar.addEventListener('click', (e) => {
    e.stopPropagation();
    e.preventDefault();
    overlay.classList.add('hidden');
    sidebar.classList.remove('translate-x-0', 'ease-out', 'transition-slow');
    sidebar.classList.add('-translate-x-full', 'ease-in', 'transition-medium');
  });
}
