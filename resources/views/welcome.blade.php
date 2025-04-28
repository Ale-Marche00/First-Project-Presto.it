<x-layouts.layout>


    <header class="container-fluid custom-header">
        
        <div class="row h-100">

            

            <div class="col-12 header_text_container" data-aos="flip-left">

            <div class="distance"> </div>

                <!-- Contenuto sopra l'immagine -->
                <div class="text-custom mt-3">
                    <p class="fs-3 text m-0">{{__('ui.slogan_1')}}</p>
                    <p class="fs-3 text my-1">{{__('ui.slogan_2')}},</p>
                    <p class="fs-1 text fw-bold m-0">{{ config('app.name') }}!</p>
                    
                        @auth
                            <a href="{{ route('create.article') }}" class="btn btn-custom-other mt-2">
                                {{__('ui.create_announce')}}
                            </a>
                        {{-- @else
                            <a href="{{ route('login') }}" class="btn btn-custom-other mt-2">
                                {{__('ui.login')}}
                            </a> --}}
                        @endauth
                    
                </div>

            </div>


        </div>
    </header>

<div class="container-fluid d-flex flex-column align-items-center justify-content-center text-center mt-5">
    <x-success/>
</div>


    <div class="container mt-5">
        <x-carousel :articles="$articles"/>
    </div>



    {{-- <div class="container align-content-center my-5">
        <div class="row">

           



            <div class="col-12 col-md-6 img-revisore">
                
                
               
              
            </div>
        
            <div class="col-12 col-md-6 mt-3 d-flex flex-column align-items-center justify-content-center"> 
                
                    <h5>{{__('ui.want_become_revisor')}}</h5>
                    <p>{{__('ui.button_below')}}</p>
                    @auth
                        <form action="{{ route('revisore.richiesta') }}" method="POST" class="w-100 text-center">
                        @csrf
                            <button type="submit" class="btn btn-custom-other">{{__('ui.become_revisor')}}</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-custom-other">{{__('ui.become_revisor')}}</a>
                    @endauth
                  
            </div>
        </div>
    </div> --}}





</x-layouts.layout>






