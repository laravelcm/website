@if(Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Well Done !!</strong> {{ Session::get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="chatter-alert-spacer"></div>
@endif
