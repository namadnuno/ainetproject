@if(session()->has('success'))
    <div class="notification is-success">
        
        {{ session()->get('success') }}
    </div>
@endif
@if(session()->has('error'))
    <div class="notification is-danger">
        
        {{ session()->get('error') }}
    </div>
@endif
@if (session('status'))
    <div class="notification is-danger">
        {{ session('status') }}
    </div>
@endif