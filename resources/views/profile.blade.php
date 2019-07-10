@extends('layouts.root')

@section('meta_title')
    Profile
@stop

@section('meta_description')
    Profile
@stop


@section('content')

    <section class="profile-header" role="header">
{{--            <img class="profile-background w-100" src="./img/header.jpg">--}}
        <i class="fas fa-american-sign-language-interpreting"></i>
            <div class="profile-img">
{{--                @if()--}}
                <img class="w-100" src="./img/profiles/{{Auth::user()->id}}/slawek.jpeg" alt="avatar"/>
                <div class="profile-update-avatar">
{{--                    <i class="fa fa-edit"></i>--}}
{{--                    <input type="file" name="file"/>--}}
                    <div v-b-modal.avatar-profile-header-modal><i class="fa fa-edit"></i></div>

                    {{--Modal that changes avatar--}}
                    <b-modal id="avatar-profile-header-modal">
                            <avatar-component-profile>

                            </avatar-component-profile>

                    </b-modal>
                    {{--End modal that changes avatar--}}

                </div>
                <h5>
                    {{Auth::user()->first_name.' '.Auth::user()->last_name}}
                </h5>
            </div>
    </section>
    <section>
        <div class="emp-profile">

                <div class="row">
                    <div class="col-2">

                        <div class="profile-img">
                            <img class="w-100" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                            <div class="file btn btn-lg btn-primary w-100">
                                Change Photo
                                <input type="file" name="file"/>
                            </div>
                        </div>

                        <h5>
                            {{Auth::user()->first_name.' '.Auth::user()->last_name}}
                        </h5>
                        <h6>
                            {!!Auth::user()->position_name??'<p class="text-secondary">Position name<p>'!!}
                        </h6>
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
{{--                            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>--}}
                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
                            <a class="nav-link" id="v-pills-recrutation-tab" data-toggle="pill" href="#v-pills-recrutation" role="tab" aria-controls="v-pills-recrutation" aria-selected="false">Recrutation</a>
                            <a class="nav-link" id="v-pills-timeline-tab" data-toggle="pill" href="#v-pills-timeline" role="tab" aria-controls="v-pills-timeline" aria-selected="false">Timeline</a>

{{--                            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="true">Messages</a>--}}
{{--                            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>--}}
                        </div>
                    </div>

                    {{--  pills content --}}
                    <div class="col-10">


                        <div class="tab-content" id="v-pills-tabContent">
{{--                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">--}}


{{--                            </div>--}}
                            <div class="tab-pane fade active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            Profile summary
                                {{--Vue component--}}
                                <div class="mt-2 text-center">
                                    <b-button id="show-btn" @click="$bvModal.show('bv-modal-example')">Edit Profile</b-button>
                                    <modal-component
                                            :routes="{{ $routes }}"
                                            :data="{{ Auth::user()}}"
                                            :countries="{{\App\Country::get(['id','long_name'])}}"
                                    ></modal-component>
                                </div>

                                <div class="profile-work mt-4">
                                    <p>LINKS</p>
                                    {!!Auth::user()->website ?'<a href="'.Auth::user()->website.'">Website Link</a><br/>':''!!}
                                    {!!Auth::user()->facebook ?'<a href="'.Auth::user()->facebook.'">Facebook Link</a><br/>':''!!}
                                    {!!Auth::user()->linkedin ?'<a href="'.Auth::user()->website.'">Linkedin Link</a><br/>':''!!}
                                </div>

                                <p class="proile-rating">RANKINGS : <span>{!!Auth::user()->ranking ? Auth::user()->ranking .'/10':'<span class="text-secondary">Not rated yet<span>'!!}</span></p>

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

                            <div class="tab-pane fade" id="v-pills-recrutation" role="tabpanel" aria-labelledby="v-pills-recrutation-tab">

                                <div class="row">
                                    @if($recruitment->count())
                                        <table-component-profile
                                                :routes="{{ $routes }}"
                                                data="{{ $recruitment }}"
                                        >
                                        </table-component-profile>
                                    @else
                                        <p class="text-center">You have not submitted application yet</p>
                                    @endif
                                </div>

                            </div>
                            <div class="tab-pane fade" id="v-pills-timeline" role="tabpanel" aria-labelledby="v-pills-timeline-tab">

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
{{--                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>--}}
                        </div>
                    </div>
                    {{--  end pills content --}}

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
