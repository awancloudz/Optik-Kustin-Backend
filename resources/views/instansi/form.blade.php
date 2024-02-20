@if (isset($instansi))
{!! Form::hidden('id', $instansi->id) !!}
@endif

{{-- Nama --}}
@if($errors->any())
<div class="form-group {{ $errors->has('nama_instansi') ? 'has-error' : 'has-success' }}"></div>
@else
<div class="form-group">
@endif
	{!! Form::label('nama_instansi','Nama Instansi',['class' => 'control-label']) !!}
	{!! Form::text('nama_instansi', null,['class' => 'form-control']) !!}
	@if ($errors->has('nama_instansi'))
	<span class="help-block">{{ $errors->first('nama_instansi') }}</span>
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

{{-- Harga --}}
@if($errors->any())
<div class="form-group {{ $errors->has('harga') ? 'has-error' : 'has-success' }}"></div>
@else
<div class="form-group">
@endif
  {!! Form::label('harga','Harga',['class' => 'control-label']) !!}
  {!! Form::text('harga', null,['class' => 'form-control']) !!}
  @if ($errors->has('harga'))
  <span class="help-block">{{ $errors->first('harga') }}</span>
  @endif
</div>

{{-- Keterangan --}}
<div class="form-group">
  {!! Form::label('keterangan','Keterangan',['class' => 'control-label']) !!}
  {!! Form::text('keterangan', null,['class' => 'form-control']) !!}
</div>

{{-- Submit button --}}
<div class="form-group">
	{!! Form::submit($submitButtonText,['class' => 'btn btn-primary form-control']) !!}
</div>