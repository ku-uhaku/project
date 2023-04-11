@extends('layout.layout')

@section('title', 'Admin Dashboard - Manage Users')

@section('content')
<div class="row">
    @include('admin.menuDashboard')
    <div class="col-10">
       <div class="m-2 border p-2">
        <div class="container mh-100 ">
            <div class="row d-flex d-flex justify-content-between  align-items-center mb-4">
                <div class="col-5">
                    <h1 class="mt-3 ">Manage Users</h1>
                </div>
            </div>

            <div class="form">
                <form action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data">
                    <form>
                        @csrf
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        <div class="row mb-4">
                          <div class="col">
                            <div class="form-outline">
                              <input type="text" id="nom" class="form-control" name="nom" value="{{ old('Lname') }}"/>
                              @error('nom')
                                  <div class="text-danger text-sm">{{ $message }}</div>
                              @enderror
                              <label class="form-label" for="nom">nom</label>
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-outline">
                              <input type="text" id="prenom" class="form-control" name="prenom" value="{{ old('Fname') }}"/>
                              @error('prenom')
                                  <div class=" text-danger text-sm">{{ $message }}</div>
                              @enderror
                              <label class="form-label" for="form3Example2">prenom</label>
                            </div>
                          </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col">
                              <div class="form-outline">
                                <input type="date" id="age" class="form-control" name="age" value="{{ old('age') }}"/>
                                @error('age')
                                    <div class="text-danger text-sm">{{ $message }}</div>
                                @enderror
                                <label class="form-label" for="age">date naissance</label>
                              </div>
                            </div>
                            <div class="col">
                               <!-- image input -->
                                <div class="form-outline">
                                    <input type="file" id="image" class="form-control" name="image" value="{{ old('image') }}"/>
                                    <label class="form-label" for="image">image</label>
                                    @error('image')
                                        <div class="text-danger text-sm">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                          </div>


                      
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                          <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}"/>
                          @error('email')
                              <div class="text-danger text-sm">{{ $message }}</div> 
                          @enderror
                          <label class="form-label" for="email">Email address</label>
                          
                        </div>
                        <!-- tele input -->
                        <div class="form-outline mb-4">
                            <input type="tel" id="tele" class="form-control" name="tele" value="{{ old('tele') }}"/>
                            @error('tele')
                                <div class="text-danger text-sm">{{ $message }}</div> 
                            @enderror
                            <label class="form-label" for="tele">telephone</label>
                            
                          </div>
                      
                        <div class="form-outline mb-4">
                            <select class="form-select " aria-label="Default select example" name="role"  value="{{ old('role') }}">
                                <option selected disabled>-------</option>
                                <option value="student">Eleve</option>
                                <option value="admin">Admin</option>
                                <option value="instructor">Instructor</option>
                              </select>
                              @error('role')
                              <div class="text-danger text-sm">{{ $message }}</div>
                                  
                              @enderror
                              <label class="form-label" >Type de utilisateur</label>

                        </div>

                       
                        
                      
                     
                      
                        <!-- Submit button -->
                        <div class="d-flex  justify-content-start gap-3 align-items-center mb-4">
                            <button type="submit" class="btn btn-primary btn-block mb-4">Register</button>
                            <a class="btn btn-primary mb-4 "href="{{ route('admin.users.index') }}">return</a>
                        </div>
                        <!-- Register buttons -->
                        
                      </form>
                </form>
            </div>
            
         
                    
            
            
        </div>
       

       </div>
    </div>
      
<div>

    
@endsection