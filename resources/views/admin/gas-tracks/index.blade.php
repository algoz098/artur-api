@extends('layouts.app')

@section('content')
<form method="POST"  id="form" class="container-fluid">
@csrf
    <div class="row justify-content-center">
        <div class="col-md-12 ">
            <div class="card">
                <div class="card-body d-flex align-items-center">
                    <div class="col-3">
                        <select-user value="{{ old('user_id') }}"></select-user>
                    </div>
                    {{$tracks->links()}}

                    <div class="col-3">
                        <button 
                            type="button"
                            class="btn btn-outline-info"
                            @click="submit('{{route('AdminGasTrackSetUser')}}')"
                        >Set user</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 pt-4">
            <div class="card">
                <div class="card-header">List of Gastracks</div>

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">
                                <select-all></select-all>
                            </th>
                            
                            <th scope="col">ID</th>
                            
                            <th scope="col">User</th>
                            
                            <th scope="col">Km actual</th>
                            
                            <th scope="col">Lts add</th>
                            
                            <th scope="col">Date</th>
                            
                            <th scope="col">Price</th>
                            
                            <th scope="col">Total</th>
                            
                            <th scope="col">KM/LT</th>
                            
                            <th scope="col">Wheeled</th>
                            
                            <th scope="col">Total wheeled</th>
                            
                            <th scope="col">Updated at</th>
                            
                            <th scope="col">Created at</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($tracks as $key => $track)
                        <tr @click="selectCheckbox({{$key}})">
                            <td>
                                <input 
                                    type="checkbox" 
                                    id="checkbox_{{$key}}"
                                    name="gas_track_ids[]" 
                                    value="{{$track->id}}" 
                                    {{ old('gas_track_ids.'.$key) == $track->id ? 'checked' : '' }} 
                                >
                                
                            </td>

                            <td >
                                {{$track->id}}
                            </td>

                            <td>
                                <span class="badge badge-info" data-toggle="tooltip" title="{{$track->user->uid}}">
                                    {{$track->user_id}} {{$track->user->name}}
                                </span>
                            </td>

                            <td>
                                {{$track->km_actual}}
                            </td>

                            <td>
                                {{$track->lts_add}}
                            </td>

                            <td>
                                {{$track->date}}
                            </td>

                            <td>
                                {{$track->price}}
                            </td>

                            <td>
                                {{$track->total}}
                            </td>

                            <td>
                                {{$track->km_lt}}
                            </td>

                            <td>
                                {{$track->wheeled}}
                            </td>

                            <td>
                                {{$track->total_wheeled}}
                            </td>

                            <td>
                                {{$track->updated_at->format('h:i d/m/Y')}}
                            </td>

                            <td>
                                {{$track->created_at->format('h:i d/m/Y')}}
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</form>
@endsection
