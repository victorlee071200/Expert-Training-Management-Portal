<h1 class="text-1xl font-semibold">{{$mail_data['program_code']}} {{$mail_data['program_name']}}</h1>
<div class="mx-20 my-10 text-xl">
    <p><img width="300" height="300" src = "{{ asset('storage/profile_pictures/'.$mail_data['profile_path'])}}" alt="client_profile">{{$mail_data['name']}}</p>
    <p>{{$mail_data['content']}}</p>
    <img width="300" height="300" src = "{{ asset('storage/feedback_images/'.$mail_data['image_path'])}}" alt="image">
</div>
<div class="text-xl">
    <p>EMTP Team</p>
</div>