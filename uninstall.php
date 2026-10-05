<?php
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) { exit; }
$keys = array( 'rankhigh_seo_news_window', 'rankhigh_seo_redirects', 'rankhigh_seo_404_monitor', 'rankhigh_seo_cache_epoch', 'rankhigh_seo_404_log', 'rankhigh_seo_publisher_name', 'rankhigh_seo_publisher_logo', 'rankhigh_seo_publisher_type', 'rankhigh_primary_url', 'rankhigh_media_host', 'rankhigh_cdn_enabled', 'rankhigh_cdn_host', 'rankhigh_video_host', 'rankhigh_api_host', 'rankhigh_publication_short_name', 'rankhigh_default_language', 'rankhigh_default_locale', 'rankhigh_timezone', 'rankhigh_country', 'rankhigh_copyright', 'rankhigh_contact', 'rankhigh_social_profiles', 'rankhigh_author_mode' );
foreach ( $keys as $key ) { delete_option( $key ); }
if ( is_multisite() ) { $sites = get_sites( array( 'fields' => 'ids' ) ); foreach ( $sites as $site_id ) { switch_to_blog( $site_id ); foreach ( $keys as $key ) { delete_option( $key ); } restore_current_blog(); } }
