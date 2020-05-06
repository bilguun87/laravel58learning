Starting Sub-View
@if(isset($var))
Printing var: {{$var}}
@endif
Ending Sub-view

@push('hello')
<li>This is pushed text 1</li>
@endpush
@push('hello')
<li>This is pushed text 2</li>
@endpush
@prepend('hello')
<li>This is PREPENDED text</li>
@endprepend