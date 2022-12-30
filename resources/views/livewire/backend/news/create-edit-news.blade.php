<div>
    @switch($tahapan)
        @case('create')
            @include('livewire.backend.news.template', [
                'method' => 'save',
                'title'  => 'Menambahkan Berita'
            ])
            @break
        @case('edit')
            @include('livewire.backend.news.template', [
                'method' => 'update',
                'title'  => 'Mengedit Berita'
            ])
            @break
        @default
    @endswitch
</div>
