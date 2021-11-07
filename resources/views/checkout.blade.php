@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Payment') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Hizmet</th>
                                <th scope="col">Fiyat</th>
                                <th scope="col">Vergi Oranı</th>
                                <th scope="col">Hizmet süresi</th>
                                <th scope="col">Kdv Dahil Toplam</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ auth()->user()->company->name }} Member Ship</td>
                                    <td> {{ number_format($service->price,2,',') }} TL</td>
                                    <td>%{{ $service->tax * 100 }}</td>
                                    <td>{{ $service->period }} Yıl</td>
                                    <td>{{ $service->totalPrice }} TL </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-end">
                                    <a type="submit" class="btn btn-success" href="{{route('checkout.payment')}}">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
