<meta name="csrf-token" content="{{ csrf_token() }}" />

<div class="col-lg-3 col-lg-4 col_search order-2">
    <div class="header_search_box search-boarder">
        <form>
        	<label>Search</label>
            <input placeholder="Search name/department/designation" type="text" name="search" id="search_button" />
            <!-- <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button> -->
        </form>
    </div>
</div>

<div class="row" id="divData">
@foreach($user as $row)
  <div class="column" style="background-color:#ddd;">
    <h2>{{$row->name}}</h2>
    <!-- <p>{{$row->Fk_department}}</p> -->
    <!-- <p>{{$row->Fk_designation}}</p> -->
  </div>

@endforeach
</div>

<link rel="stylesheet" href="{{ asset('asset/css/style.css?ver='.time()) }}" />
<link rel="stylesheet" href="{{ asset('asset/css/font.awesome.css') }}" />
<script type="text/javascript" href="{{ asset('asset/js/home.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset/js/jquery.slim.min.js') }}"></script>
<script>
        window.BASE_URL = '{{ url('') }}';
</script>
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#search_button').keyup(function() {
  
    var search  = $('#search_button').val();
    var proceed = true;
    
    
    if(proceed) {       
        
        var m_data = new FormData();
        m_data.append('search', search);
       
        $.ajax({
            url:  window.BASE_URL + "/search",
            data: m_data,
            processData: false,
            contentType: false,
            type: 'POST',
            dataType: 'json',
            success: function(data){
                if (data.type == 'success') {
	                $.each(data.user, function (id, row) {
	                    var tempHTML = '<div class="column" style="background-color:#ddd;"><h2>'+ row.name +'</h2></div>';

	                   
	                    $('#divData').html(tempHTML);
	                });

                }else{
                	setTimeout(function() { window.location.reload(); }, 1500);
                }
            }
        });
    }    
  
});
</script>