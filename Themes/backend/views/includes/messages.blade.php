@if($errors->any())
    <div class="bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md mb-6 mx-auto" role="alert">
        <div class="flex">
            <div class="py-1">
                <svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm1.41-1.41A8 8 0 1 0 15.66 4.34 8 8 0 0 0 4.34 15.66zm9.9-8.49L11.41 10l2.83 2.83-1.41 1.41L10 11.41l-2.83 2.83-1.41-1.41L8.59 10 5.76 7.17l1.41-1.41L10 8.59l2.83-2.83 1.41 1.41z" />
                </svg>
            </div>
            <div>
                <p class="font-bold">Erreur !</p>
                <p class="text-sm flex space-x-2">
                    @foreach($errors->all() as $error)
                        <span>{!! $error !!}</span>
                    @endforeach
                </p>
            </div>
        </div>
    </div>
@elseif(session()->get('success'))
    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md mb-6 mx-auto" role="alert">
        <div class="flex">
            <div class="py-1">
                <svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <polygon points="0 11 2 9 7 14 18 3 20 5 7 18" />
                </svg>
            </div>
            <div>
                <p class="font-bold">Succès !</p>
                <p class="text-sm">{!! session()->get('success') !!}</p>
            </div>
        </div>
    </div>
@elseif(session()->get('danger'))
    <div class="bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md mb-6 mx-auto" role="alert">
        <div class="flex">
            <div class="py-1">
                <svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm1.41-1.41A8 8 0 1 0 15.66 4.34 8 8 0 0 0 4.34 15.66zm9.9-8.49L11.41 10l2.83 2.83-1.41 1.41L10 11.41l-2.83 2.83-1.41-1.41L8.59 10 5.76 7.17l1.41-1.41L10 8.59l2.83-2.83 1.41 1.41z" />
                </svg>
            </div>
            <div>
                <p class="font-bold">Erreur !</p>
                <p class="text-sm">{!! session()->get('danger') !!}</p>
            </div>
        </div>
    </div>
@endif
