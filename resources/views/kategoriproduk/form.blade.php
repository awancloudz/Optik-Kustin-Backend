@if (isset($kategoriproduk))
{!! Form::hidden('id', $kategoriproduk->id) !!}
@endif

{{-- Nama --}}
@if($errors->any())
<div class="form-group {{ $errors->has('nama') ? 'has-error' : 'has-success' }}"></div>
@else
<div class="form-group">
@endif
	{!! Form::label('nama','Nama Kategori',['class' => 'control-label']) !!}
	{!! Form::text('nama', null,['class' => 'form-control']) !!}
	@if ($errors->has('nama'))
	<span class="help-block">{{ $errors->first('nama') }}</span>
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