@foreach (['danger', 'warning', 'success', 'info'] as $key)
    @if(Session::has('mensaje-'.$key))
        <!-- <p class="alert alert-{{ $key }}">{{ Session::get('mensaje-'.$key) }}</p>
        <div class="alert alert-{{ $key }} alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>	
          <strong>{{ Session::get('mensaje-'.$key) }}</strong>
        </div> -->


<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<script>
// Create an instance of Notyf

const notyf = new Notyf({
  duration: 10000,
  position: {
    x: 'right',
    y: 'top',
  },
});

result = `{!! $key !!}`;

if(result == 'danger'){
    notyf.error(`{!! Session::get('mensaje-'.$key) !!}`);
}

if(result == 'success'){
    // Display a success notification
    notyf.success(`{!! Session::get('mensaje-'.$key) !!}`);
}



</script>
    @endif
@endforeach