<x-app-layout title="Staff Specific Program - Feedback">
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
        <div class="block w-full">
            <div class="mb-5">
                <h2 class="text-3xl font-bold text-gray-800 py-4 px-4 border-b border-gray-100 w-auto">
                    {{ __('Feedback') }}
                </h2>
            </div>
            <div class="p-6">
                <div class="mb-8">
                    <p class="text-3xl">My Feedback</p>
                </div>
                <div class="flex mt-6">
                    <form method="post" action="client/dashboard/{{$registeredprograms->id}}/feedback/{{$feedback->id}}/edit" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="mb-8">
                            <label class="text-xl text-gray-600">Your feedback <span class="text-red-500">*</span></label><br/>
                            <textarea required rows="5" cols="80" id="feedback" name="feedback" class="border-2 border-gray-500"></textarea>
                        </div>

                        <script>
                            function myFunction() {
                              document.getElementById("feedback").value = "{{$feedback->feedback}}";
                            }

                            window.onload = myFunction();
                        </script>

                        @if(!($feedback->image_path == ""))
                            <div class="mb-8">
                                <p class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                    You have uploaded an image for the feedback. Uploading again will replace the current one.
                                </p>

                                <img width="300" height="300" src = "{{ asset('storage/feedback_images/'.$feedback->image_path)}}" alt="yourimage">
                            </div>
                        @endif

                        <div class="mb-8">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="image">
                                Upload an image
                            </label>
                            <input type="file" id="image" name="image">
                        </div>

                        <input type="hidden" id="programid" name="programid" value={{$program->id}}>
                        <input type="hidden" id="clientprogramid" name="clientprogramid" value={{$registeredprogram->id}}>

                        <div class="p-1 justify-end">
                            <button role="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400" required>Edit</button>
                        </div>
                    </form>
                </div>
            </div>

            <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
            <script>
                CKEDITOR.replace('content');
            </script>
        </div>
    </div>
</x-app-layout>
