/*
* @Author: Mithun
* @Date:   2019-12-23 16:20:20
* @Last Modified by:   Mithun
* @Last Modified time: 2020-01-08 13:11:35
*/

window.Is_Searching = false;

$.fn.search_library = function (options) {

    window.Is_Searching = true;

    var settings = $.extend({
        loading_gif_url: window.BASE_URL + '/assets/admin/images/ajax-loader.gif',
        end_record_text: 'No more records found!',
        data_url: window.BASE_URL + '/admin/data-library/ajax-list-images',
        start_page: 1
    }, options);

    var el = this;
    loading = false;
    end_record = false;
    load_menu(el, settings); //initial data load

    $('#div_library').scroll(function () { //detect scroll
        console.log('Top: ' + $('#div_library').scrollTop() + ' | Height: ' + $('#div_library').height());
        if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
            load_menu(el, settings); //load content chunk                        
        }
    });

    $('#search_type, #search_name').change(function () {
        settings.start_page = 1;
        var el = this;
        loading = false;
        end_record = false;
        $("#div_library").html('');
        window.CATID = 0;
        load_menu(el, settings);
    });

    $('.refresh_gallery').click(function() {
        settings.start_page = 1;
        loading = false;
        end_record = false;
        $("#div_library").html('');
        window.CATID = 0;
        load_menu(el, settings);
    });

    return true;
};
function load_menu(el, settings) {
    
    var load_img = $('<div class="w-100 text-center"><img width="30px" src="' + settings.loading_gif_url + '" /></div>');

    if (loading == false && end_record == false) {
        loading = true; //set loading flag on
        el.append(load_img); //append loading image
        $.post(settings.data_url, { 'page': settings.start_page, 'search_type': $('#search_type').val(), 'search_name': $('#search_name').val() }, function (result) {

            var response = JSON.parse(result);
            if (response.data.length > 0) {                
                $.each(response.data, function (row_id, row) {

                    var temp_html = '';
                    if(window.CATID == 0 || window.CATID != row.Media_Id) {
                        window.CATID = row.Media_Id;
                        temp_html = '<div class="col-12 media-library-txt p-0 pb-2 pt-2 blue-txt">'+ row.Media_Name +' <span class="gray-txt font-weight-light">('+ row.Media_Width +'x'+ row.Media_Height +')</span></div>';
                    }

                    temp_html += '<div class="col-6 col-sm-3 col-lg-2 text-center p-1 border"><div class="library-img-size">'+ row.Media_Width +'x'+ row.Media_Height +'</div><img src="'+ row.filepath +'" class="img-fluid" width="100%" id="img_'+ row.id +'" title="'+ row.file_name +'"><input type="checkbox" class="img-library img-id" value="'+ row.id +'" /></div>';

                    $('#div_library').append(temp_html);
                });

            } else { //no more records
                if (settings.start_page == 1) {
                    $('#div_library').html('<h3 class="empty-data">No data found</h3>');
                }
                load_img.remove(); //remove loading img
                end_record = true; //set end record flag on
                return; //exit
            }
            loading = false;  //set loading flag off
            load_img.remove(); //remove loading img                     
            settings.start_page++; //page increment
        });
    }
}

$(document).on('change', 'input.img-id', function (e) {
    var target = e.target;
    if ($(target).is(":checked")) {
        $('input.img-id').not(this).prop('checked', false);
    }
});