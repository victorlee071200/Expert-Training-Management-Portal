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
        <div class="block w-full">
            <div class="mb-5">
                <h2 class="text-3xl font-bold text-gray-800 py-4 px-4 border-b border-gray-100 w-auto">
                    {{ __('Feedback') }}
                </h2>
            </div>
            <div class="p-6">
                <form method="POST" action="action.php">
                    <div class="mb-4">
                        <label class="text-xl text-gray-600">Title <span class="text-red-500">*</span></label><br/>
                        <input type="text" class="border-2 border-gray-300 p-2 w-full" name="title" id="title" value="" required/>
                    </div>
                    <div class="mb-4">
                        <label class="text-xl text-gray-600">Description</label><br/>
                        <input type="text" class="border-2 border-gray-300 p-2 w-full" name="description" id="description" placeholder="(Optional)"/>
                    </div>
                    <div class="mb-8">
                        <label class="text-xl text-gray-600">Content <span class="text-red-500">*</span></label><br/>
                        <textarea name="content" class="border-2 border-gray-500" placeholder="your feedback"></textarea>
                    </div>
                    <div class="p-1 justify-end">
                        <select class="border-2 border-gray-300 border-r p-2 w-1/2 md:w-1/3" name="action">
                            <option>Save and Publish</option>
                            <option>Save Draft</option>
                        </select>
                        <button role="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400" required>Submit</button>
                    </div>
                </form>
            </div>
            <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
            <script>
                CKEDITOR.replace('content');
            </script>
        </div>
    </div>
</x-app-layout>