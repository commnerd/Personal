@extends('admin.layouts.index')

@section('content')
<fieldset class="col-sm-6">
    <legend>Resume</legend>
    <div class="list-group">
        <a href="{{ route('resume.index') }}" class="list-group-item">Edit Resume</a>
        <a href="{{ route('resume.create') }}" class="list-group-item">Add Employment Record</a>
    </div>
</fieldset>
@endsection
