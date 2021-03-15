<td>{{$key+1}}</td>
                                        <td>{{$brand->id}}</td>
                                        <td>{{$brand->brand_name}}</td>
                                        
                                        <td>{{$brand->brand_name}}</td>
                                        <td>{{date('d-M-Y',strtotime($brand->created_at))}}</td>
                                        <td > <input type="checkbox" data-toggle="toggle" data-on="Active" data-off="Inactive" data-id="{{$brand->id}}" id="brandstatus"  {{ $brand->status == 1? 'checked':''}} > </td>
                                        <td>
                                            @if($brand->status==1)
                                            <a href="{{route('brands.inactive-brand',$brand->id)}}" class="btn  btn-primary btn-xs"> <i class="fa fa-arrow-up"></i></a>
                                            @else
                                            <a href="{{route('brands.active-brand',$brand->id)}}" class="btn btn-warning btn-xs"> <i class="fa fa-arrow-down"></i></a>
                                            @endif
                                            <a href="{{route('brands.edit-brand',$brand->id)}}" class="btn btn-info btn-xs"> <i class="fa fa-pencil"></i></a>
                                            <a href="{{route('brands.delete-brand',$brand->id)}}" class="btn btn-danger btn-xs"> <i class="fa fa-trash"></i></a>
                                        </td>