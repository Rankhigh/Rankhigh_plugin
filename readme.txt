=== RankHigh SEO ===
Contributors: rankhigh
Requires at least: 6.3
Requires PHP: 7.4
Stable tag: 1.4.0
License: GPLv2 or later
Text Domain: rankhigh-seo

RankHigh is a free, news-outlet-first SEO suite for WordPress. It owns metadata, NewsArticle schema, publisher signals, sitemaps, redirects, and diagnostics without requiring Yoast SEO, Rank Math, or another SEO plugin.

== Features ==
* Registry-based single-output ownership.
* NewsArticle JSON-LD graph with publisher, author, language, paywall-free, word count, date, section, and image signals.
* Publisher-first meta output for article dates, sections, tags, canonical URLs, robots, Open Graph, and social previews.
* Newsroom identity controls for publisher name, logo, and NewsMediaOrganization schema.
* International and multilingual SEO with manual locale URL maps, regional hreflang (en-US, fr-FR, ar-SA), x-default fallback, WPML/Polylang discovery, Open Graph locale alternates, and locale-aware schema.
* Optional IndexNow instant URL discovery with secure key endpoint, delayed publish/update submission, post-type controls, and status tracking.
* Automatic public HTML branding: a RankHigh attribution comment and generator meta tag link to the official website https://rankhigh.vercel.app/.
* Universal publication profile: primary URL, media/CDN/video/API hosts, language, locale, timezone, country, copyright, contact, social profiles, and author configuration.
* Each WordPress site stores its own profile with standard per-site options, so multisite publications do not share identity or infrastructure settings.
* Media, CDN, video, and API hosts are infrastructure for one publication and are never treated as separate licenses.
* Advanced Google News sitemap with configurable freshness window, public post types, exclusions, URL limits, genres, keywords, indexability checks, filters, and publication metadata.
* Image sitemap entries from featured and attached media, capped per URL for predictable performance.
* Video sitemap entries from self-hosted attachments and embedded MP4, WebM, and MOV media.
* Automatic VideoObject schema on news articles when a video URL and thumbnail are provided.
* Editorial media controls for video thumbnail and ISO 8601 duration, with strict URL sanitization.

* Safe redirect storage and loop prevention.
* No custom database tables and no frontend assets.

== Compatibility ==
See docs/JNEWS-COMPATIBILITY.md. JNews-specific behavior is feature-detected only; no third-party files are modified.

== Privacy ==
RankHigh makes no external HTTP requests during frontend rendering.


== Terms of Use ==

See `TERMS-OF-USE.md` in the plugin package for attribution, privacy, security, deployment, and publisher responsibilities.

RankHigh does not intentionally break a publisher website if attribution is changed. It uses privacy-safe trace markers and administrator warnings instead.
