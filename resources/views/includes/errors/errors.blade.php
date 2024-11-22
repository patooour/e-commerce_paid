@if ($errors->any())
    <div class="row mt-1">
        @foreach ($errors->all() as $error)
            <button type="button" class="btn btn-lg  btn-outline-danger mb-2 btn-block" id="type-danger">
                {{$error}}
            </button>
          @endforeach
    </div>
@endif
