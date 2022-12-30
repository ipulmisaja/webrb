@section('title', 'User')

<div class="main-content">
    <section class="section" style="z-index:0">
        <div class="section-header">
            <p class="h3">Daftar User</p>
        </div>
        <div class="section-body">
            @include('components.notification.flash')

            <div class="card border rounded">
                <div class="card-header">
                    <h4>
                        <a href="{{ url(env('APP_URL') . 'setting/user/create') }}" class="btn btn-icon icon-left btn-primary text-white">
                            <i class="fa fa-plus"></i>
                            <span class="ml-1">Tambah User Baru</span>
                        </a>
                    </h4>
                </div>
                <div class="card-body">
                    @if ($users->count() > 0)
                        {{-- Table Content --}}
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <tr>
                                    <th>Nama User</th>
                                    <th>Hak Akses</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>

                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            @foreach ($user->roles as $role)
                                                @include('components.usecase.role-color', [
                                                    'data' => $role->name
                                                ])
                                                @endforeach
                                        </td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <button
                                                wire:click="edit('{{ $user->slug }}')"
                                                class="btn btn-icon btn-primary"
                                                data-toggle="tooltip"
                                                data-placement="bottom"
                                                title=""
                                                data-original-title="Edit Pegawai">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>

                        {{-- Pagination --}}
                        {{ $users->paginate(10)->links('vendor.pagination.webrb') }}
                    @else
                        @include('components.notification.not-found', [
                            'data_height' => 400,
                            'description' => "Maaf, kami tidak dapat menemukan data apapun, " .
                                            "untuk menghilangkan pesan ini, tambah setidaknya 1 user."
                        ])
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>
