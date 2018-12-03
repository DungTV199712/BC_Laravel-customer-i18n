@extends('home')

@section('content')
    <a href="{{ route('customers.change-language', ['en']) }}">English</a>
    <a href="{{ route('customers.change-language', ['vi']) }}">VietNam</a>
    <h1>{!! __('language.Customer_List') !!}</h1>
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="uper">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br/>
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <td>ID</td>
                <td>{!! __('language.name') !!}</td>
                <td>{!! __('language.number_customer') !!}</td>
                <td>{!! __('language.email') !!}</td>
                <td>{!! __('language.address') !!}</td>
                <td>{!! __('language.phone_number')!!}</td>
                <td colspan="2">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($customers as  $customer)
                <tr>
                    <td>{{$customer->id}}</td>
                    <td>{{$customer->name}}</td>
                    <td>{{$customer->number_customer}}</td>
                    <td>{{$customer->email}}</td>
                    <td>{{$customer->address}}</td>
                    <td>{{$customer->phone_number}}</td>
                    <td><a href="{{ route('customers.edit',$customer->id)}}"
                           class="btn btn-primary">{!! __('language.edit') !!}</a></td>
                    <td><a href="{{ route('customers.destroy', $customer->id) }}" class="text-danger"
                           onclick="return confirm('Bạn chắc chắn muốn xóa?')">{!! __('language.delete') !!}</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{ route('customers.create') }}" class="btn btn-primary">{!! __('language.add') !!}</a>
    </div>
@endsection
