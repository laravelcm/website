@if($errors->any())
    <div class="alert alert-danger fade show" role="alert">
        <div class="alert-icon"><i class="flaticon-cancel"></i></div>
        <div class="alert-text">
            @foreach($errors->all() as $error)
                {!! $error !!}<br/>
            @endforeach
        </div>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="la la-close"></i></span>
            </button>
        </div>
    </div>
@elseif(session()->get('flash_success'))
     <div class="alert alert-success fade show" role="alert">
         <div class="alert-icon"><i class="flaticon2-correct"></i></div>
         <div class="alert-text">
             @if(is_array(json_decode(session()->get('flash_success'), true)))
                 {!! implode('', session()->get('flash_success')->all(':message<br/>')) !!}
             @else
                 {!! session()->get('flash_success') !!}
             @endif
         </div>
         <div class="alert-close">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true"><i class="la la-close"></i></span>
             </button>
         </div>
     </div>
@elseif(session()->get('flash_warning'))
     <div class="alert alert-warning fade show" role="alert">
         <div class="alert-icon"><i class="flaticon-warning"></i></div>
         <div class="alert-text">
             @if(is_array(json_decode(session()->get('flash_warning'), true)))
                 {!! implode('', session()->get('flash_warning')->all(':message<br/>')) !!}
             @else
                 {!! session()->get('flash_warning') !!}
             @endif
         </div>
         <div class="alert-close">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true"><i class="la la-close"></i></span>
             </button>
         </div>
     </div>
@elseif(session()->get('flash_info'))
    <div class="alert alert-info fade show" role="alert">
        <div class="alert-icon"><i class="flaticon-exclamation-2"></i></div>
        <div class="alert-text">
            @if(is_array(json_decode(session()->get('flash_info'), true)))
                {!! implode('', session()->get('flash_info')->all(':message<br/>')) !!}
            @else
                {!! session()->get('flash_info') !!}
            @endif
        </div>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="la la-close"></i></span>
            </button>
        </div>
    </div>
@elseif(session()->get('flash_danger'))
    <div class="alert alert-danger fade show" role="alert">
        <div class="alert-icon"><i class="flaticon-cancel"></i></div>
        <div class="alert-text">
            @if(is_array(json_decode(session()->get('flash_danger'), true)))
                {!! implode('', session()->get('flash_danger')->all(':message<br/>')) !!}
            @else
                {!! session()->get('flash_danger') !!}
            @endif
        </div>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="la la-close"></i></span>
            </button>
        </div>
    </div>
@elseif(session()->get('flash_message'))
     <div class="alert alert-dark fade show" role="alert">
         <div class="alert-icon"><i class="flaticon-questions-circular-button"></i></div>
         <div class="alert-text">
             @if(is_array(json_decode(session()->get('flash_message'), true)))
                 {!! implode('', session()->get('flash_message')->all(':message<br/>')) !!}
             @else
                 {!! session()->get('flash_message') !!}
             @endif
         </div>
         <div class="alert-close">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true"><i class="la la-close"></i></span>
             </button>
         </div>
     </div>
@endif
