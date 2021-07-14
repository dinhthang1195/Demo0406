@extends('layouts.create')

@section('form')

    @include('components.flash-message')

    <form action="{{route('process-method.store')}}" method="POST">
        @csrf
        <div class="form-group-row mb-3">
            @include('components.input-text', [
                'name' => 'process_code',
                'label' => 'Mã code',
                'inputClass' => 'form-control d-inline w-75'
            ])
        </div>
        <div class="form-group-row mb-3">
            @include('components.input-text', [
                'name' => 'process_name',
                'label' => 'Hình thức xử lý',
                'inputClass' => 'form-control d-inline w-75'
            ])
        </div>
        <div class="form-group-row mb-5">
            @include('components.select', [
                'name' => 'process_assigner',
                'label' => 'Chủ trì',
                 'options' => $jobs,
                 'checked' => 0,
            ])
        </div>
        @include('components.buttons', [
            'buttons' => [
                ['iconClass' => 'fas fa-save', 'value' => 'Lưu' ],
                ['iconClass' => 'fas fa-trash', 'value' => 'Xóa' ],
            ]
        ])
    </form>
@endsection

@section('table')
    @include('components.table', [
        'fields' => [
            'code' => 'code',
            'name_process' => 'name',
            'edit' => 'pattern.modified'
           ],
        'items' => $process_methods,
        'edit_route' => 'process-method.edit'
    ])

    {{$process_methods->links()}}

@endsection,
