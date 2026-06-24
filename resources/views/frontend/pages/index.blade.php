@extends('frontend.master')

@section('content')
    <main class="max-w-6xl mx-auto px-5 sm:px-8 pt-10 sm:pt-16">

        <section class="grid lg:grid-cols-12 gap-10 items-end pb-12">
            <div class="lg:col-span-8">
                <div class="hero-eyebrow fade-in">
                    <span class="pulse"></span>
                    Live community research · Round 02 · 2026
                </div>
                <h1 class="font-display fade-in mt-5"
                    style="font-size:clamp(2.4rem,5.4vw,4rem); font-weight:600; line-height:1.05; color:var(--ink)">
                    What we're learning about being
                    <span
                        style="background:linear-gradient(90deg,var(--blue-strong),var(--pink-strong),var(--primary)); -webkit-background-clip:text; background-clip:text; color:transparent;">queer
                        in tech.</span>
                </h1>
                <p class="fade-in mt-5 text-lg" style="color:var(--ink-2); max-width:62ch; line-height:1.55">
                    An anonymous, ongoing survey gathering the lived experiences of LGBTQIA+ people working in &mdash; or
                    hoping
                    to enter &mdash;
                    the technology industry. Every response helps us build something safer than what we found.
                </p>
                <div class="fade-in mt-7 flex flex-wrap gap-3">
                    <a href="survey.html" class="btn btn-primary">
                        Add your voice
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="16" height="16">
                            <path d="M5 12h14M13 6l6 6-6 6" />
                        </svg>
                    </a>
                    <a href="about.html" class="btn btn-secondary">Why this exists</a>
                </div>
            </div>

            <div class="lg:col-span-4">
                <div class="card p-6 fade-in"
                    style="background:linear-gradient(160deg, rgba(166,211,242,.35), var(--surface) 60%, rgba(247,182,200,.35))">
                    <div class="text-xs font-semibold tracking-wider uppercase" style="color:var(--ink-2)">Snapshot</div>
                    <div class="font-display mt-3" style="font-size:3rem; font-weight:600; line-height:1; color:var(--ink)">
                        2,847</div>
                    <div class="mt-2" style="color:var(--ink-2); font-weight:500">verified responses to date</div>
                    <div class="mt-5 flex items-center gap-2 flex-wrap">
                        <span class="chip chip-pink">42 countries</span>
                        <span class="chip chip-blue">Nepal featured</span>
                        <span class="chip chip-purple">100% anonymous</span>
                    </div>
                    <div class="mt-5 pt-5" style="border-top:1px dashed var(--line)">
                        <div class="flex items-center justify-between text-sm">
                            <span style="color:var(--ink-2)">Survey completion</span>
                            <span style="color:var(--ink); font-weight:600">87%</span>
                        </div>
                        <div class="progress-track mt-2">
                            <div class="progress-fill" style="width:87%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ===== Category 1: Participation ===== -->
        <section class="pt-6">
            <div class="cat-head">
                <h3>Participation</h3>
                <span class="meta">Who's contributing to this dataset</span>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="stat-card">
                    <div class="accent" style="background:var(--primary)"></div>
                    <div class="stat-num">2,847</div>
                    <div class="stat-label">Total responses</div>
                    <div class="stat-sub">Since launch · Round 01 + 02</div>
                </div>
                <div class="stat-card">
                    <div class="accent" style="background:var(--blue-strong)"></div>
                    <div class="stat-num">42</div>
                    <div class="stat-label">Countries represented</div>
                    <div class="stat-sub">Nepal, India, US, UK, BR, NG, ID …</div>
                </div>
                <div class="stat-card">
                    <div class="accent" style="background:var(--pink-strong)"></div>
                    <div class="stat-num">612</div>
                    <div class="stat-label">Responses from Nepal</div>
                    <div class="stat-sub">Featured region</div>
                </div>
                <div class="stat-card">
                    <div class="accent" style="background:var(--accent)"></div>
                    <div class="stat-num">9</div>
                    <div class="stat-label">Languages submitted in</div>
                    <div class="stat-sub">English, Nepali, Hindi, ES …</div>
                </div>
            </div>
        </section>

        <!-- ===== Category 2: Employment ===== -->
        <section class="pt-12">
            <div class="cat-head">
                <h3>Employment status</h3>
                <span class="meta">Where respondents stand professionally</span>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="stat-card">
                    <div class="accent" style="background:var(--blue-strong)"></div>
                    <div class="stat-num">1,248</div>
                    <div class="stat-label">Currently employed in tech</div>
                    <div class="stat-sub">Full-time, freelance, or contract</div>
                </div>
                <div class="stat-card">
                    <div class="accent" style="background:var(--primary)"></div>
                    <div class="stat-num">743</div>
                    <div class="stat-label">Looking for a tech role</div>
                    <div class="stat-sub">Active job-seekers</div>
                </div>
                <div class="stat-card">
                    <div class="accent" style="background:var(--pink-strong)"></div>
                    <div class="stat-num">521</div>
                    <div class="stat-label">Students &amp; learners</div>
                    <div class="stat-sub">Bootcamp, university, self-taught</div>
                </div>
                <div class="stat-card">
                    <div class="accent" style="background:var(--warn)"></div>
                    <div class="stat-num">187</div>
                    <div class="stat-label">Left tech in past 3 yrs</div>
                    <div class="stat-sub">Cited culture as a reason</div>
                </div>
            </div>
        </section>

        <!-- ===== Category 3: Reported Hostility / Mistreatment ===== -->
        <section class="pt-12">
            <div class="cat-head">
                <h3>Mistreatment reported</h3>
                <span class="meta">Of respondents with past tech experience &mdash; multi-select</span>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="stat-card">
                    <div class="accent" style="background:var(--primary)"></div>
                    <div class="stat-num">64<span style="font-size:.55em; color:var(--muted); margin-left:4px">%</span>
                    </div>
                    <div class="stat-label">Faced misgendering or deadnaming</div>
                    <div class="stat-sub">In meetings, code reviews, or chat</div>
                </div>
                <div class="stat-card">
                    <div class="accent" style="background:var(--warn)"></div>
                    <div class="stat-num">41<span style="font-size:.55em; color:var(--muted); margin-left:4px">%</span>
                    </div>
                    <div class="stat-label">Heard slurs or hostile jokes</div>
                    <div class="stat-sub">In office, Slack, or team channels</div>
                </div>
                <div class="stat-card">
                    <div class="accent" style="background:var(--pink-strong)"></div>
                    <div class="stat-num">38<span style="font-size:.55em; color:var(--muted); margin-left:4px">%</span>
                    </div>
                    <div class="stat-label">Excluded from teams or events</div>
                    <div class="stat-sub">Social or professional exclusion</div>
                </div>
                <div class="stat-card">
                    <div class="accent" style="background:var(--accent)"></div>
                    <div class="stat-num">29<span style="font-size:.55em; color:var(--muted); margin-left:4px">%</span>
                    </div>
                    <div class="stat-label">Discrimination in hiring</div>
                    <div class="stat-sub">In interviews, promo, or reviews</div>
                </div>
            </div>
        </section>

        <!-- ===== Category 4: Hesitance Barriers ===== -->
        <section class="pt-12">
            <div class="cat-head">
                <h3>Barriers to entering tech</h3>
                <span class="meta">Cited by people who haven't yet joined the industry</span>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="stat-card">
                    <div class="accent" style="background:var(--primary)"></div>
                    <div class="stat-num">71<span style="font-size:.55em; color:var(--muted); margin-left:4px">%</span>
                    </div>
                    <div class="stat-label">Worry about hostile culture</div>
                    <div class="stat-sub">Top-cited barrier to joining</div>
                </div>
                <div class="stat-card">
                    <div class="accent" style="background:var(--blue-strong)"></div>
                    <div class="stat-num">58<span style="font-size:.55em; color:var(--muted); margin-left:4px">%</span>
                    </div>
                    <div class="stat-label">Lack of visible queer leaders</div>
                    <div class="stat-sub">Cited as discouraging</div>
                </div>
                <div class="stat-card">
                    <div class="accent" style="background:var(--pink-strong)"></div>
                    <div class="stat-num">53<span style="font-size:.55em; color:var(--muted); margin-left:4px">%</span>
                    </div>
                    <div class="stat-label">Concern about bro-culture</div>
                    <div class="stat-sub">Masculine-dominated environments</div>
                </div>
                <div class="stat-card">
                    <div class="accent" style="background:var(--accent)"></div>
                    <div class="stat-num">47<span style="font-size:.55em; color:var(--muted); margin-left:4px">%</span>
                    </div>
                    <div class="stat-label">Unsure about being out at work</div>
                    <div class="stat-sub">Disclosure feels risky</div>
                </div>
            </div>
        </section>

        <!-- ===== Category 5: Sentiment & Safety ===== -->
        <section class="pt-12">
            <div class="cat-head">
                <h3>Sentiment &amp; safety</h3>
                <span class="meta">How welcoming respondents found their environments</span>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="stat-card">
                    <div class="accent" style="background:var(--primary)"></div>
                    <div class="stat-num">2.8<span style="font-size:.55em; color:var(--muted); margin-left:4px">/5</span>
                    </div>
                    <div class="stat-label">Avg. workplace safety score</div>
                    <div class="stat-sub">Out of 5 · respondents in tech</div>
                </div>
                <div class="stat-card">
                    <div class="accent" style="background:var(--blue-strong)"></div>
                    <div class="stat-num">39<span style="font-size:.55em; color:var(--muted); margin-left:4px">%</span>
                    </div>
                    <div class="stat-label">Would refer a queer friend</div>
                    <div class="stat-sub">To their current workplace</div>
                </div>
                <div class="stat-card">
                    <div class="accent" style="background:var(--warn)"></div>
                    <div class="stat-num">67<span style="font-size:.55em; color:var(--muted); margin-left:4px">%</span>
                    </div>
                    <div class="stat-label">Felt impact on mental health</div>
                    <div class="stat-sub">From workplace experiences</div>
                </div>
                <div class="stat-card">
                    <div class="accent" style="background:var(--pink-strong)"></div>
                    <div class="stat-num">31<span style="font-size:.55em; color:var(--muted); margin-left:4px">%</span>
                    </div>
                    <div class="stat-label">Reported a positive example</div>
                    <div class="stat-sub">Of an inclusive tech employer</div>
                </div>
            </div>
        </section>

        <!-- ===== Category 6: Support Requested ===== -->
        <section class="pt-12">
            <div class="cat-head">
                <h3>Support most asked for</h3>
                <span class="meta">What respondents say would help them succeed</span>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="stat-card">
                    <div class="accent" style="background:var(--primary)"></div>
                    <div class="stat-num">78<span style="font-size:.55em; color:var(--muted); margin-left:4px">%</span>
                    </div>
                    <div class="stat-label">Want queer mentorship</div>
                    <div class="stat-sub">1:1 or cohort-based</div>
                </div>
                <div class="stat-card">
                    <div class="accent" style="background:var(--pink-strong)"></div>
                    <div class="stat-num">64<span style="font-size:.55em; color:var(--muted); margin-left:4px">%</span>
                    </div>
                    <div class="stat-label">Want queer-friendly ERGs</div>
                    <div class="stat-sub">Employee resource groups</div>
                </div>
                <div class="stat-card">
                    <div class="accent" style="background:var(--blue-strong)"></div>
                    <div class="stat-num">81<span style="font-size:.55em; color:var(--muted); margin-left:4px">%</span>
                    </div>
                    <div class="stat-label">Want clear anti-harassment</div>
                    <div class="stat-sub">Reporting + accountability</div>
                </div>
                <div class="stat-card">
                    <div class="accent" style="background:var(--accent)"></div>
                    <div class="stat-num">69<span style="font-size:.55em; color:var(--muted); margin-left:4px">%</span>
                    </div>
                    <div class="stat-label">Want visible LGBTQ+ leaders</div>
                    <div class="stat-sub">In senior &amp; exec roles</div>
                </div>
            </div>
        </section>

        <!-- ===== Category 7: Tech areas of interest ===== -->
        <section class="pt-12 pb-4">
            <div class="cat-head">
                <h3>Areas of tech interest</h3>
                <span class="meta">Where respondents work or want to work</span>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="stat-card">
                    <div class="accent" style="background:var(--blue-strong)"></div>
                    <div class="stat-num">41<span style="font-size:.55em; color:var(--muted); margin-left:4px">%</span>
                    </div>
                    <div class="stat-label">Software development</div>
                    <div class="stat-sub">Largest interest area</div>
                </div>
                <div class="stat-card">
                    <div class="accent" style="background:var(--pink-strong)"></div>
                    <div class="stat-num">24<span style="font-size:.55em; color:var(--muted); margin-left:4px">%</span>
                    </div>
                    <div class="stat-label">UI/UX &amp; design</div>
                    <div class="stat-sub">Product &amp; visual</div>
                </div>
                <div class="stat-card">
                    <div class="accent" style="background:var(--primary)"></div>
                    <div class="stat-num">22<span style="font-size:.55em; color:var(--muted); margin-left:4px">%</span>
                    </div>
                    <div class="stat-label">Data, AI &amp; ML</div>
                    <div class="stat-sub">Including analytics</div>
                </div>
                <div class="stat-card">
                    <div class="accent" style="background:var(--accent)"></div>
                    <div class="stat-num">13<span style="font-size:.55em; color:var(--muted); margin-left:4px">%</span>
                    </div>
                    <div class="stat-label">Cybersecurity</div>
                    <div class="stat-sub">Privacy &amp; safety roles</div>
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section class="my-16">
            <div class="card p-8 sm:p-12 grid md:grid-cols-3 gap-6 items-center"
                style="background:linear-gradient(120deg, rgba(166,211,242,.4), var(--surface) 50%, rgba(247,182,200,.4))">
                <div class="md:col-span-2">
                    <h3 class="font-display"
                        style="font-size:clamp(1.6rem,3vw,2.2rem); font-weight:600; color:var(--ink); letter-spacing:-0.02em; line-height:1.15">
                        The numbers above only matter because someone shared their story.
                    </h3>
                    <p class="mt-3" style="color:var(--ink-2); max-width:60ch">
                        Whether you're thriving in tech, hesitant to enter, or somewhere in between &mdash; your experience
                        helps shape what queer-friendly tech looks like next.
                    </p>
                </div>
                <div class="flex md:justify-end">
                    <a href="survey.html" class="btn btn-primary" style="padding:.95rem 1.6rem; font-size:1rem">
                        Take the survey
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="16"
                            height="16">
                            <path d="M5 12h14M13 6l6 6-6 6" />
                        </svg>
                    </a>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('scripts')
    <script>
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, i) => {
                if (entry.isIntersecting) {
                    setTimeout(() => entry.target.classList.add('fade-in'), i * 60);
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.15
        });

        document.querySelectorAll('.stat-card').forEach(card => observer.observe(card));
    </script>
@endsection
