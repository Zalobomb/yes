jQuery(document).ready(function($){
    
    /**
     * Script for image selected from radio option
     */
     $('.controls#faceblog-img-container li img').live( 'click', function(){
        $('.controls#faceblog-img-container li').each(function(){
            $(this).find('img').removeClass ('faceblog-radio-img-selected') ;
        });
        $(this).addClass ('faceblog-radio-img-selected') ;
    });

	// Page Metabox section
    $('.pg-metabox div').first().fadeIn();
    
    $('ul.mt-page-meta-tabs li').click(function (){
        var id = $(this).attr('atr');
        
        $('ul.mt-page-meta-tabs li').removeClass('active');
        $(this).addClass('active')
        
        $('.pg-metabox .pg-metabox-inside').hide();
        $('#'+id).fadeIn();
    });

    /**
     * Script for image selected in page metabox
     */
     $('#mt-img-container-meta li img').click(function(){
        $('#mt-img-container-meta li').each(function(){
            $(this).find('img').removeClass ('faceblog-radio-img-selected') ;
        });
        $(this).addClass ('faceblog-radio-img-selected') ;
    });

    //Page template select option
    $('#page_template').on('change', function (e) {
        var selectPage = $("option:selected", this);
        var pageTemplate = selectPage.attr('value');
        $(".meta-menu-page-tmp").hide();
        $('.tmp-page-meta-tabs li').removeClass('active');
        $('.pg-metabox-inside').hide();
    });
    /*Page metabox closed*/

});