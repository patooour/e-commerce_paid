<table class="table mb-0">
    <thead>
    <tr class="border-bottom-active border-custom-color">
        <th>#</th>
        <th>{{__('dashboard.name_country')}}</th>
        <th>{{__('dashboard.phone_code')}}</th>
        <th>{{__('dashboard.num_of_governorate')}}</th>
        <th>{{__('dashboard.num_of_user')}}</th>
        <th>{{__('dashboard.status')}}</th>
        <th>{{__('dashboard.manage_status')}}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($countries as $key=>$country)
        <tr class="border-bottom-success border-custom-color">
            <td>{{$key +1 }}</td>
            <td>{{$country->name}} <i
                    class="flag-icon flag-icon-{{$country->flag_code}}"></i>
            </td>
            <td class="text-bold-600">{{$country->phone_code }} </td>
            <td class="text-center">
                <div
                    class="badge badge-pill badge-border border-warning warning ">{{$country->governorates->count() }}</div>
            </td>
            <td class="text-center">
                <div
                    class="badge badge-pill badge-border border-primary primary">{{$country->users->count() }}</div>
            </td>
            <td>
                <div id="status_{{$country->id}}" class="badge badge-pill badge-border @if($country->is_active == 1) border-success success
                                                            @else border-danger danger  @endif">{{$country->is_active == 1 ? __('dashboard.active')  : __('dashboard.inactive') }}</div>
            </td>
            <td class="text-center">
                <input
                    @checked($country->is_active ==  1 ) country_id="{{$country->id}}"
                    type="checkbox" class="switch change_status"
                    id="switch5" data-group-cls="btn-group-sm"/>
            </td>


            {{-- form for destroy
            <form action="{{route('dashboard.admins.destroy',$country->id)}}"
                  id="destroy_admin_{{$country->id}}" method="post">
                @csrf
                @method('DELETE')
            </form>
            {{-- end form for destroy --}}

        </tr>

    @endforeach
    </tbody>
</table>

