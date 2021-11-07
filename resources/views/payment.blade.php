@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 pb-3">
                <div class="card">
                    <div class="card-header"> Cart Details </div>

                    <div class="card-body p-5">

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

                    </div>

                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Payment') }}</div>

                    <div class="card-body p-5">


                        <form role="form">
                            <div class="form-group">
                                <label for="username">Full name (on the card)</label>
                                <input type="text" class="form-control" name="username" placeholder="" required="">
                            </div> <!-- form-group.// -->

                            <div class="form-group">
                                <label for="cardNumber">Card number</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="cardNumber" placeholder="">
                                    <div class="input-group-append">
				<span class="input-group-text text-muted">
					<i class="fab fa-cc-visa"></i> &nbsp; <i class="fab fa-cc-amex"></i> &nbsp;
					<i class="fab fa-cc-mastercard"></i>
				</span>
                                    </div>
                                </div>
                            </div> <!-- form-group.// -->

                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label><span class="hidden-xs">Expiration</span> </label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" placeholder="MM" name="">
                                            <input type="number" class="form-control" placeholder="YY" name="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label data-toggle="tooltip" title=""
                                               data-original-title="3 digits code on back side of the card">CVV <i
                                                class="fa fa-question-circle"></i></label>
                                        <input type="number" class="form-control" required="">
                                    </div> <!-- form-group.// -->
                                </div>
                            </div> <!-- row.// -->
                            <button class="subscribe btn btn-primary btn-block" type="button"> Confirm</button>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
