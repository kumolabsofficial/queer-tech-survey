<div class="pride-bar"></div>
<header class="site-header">
  <div class="max-w-6xl mx-auto px-5 sm:px-8 h-16 flex items-center justify-between gap-4">
    <a href="#" class="brand-mark">
      <span class="brand-dot"></span>
      <span>Out&nbsp;in&nbsp;Tech&nbsp;<span style="color:var(--primary)">Survey</span></span>
    </a>
    <nav class="hidden md:flex items-center gap-1">
      <a href="{{ route('frontend.index') }}"    class="nav-link @if(request()->routeIs('frontend.index')) active @endif">Home</a>
      <a href="{{ route('frontend.survey') }}"  class="nav-link @if(request()->routeIs('frontend.survey')) active @endif">Take Survey</a>
      <a href="{{ route('frontend.about') }}"   class="nav-link @if(request()->routeIs('frontend.about')) active @endif">About</a>
      <a href="{{ route('frontend.privacy') }}" class="nav-link @if(request()->routeIs('frontend.privacy')) active @endif">Privacy</a>
      <a href="{{ route('frontend.terms') }}"   class="nav-link @if(request()->routeIs('frontend.terms')) active @endif">Terms</a>
    </nav>
    <div class="flex items-center gap-2">
      <button onclick="QTS.toggleTheme()" class="theme-toggle" aria-label="Toggle dark mode" title="Toggle theme">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" width="18" height="18" class="block dark:hidden"><circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M4.93 19.07l1.41-1.41M17.66 6.34l1.41-1.41"/></svg>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" width="18" height="18" class="hidden dark:block"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
      </button>
      <a href="#" class="btn btn-primary hidden sm:inline-flex" style="padding:.55rem 1rem;font-size:.88rem">Take the Survey</a>
      <button class="md:hidden theme-toggle" onclick="document.getElementById('qts-mobile-nav').classList.toggle('hidden')" aria-label="Open menu">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" width="18" height="18"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
      </button>
    </div>
  </div>
  <div id="qts-mobile-nav" class="md:hidden hidden border-t" style="border-color:var(--line);background:var(--surface)">
    <div class="px-5 py-3 flex flex-col gap-1">
      <a href="{{ route('frontend.index') }}"    class="nav-link {{ ($activeNav ?? '') === 'home'    ? 'active' : '' }}">Home</a>
      <a href="{{ route('frontend.survey') }}"  class="nav-link @if(request()->routeIs('frontend.survey')) active @endif">Take Survey</a>
      <a href="{{ route('frontend.about') }}"   class="nav-link @if(request()->routeIs('frontend.about')) active @endif">About</a>
      <a href="{{ route('frontend.privacy') }}" class="nav-link @if(request()->routeIs('frontend.privacy')) active @endif">Privacy</a>
      <a href="{{ route('frontend.terms') }}"   class="nav-link @if(request()->routeIs('frontend.terms')) active @endif">Terms</a>
    </div>
  </div>
</header>