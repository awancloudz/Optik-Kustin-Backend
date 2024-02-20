@if (isset($profile))
{!! Form::hidden('id', $profile->id) !!}
@endif

{{-- Nama --}}
@if($errors->any())
<div class="form-group {{ $errors->has('nama') ? 'has-error' : 'has-success' }}"></div>
@else
<div class="form-group">
@endif
	{!! Form::label('nama','Nama',['class' => 'control-label']) !!}
	{!! Form::text('nama', null,['class' => 'form-control']) !!}
	@if ($errors->has('nama'))
	<span class="help-block">{{ $errors->first('nama') }}</span>
	@endif
</div>

{{-- Alamat --}}
@if($errors->any())
<div class="form-group {{ $errors->has('alamat') ? 'has-error' : 'has-success' }}"></div>
@else
<div class="form-group">
@endif
	{!! Form::label('alamat','Alamat',['class' => 'control-label']) !!}
	{!! Form::text('alamat', null,['class' => 'form-control']) !!}
	@if ($errors->has('alamat'))
	<span class="help-block">{{ $errors->first('alamat') }}</span>
	@endif
</div>

{{-- Kota --}}
@if($errors->any())
<div class="form-group {{ $errors->has('kota') ? 'has-error' : 'has-success' }}"></div>
@else
<div class="form-group">
@endif
  {!! Form::label('kota','Kab / Kota',['class' => 'control-label']) !!}
  {!! Form::text('kota', null,['class' => 'form-control']) !!}
  @if ($errors->has('kota'))
  <span class="help-block">{{ $errors->first('kota') }}</span>
  @endif
</div>

{{-- NoTelp --}}
@if($errors->any())
<div class="form-group {{ $errors->has('notelp') ? 'has-error' : 'has-success' }}"></div>
@else
<div class="form-group">
@endif
	{!! Form::label('notelp','No.Telp',['class' => 'control-label']) !!}
	{!! Form::text('notelp', null,['class' => 'form-control']) !!}
	@if ($errors->has('notelp'))
	<span class="help-block">{{ $errors->first('notelp') }}</span>
	@endif
</div>

{{-- Promosi --}}
@if($errors->any())
<div class="form-group {{ $errors->has('promosi') ? 'has-error' : 'has-success' }}"></div>
@else
<div class="form-group">
@endif
  {!! Form::label('promosi','Promosi',['class' => 'control-label']) !!}
  {!! Form::textarea('promosi', null,['class' => 'form-control']) !!}
  @if ($errors->has('promosi'))
  <span class="help-block">{{ $errors->first('promosi') }}</span>
  @endif
</div>

{{-- Submit button --}}
<div class="form-group">
	{!! Form::submit($submitButtonText,['class' => 'btn btn-primary form-control']) !!}
</div>