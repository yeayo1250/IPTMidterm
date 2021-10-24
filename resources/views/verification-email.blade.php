<h1>Ipt Midterm</h1>

<p>
     Good day! {{$user->name}}! This is christian kiehl a bsit 4 student of MDC 
</p>

<p>
    You recieved this email as a result of your registration to our prelim 
    site.Please click on the verification link to verify your account thank you !!!.
</p>

<p>
    <a href="{{url('/verification/' .$user->id . "/" . $user->remember_token)}}">
        Click here to verify
    </a>
</p>