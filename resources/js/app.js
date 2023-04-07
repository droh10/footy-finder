import './bootstrap';
import '../sass/app.scss';
import flatpickr from "flatpickr";
window.searchBar = function () {
   document.getElementById('search-bar-frm').submit();
}
window.initDateInput = function(element){
   new flatpickr(element, {});
}
window.initTimeInput = function(element){
   new flatpickr(element, {
      enableTime: true,
      noCalendar: true,
      dateFormat: "H:i",
   });
}