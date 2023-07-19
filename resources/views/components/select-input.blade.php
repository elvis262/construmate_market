@props(['disabled' => false])

<select {{ $disabled ? 'disabled' : '' }}  {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm '.$class]) !!} id="{{$id}}" name="{{$name}}" @required($required) autocomplete="{{$autocomplete}}">
    @for ($i = 0; $i < count($passed_options);$i++)
        @if ($default == $passed_options[$i]->id)            
            <option value="{{$passed_options[$i]->id}}" selected>{{ucfirst($passed_options[$i]->nom)}}</option>
            @else
            <option value="{{$passed_options[$i]->id}}">{{ucfirst($passed_options[$i]->nom)}}</option>
        @endif
    @endfor
</select>