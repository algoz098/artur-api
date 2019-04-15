@extends('layouts.app')

@section('content')
<form method="POST"  id="form" class="container-fluid">
@csrf
    <div class="row justify-content-center">
        <div class="col-md-12 ">
            <div class="card">
                <div class="card-body d-flex align-items-center">
                    <!-- <div class="col-3">
                        <select-user value="{{ old('user_id') }}"></select-user>
                    </div> -->
                    {{$users->links()}}

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
                <div class="card-header">List of Users</div>

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">
                                <select-all></select-all>
                            </th>
                            
                            <th scope="col">ID</th>
                            
                            <th scope="col">Name</th>
                            
                            <th scope="col">UID</th>
                            
                            <th scope="col">Email</th>
                            
                            <th scope="col">GasTrack</th>
                            
                            <th scope="col">Updated at</th>
                            
                            <th scope="col">Created at</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $key => $user)
                        <tr @click="selectCheckbox({{$key}})">
                            <td>
                                <input 
                                    type="checkbox" 
                                    id="checkbox_{{$key}}"
                                    name="user_ids[]" 
                                    value="{{$user->id}}" 
                                    {{ old('user_ids.'.$key) == $user->id ? 'checked' : '' }} 
                                >
                            </td>

                            <td >
                                {{$user->id}}
                            </td>

                            <td >
                                {{$user->name}}
                            </td>

                            <td >
                                {{$user->uid}}
                            </td>

                            <td >
                                {{$user->email}}
                            </td>

                            <td >
                                {{$user->gasTracks->count()}}
                            </td>

                            <td>
                                {{$user->updated_at->format('h:i d/m/Y')}}
                            </td>

                            <td>
                                {{$user->created_at->format('h:i d/m/Y')}}
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
