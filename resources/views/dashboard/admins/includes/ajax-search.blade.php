<table class="table mb-0">
    <thead>
    <tr class="border-bottom-active border-custom-color">
        <th>#</th>
        <th>name</th>
        <th>email</th>
        <th>role</th>
        <th>status</th>
        <th>created At</th>
        <th>Operations</th>
    </tr>
    </thead>
    <tbody>
    @foreach($admins as $key=>$admin)
        <tr class="border-bottom-success border-custom-color">
            <td>{{$key +1 }}</td>
            <td>{{$admin->name }}</td>
            <td>{{$admin->email }}</td>
            <td>{{$admin->role->role }}</td>
            <td class="@if($admin->status == 'Active') text-success text-bold-700 @else text-danger text-bold-700 @endif">{{$admin->status}}</td>
            <td>{{$admin->created_at->format('Y - m - d') }}</td>

            <td>
                <a class="btn btn-sm btn-primary"
                   href="{{route('dashboard.admins.edit',$admin->id)}}"
                   title="Admin Edit"><i class="la la-edit"></i></a>

                <a class="btn btn-sm btn-warning"
                   href="{{route('dashboard.admins.status',$admin->id)}}"
                   title="{{$admin->name}} Change status">
                    <i class="la @if($admin->status == 'Active') la-toggle-on @else la-toggle-off @endif"></i></a>

                <a href="javascript:void(0)" onclick="if(confirm('do you want to delete Admin')) {
                                                            document.getElementById('destroy_admin_{{$admin->id}}').submit() } return false
                                                            " class=" btn btn-sm btn-danger" title="delete {{$admin->name}}"><i class="la la-trash"></i>
                </a>

            </td>
            {{-- form for destroy --}}
            <form action="{{route('dashboard.admins.destroy',$admin->id)}}"
                  id="destroy_admin_{{$admin->id}}" method="post">
                @csrf
                @method('delete')
            </form>
            {{-- end form for destroy --}}

        </tr>

    @endforeach
    </tbody>
</table>
