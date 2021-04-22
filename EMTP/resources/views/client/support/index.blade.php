<x-app-layout title="Support">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Support') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h2 class="text-gray-700 text-6xl font-semibold">Help and Support</h2>
                <h3>Please fill in the form below if you have any questions or anything that you are unsure of and we
                    will notify you through your email in 2-3 working days.</h3>
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-gray-200">
                                <form method="POST" action="action.php">
                                    <div class="mb-4">
                                        <label class="text-xl text-gray-600">Subject <span
                                                class="text-red-500">*</span></label><br />
                                        <input type="text" class="border-2 border-gray-300 p-2 w-full" name="title"
                                            id="title" value="" required />
                                    </div>
                                    <div class="mb-4">
                                        <label class="text-xl text-gray-600">Description</label><br />
                                        <input type="text" class="border-2 border-gray-300 p-2 w-full"
                                            name="description" id="description" placeholder="(Optional)" />
                                    </div>
                                    <div class="mb-8">
                                        <label class="text-xl text-gray-600">Content <span
                                                class="text-red-500">*</span></label><br />
                                        <textarea name="content" class="border-2 border-gray-500"
                                            placeholder="descriptions your problems"></textarea>
                                    </div>
                                    <div class="flex p-1">
                                        <select class="border-2 border-gray-300 border-r p-2" name="action">
                                            <option>Save</option>
                                        </select>
                                        <button role="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400"
                                            required>Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
                <script>
                    CKEDITOR.replace('content');

                </script>
            </div>
        </div>
    </div>
</x-app-layout>