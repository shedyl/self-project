@include('layouts.header')
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">
    @include('layouts.navigation')
    <div>
        <p class="title-s bg">Upload your file</p>
        @include('file-upload')
{{--        <img src="{{ $image }}" alt="222">--}}
    </div>
</div>
</body>
