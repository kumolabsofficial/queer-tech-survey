@extends('frontend.master')

@section('content')
  <main class="max-w-3xl mx-auto px-5 sm:px-8 pt-12 pb-20">
  <div class="completion-card">
    <div class="font-display" style="font-size:.85rem; font-weight:600; letter-spacing:.18em; text-transform:uppercase; opacity:.7">
      Response received
    </div>
    <h1 class="font-display mt-3" style="font-size:clamp(2.2rem, 5vw, 3.4rem); font-weight:600; letter-spacing:-0.02em; line-height:1.1">
      Thank you for sharing.
    </h1>
    <p class="mt-4 mx-auto" style="max-width:54ch; line-height:1.55; font-size:1.05rem; opacity:.85">
      Your response is now part of a growing chorus of queer voices in tech &mdash;
      stories that won't be ignored. Every answer pushes the work forward.
    </p>

    <div class="mt-8 flex flex-wrap gap-3 justify-center">
      <a href="index.html" class="btn btn-primary">See community findings</a>
      <a href="about.html" class="btn btn-secondary" style="background:rgba(255,255,255,.6)">Read our story</a>
    </div>
  </div>

  <section class="mt-12 grid sm:grid-cols-3 gap-4">
    <div class="card p-5">
      <div class="text-xs font-semibold tracking-wider uppercase" style="color:var(--ink-2)">Step 01</div>
      <div class="font-display mt-2" style="font-size:1.2rem; font-weight:600; color:var(--ink)">We aggregate</div>
      <p class="mt-2 text-sm" style="color:var(--ink-2); line-height:1.5">Your answers join thousands of others. Individual responses stay private; only the patterns are published.</p>
    </div>
    <div class="card p-5">
      <div class="text-xs font-semibold tracking-wider uppercase" style="color:var(--ink-2)">Step 02</div>
      <div class="font-display mt-2" style="font-size:1.2rem; font-weight:600; color:var(--ink)">We publish</div>
      <p class="mt-2 text-sm" style="color:var(--ink-2); line-height:1.5">An open annual report goes out each spring. Subscribe via the homepage to be notified.</p>
    </div>
    <div class="card p-5">
      <div class="text-xs font-semibold tracking-wider uppercase" style="color:var(--ink-2)">Step 03</div>
      <div class="font-display mt-2" style="font-size:1.2rem; font-weight:600; color:var(--ink)">Companies act</div>
      <p class="mt-2 text-sm" style="color:var(--ink-2); line-height:1.5">We brief companies who want to do better &mdash; with concrete policies, not vibes.</p>
    </div>
  </section>

  <p class="text-center text-sm mt-10" style="color:var(--muted)">
    Know someone who should fill this out? Share <a href="survey.html" style="color:var(--primary); text-decoration:underline">the survey link</a>.
  </p>
</main>
@endsection
