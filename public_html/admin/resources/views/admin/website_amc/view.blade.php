@extends('admin.layouts.master')
@section('title')

@endsection

@section('content')
@component('admin.common-components.breadcrumb')
@slot('pagetitle') Website A.M.C @endslot
@slot('title') View Website A.M.C @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive mb-4">
                    <table id="datatable" class="table table-centered table-nowrap mb-0">
                        <thead>
                            <tr>
                                <th scope="col"><a
                                        href="http://rukmanisoftware.com/admin/admin/enquiry?sort=id&amp;direction=desc">ID</a>
                                    <i class="fas fa-sort"></i></th>
                             
                                <th scope="col">@sortablelink('name','Name')</th>
                                <th scope="col">@sortablelink('mobile','Owner mobile no')</th>
                                <th scope="col">@sortablelink('website_link','Website link')</th>
                                <th scope="col">@sortablelink('amount','Amount')</th>
                                <th scope="col">@sortablelink('registration_date','Registration date')</th>
                                <th scope="col">@sortablelink('emc_date','E.M.C date')</th>
                                <th scope="col">@sortablelink('amc_amount','A.M.C amoun')</th>
                                <th scope="col">@sortablelink('image','Image')</th>
                                <th scope="col">@sortablelink('status','Status')</th>
                                <th scope="col" style="width: 200px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($FetchData as $key => $FetchData)		
                            <tr>
                                <td>{{ $FetchData->id }} </td>
                                <td>{{ $FetchData->name }}</td>
                                <td>{{ $FetchData->mobile }}</td>
                                <td>{{ $FetchData->website_link }}</td>
                                <td>{{ $FetchData->amount }}</td>
                                 <td>{{ date('m/d/Y',strtotime($FetchData->registration_date)) }}</td>
                                  <td>{{ date('m/d/Y',strtotime($FetchData->emc_date)) }}</td>
                                <td>{{ $FetchData->amc_amount }}</td>
                                <td>{{ $FetchData->image }}</td>
                               
                               			<td>
									@if($FetchData->status==1)
									<span class="btn btn-success btn-sm btn-soft-success waves-effect waves-light">Active</span>
									@else
									<span class="btn btn-danger btn-sm btn-soft-danger waves-effect waves-light">Inactive</span>
									@endif									
									</td>
                  <!--              <td>
                                    <ul class="list-inline mb-0">
                                      
                                        <li class="list-inline-item">
                                            <a href="http://rukmanisoftware.com/admin/admin/enquiry/38/edit" class="px-2 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="uil uil-pen font-size-18"></i></a>
                                        </li>
                                        <li class="list-inline-item">                                               
                                            <a data-id="38" data-location="countries" class="px-2 text-danger sa-params" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="uil uil-trash-alt font-size-18"></i></a>
                                            <form method="POST" action="http://rukmanisoftware.com/admin/admin/enquiry/38" accept-charset="UTF-8" style="display:inline" class="sa-params38"><input name="_method" type="hidden" value="DELETE"><input name="_token" type="hidden" value="cQhLsdo0Mj4CfEycNEnmMgfrShcbEMjTsuSky8Nr">                                                
                                           </form>
                                        </li>
                                    </ul>
                                </td>-->
                                
                                
                                
                                 <td>
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item">
                                                <a href="{{ route('admin.amc.show',$FetchData->id) }}" class="px-2 text-primary" data-toggle="tooltip" data-placement="top" title="View"><i class="uil uil-search font-size-18"></i></a>
                                            </li>
											
											<li class="list-inline-item">
                                                <a href="{{ route('admin.amc.edit',$FetchData->id) }}" class="px-2 text-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="uil uil-pen font-size-18"></i></a>
                                            </li>
                                            <li class="list-inline-item">										        
										        <a   data-id="{{$FetchData->id}}"  data-location="anc"  class="px-2 text-danger sa-params" data-toggle="tooltip" data-placement="top" title="Delete"><i class="uil uil-trash-alt font-size-18"></i></a>
												{!! Form::open(['method' => 'DELETE','route' => ['admin.amc.destroy', $FetchData->id],'style'=>'display:inline','class'=>'sa-params'.$FetchData->id.'']) !!}												
												{!! Form::close() !!}
                                            </li>
											
                                        </ul>
                                    </td>
                                
                                
                                
                            </tr>
                              @endforeach
                </div>
            </div>
        </div>
    </div>
</div>



@endsection