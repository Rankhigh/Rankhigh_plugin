<?php
/**
 * Plugin Name: RankHigh SEO
 * Plugin URI: https://rankhigh.vercel.app/
 * Description: Production-ready technical SEO, News SEO, metadata, schema, sitemaps, redirects, and diagnostics for WordPress publishers.
 * Version: 1.5.0
 * Requires at least: 6.3
 * Requires PHP: 7.4
 * Author: RankHigh
 * Author URI: https://rankhigh.vercel.app/
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: rankhigh-seo
 */

defined( 'ABSPATH' ) || exit;

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}

spl_autoload_register(
	static function ( $class ) {
		$prefix = 'RankHighSEO\\';
		if ( 0 !== strpos( $class, $prefix ) ) {
			return;
		}
		$file = __DIR__ . '/src/' . str_replace( '\\', '/', substr( $class, strlen( $prefix ) ) ) . '.php';
		if ( is_readable( $file ) ) {
			require_once $file;
		}
	}
);

if ( defined( 'WP_CLI' ) && WP_CLI && is_readable( __DIR__ . '/src/CLI/RankHighCommand.php' ) ) {
	require_once __DIR__ . '/src/CLI/RankHighCommand.php';
}

register_activation_hook(
	__FILE__,
	static function () {
		update_option( 'rankhigh_seo_cache_epoch', time(), false );
		update_option( 'rankhigh_indexnow_enabled', 0, false );
			update_option( 'rankhigh_indexnow_key', wp_generate_password( 32, false, false ), false );
			update_option( 'rankhigh_indexnow_post_types', 'post', false );
			update_option( 'rankhigh_indexnow_key_location', home_url( '/rankhigh-indexnow-key.txt' ), false );
			update_option( 'rankhigh_seo_news_enabled', 1, false );
			update_option( 'rankhigh_seo_news_window', 48, false );
			update_option( 'rankhigh_seo_news_post_types', 'post', false );
			update_option( 'rankhigh_seo_news_max_urls', 1000, false );
			update_option( 'rankhigh_seo_news_exclude_ids', '', false );
			update_option( 'rankhigh_seo_news_exclude_categories', '', false );
			update_option( 'rankhigh_seo_news_keywords', 1, false );
			update_option( 'rankhigh_seo_news_genre', '', false );
			update_option( 'rankhigh_seo_title_separator', '|', false );
			update_option( 'rankhigh_seo_default_robots', 'index,follow', false );
			update_option( 'rankhigh_seo_title_template_home', '%%sitename%% %%page%%', false );
			update_option( 'rankhigh_seo_title_template_post', '%%title%% %%sep%% %%sitename%% %%page%%', false );
			update_option( 'rankhigh_seo_title_template_page', '%%title%% %%sep%% %%sitename%%', false );
			update_option( 'rankhigh_seo_title_template_archive', '%%title%% %%sep%% %%sitename%%', false );
			update_option( 'rankhigh_seo_image_sitemap', 1, false );
			update_option( 'rankhigh_image_license_url', '', false );
			update_option( 'rankhigh_seo_video_sitemap', 1, false );
			update_option( 'rankhigh_trace_required', 1, false );
		update_option( 'rankhigh_sitemap_post_types', 'post', false );
		update_option( 'rankhigh_sitemap_pages_enabled', 1, false );
		update_option( 'rankhigh_sitemap_cpt_enabled', 1, false );
		update_option( 'rankhigh_sitemap_taxonomies_enabled', 1, false );
		update_option( 'rankhigh_sitemap_authors_enabled', 1, false );
		update_option( 'rankhigh_sitemap_attachments_enabled', 0, false );
		update_option( 'rankhigh_breadcrumbs_enabled', 1, false );
		update_option( 'rankhigh_breadcrumbs_separator', '→', false );
		update_option( 'rankhigh_seo_publication_name', get_bloginfo( 'name' ), false );
			update_option( 'rankhigh_seo_publisher_name', get_bloginfo( 'name' ), false );
		update_option( 'rankhigh_seo_publisher_logo', '', false );
		update_option( 'rankhigh_seo_publisher_type', 'NewsMediaOrganization', false );
		update_option( 'rankhigh_primary_url', home_url( '/' ), false );
		update_option( 'rankhigh_media_host', '', false );
		update_option( 'rankhigh_cdn_enabled', 0, false );
		update_option( 'rankhigh_cdn_host', '', false );
		update_option( 'rankhigh_video_host', '', false );
		update_option( 'rankhigh_api_host', '', false );
		update_option( 'rankhigh_publication_short_name', '', false );
		update_option( 'rankhigh_default_language', substr( (string) get_locale(), 0, 2 ), false );
			update_option( 'rankhigh_seo_multilingual_enabled', 1, false );
			update_option( 'rankhigh_seo_hreflang_map', '', false );
			update_option( 'rankhigh_seo_x_default_url', '', false );
		update_option( 'rankhigh_default_locale', get_locale(), false );
		update_option( 'rankhigh_timezone', wp_timezone_string(), false );
		update_option( 'rankhigh_country', '', false );
		update_option( 'rankhigh_copyright', '', false );
		update_option( 'rankhigh_contact', '', false );
		update_option( 'rankhigh_social_profiles', '', false );
		update_option( 'rankhigh_author_mode', 'wordpress', false );
		if ( class_exists( '\\RankHighSEO\\Sitemap\\SitemapController' ) ) {
			( new \RankHighSEO\Sitemap\SitemapController() )->rewrite();
		}
		flush_rewrite_rules();
	}
);

register_deactivation_hook(
	__FILE__,
	static function () {
		flush_rewrite_rules();
	}
);

add_action(
	'plugins_loaded',
	static function () {
		if ( class_exists( '\\RankHighSEO\\Core\\Plugin' ) ) {
			( new \RankHighSEO\Core\Plugin() )->boot();
		}
	}
);
