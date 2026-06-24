// Theme toggle — runs early to avoid flash
(function () {
  try {
    var saved = localStorage.getItem('qts-theme');
    if (saved === 'dark' || (saved === null && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
      document.documentElement.classList.add('dark');
    }
  } catch (e) {}
})();

window.QTS = window.QTS || {};
window.QTS.toggleTheme = function () {
  var html = document.documentElement;
  html.classList.toggle('dark');
  try {
    localStorage.setItem('qts-theme', html.classList.contains('dark') ? 'dark' : 'light');
  } catch (e) {}
};
window.QTS.isDark = function () {
  return document.documentElement.classList.contains('dark');
};
