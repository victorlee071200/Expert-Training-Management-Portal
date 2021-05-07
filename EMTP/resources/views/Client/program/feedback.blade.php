<x-app-layout title="Staff Specific Program - Feedback">
    <div class="bg-white sm:rounded-lg flex">
        <!-- side nav -->
        <div class="bg-gray-300 text-gray-800 hidden md:flex h-auto">
            <ul>
                <li>
                    <a href="{{ route('client-program-detail', [$registeredprogram, $program]) }}" class="hover:bg-white hover:text-indigo-600 px-7 md:px-16 lg:px-20 h-16 flex justify-center items-center w-auto">Details</a>
                </li>
                <li>
                    <a href="{{ route('client-program-announcement', [$registeredprogram, $program]) }}" class="hover:bg-white hover:text-indigo-600 px-7 md:px-16 lg:px-20 h-16 flex justify-center items-center w-auto">Announcement</a>
                </li>
                <li>
                    <a href="{{ route('client-program-material', [$registeredprogram, $program]) }}" class="hover:bg-white hover:text-indigo-600 px-7 md:px-16 lg:px-20 h-16 flex justify-center items-center w-auto">Materials</a>
                </li>
                <li>
                    <a href="{{ route('client-program-feedback', [$registeredprogram, $program]) }}" class="hover:bg-white hover:text-indigo-600 px-7 md:px-16 lg:px-20 bg-white text-indigo-600 h-16 flex justify-center items-center w-auto">Feedback</a>
                </li>
            </ul>
        </div>
        <div class="block w-full min-h-screen">
            <div class="mb-5">
                <h2 class="text-3xl font-bold text-gray-800 py-4 px-4 border-b border-gray-100 w-auto">
                    {{ __('Feedback') }}
                </h2>
            </div>
            <div class="p-6">
                @if ($registeredprogram->status == "completed")

                    @if($feedback)
                        <div class="mb-8">
                            <p class="text-3xl">My Feedback</p>
                        </div>

                        <div class="flex mt-6">
                            <div class="flex-shrink-0 mr-3">
                              <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src = "{{ asset('storage/profile_pictures/'.$feedback[0]->profile_thumbnail)}}" alt="">
                            </div>
                            <div class="flex-1 border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                              <strong>{{$feedback[0]->client_name}}</strong> <span class="text-xs text-gray-400">{{$feedback[0]->created_at}}</span>
                              <p class="text-sm">
                                {{$feedback[0]->feedback}}
                              </p>
      
                              @if (!($feedback[0]->image_path == ""))
                                <img width="300" height="300" src = "{{ asset('storage/feedback_images/'.$feedback[0]->image_path)}}" alt="">
                              @endif
                              
                            <div class="p-1 justify-end">
                                <a href="{{ route('client-edit-feedback', [$registeredprogram->id , $program->id, $feedback[0]->id]) }}">
                                <button role="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400" required>Edit</button>
                                </a>
                            </div>

                            </div>
                          </div>

                    @else
                        <form method="POST" action="/feedback/create" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-8">
                                <label class="text-xl text-gray-600">Your feedback <span class="text-red-500">*</span></label><br/>
                                <textarea required rows="5" cols="80" id="feedback" name="feedback" class="border-2 border-gray-500"></textarea>
                            </div>

                            <div class="mb-8">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="image">
                                    Upload an image
                                </label>
                                <input type="file" id="image" name="image">
                            </div>

                            <input type="hidden" id="programid" name="programid" value={{$program->id}}>
                            <input type="hidden" id="clientprogramid" name="clientprogramid" value={{$registeredprogram->id}}>

                            <div class="p-1 justify-end">
                                <button role="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400" required>Submit</button>
                            </div>
                        </form>
                    @endif

                @endif

                {{-- Feedbacks --}}
                <div class="mb-8 mt-10">

                    <p class="text-3xl">Feedback from others</p>

                    @if (!($feedbacks->isEmpty()))

                    @foreach($feedbacks as $feedback)

                    <div class="flex mt-6">
                      <div class="flex-shrink-0 mr-3">
                        <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src = "{{ asset('storage/profile_pictures/'.$feedback->profile_thumbnail)}}" alt="">
                      </div>
                      <div class="flex-1 border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                        <strong>{{$feedback->client_name}}</strong> <span class="text-xs text-gray-400">{{$feedback->created_at}}</span>
                        <p class="text-sm">
                          {{$feedback->feedback}}
                        </p>

                        @if (!($feedback->image_path == ""))
                          <img width="300" height="300" src = "{{ asset('storage/feedback_images/'.$feedback->image_path)}}" alt="">
                        @endif

                      </div>
                    </div>

                    @endforeach

                    @endif
                    
                </div>
              
            </div>

            <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
            <script>
                CKEDITOR.replace('content');
            </script>
        </div>
    </div>
</x-app-layout>