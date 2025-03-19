@extends('website.layout.master')
@section('title')
Car Listing | Select and Rent
@endsection

@section('content')
<div class="container">
    <div class="row">
        <!-- car-listing-sidebar -->
        <div class="col-md-3 car-listing-sidebar">
            <div class="filters p-3">
                <div class="brand-section">
                <input type="text" class="form-control car-input-box" placeholder="From address">
                <input type="text" class="form-control car-input-box" placeholder="To Address">
                <select class="form-control car-input-box">
                    <option>Select</option>
                </select>
                <input type="date" class="form-control car-input-box">
                <input type="time" class="form-control car-input-box">
                </div>
                <div class="brand-section">
                    <h5 class="brand-title">All Brands (2376)</h5>
                    <div class="brand-list">
                        <button class="brand-btn active">Toyota (123)</button>
                        <button class="brand-btn">Nissan (23)</button>
                        <button class="brand-btn">Mercedes (467)</button>
                        <button class="brand-btn">Hyundai (467)</button>
                        <button class="brand-btn">Audi (123)</button>
                        <button class="brand-btn">Datsun (23)</button>
                    </div>

                    <button class="btn find-car-btn btn-dark-blue-clr">Find Car</button>

                </div>
        
            </div>
        </div>
        

        <!-- Main Content -->
        <div class="col-md-9">
           <!-- Sorting & Filtering -->
        <div class="filter-bar static-display-flex justify-content-between align-items-center my-3 mt-5">
            <div class="static-display-flex align-items-center">
                <span class="menu-icon">☰</span>
                <span class="results">1-10 of 25 results</span>
            </div>
            <div class="filter-options static-display-flex align-items-center">
                <div class="car-listing-dropdown">
                    <span class="filter-icon">⇅</span>
                    <select class="car-listing-form-select">
                        <option>By Category</option>
                        <option>All Cars</option>
                        <option>Grande (manual)</option>
                        <option>Grande (1.6)</option>
                        <option>GLI (1.2)</option>
                    </select>
                </div>
                <div class="car-listing-dropdown">
                    <span class="sort-icon">≡</span>
                    <select class="car-listing-form-select">
                        <option>Sort By</option>
                        <option>Price (Low to High)</option>
                        <option>Price (High to Low)</option>
                        <option>Featured</option>
                    </select>
                </div>
            </div>
        </div>


            <!-- Car Listing Grid -->
            <div class="row">
                <!-- Car Card -->
                <div class="col-sm-6 col-md-6 col-lg-4 mb-5">
                    <div class="car-listing-card">
                        <img src="{{asset('/')}}company-assets/assets/image-mehroon.png" alt="Nissan 370Z" class="listing-car-image">
                        
                        <div class="car-info">
                            <div class="d-flex justify-content-between bg-light align-items-center rounded">
                                <h6 class=" car-price">$599/day</h6>
                                <button class="book-btn">Book</button>
                            </div>
                            
                            <h5 class="car-name">Nissan 370Z</h5>
                            
                            <div class="car-details">
                                <div class="detail-item"><img src="{{asset('/')}}company-assets/icons/Iconly.png" alt="Car Image" width="20px">  520 kg</div>
                                <div class="detail-item"><img src="{{asset('/')}}company-assets/icons/Iconly-v.png" alt="Car Image" width="20px"> 2 Sitze</div>
                                <div class="detail-item"><img src="{{asset('/')}}company-assets/icons/Iconly-u.png" alt="Car Image" width="20px"> 1.200 km</div>
                                <div class="detail-item"><img src="{{asset('/')}}company-assets/icons/Iconly-s.png" alt="Car Image" width="20px"> Manuell</div>
                            </div>
                    
                            <button class="details-btn rounded-pill">Details</button>
                        </div>
                    </div>
                    
                </div>
                <!-- Repeat Car Card 5 times -->
                <div class="col-sm-6 col-md-6 col-lg-4 mb-5">
                    <div class="car-listing-card">
                        <img src="{{asset('/')}}company-assets/assets/image-mehroon.png" alt="Nissan 370Z" class="listing-car-image">
                        
                        <div class="car-info">
                            <div class="d-flex justify-content-between bg-light align-items-center rounded">
                                <h6 class=" car-price">$599/day</h6>
                                <button class="book-btn">Book</button>
                            </div>
                            
                            <h5 class="car-name">Nissan 370Z</h5>
                            
                            <div class="car-details">
                                <div class="detail-item"><img src="{{asset('/')}}company-assets/icons/Iconly.png" alt="Car Image" width="20px">  520 kg</div>
                                <div class="detail-item"><img src="{{asset('/')}}company-assets/icons/Iconly-v.png" alt="Car Image" width="20px"> 2 Sitze</div>
                                <div class="detail-item"><img src="{{asset('/')}}company-assets/icons/Iconly-u.png" alt="Car Image" width="20px"> 1.200 km</div>
                                <div class="detail-item"><img src="{{asset('/')}}company-assets/icons/Iconly-s.png" alt="Car Image" width="20px"> Manuell</div>
                            </div>
                    
                            <button class="details-btn rounded-pill">Details</button>
                        </div>
                    </div>
                    
                </div>
                <!-- Repeat more cards as needed -->
                <div class="col-sm-6 col-md-6 col-lg-4 mb-5">
                    <div class="car-listing-card">
                        <img src="{{asset('/')}}company-assets/assets/image-mehroon.png" alt="Nissan 370Z" class="listing-car-image">
                        
                        <div class="car-info">
                            <div class="d-flex justify-content-between bg-light align-items-center rounded">
                                <h6 class=" car-price">$599/day</h6>
                                <button class="book-btn">Book</button>
                            </div>
                            
                            <h5 class="car-name">Nissan 370Z</h5>
                            
                            <div class="car-details">
                                <div class="detail-item"><img src="{{asset('/')}}company-assets/icons/Iconly.png" alt="Car Image" width="20px">  520 kg</div>
                                <div class="detail-item"><img src="{{asset('/')}}company-assets/icons/Iconly-v.png" alt="Car Image" width="20px"> 2 Sitze</div>
                                <div class="detail-item"><img src="{{asset('/')}}company-assets/icons/Iconly-u.png" alt="Car Image" width="20px"> 1.200 km</div>
                                <div class="detail-item"><img src="{{asset('/')}}company-assets/icons/Iconly-s.png" alt="Car Image" width="20px"> Manuell</div>
                            </div>
                    
                            <button class="details-btn rounded-pill">Details</button>
                        </div>
                    </div>
                    
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 mb-5">
                    <div class="car-listing-card">
                        <img src="{{asset('/')}}company-assets/assets/image-mehroon.png" alt="Nissan 370Z" class="listing-car-image">
                        
                        <div class="car-info">
                            <div class="d-flex justify-content-between bg-light align-items-center rounded">
                                <h6 class=" car-price">$599/day</h6>
                                <button class="book-btn">Book</button>
                            </div>
                            
                            <h5 class="car-name">Nissan 370Z</h5>
                            
                            <div class="car-details">
                                <div class="detail-item"><img src="{{asset('/')}}company-assets/icons/Iconly.png" alt="Car Image" width="20px">  520 kg</div>
                                <div class="detail-item"><img src="{{asset('/')}}company-assets/icons/Iconly-v.png" alt="Car Image" width="20px"> 2 Sitze</div>
                                <div class="detail-item"><img src="{{asset('/')}}company-assets/icons/Iconly-u.png" alt="Car Image" width="20px"> 1.200 km</div>
                                <div class="detail-item"><img src="{{asset('/')}}company-assets/icons/Iconly-s.png" alt="Car Image" width="20px"> Manuell</div>
                            </div>
                    
                            <button class="details-btn rounded-pill">Details</button>
                        </div>
                    </div>
                    
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 mb-5">
                    <div class="car-listing-card">
                        <img src="{{asset('/')}}company-assets/assets/image-mehroon.png" alt="Nissan 370Z" class="listing-car-image">
                        
                        <div class="car-info">
                            <div class="d-flex justify-content-between bg-light align-items-center rounded">
                                <h6 class=" car-price">$599/day</h6>
                                <button class="book-btn">Book</button>
                            </div>
                            
                            <h5 class="car-name">Nissan 370Z</h5>
                            
                            <div class="car-details">
                                <div class="detail-item"><img src="{{asset('/')}}company-assets/icons/Iconly.png" alt="Car Image" width="20px">  520 kg</div>
                                <div class="detail-item"><img src="{{asset('/')}}company-assets/icons/Iconly-v.png" alt="Car Image" width="20px"> 2 Sitze</div>
                                <div class="detail-item"><img src="{{asset('/')}}company-assets/icons/Iconly-u.png" alt="Car Image" width="20px"> 1.200 km</div>
                                <div class="detail-item"><img src="{{asset('/')}}company-assets/icons/Iconly-s.png" alt="Car Image" width="20px"> Manuell</div>
                            </div>
                    
                            <button class="details-btn rounded-pill">Details</button>
                        </div>
                    </div>
                    
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 mb-5">
                    <div class="car-listing-card">
                        <img src="{{asset('/')}}company-assets/assets/image-mehroon.png" alt="Nissan 370Z" class="listing-car-image">
                        
                        <div class="car-info">
                            <div class="d-flex justify-content-between bg-light align-items-center rounded">
                                <h6 class=" car-price">$599/day</h6>
                                <button class="book-btn">Book</button>
                            </div>
                            
                            <h5 class="car-name">Nissan 370Z</h5>
                            
                            <div class="car-details">
                                <div class="detail-item"><img src="{{asset('/')}}company-assets/icons/Iconly.png" alt="Car Image" width="20px">  520 kg</div>
                                <div class="detail-item"><img src="{{asset('/')}}company-assets/icons/Iconly-v.png" alt="Car Image" width="20px"> 2 Sitze</div>
                                <div class="detail-item"><img src="{{asset('/')}}company-assets/icons/Iconly-u.png" alt="Car Image" width="20px"> 1.200 km</div>
                                <div class="detail-item"><img src="{{asset('/')}}company-assets/icons/Iconly-s.png" alt="Car Image" width="20px"> Manuell</div>
                            </div>
                    
                            <button class="details-btn rounded-pill">Details</button>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection