// Inserts the site header & footer so we don't repeat HTML across pages.
window.QTS = window.QTS || {};

window.QTS.renderHeader = function (active) {
  var nav = [
    { id: 'home',    label: 'Home',         href: 'index.html' },
    { id: 'survey',  label: 'Take Survey',  href: 'survey.html' },
    { id: 'about',   label: 'About',        href: 'about.html' },
    { id: 'privacy', label: 'Privacy',      href: 'privacy.html' },
    { id: 'terms',   label: 'Terms',        href: 'terms.html' }
  ];

  var navHtml = nav.map(function (n) {
    var cls = 'nav-link' + (n.id === active ? ' active' : '');
    return '<a href="' + n.href + '" class="' + cls + '">' + n.label + '</a>';
  }).join('');

  var html = '' +
    '<div class="pride-bar"></div>' +
    '<header class="site-header">' +
      '<div class="max-w-6xl mx-auto px-5 sm:px-8 h-16 flex items-center justify-between gap-4">' +
        '<a href="index.html" class="brand-mark">' +
          '<span class="brand-dot"></span>' +
          '<span>Out&nbsp;in&nbsp;Tech&nbsp;<span style="color:var(--primary)">Survey</span></span>' +
        '</a>' +
        '<nav class="hidden md:flex items-center gap-1">' + navHtml + '</nav>' +
        '<div class="flex items-center gap-2">' +
          '<button onclick="QTS.toggleTheme()" class="theme-toggle" aria-label="Toggle dark mode" title="Toggle theme">' +
            '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" width="18" height="18" class="block dark:hidden"><circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M4.93 19.07l1.41-1.41M17.66 6.34l1.41-1.41"/></svg>' +
            '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" width="18" height="18" class="hidden dark:block"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>' +
          '</button>' +
          '<a href="survey.html" class="btn btn-primary hidden sm:inline-flex" style="padding:.55rem 1rem;font-size:.88rem">Take the Survey</a>' +
          '<button class="md:hidden theme-toggle" onclick="QTS._toggleMobile()" aria-label="Open menu">' +
            '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" width="18" height="18"><path d="M4 6h16M4 12h16M4 18h16"/></svg>' +
          '</button>' +
        '</div>' +
      '</div>' +
      '<div id="qts-mobile-nav" class="md:hidden hidden border-t" style="border-color:var(--line);background:var(--surface)">' +
        '<div class="px-5 py-3 flex flex-col gap-1">' + navHtml + '</div>' +
      '</div>' +
    '</header>';

  var holder = document.getElementById('site-header');
  if (holder) holder.innerHTML = html;
};

window.QTS._toggleMobile = function () {
  var el = document.getElementById('qts-mobile-nav');
  if (el) el.classList.toggle('hidden');
};

window.QTS.renderFooter = function () {
  var year = new Date().getFullYear();
  var html = '' +
    '<footer class="site-footer">' +
      '<div class="max-w-6xl mx-auto px-5 sm:px-8 py-12 grid md:grid-cols-3 gap-10">' +
        '<div>' +
          '<div class="brand-mark"><span class="brand-dot"></span><span>Out in Tech Survey</span></div>' +
          '<p class="mt-3 text-sm" style="color:var(--ink-2);max-width:32ch">An anonymous community research project building safer pathways into tech for queer people, globally — with a featured focus on Nepal.</p>' +
        '</div>' +
        '<div>' +
          '<h4 style="font-weight:600;color:var(--ink);margin-bottom:.6rem">Pages</h4>' +
          '<ul class="text-sm space-y-1.5" style="color:var(--ink-2)">' +
            '<li><a href="index.html" class="hover:underline">Home</a></li>' +
            '<li><a href="survey.html" class="hover:underline">Take the Survey</a></li>' +
            '<li><a href="about.html" class="hover:underline">About Us</a></li>' +
          '</ul>' +
        '</div>' +
        '<div>' +
          '<h4 style="font-weight:600;color:var(--ink);margin-bottom:.6rem">Legal</h4>' +
          '<ul class="text-sm space-y-1.5" style="color:var(--ink-2)">' +
            '<li><a href="privacy.html" class="hover:underline">Privacy Policy</a></li>' +
            '<li><a href="terms.html" class="hover:underline">Terms &amp; Conditions</a></li>' +
            '<li><a href="about.html#contact" class="hover:underline">Contact</a></li>' +
          '</ul>' +
        '</div>' +
      '</div>' +
      '<div class="pride-bar"></div>' +
      '<div class="max-w-6xl mx-auto px-5 sm:px-8 py-5 text-xs flex flex-col md:flex-row items-center justify-between gap-3" style="color:var(--muted)">' +
        '<div>© ' + year + ' Out in Tech Survey. Independent community research.</div>' +
        '<div>Built with care, in solidarity. 🏳️‍🌈 🏳️‍⚧️</div>' +
      '</div>' +
    '</footer>';

  var holder = document.getElementById('site-footer');
  if (holder) holder.innerHTML = html;
};
