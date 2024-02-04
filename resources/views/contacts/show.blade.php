@extends("layouts.master")

@section("contenu")

<!-- Page content-->
       <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                    <article>
                    
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h3 class="fw-bolder mb-4">{{ $contact->name }}</h3>
                            <h3 class="fw-bolder mb-4">{{ $contact->email }}</h3>
                            <h3 class="fw-bolder mb-4">{{ $contact->subject }}</h3>
                          
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">Posté : {{ $contact->created_at->format('d M Y') }}</div>
                            
                        </header>
                        
                        <!-- Post content-->
                        <section class="fs-5 mb-4">{{ $contact->message }}
                           
                        </section>
                    </article>
                 </div>
            </div>
        </div> 
         <div class="pull-right">
             <a class="btn btn-primary btn-sm" href="{{ route('contactboard.index') }}">Gestion des contacts</a>
       </div><article>
                    
                        
@endsection