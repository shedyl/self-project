<div class="container mt-5" style="position: relative">
    <form action="{{route('fileUpload')}}" method="post" enctype="multipart/form-data">
        @csrf
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="custom-file">
            <input type="file" name="file" class="custom-file-input" id="chooseFile">
            <label class="custom-file-label" for="chooseFile">Select file</label>
        </div>

        <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
            Upload Files
        </button>
    </form>
</div>
<div class="audio">
    <p style="font-weight: bold;"> Your compositions</p>
</div>
<div class="audio">
    @foreach($records as $record)
        <div>
            {{ $record->name }}
        </div>
        <audio controls="controls">
            <source src="{{ asset($record->file_path) }}" type="audio/mpeg">
        </audio>
    @endforeach
</div>