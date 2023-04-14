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
                    <h1 class="mt-3 ">Manage Exame </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <h4 class="mt-3 ">Exam for {{ $user->name }} </h4>
                </div>

                <form action="{{ route('admin.exams.store') }}" method="post" enctype="multipart/form-data">
                    <form>
                        @csrf

                        <div class="form-outline d-none">
                          <input type="text" id="id" class="form-control " name="id" value="{{ $user->id }}"/>
                          @error('id')
                              <div class="text-danger text-sm">{{ $message }}</div>
                          @enderror
                          <label class="form-label" for="id">id</label>
                        </div>
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        <div class="row mb-4">
                          <div class="col">
                            <div class="form-outline">
                              <input type="text" id="title" class="form-control" name="title"  />
                              @error('title')
                                  <div class="text-danger text-sm">{{ $message }}</div>
                              @enderror
                              <label class="form-label" for="title">Title</label>
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-outline">
                                <select class="form-select " aria-label="Default select example"  name="type">
                                    <option selected disabled>-------</option>
                                    <option value="code">Code</option>
                                    <option value="drive">Drive</option>
                                  </select>
                                  @error('role')
                                    <div class="text-danger text-sm">{{ $message }}</div>
                                  @enderror
                                  <label class="form-label" >Type of Exam</label>
                                  
                                 
                            </div>
                          </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col">
                              <div class="form-outline">
                                <input type="date" id="exam_date" class="form-control"  name="exam_date"/>
                                @error('exam_date')
                                    <div class="text-danger text-sm">{{ $message }}</div>
                                @enderror
                                <label class="form-label" for="exam_date">Exam date</label>
                              </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                    <select class="form-select " aria-label="Default select example"  name="exam_time">
                                        <option selected disabled>-------</option>
                                        <option value="{{ date('Y-m-d H:i:s') }}">morning</option>
                                        <option value="{{ date('Y-m-d H:i:s') }}">afternoon</option>
                                      </select>
                                      @error('exam_time')
                                        <div class="text-danger text-sm">{{ $message }}</div>
                                      @enderror
                                      <label class="form-label"  for="exam_time">Exam time</label>
                                </div>
                              </div>
                          </div>

                        </div>
                      
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                          <input type="text" id="location" class="form-control" name="location" value="{{ old('location') }}" />
                          @error('location')
                              <div class="text-danger text-sm">{{ $message }}</div> 
                          @enderror
                          <label class="form-label" for="location">Location</label>
                          
                        </div>
                        <!-- tele input -->
                        <div class="form-outline mb-4">
                            <input type="text" id="result" class="form-control" name="result" result/>
                            @error('result')
                                <div class="text-danger text-sm">{{ $message }}</div> 
                            @enderror
                            <label class="form-label" for="result">Result</label>
                            
                          </div>
                      
                          <div class="row mb-4">
                            <div class="col">
                              <div class="form-outline">
                                <select class="form-select " aria-label="Default select example"  name="instructor">
                                    <option selected disabled>-------</option>
                                    @foreach ($instructors as $instructor)
                                        <option value="{{ $instructor->id }}">{{ $instructor->name }}</option>
                                    @endforeach
                                  </select>
                                @error('instructor')
                                    <div class="text-danger text-sm">{{ $message }}</div>
                                @enderror
                                <label class="form-label" for="instructor"> Instructor</label>
                              </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                    <select class="form-select " aria-label="Default select example"  name="vehicle">
                                        <option selected disabled>-------</option>
                                        @foreach ($cars as $car)
                                            <option value="{{ $car->id }}">{{ $car->model }}</option>
                                        @endforeach
                                      </select>
                                      @error('vehicle')
                                        <div class="text-danger text-sm">{{ $message }}</div>
                                      @enderror
                                      <label class="form-label" for="vehicle" >vehicle</label>
                                </div>
                              </div>
                          </div>

                          <div class="d-flex  justify-content-start gap-3 align-items-center mb-4">
                            <button type="submit" class="btn btn-primary btn-block mb-4">Register</button>
                            <a class="btn btn-primary mb-4" href="{{ route('admin.payments.show', $user) }}">Show Payment</a>
                        </div>

                        </div>
                        <!-- this the new-->
                      

                  

                       

                        <!-- Submit button -->
                       
                        <!-- Register buttons -->

                        
                        
                      </form>
                </form>
            </div>

           
                    
        </div>
       
       </div>
    </div>  
<div>

    
@endsection