@extends('admin.layouts.Master')
@section('title') {{ __('messages.currencies') }} @endsection
@section('content')
    @if(auth()->user()->role == 'admin')
        <div class="col-12">
            <div class="card mt-4">
                <div class="card-header">
                    <h4> {{ __('messages.currencies') }} </h4>
                    @if(can('currencies','edit'))
                            <a href=" {{ route('createCurrency') }}" class="btn float-end" style="background-color: #f06115; color: white " >{{__('messages.create') }} {{__('messages.currency') }}</a>
                    @endif
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="myTable">
                        <thead>
                        <tr>
                            <th scope="col">{{ __('messages.name') }}</th>
                            <th scope="col">{{ __('messages.symbol') }} </th>
                            <th scope="col">{{ __('messages.code') }} </th>
                            <th scope="col">{{ __('messages.rate') }}</th>
                            <th scope="col">{{ __('messages.decimals') }}</th>
                            <th scope="col">{{ __('messages.symbol_placement') }}</th>
                            <th scope="col">{{ __('messages.primary_order') }}</th>
                            <th scope="col">{{ __('messages.is_default') }}</th>
                            <th scope="col">{{ __('messages.is_active') }}</th>
                            <th scope="col">{{ __('messages.action') }}</th>
                        </tr>
                        </thead>
                        <tbody id="">
                            @if(isset($currencies) && !empty($currencies))
                                @foreach ($currencies as $currency)
                                    <tr>
                                        <td>{{ $currency->name }}</td>
                                        <td>{{ $currency->symbol }}</td>
                                        <td>{{ $currency->code  }}</td>
                                        <td>{{ $currency->rate }}</td>
                                        <td>{{ $currency->decimals }}</td>
                                        <td>{{ $currency->symbol_placement }}</td>
                                        <td>{{ $currency->primary_order }}</td>
                                        <td>{{ $currency->is_default }}</td>
                                        <td>{{ $currency->is_active }}</td>
                                        <td>
                                            @if(can('currencies','edit'))
                                                <a title="Edit" href="{{ route('editCurrency',$currency->id) }}"><i class="fa-solid fa-pen-to-square read-more-link"></i></a>
                                            @endif
                                            @if(can('currencies','edit'))
                                                <a title="Delete" href="{{ route('deleteCurrency',$currency->id) }}"  class="btn-delete"><i class="fa-sharp fa-solid fa-trash delete-btn"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif    
                        </tbody>
                    </table>
                    {{ $currencies->links() }}
                </div> 
            </div> 
        </div>       
    @else
        <div class="alert alert-danger" role="alert">
            Access Denied
        </div>
    @endif  
@endsection