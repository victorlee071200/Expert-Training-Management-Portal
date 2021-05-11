<x-app-layout title="Support">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Support') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              <div class="m-10">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                  {{ __('Create a Support Ticket') }}
                </h2>

              </div>
              <div class="m-10">

                <form method="post" action="{{ route('client.support.store') }}" class="w-full max-w-lg" enctype="multipart/form-data">
                  @csrf

                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="subject">
                        Subject
                      </label>
                      <input id="subject" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" name="subject" :value="old('subject')" required autofocus autocomplete="subject" />
                    </div>
                  </div>



                  @if(!$userBoughtCourse)
                    <div class="course-price">
                        <p>{{$currency}}{{App\Helpers\CurrencyHelper::getSetPriceFormat($course->price)}}</p>
                    </div>
                    <div class="course-buy-btn">
                        <a href="{{route('checkout', $course->slug)}}" class="btn btn-warning" onclick="showLoadSpinner();"><span class="spinner-border spinner-border-sm" id="spinnerOnBtn" role="status" aria-hidden="true" style="display:none;"></span> Buy Now <i class="fas fa-cart-plus"></i></a>
                    </div>
                @else
                    <div>
                        <p style="color:green;font-size:20px;"><strong>You have access to this course!</strong></p>
                    </div>
                @endif



                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="priority">
                        Priority
                        </label>
                        <div class="relative">
                        <select id="priority" name="priority" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="Low">Low</option>
                            <option value="Medium">Medium</option>
                            <option value="High">High</option>
                        </select>

                        </div>
                    </div>
                  </div>

                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="description">
                        Description
                      </label>
                      <textarea required id="description" name="description" type="text" class="resize appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48" required autofocus autocomplete="description"></textarea>
                    </div>
                  </div>

                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="thumbnail">
                        Thumbnail
                      </label>
                      <input type="file" id="thumbnail" name="thumbnail">

                    </div>
                  </div>

                  <div class="form-group md:flex md:items-center">
                    <div class="md:w-1/3">
                      <label class="col-md-4 control-label" for="submit"></label>
                      <div class="col-md-4">
                        <button id="submit" name="submit" class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline bg-indigo-400 focus:outline-none text-gray-200 hover:bg-indigo-600 hover:text-white font-bold py-2 px-4 rounded" >Submit</button>
                      </div>
                    </div>
                    <div class="md:w-2/3"></div>
                  </div>

                </form>
              </div>
            </div>
        </div>
    </div>
</x-app-layout>
