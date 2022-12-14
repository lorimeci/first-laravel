@extends('layouts.app')
{{-- @section('content') --}}

<div class="m-auto w-4/8 py-24">
    <div class="text-center">
        <h1 class="text-5xl uppercase bold"> 
            Update Car 
        </h1>
       
    </div>
    <div class="flex justify-center pt-20">
       <form action="/cars/{{ $car->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="block">
            @if (isset(Auth::user()->id))
            <input 
            type="file"
            class="block shadow-5xl mb-10 p-2 w-80 italic
            placeholder-gray-400"
            name = "image" 
            value = "{{ asset('images/' . $car->image_path)}}">
            
            <input 
            type="text"
            class="block shadow-5xl mb-10 p-2 w-80 italic
            placeholder-gray-400"
            name = "name"
            value = "{{$car->name}}">

            <input 
            type="text"
            class="block shadow-5xl mb-10 p-2 w-80 italic
            placeholder-gray-400"
            name="founded"
            value = "{{$car->founded}}">

            <input 
            type = "text"
            class = "block shadow-5xl mb-10 p-2 w-80 italic
            placeholder-gray-400"
            name = "description"
            value = "{{$car->description}}">

            <button type ="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
                Submit
            </button>
            @endif
        </div>   
       </form>
    </div>
    @if ($errors->any()){
        <div class="w-4/8 m-auto text-center">
            @foreach ($errors->all() as $error)
                <li class=" text-red-500 list-none"> 
                    {{$error}}
                </li>
            @endforeach
        </div>
       }
       @endif

</div>

{{-- @endif --}}

{{-- @endsection --}}