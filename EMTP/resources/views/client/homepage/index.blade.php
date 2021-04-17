<x-app-layout title="EMTP - Homepage">
    <div class="bg-cover bg-right-top md:bg-right-top h-auto sm:h-3/4 text-white py-24 px-10" style="background-image: url(/storage/img/home_banner.jpg)">
        <div class="ml-5 md:ml-24 xl:ml-40 2xl:ml-60 bg-opacity-70 bg-gray-300 py-10 px-5 md:mr-40 lg:mr-60">
            <p class="font-bold text-sm uppercase text-black">Services</p>
            <p class="text-3xl md:text-4xl font-bold text-black mb-1">Training Programs</p>
            <p class="text-2xl md:text-3xl mb-10 leading-none text-black">Train for your future</p>
            <a href="{{ route('client-program') }}" class="bg-purple-800 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-gray-800">Learn more</a>
        </div>  
    </div>

    <div class="mx-5 md:mx-9 xl:mx-20">
        <h1 class="text-3xl md:text-4xl font-bold text-center m-5">Training Program Catergories</h1>
        <!--Small Cards list-->
        <div class="grid grid-cols-2 md:grid-cols-4">
            <div class="hover:bg-gray-100 mx-2 my-2 border-gray-400 border text-center rounded-sm">
                <img src="/storage/img/management.jpg" alt="management"/>
                <p class="font-bold text-lg pt-2 pb-5">Management</p>
            </div>
            <div class="hover:bg-gray-200 mx-2 my-2 border-gray-400 border text-center rounded-md">
                <img src="/storage/img/software.jpg" alt="software"/>
                <p class="font-bold text-lg pt-2 pb-5">Software</p>
            </div>
            <div class="hover:bg-gray-200 mx-2 my-2 border-gray-400 border text-center rounded-md">
                <img src="/storage/img/creative.jpg" alt="creative"/>
                <p class="font-bold text-lg pt-2 pb-5">Creative</p>
            </div>
            <div class="hover:bg-gray-200 mx-2 my-2 border-gray-400 border text-center rounded-md">
                <img src="/storage/img/jobs.jpg" alt="jobs"/>
                <p class="font-bold text-lg pt-2 pb-5">Jobs</p>
            </div>
            <div class="hover:bg-gray-200 mx-2 my-2 border-gray-400 border text-center rounded-md">
                <img src="/storage/img/communication.jpg" alt="communication"/>
                <p class="font-bold text-lg pt-2 pb-5">Communication</p>
            </div>
            <div class="hover:bg-gray-200 mx-2 my-2 border-gray-400 border text-center rounded-md">
                <img src="/storage/img/fitness.jpg" alt="fitness"/>
                <p class="font-bold text-lg pt-2 pb-5">Fitness</p>
            </div>
            <div class="hover:bg-gray-200 mx-2 my-2 border-gray-400 border text-center rounded-md">
                <img src="/storage/img/skills.jpg" alt="skills"/>
                <p class="font-bold text-lg pt-2 pb-5">Skills</p>
            </div>
            <div class="hover:bg-gray-200 mx-2 my-2 border-gray-400 border text-center rounded-md">
                <img src="/storage/img/lifestyle.jpg" alt="lifestyle"/>
                <p class="font-bold text-lg pt-2 pb-5">Lifestyle</p>
            </div>
        </div>
    </div>
</x-app-layout>
