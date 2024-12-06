<table class="table mb-0">
    <thead>
    <tr class="border-bottom-active border-custom-color">
        <th>#</th>
        <th>{{__('dashboard.name_governorate')}}</th>
        <th>{{__('dashboard.name_country')}}</th>
        <th>{{__('dashboard.num_of_city')}}</th>
        <th>{{__('dashboard.num_of_user')}}</th>
        <th>{{__('dashboard.status')}}</th>
        <th>{{__('dashboard.manage_status')}}</th>
        <th>{{__('dashboard.shipping_price')}}</th>
        <th>{{__('dashboard.change_price')}}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($governorates as $key=>$governorate)
        <tr class="border-bottom-success border-custom-color">
            <td>{{$key +1 }}</td>
            <td>
                <a href="" class="text-muted" >
                    {{$governorate->name}}
                </a>
            </td>
            <td>
                {{$governorate->country->name .' '}}<i class="flag-icon flag-icon-{{$governorate->country->flag_code}}"></i>

            </td>
            <td class="text-center">
                <div class="badge badge-pill badge-border border-warning warning ">{{$governorate->cities->count() }}</div>
            </td>
            <td class="text-center">
                <div
                    class="badge badge-pill badge-border border-warning warning ">0</div>
            </td>
            <td>
                <div id="status_{{$governorate->id}}" class="badge badge-pill badge-border @if($governorate->is_active == 1) border-success success
                                                            @else border-danger danger  @endif">{{$governorate->is_active == 1 ? __('dashboard.active')  : __('dashboard.inactive') }}</div>
            </td>
            <td class="text-center">
                <input
                    @checked($governorate->is_active ==  1 ) governorate_id="{{$governorate->id}}"
                    type="checkbox" class="switch change_status"
                    id="switch5" data-group-cls="btn-group-sm"/>
            </td>
            <td class="text-center" id="price_{{$governorate->id}}">
                {{$governorate->shippingPrice->price}}
            </td>
            <td class="text-center">
                <button  data-toggle="modal" data-target="#iconModal_{{$governorate->id}}"
                         class="btn btn-sm btn-primary">{{__('dashboard.change_price')}}</button>

            </td>
            {{--start modal--}}
            @include('dashboard.world.includes.charge')
            {{--end modal--}}
        </tr>

    @endforeach
    </tbody>
</table>
