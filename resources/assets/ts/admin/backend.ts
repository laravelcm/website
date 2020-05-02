// Global Imports
import axios from "axios";
import "alpinejs";
import flatpickr from "flatpickr";

// React Components
import '@/admin/components/Dropzone/Simple';
import "@/admin/components/Editor";

// Custom Style
import "../../sass/plugins.scss";

// Remove items on CRUD
const element = document.getElementById('remove-item');
if (element) {
  const span: any = element.firstElementChild;
  const url: any = element.getAttribute('data-url');

  element.addEventListener('click', (e) => {
    e.preventDefault();
    span.classList.remove('hidden');
    axios.delete(url, {
      headers: {
        "X-Requested-With": "XMLHttpRequest",
      },
    }).then((response) => {
      setTimeout(() => {
        window.location.href = response.data.redirect_url;
      }, 1000);
    });
  });
}

flatpickr(".timepicker", {
  enableTime: true,
  noCalendar: true,
  dateFormat: "H:i",
  time_24hr: true
});

flatpickr(".datepicker", {
  minDate: "today"
});
