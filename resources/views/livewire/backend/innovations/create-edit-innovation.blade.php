<div>
    @switch($tahapan)
        @case('create')
            @include('livewire.backend.innovations.template', [
                'tahapan' => 'create',
                'method'  => 'save',
                'title'   => 'Menambahkan Inovasi'
            ])
            @break
        @case('edit')
            @include('livewire.backend.innovations.template', [
                'tahapan' => 'edit',
                'method'  => 'update',
                'title'   => 'Mengedit Inovasi'
            ])
            @break
    @endswitch
</div>
