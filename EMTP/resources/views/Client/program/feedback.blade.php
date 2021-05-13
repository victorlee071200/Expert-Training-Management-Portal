@extends('layouts.app')

@section('content')

<div class="bg-white sm:rounded-lg flex">
    <!-- side nav -->
    <div class="bg-gray-300 text-gray-800 hidden md:flex h-auto">
        <ul>
            <li>
                <a href="{{ route('client.program-detail', $registeredprograms->id) }}" class="hover:bg-white hover:text-indigo-600 px-7 md:px-16 lg:px-20 h-16 flex justify-center items-center w-auto">Details</a>
            </li>
            <li>
                <a href="{{ route('client.program-announcement', $registeredprograms->id) }}" class="hover:bg-white hover:text-indigo-600 px-7 md:px-16 lg:px-20 h-16 flex justify-center items-center w-auto">Announcement</a>
            </li>
            <li>
                <a href="{{ route('client.program-material', $registeredprograms->id) }}" class="hover:bg-white hover:text-indigo-600 px-7 md:px-16 lg:px-20 h-16 flex justify-center items-center w-auto">Materials</a>
            </li>
            <li>
                <a href="{{ route('client.program-feedback', $registeredprograms->id) }}" class="hover:bg-white hover:text-indigo-600 px-7 md:px-16 lg:px-20 bg-white text-indigo-600 h-16 flex justify-center items-center w-auto">Feedback</a>
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
            <p class="text-3xl">My Feedback</p>

            @if ($registeredprograms->status == "approved")
            <p class="text-m mt-3">
                You can only give a feedback after you have completed a program. The feedback form is only available after the staff has marked your program as completed.
            </p>

            @elseif ($registeredprograms->status == "completed")
                @if($clientfeedback)
                    <div class="mb-8">
                    </div>

                    <div class="flex mt-6">

                        <div class="flex-shrink-0 mr-3">
                            <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src = "{{ asset('storage/profile_pictures/'.$clientfeedback->profile_thumbnail)}}" alt="">
                        </div>
                        <div class="flex-1 border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                            <strong>{{$clientfeedback->client_name}}</strong> <span class="text-xs text-gray-400">{{$clientfeedback->created_at}}</span>

                            <form id="feedbackForm" action="/client/feedbacks/{{$clientfeedback->id}}/edit" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
        
                                <div class="mb-8">
                                    <label class="text-xl text-gray-600">Your feedback <span class="text-red-500">*</span></label><br/>
                                    <textarea id="feedback" required rows="5" cols="80" id="feedback" name="feedback" class="border-2 border-gray-500"></textarea>
                                </div>
           
                                @if(!($clientfeedback->image_path == ""))
                                    <div class="mb-8">
                                        <p class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                            You have uploaded an image for the feedback. Uploading again will replace the current one.
                                        </p>
        
                                        <img width="300" height="300" src = "{{ asset('storage/feedback_images/'.$clientfeedback->image_path)}}" alt="yourimage">
                                    </div>
                                @endif
        
                                <div class="mb-8">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="image">
                                        Upload an image
                                    </label>
                                    <input type="file" id="image" name="image">
                                </div>

                                <input type="hidden" id="clientprogramid" name="clientprogramid" value={{$clientfeedback->program_id}}>
            
                                <div class="p-1 justify-end">
                                    <button role="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400" required>Edit</button>
                                </div>

                            </form>

                            <p id="feedbackText" class="text-sm">
                                {{$clientfeedback->feedback}}
                            </p>

                            <img id="feedbackImage" src = "" alt="">

                            <div class="p-1 justify-end">
                                <button id="editButton1" onclick="editFeedback()" role="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400" required>Edit</button>
                            </div>

                        </div>
                    </div>

                    <script>
                        function editFeedback() {
                          var feedbackText = document.getElementById("feedbackText");
                          var feedbackImage = document.getElementById("feedbackImage");
                          var feedbackForm = document.getElementById("feedbackForm");
                          var editButton1 = document.getElementById("editButton1");
                            
                          feedbackText.style.display = "none";
                          feedbackImage.style.display = "none";
                          editButton1.style.display = "none";

                            
                          feedbackForm.style.display = "inline";

                        }

                        function myFunction() {
                              document.getElementById("feedback").value = "{{$clientfeedback->feedback}}";
                              document.getElementById("feedbackForm").style.display = "none";

                              if ("{{$clientfeedback->image_path}}"){
                              feedbackImage.src = "{{ asset('storage/feedback_images/'.$clientfeedback->image_path)}}";
                              feedbackImage.height = 300;
                              feedbackImage.width = 300;
                        
                          }
                        }

                            window.onload = myFunction();
                    </script>

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

                        <input type="hidden" id="programid" name="programid" value={{$program_details->id}}>
                        <input type="hidden" id="clientprogramid" name="clientprogramid" value={{$registeredprograms->id}}>

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
                                <p class="text-sm">{{$feedback->feedback}}</p>
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

@endsection
