@extends('layouts.root')

@section('meta_title')
    Profile
@stop

@section('meta_description')
    Profile
@stop


@section('content')

    <section class="profile-header" role="header">
        @php($path_avatar=public_path().'/img/profiles/'.Auth::user()->id.'/'.Auth::user()->avatar)
            <div class="d-flex justify-content-center align-items-center w-100 h-100">
                <div>
                    <div class="profile-img">

                            @if(Auth::user()->avatar && file_exists($path_avatar))
                                <img class="w-100" src="{{asset('img/profiles/'.Auth::user()->id.'/'.Auth::user()->avatar)}}" alt="avatar {{Auth::user()->name}}"/>
                            @else
                                <img class="w-100" src="{{asset('/img/no-avatar.png')}}" alt="avatar {{Auth::user()->name}}"/>
                            @endif

                                <div class="profile-update-avatar">
                                    <div v-b-modal.avatar-profile-header-modal><i class="fa fa-edit"></i></div>

                                    {{--Modal that changes avatar--}}
                                    <b-modal id="avatar-profile-header-modal">
                                            <avatar-component-profile
                                                    :routes="{{ $routes }}"
                                                    :id="{{Auth::user()->id}}"
                                            >
                                            </avatar-component-profile>

                                    </b-modal>
                                    {{--End modal that changes avatar--}}

                                </div>
                            </div>
                        <h5>
                            {{Auth::user()->first_name.' '.Auth::user()->last_name}}
                        </h5>
                        <h6>
                            {!!Auth::user()->position_name??'<p class="text-secondary">Position name<p>'!!}
                        </h6>
                    </div>
        </div>
    </section>
    <section>
        <div class="emp-profile">

                <div class="row no-gutters">
                    <div class="col-2 pills-col bg-secondary">
                        <div class="nav flex-column nav-pills justify-content-center align-items-center w-100 pt-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
{{--                            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>--}}
                            <a class="nav-link active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile">Profile</a>
                            <a class="nav-link" id="v-pills-recrutation-tab" data-toggle="pill" href="#v-pills-recrutation" role="tab" aria-controls="v-pills-recrutation">Recrutation</a>
                            <a class="nav-link" id="v-pills-timeline-tab" data-toggle="pill" href="#v-pills-timeline" role="tab" aria-controls="v-pills-timeline">Timeline</a>

{{--                            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="true">Messages</a>--}}
{{--                            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>--}}
                        </div>
                    </div>

                    {{--  pills content --}}
                    <div class="col-10">


                        <div class="tab-content" id="v-pills-tabContent">
{{--                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">--}}


{{--                            </div>--}}
                            <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
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
