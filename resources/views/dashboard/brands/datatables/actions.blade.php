<a class="btn btn-sm btn-primary"
   href="{{route('dashboard.brands.edit',$brands->id)}}"
   title="Role Edit"><i class="ft-edit"></i>
</a>

<a class="btn btn-sm btn-warning change_status change-status-btn"  cat_id="{{$brands->id}}"
   href="{{route('dashboard.brands.status',$brands->id)}}"
   title="Role change status">  <i class="ft-toggle-right"></i>
</a>


<form action="{{route('dashboard.brands.destroy',$brands->id)}}"
     id="destroy_brand_{{$brands->id}}" method="post" class="d-inline">
    @method('delete')
    @csrf
    <button type="submit" class="btn btn-sm btn-danger delete_cat"
       title="Role Edit"><i class="ft-trash"></i>
    </button>
</form>


