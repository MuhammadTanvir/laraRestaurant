@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span>
            </button>
            <script>
                new Noty({
                    theme: 'sunset',
                    type: 'error',
                    layout: 'topRight',
                    timeout: 3000,
                    text: "Something went Wrong!!",
                }).show();
            </script>
    </div>
@endif


    @if (Session::has('success'))
    <script>
        new Noty({
            theme: 'sunset',
            type: 'success',
            layout: 'topRight',
            timeout: 3000,
            text: "{{ (Session::get('success')) }}"
        }).show();
    </script>
    @endif

    @if (Session::has('error'))
    <script>
        new Noty({
            theme: 'sunset',
            type: 'error',
            layout: 'topRight',
            timeout: 3000,
            text: "{{ (Session::get('error')) }}"
        }).show();
    </script>
    @endif
    


@if (Session::has('sticky_success'))
    
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ (Session::get('sticky_success')) }}</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span>
            </button>
        </div>
@endif


@if (Session::has('sticky_error'))
    
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ (Session::get('sticky_error')) }}</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span>
            </button>
        </div>
    
@endif