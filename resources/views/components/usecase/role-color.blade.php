@switch($data)
    @case('admin')
        <span class="badge badge-primary mr-1">{{ $data }}</span>
        @break
    @case('editor')
        <span class="badge badge-success mr-1">{{ $data}}</span>
        @break
    @case('user')
        <span class="badge badge-danger mr-1">{{ $data }}</span>
        @break
    @default
@endswitch
