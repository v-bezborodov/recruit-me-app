@extends('layouts.root')

@section('meta_title')
    Profile
@stop

@section('meta_description')
    Profile
@stop


@section('content')
    <section>
        <div class="container emp-profile">

                <div class="row">
                    <div class="col-md-3">
                        <div class="profile-img">
                            <img class="w-100" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                            <div class="file btn btn-lg btn-primary w-100">
                                Change Photo
                                <input type="file" name="file"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="profile-head">
                            <h5>
                                {{Auth::user()->first_name.' '.Auth::user()->last_name}}
                            </h5>
                            <h6>
                                {!!Auth::user()->position_name??'<p class="text-secondary">Position name<p>'!!}
                            </h6>
                            <p class="proile-rating">RANKINGS : <span>{!!Auth::user()->ranking ? Auth::user()->ranking .'/10':'<span class="text-secondary">Not rated yet<span>'!!}</span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Your Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#recrutation" role="tab" aria-controls="profile" aria-selected="false">Recrutation</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">

                    </div>

                </div>
                <div class="row">
                    <div class="col-md-3">
                        {{--Vue component--}}
                        <div class="mt-2 text-center">
                            <b-button id="show-btn" @click="$bvModal.show('bv-modal-example')">Edit Profile</b-button>
                            <modal-component :data="{{ Auth::user()}}" :countries="{{\App\Country::get(['id','long_name'])}}"></modal-component>
                        </div>

                        <div class="profile-work mt-4">
                            <p>LINKS</p>
                            {!!Auth::user()->website ?'<a href="'.Auth::user()->website.'">Website Link</a><br/>':''!!}
                            {!!Auth::user()->facebook ?'<a href="'.Auth::user()->facebook.'">Facebook Link</a><br/>':''!!}
                            {!!Auth::user()->linkedin ?'<a href="'.Auth::user()->website.'">Linkedin Link</a><br/>':''!!}
                        </div>
{{--                        {{dd(Auth::user())}}--}}
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>User Id</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{Auth::user()->id}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{Auth::user()->first_name.' '.Auth::user()->last_name}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{Auth::user()->email}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Phone</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{Auth::user()->phone}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Profession</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{Auth::user()->position_name}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Company</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{Auth::user()->company}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Country</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{Auth::user()->country->long_name}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Active campanies</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{\App\Recruitment::where('user_id', Auth::user()->id)->count()}}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="recrutation" role="tabpanel" aria-labelledby="recrutation-tab">
                                <div class="row">
                                    @if($recruitment->count())
                                        <table-component-profile data="{{ $recruitment }}">
                                        </table-component-profile>
                                    @else
                                        <p class="text-center">You have not submitted application yet</p>
                                    @endif
                                </div>
                            </div>

                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Profile created</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{Auth::user()->created_at}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Last visit</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{Auth::user()->updated_at}}</p>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

        </div>
    </section>

@stop
{{--<script src="{{ asset('js/app.js') }}"></script>--}}





{{--<script>--}}
{{--    export default {--}}
{{--        data() {--}}
{{--            return {--}}
{{--                    first_name:''--}}
{{--            }--}}
{{--        },--}}
{{--        methods: {--}}
{{--            formSubmit(e) {--}}
{{--                e.preventDefault();--}}
{{--                axios.post('/formSubmit', {--}}
{{--                    name: this.first_name--}}
{{--                })--}}
{{--                .then(function (response) {--}}
{{--                    console.log(response.data);--}}
{{--                })--}}
{{--                .catch(function (error) {--}}
{{--                    console.log(error);--}}
{{--                });--}}
{{--            }--}}
{{--        }--}}
{{--    }--}}
{{--</script>--}}
{{--@section('script')--}}
{{--    <script src="{{ asset('js/app.js') }}"></script>--}}
{{--@stop--}}
