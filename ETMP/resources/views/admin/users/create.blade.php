@extends('layouts.admin')


@section('container')

<div class="flex flex-col items-start justify-between pb-6 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row">
    <h1 class="text-2xl font-semibold whitespace-nowrap">
        Create New Staff
    </h1>

    <div class="space-y-8 mb-6">
        <a href="{{ route('admin.users.index') }}" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-blue-500 rounded shadow ripple hover:shadow-lg hover:bg-indigo-600 focus:outline-none">
        Back
        </a>
    </div>
</div>



<div class="py-12">
    <div class="max-w-full mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <div class="m-10">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              {{ __('Create New Staff') }}
            </h2>

          </div>
          <div class="m-10">

            <form method="POST" action="{{ route('admin.users.store') }}" class="w-full max-w-lg" enctype="multipart/form-data">
              @csrf

              <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                    Name
                  </label>
                  <x-jet-input id="name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>
              </div>

              <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                    Work Mail
                  </label>
                  <x-jet-input id="email" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="email" name="email" required autofocus autocomplete="email" />
                </div>
              </div>



              <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="type">
                    Password
                  </label>
                  <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="Your Password" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                </div>
             </div>

             <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="type">
                    Confirm Password
                  </label>
                  <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Your Password" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                </div>
             </div>


              <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="option">
                    Department
                    </label>
                    <div class="relative">
                    <select id="department" name="department" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        @foreach ($departments as $department)
                            <option name="department">{{ $department->name }}</option>
                        @endforeach
                    </select>

                    </div>
                </div>
              </div>

              <div class="form-group md:flex md:items-center">
                <div class="md:w-1/3">
                  <label class="col-md-4 control-label" for="submit"></label>
                  <div class="col-md-4">
                    <button id="submit" name="submit" class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline bg-indigo-400 focus:outline-none text-gray-200 hover:bg-indigo-600 hover:text-white font-bold py-2 px-4 rounded" >Create</button>
                  </div>
                </div>
              </div>

            </form>
          </div>
    </div>
</div>

@endsection


