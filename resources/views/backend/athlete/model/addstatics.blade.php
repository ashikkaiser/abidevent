<div class="modal fade" id="addNewStatics" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-simple modal-add-new-address">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h3 class="address-title">Add New Statics</h3>
                    {{-- <p class="address-subtitle">Add new address for express delivery</p> --}}
                </div>
                <form id="addNewStaticsForm" class="row " action="{{ route('student.manageStatics') }}"
                    method="POST">
                    @csrf
                    <input type="hidden" name="student_id" value="{{ $user->id }}">


                    <div class="row ">
                        <div class="col">
                            <div class="accordion" id="collapsibleSection">
                                <!-- Delivery Address -->
                                <div class="card accordion-item">
                                    <h2 class="accordion-header" id="headingPitchingStats">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapsePitchingStats" aria-expanded="true"
                                            aria-controls="collapsePitchingStats"> Pitching Stats </button>
                                    </h2>
                                    <div id="collapsePitchingStats" class="accordion-collapse collapse show"
                                        aria-labelledby="headingPitchingStats" data-bs-parent="#collapsibleSection">
                                        <div class="accordion-body">
                                            <div class="row g-3">

                                                <div class="col-md-4">
                                                    <label class="form-label" for="top_pitch_velocity">Top
                                                        pitch velocity</label>
                                                    <input type="text" name="top_pitch_velocity" id="top_pitch_velocity"
                                                        class="form-control" placeholder="Top pitch velocity"
                                                        value="{{ old('top_pitch_velocity') }}" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label" for="fb_range">FB
                                                        Range</label>
                                                    <input type="text" name="fb_range" id="fb_range"
                                                        class="form-control" placeholder="FB Range"
                                                        value="{{ old('fb_range') }}" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label" for="top_spin">Top
                                                        Spin</label>
                                                    <input type="text" name="top_spin" id="top_spin"
                                                        class="form-control" placeholder="Top Spin"
                                                        value="{{ old('top_spin') }}" />
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label" for="top_ch_velocity">Top CH
                                                        Velocity</label>
                                                    <input type="text" name="top_ch_velocity" id="top_ch_velocity"
                                                        class="form-control" placeholder="Top ch velocity"
                                                        value="{{ old('top_ch_velocity') }}" />
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label" for="top_ch_spin">Top Spin for CH
                                                        Velocity</label>
                                                    <input type="text" name="top_ch_spin"
                                                        value="{{ old('top_ch_spin') }}" id="top_ch_spin"
                                                        class="form-control" placeholder="Top Spin for CH Velocity" />
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label" for="top_cb_velocity">Top CB
                                                        Velocity</label>
                                                    <input type="text" name="top_cb_velocity" id="top_cb_velocity"
                                                        class="form-control" placeholder="Top cb velocity"
                                                        value="{{ old('top_cb_velocity') }}" />
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label" for="top_cb_spin">Top Spin
                                                        for CB Velocity</label>
                                                    <input type="text" name="top_cb_spin" id="top_cb_spin"
                                                        class="form-control" value="{{ old('top_cb_spin') }}"
                                                        placeholder="Top Spin for CB Velocity" />
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label" for="top_sl_velocity">Top SL
                                                        Velocity</label>
                                                    <input type="text" name="top_sl_velocity"
                                                        value="{{ old('top_sl_velocity') }}" id="top_sl_velocity"
                                                        class="form-control" placeholder="Top sl velocity" />
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label" for="top_sl_spin">Top Spin for SL
                                                        Velocity</label>
                                                    <input type="text" name="top_sl_spin" id="top_sl_spin"
                                                        class="form-control" value="{{ old('top_sl_spin') }}"
                                                        placeholder="Top Spin for SL  Velocity" />
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="form-label" for="top_ct_velocity">Top CT
                                                        Velocity</label>
                                                    <input type="text" name="top_ct_velocity"
                                                        value="{{ old('top_ct_velocity') }}" id="top_ct_velocity"
                                                        class="form-control" placeholder="Top CT Velocity" />
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label" for="top_ct_velocity">Top spin for
                                                        CT Velocity</label>
                                                    <input type="text" name="top_ct_spin" id="top_ct_spin"
                                                        value="{{ old('top_ct_spin') }}" class="form-control"
                                                        placeholder="Top ct velocity" />
                                                </div>


                                                <div class="col-md-3">
                                                    <label class="form-label" for="top_kn_velocity">Top KN
                                                        Velocity</label>
                                                    <input type="text" name="top_kn_velocity"
                                                        value="{{ old('top_kn_velocity') }}" id="top_kn_velocity"
                                                        class="form-control" placeholder="Top KN Velocity" />
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label" for="top_kn_spin">Top spin For KN
                                                        Velocity</label>
                                                    <input type="text" name="top_kn_spin"
                                                        value="{{ old('top_kn_spin') }}" id="top_kn_spin"
                                                        class="form-control" placeholder="Top spin For KN Velocity" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Delivery Options -->
                                <div class="card accordion-item">
                                    <h2 class="accordion-header" id="headingHittingStatus">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseHittingStatus"
                                            aria-expanded="false" aria-controls="collapseHittingStatus"> Hitting
                                            Status </button>
                                    </h2>
                                    <div id="collapseHittingStatus" class="accordion-collapse collapse"
                                        aria-labelledby="headingHittingStatus" data-bs-parent="#collapsibleSection">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="form-label" for="top_exit_velocity"> Top
                                                        Exit velocity</label>
                                                    <input type="text" name="top_exit_velocity" id="top_exit_velocity"
                                                        value="{{ old('top_exit_velocity') }}" class="form-control"
                                                        placeholder="Top exit velocity" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label" for="max_distance"> Max
                                                        Distance (FT)</label>
                                                    <input type="text" name="max_distance"
                                                        value="{{ old('max_distance') }}" id="max_distance"
                                                        class="form-control" placeholder="Max Distance (FT)" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label" for="avarage_distance"> Avarage
                                                        Distance (FT)</label>
                                                    <input type="text" name="avarage_distance"
                                                        value="{{ old('avarage_distance') }}" id="avarage_distance"
                                                        class="form-control" placeholder="Avarage Distance (FT)" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Payment Method -->
                                <div class="card accordion-item">
                                    <h2 class="accordion-header" id="headingPositionStatus">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapsePositionStatus"
                                            aria-expanded="false" aria-controls="collapsePositionStatus"> Position
                                            Status</button>
                                    </h2>
                                    <div id="collapsePositionStatus" class="accordion-collapse collapse"
                                        aria-labelledby="headingPositionStatus" data-bs-parent="#collapsibleSection">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="form-label" for="Inf_velocity"> Inf
                                                        Velocity</label>
                                                    <input type="text" name="inf_velocity"
                                                        value="{{ old('inf_velocity') }}" id="inf_velocity"
                                                        class="form-control" placeholder="Inf Velocity" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label" for="of_velocity"> Of
                                                        Velocity</label>
                                                    <input type="text" name="of_velocity"
                                                        value="{{ old('of_velocity') }}" id="of_velocity"
                                                        class="form-control" placeholder="Of Velocity" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label" for="c_pop">
                                                        C-pop</label>
                                                    <input type="text" name="c_pop" id="c_pop"
                                                        value="{{ old('c_pop') }}" class="form-control"
                                                        placeholder="C-pop" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card accordion-item">
                                    <h2 class="accordion-header" id="headingOthersStatus">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseOthersStatus"
                                            aria-expanded="false" aria-controls="collapseOthersStatus"> Others
                                            Status</button>
                                    </h2>
                                    <div id="collapseOthersStatus" class="accordion-collapse collapse"
                                        aria-labelledby="headingOthersStatus" data-bs-parent="#collapsibleSection">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="form-label" for="vertical_jump">
                                                        Vertical jump</label>
                                                    <input type="text" name="vertical_jump" id="vertical_jump"
                                                        value="{{ old('vertical_jump') }}" class="form-control"
                                                        placeholder="Top pitch velocity" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label" for="40yd_sprint_time"> 40yd
                                                        sprint time</label>
                                                    <input type="text" name="40yd_sprint_time" id="40yd_sprint_time"
                                                        value="{{ old('40yd_sprint_time') }}" class="form-control"
                                                        placeholder="40yd sprint time" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label" for="3d_resistance_score">
                                                        3d resistance score</label>
                                                    <input type="text" name="3d_resistance_score"
                                                        value="{{ old('3d_resistance_score') }}"
                                                        id="3d_resistance_score" class="form-control"
                                                        placeholder="3d resistance score" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card accordion-item">
                                    <h2 class="accordion-header" id="VideoStatus">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseVideoStatus"
                                            aria-expanded="false" aria-controls="collapseVideoStatus"> Video
                                            Status</button>
                                    </h2>
                                    <div id="collapseVideoStatus" class="accordion-collapse collapse"
                                        aria-labelledby="VideoStatus" data-bs-parent="#collapsibleSection">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <label class="form-label" for="velocity_video"> Velocity
                                                        /Pitch video link </label>
                                                    <input type="text" name="velocity_video" id="velocity_video"
                                                        value="{{ old('velocity_video') }}" class="form-control"
                                                        placeholder="Velocity /Pitch video link" />
                                                </div>
                                                <div class="col-md-5">
                                                    <label class="form-label" for="valo_video_date">Video date
                                                    </label>
                                                    <input type="text" id="flatpickr-datetime" name="valo_video_date"
                                                        class="form-control dob-picker" placeholder="YYYY-MM-DD" />
                                                </div>
                                                <div class="col-md-7">
                                                    <label class="form-label" for="velocity_video2"> Velocity
                                                        /Pitch video link 2
                                                    </label>
                                                    <input type="text" name="velocity_video2" id="velocity_video2"
                                                        value="{{ old('velocity_video2') }}" class="form-control"
                                                        placeholder="Velocity /Pitch video link 2" />
                                                </div>
                                                <div class="col-md-5">
                                                    <label class="form-label" for="valo_video_date2">Video date
                                                    </label>
                                                    <input type="text" id="valo_video_date2" name="valo_video_date2"
                                                        class="form-control dob-picker" placeholder="YYYY-MM-DD" />
                                                </div>

                                                <div class="col-md-7">
                                                    <label class="form-label" for="sprint_video"> Spint video
                                                        link: </label>
                                                    <input type="text" name="sprint_video" id="sprint_video"
                                                        value="{{ old('sprint_video') }}" class="form-control"
                                                        placeholder="Spint video link:" />
                                                </div>
                                                <div class="col-md-5">
                                                    <label class="form-label" for="multicol-last-name">It's
                                                        date </label>
                                                    <input type="text" name="sprint_video_date" id="sprint_video_date"
                                                        class="form-control dob-picker" placeholder="YYYY-MM-DD" />
                                                </div>

                                                <div class="col-md-7">
                                                    <label class="form-label" for="jump_video_link"> Jump video
                                                        link: </label>
                                                    <input type="text" name="jump_video_link" id="jump_video_link"
                                                        value="{{ old('jump_video_link') }}" class="  form-control"
                                                        placeholder="Jump video link:" />
                                                </div>
                                                <div class="col-md-5">
                                                    <label class="form-label" for="jump_video_link_date">It's
                                                        date </label>
                                                    <input type="text" name="jump_video_link_date"
                                                        id="jump_video_link_date"
                                                        value="{{ old('jump_video_link_date') }}"
                                                        class=" form-control dob-picker" placeholder="YYYY-MM-DD" />
                                                </div>


                                                <div class="col-md-7">
                                                    <label class="form-label" for="hitting_video"> Hitting
                                                        video link </label>
                                                    <input type="text" id="hitting_video" name="hitting_video"
                                                        value="{{ old('hitting_video') }}" class="form-control"
                                                        placeholder="Hitting vide link" />
                                                </div>
                                                <div class="col-md-5">
                                                    <label class="form-label" for="hitting_video_date">It's
                                                        date </label>
                                                    <input type="text" name="hitting_video_date" id="hitting_video_date"
                                                        value="{{ old('hitting_video_date') }}"
                                                        class="form-control dob-picker" placeholder="YYYY-MM-DD" />
                                                </div>

                                                <div class="col-md-7">
                                                    <label class="form-label" for="resistance_video">
                                                        Resistance video link </label>
                                                    <input type="text" name="resistance_video" id="resistance_video"
                                                        class="form-control" value="{{ old('resistance_video') }}"
                                                        placeholder="Resistance video link " />
                                                </div>
                                                <div class="col-md-5">
                                                    <label class="form-label" for="resistance_video_date">It's
                                                        date </label>
                                                    <input type="text" name="resistance_video_date"
                                                        id="resistance_video_date"
                                                        value="{{ old('resistance_video_date') }}"
                                                        class="form-control dob-picker" placeholder="YYYY-MM-DD" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>





                    <div class="col-12 text-center mt-4">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                            aria-label="Close">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
