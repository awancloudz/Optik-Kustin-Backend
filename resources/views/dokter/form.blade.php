@if (isset($dokter))
{!! Form::hidden('id', $dokter->id) !!}
@endif

{{-- Nama --}}
@if($errors->any())
<div class="form-group {{ $errors->has('nama_dokter') ? 'has-error' : 'has-success' }}"></div>
@else
<div class="form-group">
@endif
	{!! Form::label('nama_dokter','Nama',['class' => 'control-label']) !!}
	{!! Form::text('nama_dokter', null,['class' => 'form-control']) !!}
	@if ($errors->has('nama_dokter'))
	<span class="help-block">{{ $errors->first('nama_dokter') }}</span>
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

{{-- Keterangan --}}
<div class="form-group">
  {!! Form::label('keterangan','Keterangan',['class' => 'control-label']) !!}
  {!! Form::text('keterangan', null,['class' => 'form-control']) !!}
</div>

{{-- Resep --}}
@if($errors->any())
<div class="form-group {{ $errors->has('resep') ? 'has-error' : 'has-success' }}"></div>
@else
<div class="form-group">
@endif
  {!! Form::label('resep','Resep',['class' => 'control-label']) !!}
  {!! Form::text('resep', null,['class' => 'form-control']) !!}
  @if ($errors->has('resep'))
  <span class="help-block">{{ $errors->first('resep') }}</span>
  @endif
</div>

{{-- Submit button --}}
<div class="form-group">
	{!! Form::submit($submitButtonText,['class' => 'btn btn-primary form-control']) !!}
</div>