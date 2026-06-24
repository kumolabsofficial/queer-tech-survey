@extends('frontend.master')

@section('content')
    <main class="max-w-3xl mx-auto px-5 sm:px-8 pt-12 pb-16">
        <span class="section-ribbon">About</span>
        <div class="prose-content mt-4">
            <h1>Who we are, and why we ask.</h1>
            <p>
                <strong>Out in Tech Survey</strong> is an independent, community-led research project
                gathering the lived experiences of LGBTQIA+ people who work in tech &mdash; or want to.
                We're globally framed, with a featured focus on Nepal, where one of our co-organizers is based.
            </p>

            <div class="card p-6 my-8" style="background:linear-gradient(135deg, rgba(166,211,242,.3), rgba(247,182,200,.3))">
                <p class="m-0" style="color:var(--ink); font-family:'Fraunces',serif; font-size:1.15rem; line-height:1.5">
                    &ldquo;The people designing the future of tech should look like &mdash; and feel safe in &mdash;
                    the rooms where it gets built.&rdquo;
                </p>
            </div>

            <h2>Why this survey exists</h2>
            <p>
                Across our networks, we kept hearing the same story from queer folks: enthusiasm
                about the field, paired with quiet exits. Misgendering in code reviews. Slurs played off
                as jokes. A culture that asked people to leave parts of themselves at the door &mdash;
                and called it &ldquo;professional.&rdquo;
            </p>
            <p>
                We started this survey to put numbers and stories behind those experiences, in a way
                decision-makers couldn't ignore. The findings feed an annual public report, plus
                private briefings to companies who want to do better.
            </p>

            <h2>What we do with your responses</h2>
            <ul>
                <li><strong>Aggregate first.</strong> Individual responses are never published. Stories may be quoted only
                    with explicit, separate permission.</li>
                <li><strong>Anonymity by design.</strong> We don't ask for your name, email, or anything that could
                    re-identify you.</li>
                <li><strong>Free to read.</strong> The annual report is published openly. Companies pay for tailored
                    briefings; that pays for the work.</li>
                <li><strong>You're in control.</strong> Most questions are optional. Self-describe is everywhere it should
                    be.</li>
            </ul>

            <h2>Our principles</h2>
            <ul>
                <li>Identity questions are optional &mdash; or come with &ldquo;Prefer not to say.&rdquo;</li>
                <li>Two-step gender approach: assigned-at-birth and current identity stay separate.</li>
                <li>Branching logic so respondents only see what's relevant.</li>
                <li>Demographics live at the end, to reduce drop-off on sensitive topics.</li>
                <li>Privacy notice up front, every time.</li>
            </ul>

            <h2 id="contact">Contact</h2>
            <p>
                Questions, partnership ideas, or want to share your story for a longer interview?
                Reach out at <a href="mailto:hello@outintech-survey.org">hello@outintech-survey.org</a>.
                We respond in English and Nepali.
            </p>

            <div class="card p-6 mt-8 flex flex-wrap items-center justify-between gap-4">
                <div>
                    <div style="font-weight:600; color:var(--ink)">Ready to add your voice?</div>
                    <div class="text-sm" style="color:var(--ink-2)">8&ndash;12 minutes. Anonymous. You can pause and come
                        back.</div>
                </div>
                <a href="survey.html" class="btn btn-primary">Take the survey</a>
            </div>
        </div>
    </main>
@endsection
