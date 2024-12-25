<div id="status_{{$brands->id}}" @if($brands->status == 1) class="text-success" @else class="text-danger" @endif>
    {{$brands->status == 1 ? 'Active' : 'Inactive' }}
</div>
