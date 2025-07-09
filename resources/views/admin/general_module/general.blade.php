@extends('admin.layouts.Master')
@section('title')
    {{ __('messages.create') }}
@endsection

@section('content')
  <div class="col-12">
    <div class="card mt-4">
        <div class="card-header">
            <h4>{{ __('messages.general_module') }}</h4>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('general-module.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="commissions" class="form-label">{{ __('messages.commission') }}</label>
                        <input type="number" step="0.01" name="commissions" id="commissions"  value="{{ old('commissions', $module->commissions ?? '') }}" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="tax" class="form-label">{{ __('messages.tax_per') }}</label>
                        <input type="number" step="0.01" name="tax" id="tax" value="{{ old('tax', $module->tax ?? '') }}" class="form-control" required>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
