@extends('frontend.master')

@section('content')
    <main x-data="surveyApp()" x-init="init()" class="max-w-4xl mx-auto px-5 sm:px-8 pt-8 pb-20">

        <!-- Header strip -->
        <div class="mb-7">
            <span class="section-ribbon" x-text="'Section ' + (currentStep + 1) + ' of ' + steps.length"></span>
            <h1 class="font-display mt-3"
                style="font-size:clamp(1.8rem,3.6vw,2.5rem); font-weight:600; letter-spacing:-0.02em; line-height:1.15; color:var(--ink)"
                x-text="steps[currentStep].title"></h1>
            <p class="mt-2" style="color:var(--ink-2); max-width:62ch" x-text="steps[currentStep].sub"></p>
        </div>

        <!-- Progress bar with section labels -->
        <div class="mb-8">
            <div class="progress-track">
                <div class="progress-fill" :style="'width:' + ((currentStep + 1) / steps.length * 100) + '%'"></div>
            </div>
            <div class="mt-3 flex gap-2 overflow-x-auto pb-1">
                <template x-for="(s, i) in steps" :key="s.id">
                    <button type="button" @click="goTo(i)" :disabled="i > currentStep && !canJumpTo(i)"
                        :class="'section-pill ' + (i === currentStep ? 'active' : (i < currentStep ? 'done' : ''))"
                        :style="(i > currentStep && !canJumpTo(i)) ? 'opacity:.55; cursor:not-allowed' : 'cursor:pointer'">
                        <span class="dot"></span>
                        <span x-text="(i+1) + '. ' + s.short"></span>
                    </button>
                </template>
            </div>
        </div>

        <!-- Privacy notice (always visible) -->
        <div class="notice mb-8" x-show="currentStep === 0">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" width="22" height="22"
                class="flex-shrink-0 mt-0.5">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
            </svg>
            <div>
                <div style="font-weight:600">This survey is anonymous.</div>
                <div class="text-sm mt-1" style="color:var(--ink-2)">Your responses will help create safer pathways into
                    tech. Data will only be used in aggregate. Read our <a href="privacy.html"
                        style="color:var(--primary); text-decoration:underline">Privacy Policy</a> for details.</div>
            </div>
        </div>

        <!-- ============ FORM CARD ============ -->
        <form @submit.prevent="submit()" class="card p-6 sm:p-10">

            <!-- ===================== STEP 0 — CONSENT ===================== -->
            <div x-show="steps[currentStep].id === 'consent'" class="space-y-7">
                <div class="q-block" style="padding-top:0">
                    <label class="field-label field-required">Do you consent to participate in this survey?</label>
                    <div class="field-help">By selecting yes, you confirm you are responding voluntarily and that your data
                        may be used in aggregate research. You may stop at any time.</div>
                    <div class="mt-4 grid sm:grid-cols-2 gap-3">
                        <label :class="'choice ' + (data.consent === 'yes' ? 'selected' : '')">
                            <input type="radio" x-model="data.consent" value="yes" />
                            <span>Yes, I consent</span>
                        </label>
                        <label :class="'choice ' + (data.consent === 'no' ? 'selected' : '')">
                            <input type="radio" x-model="data.consent" value="no" />
                            <span>No, I don't wish to participate</span>
                        </label>
                    </div>
                    <div x-show="data.consent === 'no'" class="notice mt-4" style="background:rgba(247,182,200,.2)">
                        <div class="text-sm">That's okay &mdash; thank you for stopping by. You can close this tab any time.
                            If you change your mind, just refresh.</div>
                    </div>
                </div>

                <div class="q-block">
                    <h3 class="font-display"
                        style="font-size:1.4rem; font-weight:600; color:var(--ink); margin-bottom:.5rem">What this survey is
                        about</h3>
                    <p style="color:var(--ink-2); line-height:1.6">
                        We're gathering the experiences and needs of people from the queer community
                        (and allies) interested in or working in tech &mdash; particularly around safety, inclusion,
                        and barriers like harassment or hostility based on gender identity or sexual orientation.
                    </p>
                    <ul class="mt-3 text-sm space-y-1.5" style="color:var(--ink-2)">
                        <li>· Most questions are <strong style="color:var(--ink)">optional</strong>.</li>
                        <li>· You can <strong style="color:var(--ink)">self-describe</strong> wherever it matters.</li>
                        <li>· Your progress is saved locally so you can come back later.</li>
                        <li>· Estimated time: <strong style="color:var(--ink)">8&ndash;12 minutes</strong>.</li>
                    </ul>
                </div>
            </div>

            <!-- ===================== STEP 1 — TECH SPACES ===================== -->
            <div x-show="steps[currentStep].id === 'tech'" class="space-y-7">
                <div class="q-block" style="padding-top:0">
                    <label class="field-label field-required">Have you ever worked in the tech industry? <span
                            style="font-weight:500;color:var(--muted)">(internships, freelance, full-time)</span></label>
                    <div class="mt-4 space-y-3">
                        <template
                            x-for="opt in [
            { v:'current_or_past', l:'Yes &mdash; currently or in the past' },
            { v:'want_to_join',    l:'No, but I want to join' },
            { v:'not_interested',  l:'No, and I am not interested' }
          ]"
                            :key="opt.v">
                            <label :class="'choice ' + (data.workedInTech === opt.v ? 'selected' : '')">
                                <input type="radio" x-model="data.workedInTech" :value="opt.v" />
                                <span x-html="opt.l"></span>
                            </label>
                        </template>
                    </div>
                </div>

                <div class="q-block">
                    <label class="field-label field-required">Which areas of tech interest you, or do you work in?</label>
                    <div class="field-help">Select all that apply &mdash; pick at least one.</div>
                    <div class="mt-4 grid sm:grid-cols-2 gap-3">
                        <template
                            x-for="opt in [
            'Software Development / Programming',
            'UI/UX or Graphic Design',
            'Data Science / Analytics / AI / ML',
            'Cybersecurity',
            'Product Management',
            'Digital Marketing / Content',
            'Hardware / Electronics',
            'IT Support / Sysadmin',
            'Not sure yet'
          ]"
                            :key="opt">
                            <label :class="'choice ' + (data.techAreas.includes(opt) ? 'selected' : '')">
                                <input type="checkbox" :value="opt" @change="toggle(data.techAreas, opt)"
                                    :checked="data.techAreas.includes(opt)" />
                                <span x-text="opt"></span>
                            </label>
                        </template>
                    </div>
                    <div class="mt-3">
                        <label class="text-sm" style="color:var(--ink-2)">Other (please specify)</label>
                        <input class="input mt-1" type="text" x-model="data.techAreasOther"
                            placeholder="e.g. DevRel, robotics, blockchain…" />
                    </div>
                </div>

                <div class="q-block">
                    <label class="field-label field-required">What level best describes your current tech
                        experience?</label>
                    <div class="mt-4 grid sm:grid-cols-2 gap-3">
                        <template
                            x-for="opt in [
            { v:'beginner',     l:'Beginner — curious or just starting' },
            { v:'intermediate', l:'Intermediate — some courses or projects' },
            { v:'advanced',     l:'Advanced — professional experience' },
            { v:'na',           l:'Not applicable' }
          ]"
                            :key="opt.v">
                            <label :class="'choice ' + (data.techLevel === opt.v ? 'selected' : '')">
                                <input type="radio" x-model="data.techLevel" :value="opt.v" />
                                <span x-text="opt.l"></span>
                            </label>
                        </template>
                    </div>
                </div>
            </div>

            <!-- ===================== STEP 2 — PAST EXPERIENCES (branching) ===================== -->
            <div x-show="steps[currentStep].id === 'experiences'" class="space-y-7">
                <div class="q-block" style="padding-top:0">
                    <label class="field-label field-required">Have you had any past experiences in tech, computer science
                        education, or related workplaces / internships?</label>
                    <div class="mt-4 grid sm:grid-cols-2 gap-3">
                        <label :class="'choice ' + (data.pastExperience === 'yes' ? 'selected' : '')">
                            <input type="radio" x-model="data.pastExperience" value="yes" />
                            <span>Yes</span>
                        </label>
                        <label :class="'choice ' + (data.pastExperience === 'no' ? 'selected' : '')">
                            <input type="radio" x-model="data.pastExperience" value="no" />
                            <span>No</span>
                        </label>
                    </div>
                    <p class="text-sm mt-3" style="color:var(--muted)" x-show="data.pastExperience === 'no'">
                        Thanks &mdash; we'll skip the workplace incident questions and ask about what would help you join.
                    </p>
                </div>

                <!-- Yes branch -->
                <template x-if="data.pastExperience === 'yes'">
                    <div class="space-y-7">
                        <div class="q-block">
                            <label class="field-label field-required">Did you face any form of hostility or inconsiderate
                                behavior related to your gender identity or sexual orientation?</label>
                            <div class="field-help">Select all that apply &mdash; pick at least one (use &ldquo;None of the
                                above&rdquo; or &ldquo;Prefer not to say&rdquo; if needed).</div>
                            <div class="mt-4 grid sm:grid-cols-2 gap-3">
                                <template
                                    x-for="opt in [
                'Verbal harassment (slurs, derogatory jokes, deadnaming, misgendering)',
                'Exclusion from teams, meetings, or social events',
                'Microaggressions or invasive questions about identity',
                'Discrimination in hiring, promotion, or reviews',
                'Physical or sexual harassment',
                'Online harassment linked to work (Slack, GitHub, forums)',
                'None of the above',
                'Prefer not to say'
              ]"
                                    :key="opt">
                                    <label :class="'choice ' + (data.hostility.includes(opt) ? 'selected' : '')">
                                        <input type="checkbox" :value="opt"
                                            @change="toggle(data.hostility, opt)"
                                            :checked="data.hostility.includes(opt)" />
                                        <span x-text="opt"></span>
                                    </label>
                                </template>
                            </div>
                            <div class="mt-3">
                                <label class="text-sm" style="color:var(--ink-2)">Other (please describe,
                                    optional)</label>
                                <textarea class="textarea mt-1" x-model="data.hostilityOther" placeholder="Only share what feels okay to share."></textarea>
                            </div>
                        </div>

                        <div class="q-block">
                            <label class="field-label">Were any incidents reported (to HR, manager, authorities)? What was
                                the outcome?</label>
                            <div class="field-help">Optional. Open text.</div>
                            <textarea class="textarea mt-3" x-model="data.reportedOutcome" placeholder="It's okay to leave this blank."></textarea>
                        </div>

                        <div class="q-block">
                            <label class="field-label">How did these experiences affect your participation or interest in
                                tech?</label>
                            <div class="mt-4 grid sm:grid-cols-2 gap-3">
                                <template
                                    x-for="opt in [
                { v:'strongly_discouraged', l:'Strongly discouraged me' },
                { v:'somewhat_discouraged', l:'Somewhat discouraged me' },
                { v:'no_impact',            l:'No major impact' },
                { v:'motivated',            l:'Motivated me to advocate for change' }
              ]"
                                    :key="opt.v">
                                    <label :class="'choice ' + (data.experienceImpact === opt.v ? 'selected' : '')">
                                        <input type="radio" x-model="data.experienceImpact" :value="opt.v" />
                                        <span x-text="opt.l"></span>
                                    </label>
                                </template>
                            </div>
                            <div class="mt-3">
                                <label class="text-sm" style="color:var(--ink-2)">More context (optional)</label>
                                <textarea class="textarea mt-1" x-model="data.experienceImpactNote"></textarea>
                            </div>
                        </div>

                        <div class="q-block">
                            <label class="field-label">On a scale of 1&ndash;5, how safe and welcoming was your overall
                                work or educational environment regarding queer identities?</label>
                            <div class="field-help">1 = Very hostile · 5 = Very welcoming</div>
                            <div class="scale-group mt-4">
                                <template x-for="n in [1,2,3,4,5]" :key="n">
                                    <label :class="'scale-item ' + (data.safetyScore == n ? 'selected' : '')">
                                        <input type="radio" :value="n" x-model.number="data.safetyScore" />
                                        <div x-text="n"></div>
                                    </label>
                                </template>
                            </div>
                            <div class="mt-2 flex justify-between text-xs" style="color:var(--muted)">
                                <span>Very hostile</span><span>Neutral</span><span>Very welcoming</span>
                            </div>
                        </div>

                        <div class="q-block">
                            <label class="field-label">To what extent are you open about your gender identity and/or sexual
                                orientation in professional or educational settings?</label>
                            <div class="mt-4 space-y-3">
                                <template
                                    x-for="opt in [
                'Not out at all',
                'Out to a few trusted people',
                'Out to most colleagues',
                'Out to everyone',
                'Prefer not to say'
              ]"
                                    :key="opt">
                                    <label :class="'choice ' + (data.outness === opt ? 'selected' : '')">
                                        <input type="radio" x-model="data.outness" :value="opt" />
                                        <span x-text="opt"></span>
                                    </label>
                                </template>
                            </div>
                        </div>
                    </div>
                </template>

                <!-- No branch -->
                <template x-if="data.pastExperience === 'no'">
                    <div class="space-y-7">
                        <div class="q-block">
                            <label class="field-label field-required">What makes you hesitant to join the tech
                                space?</label>
                            <div class="field-help">Select all that apply &mdash; pick at least one.</div>
                            <div class="mt-4 grid sm:grid-cols-2 gap-3">
                                <template
                                    x-for="opt in [
                'Fear of gender-based harassment or misgendering',
                'Fear of hostility or derogatory jokes about queer people',
                'Lack of visible queer role models or inclusive companies',
                'Concerns about bro-culture or masculine-dominated environments',
                'Uncertainty about coming out or being out at work',
                'Family or societal pressure',
                'Access to education or location barriers',
                'Not hesitant — other reasons for not joining yet'
              ]"
                                    :key="opt">
                                    <label :class="'choice ' + (data.hesitance.includes(opt) ? 'selected' : '')">
                                        <input type="checkbox" :value="opt"
                                            @change="toggle(data.hesitance, opt)"
                                            :checked="data.hesitance.includes(opt)" />
                                        <span x-text="opt"></span>
                                    </label>
                                </template>
                            </div>
                            <div class="mt-3">
                                <label class="text-sm" style="color:var(--ink-2)">Other (please describe)</label>
                                <input class="input mt-1" type="text" x-model="data.hesitanceOther" />
                            </div>
                        </div>

                        <div class="q-block">
                            <label class="field-label">What would make you feel safer and more confident entering
                                tech?</label>
                            <div class="field-help">Select all that apply.</div>
                            <div class="mt-4 grid sm:grid-cols-2 gap-3">
                                <template
                                    x-for="opt in [
                'Inclusive company policies and ally training',
                'Queer-friendly employee resource groups (ERGs)',
                'Clear anti-harassment reporting mechanisms',
                'Visible LGBTQ+ representation in leadership',
                'Mentorship programs for queer individuals',
                'Gender-neutral facilities and respectful language guidelines'
              ]"
                                    :key="opt">
                                    <label :class="'choice ' + (data.wouldHelp.includes(opt) ? 'selected' : '')">
                                        <input type="checkbox" :value="opt"
                                            @change="toggle(data.wouldHelp, opt)"
                                            :checked="data.wouldHelp.includes(opt)" />
                                        <span x-text="opt"></span>
                                    </label>
                                </template>
                            </div>
                            <div class="mt-3">
                                <label class="text-sm" style="color:var(--ink-2)">Other</label>
                                <textarea class="textarea mt-1" x-model="data.wouldHelpOther"></textarea>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            <!-- ===================== STEP 3 — INTERESTS / LEARNING ===================== -->
            <div x-show="steps[currentStep].id === 'learning'" class="space-y-7">
                <div class="q-block" style="padding-top:0">
                    <label class="field-label field-required">What aspects of computer science or tech excite you the
                        most?</label>
                    <div class="field-help">Select all that apply &mdash; pick at least one.</div>
                    <div class="mt-4 grid sm:grid-cols-2 gap-3">
                        <template
                            x-for="opt in [
            'Building apps or websites (development)',
            'Creative design and user experience',
            'Solving problems with data or AI',
            'Cybersecurity and privacy (especially for marginalized communities)',
            'Open-source contributions or community projects',
            'Tech for social good (queer advocacy, accessibility)'
          ]"
                            :key="opt">
                            <label :class="'choice ' + (data.excitedBy.includes(opt) ? 'selected' : '')">
                                <input type="checkbox" :value="opt" @change="toggle(data.excitedBy, opt)"
                                    :checked="data.excitedBy.includes(opt)" />
                                <span x-text="opt"></span>
                            </label>
                        </template>
                    </div>
                    <div class="mt-3">
                        <label class="text-sm" style="color:var(--ink-2)">Other</label>
                        <input class="input mt-1" type="text" x-model="data.excitedByOther" />
                    </div>
                </div>

                <div class="q-block">
                    <label class="field-label">Have you completed prior tech-related trainings, bootcamps, or
                        certifications?</label>
                    <div class="mt-4 grid sm:grid-cols-2 gap-3">
                        <label :class="'choice ' + (data.priorTraining === 'yes' ? 'selected' : '')">
                            <input type="radio" x-model="data.priorTraining" value="yes" /><span>Yes</span>
                        </label>
                        <label :class="'choice ' + (data.priorTraining === 'no' ? 'selected' : '')">
                            <input type="radio" x-model="data.priorTraining" value="no" /><span>No</span>
                        </label>
                    </div>
                    <div class="mt-3" x-show="data.priorTraining === 'yes'">
                        <label class="text-sm" style="color:var(--ink-2)">Briefly list them</label>
                        <textarea class="textarea mt-1" x-model="data.priorTrainingList"
                            placeholder="e.g. CS50, Le Wagon, AWS Cloud Practitioner…"></textarea>
                    </div>
                </div>

                <div class="q-block">
                    <label class="field-label field-required">Are you interested in future tech-based trainings or
                        programs?</label>
                    <div class="mt-4 grid sm:grid-cols-3 gap-3">
                        <template
                            x-for="opt in [
            { v:'yes',   l:'Yes, definitely' },
            { v:'maybe', l:'Maybe — depends on safety' },
            { v:'no',    l:'No' }
          ]"
                            :key="opt.v">
                            <label :class="'choice ' + (data.futureTrainings === opt.v ? 'selected' : '')">
                                <input type="radio" x-model="data.futureTrainings" :value="opt.v" />
                                <span x-text="opt.l"></span>
                            </label>
                        </template>
                    </div>
                    <div class="mt-4" x-show="data.futureTrainings === 'yes' || data.futureTrainings === 'maybe'">
                        <label class="field-label" style="font-size:.95rem">Preferred format(s)</label>
                        <div class="mt-3 grid sm:grid-cols-2 gap-3">
                            <template
                                x-for="opt in [
              'Online / self-paced',
              'In-person, in safe spaces',
              'Mentored cohorts',
              'Hybrid'
            ]"
                                :key="opt">
                                <label :class="'choice ' + (data.trainingFormats.includes(opt) ? 'selected' : '')">
                                    <input type="checkbox" :value="opt"
                                        @change="toggle(data.trainingFormats, opt)"
                                        :checked="data.trainingFormats.includes(opt)" />
                                    <span x-text="opt"></span>
                                </label>
                            </template>
                        </div>
                    </div>
                </div>

                <div class="q-block">
                    <label class="field-label">What support would help you succeed in tech trainings?</label>
                    <div class="field-help">e.g. scholarships, queer-only or ally-led groups, mental health resources…
                    </div>
                    <textarea class="textarea mt-3" x-model="data.trainingSupport"></textarea>
                </div>
            </div>

            <!-- ===================== STEP 4 — BROADER SUPPORT ===================== -->
            <div x-show="steps[currentStep].id === 'support'" class="space-y-7">
                <div class="q-block" style="padding-top:0">
                    <label class="field-label">What changes in tech workplaces or education would make the space more
                        inclusive and safe for people of all gender identities and sexual orientations?</label>
                    <textarea class="textarea mt-3" rows="5" x-model="data.changesNeeded"
                        placeholder="Anything you'd like decision-makers to hear."></textarea>
                </div>

                <div class="q-block">
                    <label class="field-label">Have you encountered any positive examples of inclusive tech environments?
                        What made them welcoming?</label>
                    <textarea class="textarea mt-3" rows="4" x-model="data.positiveExamples"></textarea>
                </div>

                <div class="q-block">
                    <label class="field-label">Would you be interested in:</label>
                    <div class="mt-3 space-y-3">
                        <div>
                            <div class="text-sm mb-2" style="color:var(--ink-2)">Joining a queer-friendly tech community /
                                mentorship network?</div>
                            <div class="grid sm:grid-cols-3 gap-3">
                                <template x-for="opt in ['Yes','Maybe','No']" :key="'comm-' + opt">
                                    <label :class="'choice ' + (data.joinCommunity === opt ? 'selected' : '')">
                                        <input type="radio" x-model="data.joinCommunity" :value="opt" />
                                        <span x-text="opt"></span>
                                    </label>
                                </template>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="text-sm mb-2" style="color:var(--ink-2)">Receiving updates on safe job
                                opportunities or trainings?</div>
                            <div class="grid sm:grid-cols-2 gap-3">
                                <template x-for="opt in ['Yes','No']" :key="'upd-' + opt">
                                    <label :class="'choice ' + (data.receiveUpdates === opt ? 'selected' : '')">
                                        <input type="radio" x-model="data.receiveUpdates" :value="opt" />
                                        <span x-text="opt"></span>
                                    </label>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="q-block">
                    <label class="field-label">How have experiences (or fears) of hostility affected your mental health or
                        career decisions?</label>
                    <div class="field-help">Optional &mdash; share only what feels comfortable.</div>
                    <textarea class="textarea mt-3" rows="4" x-model="data.mentalHealthImpact"></textarea>
                </div>

                <div class="q-block">
                    <label class="field-label">Any additional comments or suggestions for this survey, or for making tech
                        safer?</label>
                    <textarea class="textarea mt-3" rows="4" x-model="data.additionalComments"></textarea>
                </div>
            </div>

            <!-- ===================== STEP 5 — DEMOGRAPHICS (last) ===================== -->
            <div x-show="steps[currentStep].id === 'demographics'" class="space-y-7">
                <div class="notice">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" width="20" height="20"
                        class="flex-shrink-0 mt-0.5">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M12 16v-4M12 8h.01" />
                    </svg>
                    <div class="text-sm" style="color:var(--ink-2)">
                        <strong style="color:var(--ink)">Every question here is optional.</strong> Skip whatever you'd rather not answer.
                    </div>
                </div>

                <div class="q-block" style="padding-top:0">
                    <label class="field-label">What is your age group?</label>
                    <div class="mt-4 grid grid-cols-2 sm:grid-cols-3 gap-3">
                        <template x-for="opt in ['Under 18','18–24','25–34','35–44','45+','Prefer not to say']"
                            :key="opt">
                            <label :class="'choice ' + (data.age === opt ? 'selected' : '')">
                                <input type="radio" x-model="data.age" :value="opt" />
                                <span x-text="opt"></span>
                            </label>
                        </template>
                    </div>
                </div>

                <div class="q-block">
                    <label class="field-label">In which country / region do you currently live?</label>
                    <select class="select mt-3" x-model="data.country">
                        <option value="">Select a country…</option>
                        <option>Nepal</option>
                        <option>India</option>
                        <option>Bangladesh</option>
                        <option>Pakistan</option>
                        <option>United States</option>
                        <option>United Kingdom</option>
                        <option>Canada</option>
                        <option>Germany</option>
                        <option>Brazil</option>
                        <option>Nigeria</option>
                        <option>Indonesia</option>
                        <option>Philippines</option>
                        <option>Australia</option>
                        <option>Japan</option>
                        <option>Other</option>
                        <option>Prefer not to say</option>
                    </select>
                    <input x-show="data.country === 'Other'" class="input mt-3" type="text"
                        x-model="data.countryOther" placeholder="Tell us where" />
                </div>

                <div class="q-block">
                    <label class="field-label">Gender identity</label>
                    <div class="field-help">Select all that apply.</div>
                    <div class="mt-4 grid sm:grid-cols-2 gap-3">
                        <template
                            x-for="opt in [
            'Woman (including trans woman)',
            'Man (including trans man)',
            'Non-binary',
            'Genderqueer / Genderfluid',
            'Agender',
            'Two-Spirit / culturally specific term',
            'Prefer not to say'
          ]"
                            :key="opt">
                            <label :class="'choice ' + (data.gender.includes(opt) ? 'selected' : '')">
                                <input type="checkbox" :value="opt" @change="toggle(data.gender, opt)"
                                    :checked="data.gender.includes(opt)" />
                                <span x-text="opt"></span>
                            </label>
                        </template>
                    </div>
                    <div class="mt-3">
                        <label class="text-sm" style="color:var(--ink-2)">Self-describe</label>
                        <input class="input mt-1" type="text" x-model="data.genderSelf" />
                    </div>
                </div>

                <div class="q-block">
                    <label class="field-label">Sexual orientation</label>
                    <div class="field-help">Select all that apply.</div>
                    <div class="mt-4 grid sm:grid-cols-2 gap-3">
                        <template
                            x-for="opt in [
            'Lesbian','Gay','Bisexual','Pansexual','Asexual','Queer','Heterosexual / Straight','Prefer not to say'
          ]"
                            :key="opt">
                            <label :class="'choice ' + (data.orientation.includes(opt) ? 'selected' : '')">
                                <input type="checkbox" :value="opt" @change="toggle(data.orientation, opt)"
                                    :checked="data.orientation.includes(opt)" />
                                <span x-text="opt"></span>
                            </label>
                        </template>
                    </div>
                    <div class="mt-3">
                        <label class="text-sm" style="color:var(--ink-2)">Self-describe</label>
                        <input class="input mt-1" type="text" x-model="data.orientationSelf" />
                    </div>
                </div>

                <div class="q-block">
                    <label class="field-label">Do you identify as transgender or have a transgender history?</label>
                    <div class="mt-4 grid sm:grid-cols-3 gap-3">
                        <template x-for="opt in ['Yes','No','Prefer not to say']" :key="'tr-' + opt">
                            <label :class="'choice ' + (data.transgender === opt ? 'selected' : '')">
                                <input type="radio" x-model="data.transgender" :value="opt" />
                                <span x-text="opt"></span>
                            </label>
                        </template>
                    </div>
                    <div class="mt-3">
                        <label class="text-sm" style="color:var(--ink-2)">Self-describe</label>
                        <input class="input mt-1" type="text" x-model="data.transgenderSelf" />
                    </div>
                </div>

                <div class="q-block">
                    <label class="field-label">Do you identify as intersex?</label>
                    <div class="mt-4 grid sm:grid-cols-3 gap-3">
                        <template x-for="opt in ['Yes','No','Prefer not to say']" :key="'in-' + opt">
                            <label :class="'choice ' + (data.intersex === opt ? 'selected' : '')">
                                <input type="radio" x-model="data.intersex" :value="opt" />
                                <span x-text="opt"></span>
                            </label>
                        </template>
                    </div>
                </div>

                <div class="q-block">
                    <label class="field-label">Education level</label>
                    <select class="select mt-3" x-model="data.education">
                        <option value="">Select…</option>
                        <option>Some school</option>
                        <option>Secondary / high school</option>
                        <option>Vocational / diploma</option>
                        <option>Bachelor's degree</option>
                        <option>Master's degree</option>
                        <option>Doctorate</option>
                        <option>Self-taught</option>
                        <option>Prefer not to say</option>
                    </select>
                </div>

                <div class="q-block">
                    <label class="field-label">Employment status</label>
                    <div class="mt-4 grid sm:grid-cols-2 gap-3">
                        <template
                            x-for="opt in [
            'Student','Employed in tech','Employed in non-tech','Self-employed / freelance','Unemployed','Prefer not to say'
          ]"
                            :key="opt">
                            <label :class="'choice ' + (data.employment === opt ? 'selected' : '')">
                                <input type="radio" x-model="data.employment" :value="opt" />
                                <span x-text="opt"></span>
                            </label>
                        </template>
                    </div>
                </div>

                <div class="q-block">
                    <label class="field-label">Any disabilities or additional intersecting identities you'd like to
                        share?</label>
                    <div class="field-help">Optional &mdash; for context. Things like ethnicity, caste (relevant in Nepal),
                        neurodivergence, or anything else.</div>
                    <textarea class="textarea mt-3" x-model="data.intersecting"></textarea>
                </div>

                <div class="q-block">
                    <label class="field-label">If you are an ally (not queer yourself), what observations have you made
                        about queer experiences in tech?</label>
                    <div class="field-help">Optional &mdash; only if relevant to you.</div>
                    <textarea class="textarea mt-3" x-model="data.allyObservations"></textarea>
                </div>
            </div>

            <!-- Inline validation error -->
            <div x-show="validationError" x-cloak class="mt-6 px-4 py-3 rounded-xl flex items-start gap-3"
                style="background:rgba(194,65,12,.1); border:1px solid rgba(194,65,12,.3); color:var(--warn)">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="18" height="18"
                    class="flex-shrink-0 mt-0.5">
                    <circle cx="12" cy="12" r="10" />
                    <path d="M12 8v4M12 16h.01" />
                </svg>
                <div class="text-sm" x-text="validationError"></div>
            </div>

            <!-- ============ FORM NAV ============ -->
            <div class="mt-8 pt-6 flex flex-wrap items-center justify-between gap-4"
                style="border-top:1px solid var(--line)">
                <div class="flex items-center gap-3">
                    <button type="button" @click="prev()" class="btn btn-secondary" :disabled="currentStep === 0"
                        :style="currentStep === 0 ? 'opacity:.4; cursor:not-allowed' : ''">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="14"
                            height="14">
                            <path d="M19 12H5M11 18l-6-6 6-6" />
                        </svg>
                        Back
                    </button>
                    <button type="button" @click="resetSurvey()" class="btn btn-ghost text-sm"
                        title="Clear all answers">Reset</button>
                </div>

                <div class="flex items-center gap-3">
                    <span class="text-xs" style="color:var(--muted)" x-show="savedAt">
                        Saved <span x-text="savedAt"></span>
                    </span>
                    <template x-if="currentStep < steps.length - 1">
                        <button type="button" @click="next()" class="btn btn-primary" :disabled="!canAdvance()"
                            :style="!canAdvance() ? 'opacity:.5; cursor:not-allowed' : ''"
                            :title="canAdvance() ? '' : currentStepError">
                            Continue
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                width="14" height="14">
                                <path d="M5 12h14M13 6l6 6-6 6" />
                            </svg>
                        </button>
                    </template>
                    <template x-if="currentStep === steps.length - 1">
                        <button type="submit" class="btn btn-primary">
                            Submit response
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                width="14" height="14">
                                <path d="M20 6 9 17l-5-5" />
                            </svg>
                        </button>
                    </template>
                </div>
            </div>
        </form>

        <p class="text-center text-sm mt-8" style="color:var(--muted)">
            Need to leave? Your progress is saved on this device. Just come back to <a href="survey.html"
                style="color:var(--primary); text-decoration:underline">survey.html</a>.
        </p>

        <!-- ============ RESET CONFIRMATION MODAL ============ -->
        <div x-show="showResetModal" x-cloak @keydown.escape.window="showResetModal = false"
            class="fixed inset-0 z-50 flex items-center justify-center p-5"
            style="background:rgba(20,12,28,.55); backdrop-filter:blur(4px)">
            <div @click.outside="showResetModal = false" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                class="card max-w-md w-full p-7" style="box-shadow:0 30px 80px rgba(20,12,28,.4)">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-11 h-11 rounded-full flex items-center justify-center"
                        style="background:var(--primary-soft); color:var(--primary)">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="22"
                            height="22">
                            <path d="M3 12a9 9 0 1 0 3-6.7L3 8" />
                            <path d="M3 3v5h5" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-display"
                            style="font-size:1.3rem; font-weight:600; color:var(--ink); letter-spacing:-0.01em">
                            Clear all your answers?
                        </h3>
                        <p class="mt-2 text-sm" style="color:var(--ink-2); line-height:1.55">
                            This will erase every answer you've filled in so far on this device and take you back to the
                            beginning. This can't be undone.
                        </p>
                    </div>
                </div>
                <div class="mt-6 flex flex-wrap gap-3 justify-end">
                    <button type="button" @click="showResetModal = false" class="btn btn-secondary">Keep my
                        answers</button>
                    <button type="button" @click="confirmReset()" class="btn btn-primary"
                        style="background:var(--warn); box-shadow:0 6px 16px -8px rgba(194,65,12,.55)">
                        Yes, reset everything
                    </button>
                </div>
            </div>
        </div>

    </main>
@endsection

@section('scripts')
    <script>
        const STORAGE_KEY = 'qts-survey-v1';

        function emptyData() {
            return {
                consent: '',
                // Tech
                workedInTech: '',
                techAreas: [],
                techAreasOther: '',
                techLevel: '',
                // Past Experiences
                pastExperience: '',
                hostility: [],
                hostilityOther: '',
                reportedOutcome: '',
                experienceImpact: '',
                experienceImpactNote: '',
                safetyScore: null,
                outness: '',
                hesitance: [],
                hesitanceOther: '',
                wouldHelp: [],
                wouldHelpOther: '',
                // Learning
                excitedBy: [],
                excitedByOther: '',
                priorTraining: '',
                priorTrainingList: '',
                futureTrainings: '',
                trainingFormats: [],
                trainingSupport: '',
                // Support
                changesNeeded: '',
                positiveExamples: '',
                joinCommunity: '',
                receiveUpdates: '',
                mentalHealthImpact: '',
                additionalComments: '',
                // Demographics
                age: '',
                country: '',
                countryOther: '',
                gender: [],
                genderSelf: '',
                orientation: [],
                orientationSelf: '',
                transgender: '',
                transgenderSelf: '',
                intersex: '',
                education: '',
                employment: '',
                intersecting: '',
                allyObservations: ''
            };
        }

        function surveyApp() {
            return {
                currentStep: 0,
                savedAt: '',
                saveTimer: null,
                validationError: '',
                showResetModal: false,
                steps: [{
                        id: 'consent',
                        short: 'Consent',
                        title: 'Welcome &mdash; let\u2019s start with consent',
                        sub: 'A quick yes/no, and a note about what you\u2019re agreeing to. You can stop at any time.'
                    },
                    {
                        id: 'demographics',
                        short: 'About you',
                        title: 'A little about you',
                        sub: 'All optional \u2014 skip whatever you\u2019d rather not answer.'
                    },
                    {
                        id: 'learning',
                        short: 'Interests',
                        title: 'Interests &amp; learning',
                        sub: 'What excites you, and how you\u2019d like to grow.'
                    },
                    {
                        id: 'experiences',
                        short: 'Experiences',
                        title: 'Your experiences (or hesitations)',
                        sub: 'We\u2019ll branch based on whether you\u2019ve worked or studied in tech before.'
                    },
                    {
                        id: 'tech',
                        short: 'Tech spaces',
                        title: 'Your relationship with tech',
                        sub: 'Whether you\u2019re in the industry, on your way in, or considering it.'
                    },
                    {
                        id: 'support',
                        short: 'Support',
                        title: 'Support &amp; recommendations',
                        sub: 'What would make tech safer? Your words shape this report.'
                    }
                ],
                data: emptyData(),

                init() {
                    try {
                        const raw = localStorage.getItem(STORAGE_KEY);
                        if (raw) {
                            const parsed = JSON.parse(raw);
                            this.data = Object.assign(emptyData(), parsed.data || {});
                            if (typeof parsed.currentStep === 'number') this.currentStep = parsed.currentStep;
                        }
                    } catch (e) {}

                    this.$watch('data', () => {
                        this.save();
                        this.validationError = '';
                    }, {
                        deep: true
                    });
                    this.$watch('currentStep', () => {
                        this.save();
                        this.validationError = '';
                        window.scrollTo({
                            top: 0,
                            behavior: 'smooth'
                        });
                    });
                },

                save() {
                    clearTimeout(this.saveTimer);
                    this.saveTimer = setTimeout(() => {
                        try {
                            localStorage.setItem(STORAGE_KEY, JSON.stringify({
                                data: this.data,
                                currentStep: this.currentStep,
                                ts: Date.now()
                            }));
                            const d = new Date();
                            this.savedAt = d.getHours().toString().padStart(2, '0') + ':' + d.getMinutes()
                            .toString().padStart(2, '0');
                        } catch (e) {}
                    }, 250);
                },

                toggle(arr, v) {
                    const i = arr.indexOf(v);
                    if (i >= 0) arr.splice(i, 1);
                    else arr.push(v);
                },

                get currentStepError() {
                    const r = this.validateStep(this.currentStep);
                    return r === true ? '' : r;
                },

                canAdvance() {
                    return this.validateStep(this.currentStep) === true;
                },

                // Returns `true` if the step is complete, otherwise an error string.
                validateStep(i) {
                    const d = this.data;
                    const id = this.steps[i].id;
                    if (id === 'consent') {
                        if (d.consent !== 'yes') return 'Please confirm you consent to participate before continuing.';
                    }
                    if (id === 'tech') {
                        if (!d.workedInTech) return 'Please tell us if you\u2019ve worked in tech.';
                        if (!d.techAreas.length && !d.techAreasOther.trim())
                        return 'Pick at least one area of tech (or fill in \u201cOther\u201d).';
                        if (!d.techLevel) return 'Please choose your current tech experience level.';
                    }
                    if (id === 'experiences') {
                        if (!d.pastExperience) return 'Please answer whether you\u2019ve had past tech experience.';
                        if (d.pastExperience === 'yes' && !d.hostility.length && !d.hostilityOther.trim()) {
                            return 'Please select at least one option about hostility (\u201cNone of the above\u201d or \u201cPrefer not to say\u201d are valid choices).';
                        }
                        if (d.pastExperience === 'no' && !d.hesitance.length && !d.hesitanceOther.trim()) {
                            return 'Please tell us at least one thing that makes you hesitant.';
                        }
                    }
                    if (id === 'learning') {
                        if (!d.excitedBy.length && !d.excitedByOther.trim())
                        return 'Pick at least one thing that excites you (or fill in \u201cOther\u201d).';
                        if (!d.futureTrainings) return 'Please answer whether you\u2019re interested in future trainings.';
                    }
                    // 'support' and 'demographics' steps have no required fields
                    return true;
                },

                canJumpTo(i) {
                    // allow jumping forward only one section at a time AND only if consent given
                    return this.data.consent === 'yes' && i <= this.currentStep + 1;
                },

                next() {
                    const result = this.validateStep(this.currentStep);
                    if (result !== true) {
                        this.validationError = result;
                        return;
                    }
                    this.validationError = '';
                    if (this.currentStep < this.steps.length - 1) this.currentStep += 1;
                },
                prev() {
                    this.validationError = '';
                    if (this.currentStep > 0) this.currentStep -= 1;
                },
                goTo(i) {
                    if (i < 0 || i >= this.steps.length) return;
                    if (i <= this.currentStep) {
                        this.currentStep = i;
                        return;
                    }
                    // Only allow forward jump if every step up to (and including) i-1 is valid
                    for (let s = this.currentStep; s < i; s++) {
                        const r = this.validateStep(s);
                        if (r !== true) {
                            this.validationError = r;
                            return;
                        }
                    }
                    if (this.canJumpTo(i)) this.currentStep = i;
                },

                resetSurvey() {
                    this.showResetModal = true;
                },
                confirmReset() {
                    this.data = emptyData();
                    this.currentStep = 0;
                    try {
                        localStorage.removeItem(STORAGE_KEY);
                    } catch (e) {}
                    this.savedAt = '';
                    this.validationError = '';
                    this.showResetModal = false;
                },

                async submit() {
                    // Validate every step before submitting
                    for (let s = 0; s < this.steps.length; s++) {
                        const r = this.validateStep(s);
                        if (r !== true) {
                            this.validationError = r;
                            this.currentStep = s;
                            return;
                        }
                    }

                    const toSnake = obj => Object.fromEntries(
                        Object.entries(obj).map(([k, v]) => [k.replace(/[A-Z]/g, c => '_' + c.toLowerCase()), v])
                    );

                    try {
                        const res = await fetch('{{ route('frontend.survey.store') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            },
                            body: JSON.stringify(toSnake(this.data)),
                        });

                        if (!res.ok) {
                            const json = await res.json().catch(() => ({}));
                            this.validationError = json.message || 'Something went wrong. Please try again.';
                            return;
                        }

                        try { localStorage.removeItem(STORAGE_KEY); } catch (e) {}
                        window.location.href = '{{ route('frontend.thank-you') }}';
                    } catch (e) {
                        this.validationError = 'Network error — please check your connection and try again.';
                    }
                }
            };
        }
    </script>
@endsection
