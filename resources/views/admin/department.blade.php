@extends('admin.layout.app')

@section('appContent')

    <section class="row content-wrap ">
        <div class="col-sm-8 col-12">
            <h4 class="text-uppercase"><span class="text-info">Department</span></h4>
        </div>
    </section>

    <section class="row content-wrap ">
        <div class="col-md-12" id="div_ajax_res"></div>
        <form class="col-12" id="frm_data">
             <div class="form-row">
                 <div class="col-6 form-group">
                    <label for="input_name">Department</label>
                    <input type="text" class="form-control" id="input_name" />
                </div>
               
                
             </div>
            <div class="col-12 p-0">
                <button type="button" id="btn_save" data-loading-text="Saving..." class="btn btn-primary">Save</button>
                
            </div>
        </form>
</section>
@stop
@push('javascript')
<script type="text/javascript">

$('#btn_save').click(function(){
    var input_id = $('#input_id').val();
    var input_name  = $('#input_name').val();
   
    var proceed = true;
    
    if(input_name == '') {
        $('#input_name').addClass('input-error');
        proceed = false;
    }
    if(proceed) {       
        $('#btn_save').button('loading');
        var m_data = new FormData();
        m_data.append('input_id', input_id);
        m_data.append('input_name', input_name);
       
        $.ajax({
            url:  window.BASE_URL + "/department/ajax-update-department",
            data: m_data,
            processData: false,
            contentType: false,
            type: 'POST',
            dataType: 'json',
            success: function(data){
                $('#btn_save').button('reset');
                if(data.type == 'success') {
                    $('#div_ajax_res').html('<div class="alert alert-success">' + data.text + '</div>');
                    setTimeout(function(){ window.location.reload(); }, 1800);
                } else {
                    $('#div_ajax_res').html('<div class="alert alert-danger">' + data.text + '</div>');
                }
                $("html, body").animate({ scrollTop: 0 }, "fast");
                $('#div_ajax_res').slideDown();
                setTimeout(function(){ $('#div_ajax_res').slideUp(); }, 2000);
            }
        });
    }
});

    
</script>
@endpush