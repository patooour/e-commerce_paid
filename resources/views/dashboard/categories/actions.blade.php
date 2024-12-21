<a class="btn btn-sm btn-primary"
   href="{{route('dashboard.categories.edit',$category->id)}}"
   title="Role Edit"><i class="ft-edit"></i>
</a>

<a class="btn btn-sm btn-warning change_status change-status-btn"  cat_id="{{$category->id}}"
   href="{{route('dashboard.categories.status',$category->id)}}"
   title="Role change status">  <i class="ft-toggle-right"></i>
</a>


<form action="{{route('dashboard.categories.destroy',$category->id)}}"
     id="destroy_admin_{{$category->id}}" method="post" class="d-inline">
    @method('delete')
    @csrf
    <button type="submit" class="btn btn-sm btn-danger delete_cat"
       title="Role Edit"><i class="ft-trash"></i>
    </button>
</form>


