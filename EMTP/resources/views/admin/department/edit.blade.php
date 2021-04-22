
@extends('layouts.admin')


@section('container')

<div class="flex flex-col items-start justify-between pb-6 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row">
    <h1 class="text-2xl font-semibold whitespace-nowrap">
        Edit a Department
    </h1>

    <div class="space-y-8 mb-6">
        <a href="/admin/view/department" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-blue-500 rounded shadow ripple hover:shadow-lg hover:bg-indigo-600 focus:outline-none">
        Back
        </a>
    </div>
</div>



<div class="py-12">
    <div class="max-w-full mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <div class="m-10">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              {{ __('Edit a Department') }}
            </h2>

          </div>
          <div class="m-10">


            <div  class="w-full max-w-lg">
                <form action="/admin/update/department/{{$department->id}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                            Name
                          </label>
                          <input id="name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" name="name" value="{{ $department->name }}"/>
                        </div>
                      </div>

                      <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="description">
                            Description
                          </label>
                          <textarea required id="description" name="description" type="text" class="resize appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48"> {{$department->description}} </textarea>
                        </div>
                      </div>

                      <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <button type="submit" class="block tracking-widest uppercase text-center shadow bg-green-400 hover:bg-green-500 focus:shadow-outline focus:outline-none text-white text-xs py-3 px-10 rounded">Update</button>
                        </div>
                      </div>
                    </div>
                      {{-- <div class="form-group md:flex md:items-center">
                        <div class="md:w-1/3">
                          <label class="col-md-4 control-label" for="submit"></label>
                          <div class="col-md-4">
                            <button id="submit" name="submit" class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline bg-green-400 focus:outline-none text-gray-200 hover:bg-green-600 hover:text-white font-bold py-2 px-4 rounded" >Update</button>
                          </div>
                        </div>
                        <div class="md:w-2/3"></div>
                      </div> --}}
                </form>
            </div>
          </div>
        </div>
    </div>
</div>


@endsection


