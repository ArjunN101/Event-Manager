@extends('layouts.user_layouts.master')
<!--DESCRIPTION META TAG HERE-->
@section('description')

@endsection
<!--DESCRIPTION META TAG END HERE-->

@section('title', 'Profile')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <section class="pt-5 pb-5 bg-gradient-primary text-white pl-4 pr-4 inner-profile mb-4">
           <div class="row gutter-2 gutter-md-4 align-items-end">
              <div class="col-md-6 text-center text-md-left">
                 <h1 class="mb-1">{{ auth::user()->first_name }} {{ auth::user()->last_name }}</h1>
                 {{-- <span class="text-muted text-gray-500"><i class="fas fa-map-marker-alt fa-fw fa-sm mr-1"></i> India, Punjab</span> --}}
              </div>
              <div class="col-md-6 text-center text-md-right">
                 <a href="#" data-toggle="modal" data-target="#logoutModal" class="btn btn btn-light">Sign out</a>
              </div>
           </div>
        </section>
        <div class="row">
           <div class="col-xl-3 col-lg-3">
              <div class="bg-white p-3 widget shadow rounded mb-4">
                 <div class="nav nav-pills flex-column lavalamp" id="sidebar-1" role="tablist">
                    <a class="nav-link {{ request()->is('profile') ? 'active' : '' }}" href="{{ route('user.profile') }}" role="tab" ><i class="fas fa-user-circle fa-sm fa-fw mr-2 text-gray-400"></i> Profile</a>
                    {{-- <a class="nav-link" data-toggle="tab" href="#sidebar-1-2" role="tab" aria-controls="sidebar-1-2" aria-selected="false"><i class="fas fa-heart fa-sm fa-fw mr-2 text-gray-400"></i> Watchlist</a>
                    <a class="nav-link" data-toggle="tab" href="#sidebar-1-3" role="tab" aria-controls="sidebar-1-3" aria-selected="false"><i class="fas fa-list-alt fa-sm fa-fw mr-2 text-gray-400"></i> Your Lists</a> --}}
                    <a class="nav-link {{ request()->is('profile/password') ? 'active' : '' }}" href="{{ route('user.password') }}" role="tab"><i class="fas fa-cog fa-sm fa-fw mr-2 text-gray-400"></i> Account Settings</a>
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout</a>
                 </div>
              </div>
           </div>
           <div class="col-xl-9 col-lg-9">
              <div class="bg-white p-3 widget shadow rounded mb-4">
                 <div class="tab-content" id="myTabContent">
                    <!-- profile -->
                    <div class="tab-pane fade {{ request()->is('profile') ? 'show active' : '' }}" id="sidebar-1-1" role="tabpanel" aria-labelledby="sidebar-1-1">
                       <!-- Page Heading -->
                       <div class="d-sm-flex align-items-center justify-content-between mb-3">
                          <h1 class="h5 mb-0 text-gray-900">Profile</h1>
                       </div>
                       <form method="post" action="{{ route('profile.save') }}">
                           @csrf
                       <div class="row gutter-1">
                          <div class="col-md-6">
                             <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') ?? auth::user()->first_name }}" required>

                                @error('first_name')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                             </div>
                          </div>
                          <div class="col-md-6">
                             <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') ?? auth::user()->last_name }}" required>

                                @error('last_name')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                             </div>
                          </div>
                          <div class="col-md-6">
                             <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input id="phone" type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') ?? auth::user()->phone }}" placeholder="Your phone number">

                                @error('phone')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                             </div>
                          </div>
                          <div class="col-md-6">
                             <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') ?? auth::user()->email }}" required>

                                @error('email')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                             </div>
                          </div>
                       </div>
                       <div class="row">
                          <div class="col">
                             <button type="submit" class="btn btn-primary">Save Changes</button>
                          </div>
                       </div>
                    </form>
                    </div>
                    <!-- orders -->
                    <div class="tab-pane fade" id="sidebar-1-2" role="tabpanel" aria-labelledby="sidebar-1-2">
                       <!-- Page Heading -->
                       <div class="d-sm-flex align-items-center justify-content-between mb-3">
                          <h1 class="h5 mb-0 text-gray-900">Watchlist</h1>
                          <a href="movies.html" class="d-none d-sm-inline-block text-xs">Showing 97 of 97 items</a>
                       </div>
                       <!-- Content Row -->
                       <div class="row">
                          <div class="col-xl-3 col-md-6 mb-4">
                             <div class="card m-card shadow border-0">
                                <a href="movies-detail.html">
                                   <div class="m-card-cover">
                                      <div class="position-absolute bg-white shadow-sm rounded text-center p-2 m-2 love-box">
                                         <h6 class="text-gray-900 mb-0 font-weight-bold"><i class="fas fa-heart text-danger"></i> 88%</h6>
                                         <small class="text-muted">23,421</small>
                                      </div>
                                      <img src="img/m1.jpg" class="card-img-top" alt="...">
                                   </div>
                                   <div class="card-body p-3">
                                      <h5 class="card-title text-gray-900 mb-1">Jumanji: The Next Level</h5>
                                      <p class="card-text"><small class="text-muted">English</small> <small class="text-danger"><i class="fas fa-calendar-alt fa-sm text-gray-400"></i> 22 AUG</small> </p>
                                   </div>
                                   <div class="card-body pl-2 pr-2 pb-2 pt-0">
                                      <button class="btn btn-danger btn-block btn-sm"><i class="fas fa-trash"></i> Remove</button>
                                   </div>
                                </a>
                             </div>
                          </div>
                          <div class="col-xl-3 col-md-6 mb-4">
                             <div class="card m-card shadow border-0">
                                <a href="movies-detail.html">
                                   <div class="m-card-cover">
                                      <div class="position-absolute bg-white shadow-sm rounded text-center p-2 m-2 love-box">
                                         <h6 class="text-gray-900 mb-0 font-weight-bold"><i class="fas fa-heart text-danger"></i> 50%</h6>
                                         <small class="text-muted">8,784</small>
                                      </div>
                                      <img src="img/m2.jpg" class="card-img-top" alt="...">
                                   </div>
                                   <div class="card-body p-3">
                                      <h5 class="card-title text-gray-900 mb-1">Gemini Man</h5>
                                      <p class="card-text"><small class="text-muted">English</small> <small class="text-danger"><i class="fas fa-calendar-alt fa-sm text-gray-400"></i> 22 AUG</small> </p>
                                   </div>
                                   <div class="card-body pl-2 pr-2 pb-2 pt-0">
                                      <button class="btn btn-danger btn-block btn-sm"><i class="fas fa-trash"></i> Remove</button>
                                   </div>
                                </a>
                             </div>
                          </div>
                          <div class="col-xl-3 col-md-6 mb-4">
                             <div class="card m-card shadow border-0">
                                <a href="movies-detail.html">
                                   <div class="m-card-cover">
                                      <div class="position-absolute bg-white shadow-sm rounded text-center p-2 m-2 love-box">
                                         <h6 class="text-gray-900 mb-0 font-weight-bold"><i class="fas fa-heart text-danger"></i> 20%</h6>
                                         <small class="text-muted">69,123</small>
                                      </div>
                                      <img src="img/m3.jpg" class="card-img-top" alt="...">
                                   </div>
                                   <div class="card-body p-3">
                                      <h5 class="card-title text-gray-900 mb-1">The Current War</h5>
                                      <p class="card-text"><small class="text-muted">English</small> <small class="text-danger"><i class="fas fa-calendar-alt fa-sm text-gray-400"></i> 22 AUG</small> </p>
                                   </div>
                                   <div class="card-body pl-2 pr-2 pb-2 pt-0">
                                      <button class="btn btn-danger btn-block btn-sm"><i class="fas fa-trash"></i> Remove</button>
                                   </div>
                                </a>
                             </div>
                          </div>
                          <div class="col-xl-3 col-md-6 mb-4">
                             <div class="card m-card shadow border-0">
                                <a href="movies-detail.html">
                                   <div class="m-card-cover">
                                      <div class="position-absolute bg-white shadow-sm rounded text-center p-2 m-2 love-box">
                                         <h6 class="text-gray-900 mb-0 font-weight-bold"><i class="fas fa-heart text-danger"></i> 74%</h6>
                                         <small class="text-muted">88,865</small>
                                      </div>
                                      <img src="img/m4.jpg" class="card-img-top" alt="...">
                                   </div>
                                   <div class="card-body p-3">
                                      <h5 class="card-title text-gray-900 mb-1">Charlie's Angels</h5>
                                      <p class="card-text"><small class="text-muted">English</small> <small class="text-danger"><i class="fas fa-calendar-alt fa-sm text-gray-400"></i> 22 AUG</small> </p>
                                   </div>
                                   <div class="card-body pl-2 pr-2 pb-2 pt-0">
                                      <button class="btn btn-danger btn-block btn-sm"><i class="fas fa-trash"></i> Remove</button>
                                   </div>
                                </a>
                             </div>
                          </div>
                          <div class="col-xl-3 col-md-6 mb-4">
                             <div class="card m-card shadow border-0">
                                <a href="movies-detail.html">
                                   <div class="m-card-cover">
                                      <div class="position-absolute bg-white shadow-sm rounded text-center p-2 m-2 love-box">
                                         <h6 class="text-gray-900 mb-0 font-weight-bold"><i class="fas fa-heart text-danger"></i> 50%</h6>
                                         <small class="text-muted">8,784</small>
                                      </div>
                                      <img src="img/m2.jpg" class="card-img-top" alt="...">
                                   </div>
                                   <div class="card-body p-3">
                                      <h5 class="card-title text-gray-900 mb-1">Gemini Man</h5>
                                      <p class="card-text"><small class="text-muted">English</small> <small class="text-danger"><i class="fas fa-calendar-alt fa-sm text-gray-400"></i> 22 AUG</small> </p>
                                   </div>
                                   <div class="card-body pl-2 pr-2 pb-2 pt-0">
                                      <button class="btn btn-danger btn-block btn-sm"><i class="fas fa-trash"></i> Remove</button>
                                   </div>
                                </a>
                             </div>
                          </div>
                          <div class="col-xl-3 col-md-6 mb-4">
                             <div class="card m-card shadow border-0">
                                <a href="movies-detail.html">
                                   <div class="m-card-cover">
                                      <div class="position-absolute bg-white shadow-sm rounded text-center p-2 m-2 love-box">
                                         <h6 class="text-gray-900 mb-0 font-weight-bold"><i class="fas fa-heart text-danger"></i> 20%</h6>
                                         <small class="text-muted">69,123</small>
                                      </div>
                                      <img src="img/m3.jpg" class="card-img-top" alt="...">
                                   </div>
                                   <div class="card-body p-3">
                                      <h5 class="card-title text-gray-900 mb-1">The Current War</h5>
                                      <p class="card-text"><small class="text-muted">English</small> <small class="text-danger"><i class="fas fa-calendar-alt fa-sm text-gray-400"></i> 22 AUG</small> </p>
                                   </div>
                                   <div class="card-body pl-2 pr-2 pb-2 pt-0">
                                      <button class="btn btn-danger btn-block btn-sm"><i class="fas fa-trash"></i> Remove</button>
                                   </div>
                                </a>
                             </div>
                          </div>
                          <div class="col-xl-3 col-md-6 mb-4">
                             <div class="card m-card shadow border-0">
                                <a href="movies-detail.html">
                                   <div class="m-card-cover">
                                      <div class="position-absolute bg-white shadow-sm rounded text-center p-2 m-2 love-box">
                                         <h6 class="text-gray-900 mb-0 font-weight-bold"><i class="fas fa-heart text-danger"></i> 74%</h6>
                                         <small class="text-muted">88,865</small>
                                      </div>
                                      <img src="img/m4.jpg" class="card-img-top" alt="...">
                                   </div>
                                   <div class="card-body p-3">
                                      <h5 class="card-title text-gray-900 mb-1">Charlie's Angels</h5>
                                      <p class="card-text"><small class="text-muted">English</small> <small class="text-danger"><i class="fas fa-calendar-alt fa-sm text-gray-400"></i> 22 AUG</small> </p>
                                   </div>
                                   <div class="card-body pl-2 pr-2 pb-2 pt-0">
                                      <button class="btn btn-danger btn-block btn-sm"><i class="fas fa-trash"></i> Remove</button>
                                   </div>
                                </a>
                             </div>
                          </div>
                          <div class="col-xl-3 col-md-6 mb-4">
                             <div class="card m-card shadow border-0">
                                <a href="movies-detail.html">
                                   <div class="m-card-cover">
                                      <div class="position-absolute bg-white shadow-sm rounded text-center p-2 m-2 love-box">
                                         <h6 class="text-gray-900 mb-0 font-weight-bold"><i class="fas fa-heart text-danger"></i> 88%</h6>
                                         <small class="text-muted">23,421</small>
                                      </div>
                                      <img src="img/m1.jpg" class="card-img-top" alt="...">
                                   </div>
                                   <div class="card-body p-3">
                                      <h5 class="card-title text-gray-900 mb-1">Jumanji: The Next Level</h5>
                                      <p class="card-text"><small class="text-muted">English</small> <small class="text-danger"><i class="fas fa-calendar-alt fa-sm text-gray-400"></i> 22 AUG</small> </p>
                                   </div>
                                   <div class="card-body pl-2 pr-2 pb-2 pt-0">
                                      <button class="btn btn-danger btn-block btn-sm"><i class="fas fa-trash"></i> Remove</button>
                                   </div>
                                </a>
                             </div>
                          </div>
                       </div>
                       <nav aria-label="Page navigation example">
                          <ul class="pagination justify-content-center mb-0 pb-0">
                             <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                             </li>
                             <li class="page-item"><a class="page-link" href="#">1</a></li>
                             <li class="page-item"><a class="page-link" href="#">2</a></li>
                             <li class="page-item"><a class="page-link" href="#">3</a></li>
                             <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                             </li>
                          </ul>
                       </nav>
                    </div>
                    <!-- addresses -->
                    <div class="tab-pane fade" id="sidebar-1-3" role="tabpanel" aria-labelledby="sidebar-1-3">
                       <!-- Page Heading -->
                       <div class="d-sm-flex align-items-center justify-content-between mb-3">
                          <h1 class="h5 mb-0 text-gray-900">Your Lists</h1>
                          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary text-xs">New List</a>
                       </div>
                       <!-- Content Row -->
                       <div class="row">
                          <div class="col-xl-3 col-md-6 mb-4">
                             <div class="card m-card shadow border-0">
                                <a href="movies-detail.html">
                                   <div class="m-card-cover">
                                      <div class="position-absolute bg-white shadow-sm rounded text-center p-2 m-2 love-box">
                                         <h6 class="text-gray-900 mb-0 font-weight-bold"><i class="fas fa-heart text-danger"></i> 88%</h6>
                                         <small class="text-muted">23,421</small>
                                      </div>
                                      <img src="img/m1.jpg" class="card-img-top" alt="...">
                                   </div>
                                   <div class="card-body p-3">
                                      <h5 class="card-title text-gray-900 mb-1">Jumanji: The Next Level</h5>
                                      <p class="card-text"><small class="text-muted">English</small> <small class="text-danger"><i class="fas fa-calendar-alt fa-sm text-gray-400"></i> 22 AUG</small> </p>
                                   </div>
                                   <div class="card-body pl-2 pr-2 pb-2 pt-0">
                                      <div class="row">
                                         <div class="col pr-1">
                                            <button class="btn btn-danger btn-block btn-sm"><i class="fas fa-trash"></i></button>
                                         </div>
                                         <div class="col pl-1">
                                            <button class="btn btn-info btn-block btn-sm"><i class="fas fa-edit"></i></button>
                                         </div>
                                      </div>
                                   </div>
                                </a>
                             </div>
                          </div>
                          <div class="col-xl-3 col-md-6 mb-4">
                             <div class="card m-card shadow border-0">
                                <a href="movies-detail.html">
                                   <div class="m-card-cover">
                                      <div class="position-absolute bg-white shadow-sm rounded text-center p-2 m-2 love-box">
                                         <h6 class="text-gray-900 mb-0 font-weight-bold"><i class="fas fa-heart text-danger"></i> 50%</h6>
                                         <small class="text-muted">8,784</small>
                                      </div>
                                      <img src="img/m2.jpg" class="card-img-top" alt="...">
                                   </div>
                                   <div class="card-body p-3">
                                      <h5 class="card-title text-gray-900 mb-1">Gemini Man</h5>
                                      <p class="card-text"><small class="text-muted">English</small> <small class="text-danger"><i class="fas fa-calendar-alt fa-sm text-gray-400"></i> 22 AUG</small> </p>
                                   </div>
                                   <div class="card-body pl-2 pr-2 pb-2 pt-0">
                                      <div class="row">
                                         <div class="col pr-1">
                                            <button class="btn btn-danger btn-block btn-sm"><i class="fas fa-trash"></i></button>
                                         </div>
                                         <div class="col pl-1">
                                            <button class="btn btn-info btn-block btn-sm"><i class="fas fa-edit"></i></button>
                                         </div>
                                      </div>
                                   </div>
                                </a>
                             </div>
                          </div>
                          <div class="col-xl-3 col-md-6 mb-4">
                             <div class="card m-card shadow border-0">
                                <a href="movies-detail.html">
                                   <div class="m-card-cover">
                                      <div class="position-absolute bg-white shadow-sm rounded text-center p-2 m-2 love-box">
                                         <h6 class="text-gray-900 mb-0 font-weight-bold"><i class="fas fa-heart text-danger"></i> 20%</h6>
                                         <small class="text-muted">69,123</small>
                                      </div>
                                      <img src="img/m3.jpg" class="card-img-top" alt="...">
                                   </div>
                                   <div class="card-body p-3">
                                      <h5 class="card-title text-gray-900 mb-1">The Current War</h5>
                                      <p class="card-text"><small class="text-muted">English</small> <small class="text-danger"><i class="fas fa-calendar-alt fa-sm text-gray-400"></i> 22 AUG</small> </p>
                                   </div>
                                   <div class="card-body pl-2 pr-2 pb-2 pt-0">
                                      <div class="row">
                                         <div class="col pr-1">
                                            <button class="btn btn-danger btn-block btn-sm"><i class="fas fa-trash"></i></button>
                                         </div>
                                         <div class="col pl-1">
                                            <button class="btn btn-info btn-block btn-sm"><i class="fas fa-edit"></i></button>
                                         </div>
                                      </div>
                                   </div>
                                </a>
                             </div>
                          </div>
                          <div class="col-xl-3 col-md-6 mb-4">
                             <div class="card m-card shadow border-0">
                                <a href="movies-detail.html">
                                   <div class="m-card-cover">
                                      <div class="position-absolute bg-white shadow-sm rounded text-center p-2 m-2 love-box">
                                         <h6 class="text-gray-900 mb-0 font-weight-bold"><i class="fas fa-heart text-danger"></i> 74%</h6>
                                         <small class="text-muted">88,865</small>
                                      </div>
                                      <img src="img/m4.jpg" class="card-img-top" alt="...">
                                   </div>
                                   <div class="card-body p-3">
                                      <h5 class="card-title text-gray-900 mb-1">Charlie's Angels</h5>
                                      <p class="card-text"><small class="text-muted">English</small> <small class="text-danger"><i class="fas fa-calendar-alt fa-sm text-gray-400"></i> 22 AUG</small> </p>
                                   </div>
                                   <div class="card-body pl-2 pr-2 pb-2 pt-0">
                                      <div class="row">
                                         <div class="col pr-1">
                                            <button class="btn btn-danger btn-block btn-sm"><i class="fas fa-trash"></i></button>
                                         </div>
                                         <div class="col pl-1">
                                            <button class="btn btn-info btn-block btn-sm"><i class="fas fa-edit"></i></button>
                                         </div>
                                      </div>
                                   </div>
                                </a>
                             </div>
                          </div>
                          <div class="col-xl-3 col-md-6 mb-4">
                             <div class="card m-card shadow border-0">
                                <a href="movies-detail.html">
                                   <div class="m-card-cover">
                                      <div class="position-absolute bg-white shadow-sm rounded text-center p-2 m-2 love-box">
                                         <h6 class="text-gray-900 mb-0 font-weight-bold"><i class="fas fa-heart text-danger"></i> 50%</h6>
                                         <small class="text-muted">8,784</small>
                                      </div>
                                      <img src="img/m2.jpg" class="card-img-top" alt="...">
                                   </div>
                                   <div class="card-body p-3">
                                      <h5 class="card-title text-gray-900 mb-1">Gemini Man</h5>
                                      <p class="card-text"><small class="text-muted">English</small> <small class="text-danger"><i class="fas fa-calendar-alt fa-sm text-gray-400"></i> 22 AUG</small> </p>
                                   </div>
                                   <div class="card-body pl-2 pr-2 pb-2 pt-0">
                                      <div class="row">
                                         <div class="col pr-1">
                                            <button class="btn btn-danger btn-block btn-sm"><i class="fas fa-trash"></i></button>
                                         </div>
                                         <div class="col pl-1">
                                            <button class="btn btn-info btn-block btn-sm"><i class="fas fa-edit"></i></button>
                                         </div>
                                      </div>
                                   </div>
                                </a>
                             </div>
                          </div>
                          <div class="col-xl-3 col-md-6 mb-4">
                             <div class="card m-card shadow border-0">
                                <a href="movies-detail.html">
                                   <div class="m-card-cover">
                                      <div class="position-absolute bg-white shadow-sm rounded text-center p-2 m-2 love-box">
                                         <h6 class="text-gray-900 mb-0 font-weight-bold"><i class="fas fa-heart text-danger"></i> 20%</h6>
                                         <small class="text-muted">69,123</small>
                                      </div>
                                      <img src="img/m3.jpg" class="card-img-top" alt="...">
                                   </div>
                                   <div class="card-body p-3">
                                      <h5 class="card-title text-gray-900 mb-1">The Current War</h5>
                                      <p class="card-text"><small class="text-muted">English</small> <small class="text-danger"><i class="fas fa-calendar-alt fa-sm text-gray-400"></i> 22 AUG</small> </p>
                                   </div>
                                   <div class="card-body pl-2 pr-2 pb-2 pt-0">
                                      <div class="row">
                                         <div class="col pr-1">
                                            <button class="btn btn-danger btn-block btn-sm"><i class="fas fa-trash"></i></button>
                                         </div>
                                         <div class="col pl-1">
                                            <button class="btn btn-info btn-block btn-sm"><i class="fas fa-edit"></i></button>
                                         </div>
                                      </div>
                                   </div>
                                </a>
                             </div>
                          </div>
                          <div class="col-xl-3 col-md-6 mb-4">
                             <div class="card m-card shadow border-0">
                                <a href="movies-detail.html">
                                   <div class="m-card-cover">
                                      <div class="position-absolute bg-white shadow-sm rounded text-center p-2 m-2 love-box">
                                         <h6 class="text-gray-900 mb-0 font-weight-bold"><i class="fas fa-heart text-danger"></i> 74%</h6>
                                         <small class="text-muted">88,865</small>
                                      </div>
                                      <img src="img/m4.jpg" class="card-img-top" alt="...">
                                   </div>
                                   <div class="card-body p-3">
                                      <h5 class="card-title text-gray-900 mb-1">Charlie's Angels</h5>
                                      <p class="card-text"><small class="text-muted">English</small> <small class="text-danger"><i class="fas fa-calendar-alt fa-sm text-gray-400"></i> 22 AUG</small> </p>
                                   </div>
                                   <div class="card-body pl-2 pr-2 pb-2 pt-0">
                                      <div class="row">
                                         <div class="col pr-1">
                                            <button class="btn btn-danger btn-block btn-sm"><i class="fas fa-trash"></i></button>
                                         </div>
                                         <div class="col pl-1">
                                            <button class="btn btn-info btn-block btn-sm"><i class="fas fa-edit"></i></button>
                                         </div>
                                      </div>
                                   </div>
                                </a>
                             </div>
                          </div>
                          <div class="col-xl-3 col-md-6 mb-4">
                             <div class="card m-card shadow border-0">
                                <a href="movies-detail.html">
                                   <div class="m-card-cover">
                                      <div class="position-absolute bg-white shadow-sm rounded text-center p-2 m-2 love-box">
                                         <h6 class="text-gray-900 mb-0 font-weight-bold"><i class="fas fa-heart text-danger"></i> 88%</h6>
                                         <small class="text-muted">23,421</small>
                                      </div>
                                      <img src="img/m1.jpg" class="card-img-top" alt="...">
                                   </div>
                                   <div class="card-body p-3">
                                      <h5 class="card-title text-gray-900 mb-1">Jumanji: The Next Level</h5>
                                      <p class="card-text"><small class="text-muted">English</small> <small class="text-danger"><i class="fas fa-calendar-alt fa-sm text-gray-400"></i> 22 AUG</small> </p>
                                   </div>
                                   <div class="card-body pl-2 pr-2 pb-2 pt-0">
                                      <div class="row">
                                         <div class="col pr-1">
                                            <button class="btn btn-danger btn-block btn-sm"><i class="fas fa-trash"></i></button>
                                         </div>
                                         <div class="col pl-1">
                                            <button class="btn btn-info btn-block btn-sm"><i class="fas fa-edit"></i></button>
                                         </div>
                                      </div>
                                   </div>
                                </a>
                             </div>
                          </div>
                       </div>
                       <nav aria-label="Page navigation example">
                          <ul class="pagination justify-content-center mb-0 pb-0">
                             <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                             </li>
                             <li class="page-item"><a class="page-link" href="#">1</a></li>
                             <li class="page-item"><a class="page-link" href="#">2</a></li>
                             <li class="page-item"><a class="page-link" href="#">3</a></li>
                             <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                             </li>
                          </ul>
                       </nav>
                    </div>
                    <!-- payments -->
                    <div class="tab-pane fade {{ request()->is('profile/password') ? 'show active' : '' }}" id="sidebar-1-4" role="tabpanel" aria-labelledby="sidebar-1-4">
                       <!-- Page Heading -->
                       <div class="d-sm-flex align-items-center justify-content-between mb-3">
                          <h1 class="h5 mb-0 text-gray-900">Account Settings</h1>
                       </div>
                       <form method="post" action="{{ route('profile.password') }}">
                           @csrf
                       <div class="row gutter-1">
                          <div class="col-12">
                             <div class="form-group">
                                <label for="current_password">Current Password</label>
                                <input id="current_password" type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" placeholder="Password">

                                @error('current_password')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{  $message }}</strong>
                                </div>
                                @enderror
                             </div>
                          </div>
                          <div class="col-md-6">
                             <div class="form-group">
                                <label for="password">New Password</label>
                                <input id="password" type="password" name="password" class="form-control  @error('password') is-invalid @enderror" placeholder="New Password">

                                @error('password')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                             </div>
                          </div>
                          <div class="col-md-6">
                             <div class="form-group">
                                <label for="password_confirmation">Retype New Password</label>
                                <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                             </div>
                          </div>
                       </div>
                       <div class="row">
                          <div class="col">
                             <button type="submit" class="btn btn-primary" id="change-password">Save Changes</button>
                          </div>
                       </div>
                    </form>
                    </div>
                 </div>
                 <!-- / content -->
              </div>
           </div>
        </div>
     </div>
     <!-- /.container-fluid -->

@endsection

@section('JS')
<script>
    $(document).ready(function() {

      //   $(document).on('click', '#change-password', function() {
      //       var old_pass = $('#old_pass').val();
      //       var password = $('#password').val();
      //       var password_confirmation = $('#password_confirmation').val();
      //       console.log("ok");
      //       $.ajax({
      //           url: "{{ route('profile.password') }}",
      //           method: "post",
      //           data: {
      //               old_pass : old_pass,
      //               password : password,
      //               password_confirmation : password_confirmation,
      //           }

      //       },
      //       success: function(data){
      //           console.log(data);
      //       },
      //       error: function(response) {
      //           console.log("error");
      //       })
      //   });

    }) //reay function
</script>
@endsection
