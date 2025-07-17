@extends('admin.layouts.Master')
@section('title') {{ __('messages.company') }} @endsection
@section('content')
    @if(auth()->user()->role == 'admin')
        <style>
            .tooltip-icon {
            position: relative;
            cursor: pointer;
            }

            .tooltip-icon .tooltip-text {
            visibility: hidden;
            background-color: #f06115;
            color: #fff;
            padding: 6px;
            border-radius: 4px;
            font-size: 12px;
            position: absolute;
            top: -5px;
            left: 20px;
            white-space: nowrap;
            z-index: 1;
            }

            .tooltip-icon:hover .tooltip-text {
            visibility: visible;
            }
        </style>
        <div class="col-12">
            <div class="card mt-4">
                <div class="card-header">
                    <h4>{{ __('messages.deactivated') }} {{ __('messages.companies') }}</h4>
                    
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="myTable">
                        <thead>
                        <tr>
                            <th scope="col">{{ __('messages.name') }}</th>
                            <th scope="col">{{ __('messages.company') }} {{ __('messages.name') }}</th>
                            <th scope="col">{{ __('messages.company') }} {{ __('messages.email') }}</th>
                            <th scope="col">{{ __('messages.personal') }} {{ __('messages.email') }}
                                <span class="tooltip-icon">
                                    <i>ℹ️</i>
                                    <span class="tooltip-text">{{ __('messages.login_email') }}</span>
                                </span>
                            </th>
                            <th scope="col">{{ __('messages.phone') }}</th>
                            <th scope="col">{{ __('messages.website') }}</th>
                            <th scope="col">{{ __('messages.detail') }}</th>
                            @if(can('companies','edit'))
                                <th scope="col">{{ __('messages.action') }}</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody id="companytable">
                            @if(isset($companies))
                                <?php $counterDeactivatedCompanies = 0; ?>
                                @foreach ($companies as $compdata)
                                    <tr>
                                        <td>{{ $compdata->user->name }}</td>
                                        <td>{{ $compdata->name }}</td>
                                        <td>{{ $compdata->email }}</td>
                                        <td>{{ $compdata->user->email }}</td>
                                        <td>{{ $compdata->phone }}</td>
                                        <td>{{ $compdata->website }}</td>
                                        <td>
                                            <p id="pendingCompanyDetailLess{{ $counterDeactivatedCompanies}}">
                                                {{ $compdata->detail  }}
                                            </p>

                                            <p id="pendingCompanyDetail{{ $counterDeactivatedCompanies }}">
                                                <span id="pendingCompanyDetailFirstPart{{ $counterDeactivatedCompanies }}"></span><span id="pendingCompanyDetailDots{{ $counterDeactivatedCompanies }}">...</span><span id="pendingCompanyDetailMore{{ $counterDeactivatedCompanies }}"></span>
                                                <a class="read-more-link" onclick="pendingCompanyDetail({{ $counterDeactivatedCompanies }})" id="pendingCompanyDetailButton{{ $counterDeactivatedCompanies }}">Read More</a>
                                            </p>
                                            <script>
                                                var expDes = $("#pendingCompanyDetailLess{{ $counterDeactivatedCompanies }}").text();
                                                var expDesId = document.getElementById("pendingCompanyDetailLess{{ $counterDeactivatedCompanies }}");
                                                var expDesId1 = document.getElementById("pendingCompanyDetail{{ $counterDeactivatedCompanies }}");
                                                var expDesLength = expDes.length;
                                                if(expDesLength > 220)
                                                    {
                                                        expDesId.style.display = "none";
                                                        var firstPart = expDes.slice(0,200);
                                                        var lastPart = expDes.slice(200,expDesLength);
                                                        $("#pendingCompanyDetailFirstPart{{ $counterDeactivatedCompanies }}").text(firstPart);
                                                    }
                                                else
                                                    {
                                                        expDesId1.style.display = "none";
                                                    }
                                            </script>
                                            <?php $counterDeactivatedCompanies++; ?>
                                        </td>
                                        @if(can('companies','edit'))
                                            <td>
                                                <a title="Activate" href="{{ route('activateCompany', $compdata->id) }}" class="btn-aprove-company"> <i class="fa-regular fa-circle-check pending-btn" ></i> </a>
                                                <!-- <a title="Delete" href="{{ route('destroyPendingCompany',$compdata->id) }}"  class="btn-delete"><i class="fa-sharp fa-solid fa-trash fa-1x delete-btn"></i></a> -->
                                                
                                            </td>   
                                        @endif 
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    {{ $companies->links() }}
                </div> 
            </div> 
        </div>  
        <script>
            function pendingCompanyDetail(id) {
                var expDes = $("#pendingCompanyDetailLess"+id).text();
                var expDesLength = expDes.length;
                if(expDesLength > 220)
                    {
                        var lastPart = expDes.slice(200,expDesLength);
                    }
                var dots = document.getElementById("pendingCompanyDetailDots"+id);
                var moreText = document.getElementById("pendingCompanyDetailMore"+id);
                var btnText = document.getElementById("pendingCompanyDetailButton"+id);
                if (dots.style.display === "none") {
                    dots.style.display = "inline";
                    btnText.innerHTML = "Read more"; 
                    moreText.style.display = "none";
                } else {
                    $("#pendingCompanyDetailMore"+id).text(lastPart);
                    dots.style.display = "none";
                    btnText.innerHTML = "Read less"; 
                    moreText.style.display = "inline";
                }
            }
        </script>     
    @else
        <div class="alert alert-danger" role="alert">
            Access Denied
        </div>
    @endif  
@endsection

