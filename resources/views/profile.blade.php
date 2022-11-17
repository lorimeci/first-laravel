@extends('layouts.main')

@section('content')
    <form action="{{route('profile.store')}}" method="POST">
        @csrf
        <div>
            <div>
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Personal Information
                    </h3>
                </div>
                <div class="space-y-6 sm:mt-5">
                    <x-inputs.group label="First Name" for="first_name">
                       {{--  :value="$data['first_name']" --}}
                        <x-inputs.text for="first_name" />
                    </x-inputs.group>
                    <x-inputs.group label="Last Name" for="last_name">
                        <x-inputs.text for="last_name" />
                    </x-inputs.group>
                    <x-inputs.group label="Email address" for="email">
                        <x-inputs.text for="email" type="email" />
                    </x-inputs.group>
                    <x-inputs.group label="Street address" for="street_address">
                        <x-inputs.text for="street_address[]"/>
                    </x-inputs.group>
                    <x-inputs.group label="City" for="city">
                        <x-inputs.text for="city" />
                    </x-inputs.group>
                    <x-inputs.group label="State" for="state">
                        <x-inputs.text for="state"/>
                    </x-inputs.group>
   {{--                  <x-inputs.group label="Zip" for="zip">
                        <x-inputs.text for="zip"/>
                    </x-inputs.group> --}}
                </div>
            </div>
        </div>
        <div class="mt-8 border-t border-gray-200 pt-5">
            <div class="flex justify-end">
                <span class="ml-3 inline-flex rounded-md shadow-sm">
                    <button type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                      Save
                    </button>
                 </span>
            </div>
        </div>
    </form>
@endsection
