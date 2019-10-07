@extends('layouts.admin', ['app_title' => 'Подписки на рассылку'])

@section('content')

    <div class="d-flex align-items-center mb-5">
        <h1 class="mb-0 h2">Подписки на рассылку</h1>
    </div>
    <table class="table table-striped">
        <thead>
        <tr class="small">
            <th>#</th>
            <th>Почта</th>
        </tr>
        </thead>

        @forelse($subscribes as $subscribe)
            <tr>
                <td width="20">{{ $subscribe->id }}</td>
                <td width="20"> {{ $subscribe->email }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">
                    Подписок пока нет
                </td>
            </tr>
    </table>
    @endforelse
    {{ $subscribes->appends(request()->except('page'))->links() }}
@endsection