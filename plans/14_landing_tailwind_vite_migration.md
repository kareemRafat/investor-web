# Plan 14: Landing Tailwind CDN -> Vite Build

## Goal
Move landing + landing-terms off the Tailwind Play CDN to the existing Tailwind v4 + Vite build, pixel-identical, keeping Bootstrap and Filament untouched. No code in this file — execution checklist only.

## Constraints
- Landing-only change: components.layouts.blank, Landing, LandingTerms, new resources/css/landing.css, vite.config.js input list.
- No Bootstrap import in landing CSS; no landing CSS in Bootstrap layouts.
- No new npm/php dependencies without approval.
- Visual parity required: desktop/mobile, AR/RTL + EN/LTR, guest/auth.

## Current state
- blank.blade.php loads the Tailwind Play CDN with forms + container-queries plugins, plus a big inline tailwind.config and inline style block.
- Custom theme used by landing.blade.php + landing-terms.blade.php: custom colors like surface-container-lowest, on-surface-variant, primary, secondary-container; custom spacing space-md/2xl/3xl, margin; custom fonts/sizes headline-xl, label-lg, body-md; helper classes custom-gradient-btn, hero-pattern, rtl-flip.
- Landing JS toggles classes at runtime: hidden, text-primary, text-on-surface-variant, border-primary, border-transparent, opacity-0/100, pointer-events-none/auto.
- Project already has tailwindcss v4, tailwind vite plugin enabled; Filament theme uses v4 source directives; landing has no Vite entry.
- Routes main.landing -> Landing, main.terms.landing -> LandingTerms, both use components.layouts.blank.

## Target state
- New resources/css/landing.css built by Vite, loaded only by blank.blade.php via Vite directive.
- CDN script + inline config + moved inline styles gone from blank.blade.php.
- Fonts, icons, Livewire, page markup and JS unchanged.

---

## Milestone 0 — Baseline and Inventory

[x] M0-T1 Record baseline: screenshot landing + landing-terms desktop/mobile, AR + EN, guest + auth; note CDN requests in network tab.
[x] M0-T2 Inventory blank-layout consumers: confirm only Landing + LandingTerms use components.layouts.blank.
[x] M0-T3 List every custom token used by landing pages from inline config: colors, spacing, fonts, sizes, radii, plus custom-gradient-btn, hero-pattern, rtl-flip, material-symbols base rules.
[x] M0-T4 Audit JS-toggled classes in landing.blade.php script: hidden, text-primary, text-on-surface-variant, border-primary, border-transparent, opacity-0/100, pointer-events-none/auto; confirm each also appears as a literal class or needs safelisting.
[x] M0-T5 Check forms-plugin need: confirm landing pages have no form inputs requiring the forms plugin; container-queries is built into v4.

Acceptance: baseline screenshots + token list + JS-class list done before M1.

## Milestone 1 — New landing.css With v4 Theme

[x] M1-T1 Create resources/css/landing.css as landing-only stylesheet with Tailwind v4 import scoped via explicit sources: blank layout, landing, landing-terms templates only.
[x] M1-T2 Migrate inline v3 config to v4 theme variables: all custom colors, spacing, fonts, sizes with line-height/weight/tracking, radii.
[x] M1-T3 Preserve class-based dark mode behavior used by blank layout dark variant.
[x] M1-T4 Move blank-layout custom styles into landing.css: gradient button, hero pattern, RTL flip, material-symbols base rules.
[x] M1-T5 Review v3 to v4 differences: opacity modifiers, shadows, borders, gradients, arbitrary values; adjust theme mapping to keep visuals identical.

Acceptance: theme tokens compile; no Bootstrap selectors in landing output.

## Milestone 2 — Vite Wiring and Layout Switch

[x] M2-T1 Register resources/css/landing.css as separate Vite input; leave app.css, auth.css, app.js, Filament theme entries unchanged.
[x] M2-T2 Update blank.blade.php: replace CDN script + inline config + moved style block with Vite directive for landing.css only; keep fonts, Material Symbols, Livewire directives, page scripts.
[x] M2-T3 Run npm run build; confirm landing entry exists in Vite manifest with no missing-file error.
[x] M2-T4 Confirm Bootstrap pages and Filament still load their own bundles with no landing CSS leakage.

Acceptance: landing renders from local build; zero cdn.tailwindcss.com requests.

## Milestone 3 — Visual Parity QA

[] M3-T1 Compare after/before screenshots: landing + landing-terms, desktop + mobile, EN/LTR + AR/RTL, guest + auth states.
[] M3-T2 Test interactive elements: mobile menu open/close, scroll-spy active link, scroll-to-top show/hide + progress ring, count-up stats.
[] M3-T3 Check typography, spacing, colors, gradients, header/hero/stats/CTA/footer against M0 baseline.
[] M3-T4 Smoke-test one Bootstrap page and Filament admin for styling regressions.

Acceptance: pixel parity + interactions pass; regressions list empty.

## Milestone 4 — Cleanup, Deploy

[x] M4-T1 Remove CDN remnants and verify no inline tailwind config script remains in blank layout.
[] M4-T2 Deploy templates + freshly built Vite assets together; re-verify production landing once.

Acceptance: no CDN references, deploy bundle includes landing CSS.
