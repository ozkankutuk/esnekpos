@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">

                        <div class="row">

                            <div class="d-flex flex-column col-12">
                                <ul class="nav nav-tabs d-flex w-100 justify-content-between" id="myTab" role="tablist">
                                    <li class="nav-item w-50" role="presentation">
                                        <a class="nav-link active" id="bireysel-tab" data-toggle="tab"
                                           href="#bireysel_content" role="tab" aria-controls="bireysel_content"
                                           aria-selected="true">Bireysel</a>
                                    </li>
                                    <li class="nav-item w-50" role="presentation">
                                        <a class="nav-link" id="kurumsal-tab" data-toggle="tab" href="#kurumsal_content"
                                           role="tab" aria-controls="kurumsal_content"
                                           aria-selected="false">Kurumsal</a>
                                    </li>
                                </ul>
                                <div class="tab-content py-4 px-1">
                                    <div class="tab-pane fade show active" id="bireysel_content" role="tabpanel"
                                         aria-labelledby="bireysel-tab">

                                        <x-register-form>
                                            <x-register.bireysel>

                                                <div class="form-group row">
                                                    <label for="name"
                                                           class="col-md-4 col-form-label text-md-right">{{ __('Company') }}</label>

                                                    <div class="col-md-6">
                                                        <select class="form-control @error('company') is-invalid @enderror" name="company" id="company">
                                                            @foreach($companies as $company)
                                                                <option
                                                                    value="{{$company->id}}"> {{$company->name}} </option>
                                                            @endforeach
                                                        </select>

                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </x-register.bireysel>
                                        </x-register-form>

                                    </div>
                                    <div class="tab-pane fade" id="kurumsal_content" role="tabpanel"
                                         aria-labelledby="kurumsal-tab">

                                        <x-register-form>
                                            <x-register.kurumsal></x-register.kurumsal>
                                        </x-register-form>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
