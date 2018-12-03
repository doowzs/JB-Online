@extends('frontend.layouts.app')

@section('title', app_name() . ' | '.__('labels.frontend.passwords.reset_password_box_title'))
@section('appClass', 'app-center')

@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col col-sm-8 align-self-center">
            <div class="card">
                <div class="card-header py-3">
                    <strong>
                        <i class="fas fa-recycle mr-2"></i>
                        {{ __('labels.frontend.passwords.reset_password_box_title') }}
                    </strong>
                </div><!--card-header-->

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ html()->form('POST', route('frontend.auth.password.email.post'))->open() }}
                        <div class="row mb-3">
                            <div class="col">
                                <div class="input-group input-group-seamless">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                                    </div>
                                    {{ html()->email('email')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.email'))
                                        ->attribute('maxlength', 191)
                                        ->required()
                                        ->autofocus() }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group mb-0 clearfix text-right">
                                    {{ form_submit(__('labels.frontend.passwords.send_password_reset_link_button')) }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->
                    {{ html()->form()->close() }}
                </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- col-6 -->
    </div><!-- row -->
@endsection
