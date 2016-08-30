jQuery(document).ready(function ($){
    /*Sticky user note  */
    $('#accordion-panel-scrollme_panel_general_settings').prepend(
      '<div class="user_sticky_note">'+
      '<span class="sticky_info_row"><a class="button" href="http://demo.accesspressthemes.com/scroll-me/" target="_blank">Live Demo</a></span>'+
      '<span class="sticky_info_row"><a class="button" href="http://accesspressthemes.com/documentation/scrollme/" target="_blank">Documentation</a></span>'+
      '</div>'
    );  

    jQuery(window).load(function() {

      //var upgrade_notice = '<a href="https://accesspressthemes.com/wordpress-themes/one-paze-pro/" target="_blank"><div class="upgrade-banner"><img style="display:block" src="'+ one_paze_template_path.template_path +'/inc/images/upgrade-banner.png"/></div></a>';
      var upgrade_notice = '<a class="upgrade-pro" target="_blank" href="https://accesspressthemes.com/wordpress-themes/scrollme-pro/">UPGRADE TO SCROLLME PRO</a>';
      upgrade_notice += '<a class="upgrade-pro" target="_blank" href="http://accesspressthemes.com/theme-demos/?theme=scrollme-pro">SCROLLME PRO DEMO</a>'

      jQuery('#customize-info .preview-notice').append(upgrade_notice);

    });
});

