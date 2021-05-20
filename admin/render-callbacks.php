<?php

/**
 *
 * Partials Render Callbacks
 *
 */

function attire_blogdescription_rcb()
{
    bloginfo('description');
}

function attire_blogname_rcb()
{
    bloginfo('name');
}

function attire_site_logo_rcb()
{
    return '<a class="site-logo" href="' . esc_url(home_url("/")) . '">' . AttireThemeEngine::SiteLogo() . '</a>';
}

function attire_custom_header_rcb()
{
    AttireThemeEngine::PageHeaderStyle();
}

function attire_site_logo_footer_rcb()
{
    $logourl = esc_url(AttireThemeEngine::NextGetOption('site_logo_footer'));
    if ($logourl) {
        return "<a class='' href='" . esc_url(home_url('/')) . "'>" . AttireThemeEngine::FooterLogo() . "</a>";
    } else {
        return esc_html(get_bloginfo('sitename'));
    }
}

function attire_nav_header_rcb()
{
    AttireThemeEngine::HeaderStyle();
}

function attire_footer_style_rcb()
{
    AttireThemeEngine::FooterStyle();
}

function attire_copyright_info_rcb()
{
    return AttireThemeEngine::NextGetOption('copyright_info');

}

function attire_copyright_info_visibility_rcb()
{
    $show = AttireThemeEngine::NextGetOption('copyright_info_visibility');
    if ($show === 'show') {
        return '<p class="copyright-text">' . esc_html(AttireThemeEngine::NextGetOption('copyright_info')) . '';
    } else {
        return '';
    }
}

function attire_archive_page_post_view_rcb()
{
    get_template_part('loop', get_post_type());
}
