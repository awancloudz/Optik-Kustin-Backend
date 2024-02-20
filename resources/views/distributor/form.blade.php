@if (isset($distributor))
{!! Form::hidden('id', $distributor->id) !!}
@endif

{{-- Nama --}}
@if($errors->any())
<div class="form-group {{ $errors->has('nama_distributor') ? 'has-error' : 'has-success' }}"></div>
@else
<div class="form-group">
@endif
	{!! Form::label('nama_distributor','Nama',['class' => 'control-label']) !!}
	{!! Form::text('nama_distributor', null,['class' => 'form-control']) !!}
	@if ($errors->has('nama_distributor'))
	<span class="help-block">{{ $errors->first('nama_distributor') }}</span>
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

{{-- Submit button --}}
<div class="form-group">
	{!! Form::submit($submitButtonText,['class' => 'btn btn-primary form-control']) !!}
</div>