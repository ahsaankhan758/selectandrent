@extends('admin.layouts.Master')
@section('title') {{ __('messages.company') }} @endsection
@section('content')
    @if(auth()->user()->role == 'admin')
        <div class="col-12">
            <div class="card mt-4">
                <div class="card-header">
                    <h4>{{ __('messages.pending') }} {{ __('messages.companies') }}</h4>
                    
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="myTable">
                        <thead>
                        <tr>
                            <th scope="col">{{ __('messages.name') }}</th>
                            <th scope="col">{{ __('messages.company') }} {{ __('messages.name') }}</th>
                            <th scope="col">{{ __('messages.company') }} {{ __('messages.email') }}</th>
                            <th scope="col">{{ __('messages.phone') }}</th>
                            <th scope="col">{{ __('messages.web site') }}</th>
                            <th scope="col">{{ __('messages.detail') }}</th>
                            @if(can('companies','edit'))
                                <th scope="col">{{ __('messages.action') }}</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody id="companytable">
                            @if(isset($companies))
                                <?php $counterPendingCompanies = 0; ?>
                                @foreach ($companies as $compdata)
                                    <tr>
                                        <td>{{ $compdata->user->name }}</td>
                                        <td>{{ $compdata->name }}</td>
                                        <td>{{ $compdata->email }}</td>
                                        <td>{{ $compdata->phone }}</td>
                                        <td>{{ $compdata->website }}</td>
                                        <td>
                                            <p id="pendingCompanyDetailLess{{ $counterPendingCompanies}}">
                                                {{ $compdata->detail  }}
                                            </p>

                                            <p id="pendingCompanyDetail{{ $counterPendingCompanies }}">
                                                <span id="pendingCompanyDetailFirstPart{{ $counterPendingCompanies }}"></span><span id="pendingCompanyDetailDots{{ $counterPendingCompanies }}">...</span><span id="pendingCompanyDetailMore{{ $counterPendingCompanies }}"></span>
                                                <a class="read-more-link" onclick="pendingCompanyDetail({{ $counterPendingCompanies }})" id="pendingCompanyDetailButton{{ $counterPendingCompanies }}">Read More</a>
                                            </p>
                                            <script>
                                                var expDes = $("#pendingCompanyDetailLess{{ $counterPendingCompanies }}").text();
                                                var expDesId = document.getElementById("pendingCompanyDetailLess{{ $counterPendingCompanies }}");
                                                var expDesId1 = document.getElementById("pendingCompanyDetail{{ $counterPendingCompanies }}");
                                                var expDesLength = expDes.length;
                                                if(expDesLength > 220)
                                                    {
                                                        expDesId.style.display = "none";
                                                        var firstPart = expDes.slice(0,200);
                                                        var lastPart = expDes.slice(200,expDesLength);
                                                        $("#pendingCompanyDetailFirstPart{{ $counterPendingCompanies }}").text(firstPart);
                                                    }
                                                else
                                                    {
                                                        expDesId1.style.display = "none";
                                                    }
                                            </script>
                                            <?php $counterPendingCompanies++; ?>
                                        </td>
                                        @if(can('companies','edit'))
                                            <td>
                                                <a title="Approve" href="{{ route('aprovePendingCompany', $compdata->id) }}" class="btn-aprove-company"> <i class="fa-regular fa-circle-check pending-btn" ></i> </a>
                                                <a title="Delete" href="{{ route('destroyPendingCompany',$compdata->id) }}"  class="btn-delete"><i class="fa-sharp fa-solid fa-trash fa-1x delete-btn"></i></a>
                                                
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

