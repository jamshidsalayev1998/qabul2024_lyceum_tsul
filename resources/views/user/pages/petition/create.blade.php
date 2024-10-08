@extends('admin.layouts.master_new')

@section('content')
    <style>
        .hidden_document {
            display: none;
        }
    </style>
    @php   $locale = App::getLocale(); $name_l = 'name_'.$locale;@endphp

    <div class="container pt-5">
        {{--        <div class="form_one mt-5 pt-5">--}}
        {{--            <div class="top">--}}
        {{--                <b>@lang('other.PERSONAL INFORMATION')</b>--}}
        {{--            </div>--}}
        {{--            <div class="row text-center" style="text-align: center !important;">--}}
        {{--                <h3 style="text-align: center !important;">Qabul muddati tugadi!</h3>--}}
        {{--            </div>--}}
        {{--        </div>--}}

        <form method="post" action="{{ route('petition.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form_one">
                <div class="top">
                    <b>@lang('other.PERSONAL INFORMATION')</b>
                </div>
                <div class="row">
                    <div class="col-md-6 bor_right">
                        <div class="divinput">
                            <h2>@lang('petition.First name') <span class="color-red">*</span> <b
                                    id="first_name_error">@error('first_name')
                                    ! {{ $message }} @enderror</b></h2>
                            <input required="tt" id="first_name" type="text" name="first_name" class="latyn"
                                   value="{{ old('first_name') }}" placeholder="@lang('petition.Example - Azizbek')">
                        </div>

                        <div class="divinput">
                            <h2>@lang('petition.Last name') <span class="color-red">*</span> <b
                                    id="last_name_error">@error('last_name')
                                    ! {{ $message }} @enderror</b></h2>
                            <input type="text" id="lastname" required="tt" class="latyn" name="last_name"
                                   value="{{ old('last_name') }}" placeholder="@lang('petition.Example - Ismoilov')">
                        </div>

                        <div class="divinput">
                            <h2>@lang('petition.Father`s name') <span class="color-red">*</span> <b
                                    id="middle_name_error">@error('middle_name')
                                    ! {{ $message }} @enderror</b></h2>
                            <input required="tt" id="middle_name" type="text" class="latyn" name="middle_name"
                                   value="{{ old('middle_name') }}"
                                   placeholder="@lang('petition.Example - Alisher o`g`li')">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="divinput">
                            <h2>@lang('petition.Gender') <span class="color-red">*</span> <b></b></h2>
                            <div class="all_radio ">
                                <div class="radio male">
                                    <input type="radio" name="gender" @if(!old('gender') || old('gender') == 1) checked
                                           @endif  value="1"><b class="male">@lang('petition.Male')</b>
                                </div>
                                <div class="radio female">
                                    <input type="radio" name="gender" @if(old('gender') == 0) checked=""
                                           @endif value="0"><b class="female">@lang('petition.Female')</b>
                                </div>
                            </div>
                        </div>

                        <div class="divinput">
                            <h2>@lang('petition.Date of birth') <span class="color-red">*</span> <b
                                    id="birth_date_error">@error('birth_date')
                                    ! {{ $message }} @enderror</b></h2>
                            <div class="date_input">
        								<span>
        									<img src="{{ asset('newdesign/img/icondate.png') }}" alt="">
        								</span>
                                <input type="date" required="tt" id="birth_date" name="birth_date"
                                       value="{{ old('birth_date') }}">
                            </div>
                        </div>
                    </div>
{{--                                        <div class="col-md-5">--}}
{{--                                            <div class="img_upload">--}}
{{--                                                <div class="left">--}}
{{--                                                    <div class="divinput">--}}
{{--                                                        <h2 class="sc_img">@lang('petition.Upload photo 3x4') <span--}}
{{--                                                                class="color-red">*</span> <b>@error('image')--}}
{{--                                                                ! {{ $message }} @enderror</b></h2>--}}
{{--                                                        <div class="chose_file upload-button ">--}}
{{--                                                            <b>@lang('petition.Choose file')</b>--}}
{{--                                                        </div>--}}
{{--                                                        <input type="file" id="image_doc" accept="image/x-png,image/jpeg" name="image"--}}
{{--                                                               class="file-upload" hidden>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="right">--}}
{{--                                                    <div class="img">--}}
{{--                                                        <img src="" class="profile-pic">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                </div>
            </div>

{{--            <div class="form_one">--}}
{{--                <div class="top">--}}
{{--                    <b>@lang('petition.Permanent Residence Information')</b>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-6 bor_right">--}}
{{--                        <div class="divinput">--}}
{{--                            <h2>@lang('petition.Country') <span class="color-red">*</span> <b--}}
{{--                                    id="country_error">@error('country')--}}
{{--                                    ! {{ $message }} @enderror</b></h2>--}}
{{--                            <select class="form-control" id="country" name="country_id">--}}
{{--                                <option value="">--------</option>--}}
{{--                                @foreach($country as $item)--}}
{{--                                    <option @if(old('country_id') == $item->id )   selected--}}
{{--                                            @endif value="{{ $item->id }}">{{ $item->$name_l }}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}

{{--                        <div class="divinput">--}}
{{--                            <h2>@lang('petition.Region Of Permanent Residence') <span class="color-red">*</span> <b--}}
{{--                                    id="country_region_error">@error('region_id')! {{ $message }} @enderror</b></h2>--}}
{{--                            <select class="form-control" name="region_id" id="country_region">--}}
{{--                                @if(old('country_id'))--}}
{{--                                    @php $regions = 'App\Region'::where('country_id' , old('country_id'))->get() @endphp--}}
{{--                                    <option value="">-----</option>--}}
{{--                                    @foreach($regions as $item)--}}
{{--                                        <option @if(old('region_id') == $item->id) selected--}}
{{--                                                @endif value="{{ $item->id }}">{{ $item->$name_l }}</option>--}}
{{--                                    @endforeach--}}
{{--                                @endif--}}
{{--                            </select>--}}
{{--                        </div>--}}

{{--                        <div class="divinput">--}}
{{--                            <h2>@lang('petition.City Of Permanent Residence') <span class="color-red">*</span> <b--}}
{{--                                    id="country_region_area_error">@error('area_id')! {{ $message }} @enderror</b>--}}
{{--                            </h2>--}}
{{--                            <select class="form-control" name="area_id" id="country_region_area">--}}
{{--                                @if(old('region_id'))--}}
{{--                                    @php $regions = 'App\Area'::where('region_id' , old('region_id'))->get() @endphp--}}
{{--                                    <option value="">-----</option>--}}
{{--                                    @foreach($regions as $item)--}}
{{--                                        <option @if(old('area_id') == $item->id) selected--}}
{{--                                                @endif value="{{ $item->id }}">{{ $item->$name_l }}</option>--}}
{{--                                    @endforeach--}}
{{--                                @endif--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-6">--}}
{{--                        <div class="divinput">--}}
{{--                            <h2>@lang('petition.Address') <span class="color-red">*</span> <b--}}
{{--                                    id="address_error">@error('address')--}}
{{--                                    ! {{ $message }} @enderror</b></h2>--}}
{{--                            <input type="text" id="latyn_address" name="address" value="{{ old('address') }}"--}}
{{--                                   class="address">--}}
{{--                        </div>--}}

{{--                        <div class="divinput">--}}
{{--                            <h2>@lang('petition.Citizenship') <span class="color-red">*</span> <b>@error('citizenship')--}}
{{--                                    ! {{ $message }} @enderror</b>--}}
{{--                            </h2>--}}
{{--                            <input type="text" class="latyn" name="citizenship" value="{{ old('citizenship') }}"--}}
{{--                                   class="citizenship" placeholder="@lang('petition.Example - Uzbekistan')">--}}
{{--                        </div>--}}

{{--                        <div class="divinput">--}}
{{--                            <h2>@lang('petition.Nationality') <span class="color-red">*</span> <b>@error('nationality')--}}
{{--                                    ! {{ $message }} @enderror</b>--}}
{{--                            </h2>--}}
{{--                            <input type="text" class="latyn" name="nationality" value="{{ old('nationality') }}"--}}
{{--                                   placeholder="@lang('petition.Example - Uzbek')">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

            <div class="form_one">
                <div class="top">
                    <b>@lang('petition.Passport Information')</b>
                </div>
                <div class="row">
                    <div class="col-md-6 bor_right">
                        <div class="divinput">
                            <h2>@lang('petition.Passport seria and number') <span class="color-red">*</span>
                                <b>@error('passport_seria')
                                    ! {{ $message }} @enderror</b></h2>
                            <input type="text" onkeydown="this.value = this.value.toUpperCase();" name="passport_seria"
                                   value="{{ old('passport_seria') }}"
                                   placeholder="@lang('petition.Example - AA1234567')" id="passport_seria">
                        </div>
                        <div class="divinput">
                            <h2>@lang('petition.Passport berilgan joy') <span class="color-red">*</span>
                                <b>@error('passport_given_place')
                                    ! {{ $message }} @enderror</b></h2>
                            <input type="text" onkeydown="this.value = this.value.toUpperCase();"
                                   name="passport_given_place"
                                   value="{{ old('passport_given_place') }}"
                                   placeholder="" id="passport_given_place">
                        </div>
                        <div class="divinput">
                            <h2>@lang('petition.Upload passport copy (Upload only the main page)') <span
                                    class="color-red">*</span>
                                <b>@error('passport_image')! {{ $message }} @enderror</b></h2>
                            <div class="chose_file upload-button2">
                                <b>@lang('petition.Choose file')</b>
                            </div>
                            <input type="file" class="file-upload2" hidden id="image_pass"
                                   accept="image/x-png,image/jpeg,application/pdf" name="passport_image">
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="img_all">
                            <div class="big_img">
                                <iframe id="iframePdf" style="display: block; width: 100%; height: auto" src=""
                                        class="profile-pic2-pdf" src=""></iframe>
                                <img src="" class="profile-pic2" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form_one">
                <div class="top">
                    <b>@lang('petition.Contact Information')</b>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="divinput">
                            <h2>@lang('petition.Telefon raqam') <span class="color-red">*</span>
                                <b>@error('mobile_phone')
                                    ! {{ $message }} @enderror</b></h2>
                            <input type="text" class="phone_mask" disabled value="{{Auth::user()->email}}">
                        </div>
                        <div class="divinput">
                            <h2>@lang('petition.Qoshimcha telefon raqam') <b>@error('home_phone')
                                    ! {{ $message }} @enderror</b></h2>
                            <input type="text" class="phone_mask" name="home_phone" value="{{ old('home_phone') }}">
                        </div>


                    </div>
                    <div class="col-md-4">
                        <div class="divinput">
                            <h2>@lang('petition.Father`s phone number') <b>@error('father_phone')
                                    ! {{ $message }} @enderror</b></h2>
                            <input type="text" class="phone_mask" name="father_phone" value="{{ old('father_phone') }}">
                        </div>

                        <div class="divinput">
                            <h2>@lang('petition.Mother`s phone number') <b>@error('mother_phone')
                                    ! {{ $message }} @enderror</b></h2>
                            <input type="text" class="phone_mask" name="mother_phone" value="{{ old('mother_phone') }}">
                        </div>

                    </div>
                </div>
            </div>


            <div class="form_one">
                <div class="top">
                    <b>@lang('petition.High School (College Information)')</b>
                </div>
                <div class="row">
                    <div class="col-md-6 bor_right">
                        <div class="divinput">
                            <h2>@lang('petition.Name of school or number') <span class="color-red">*</span>
                                <b>@error('school')
                                    ! {{ $message }} @enderror</b></h2>
                            <input type="text" class="latyn_address" name="school" value="{{ old('school') }}">
                        </div>

                        <div class="divinput">
                            <h2>@lang('petition.Type school') <span class="color-red">*</span> <b>@error('type_school')
                                    ! {{ $message }} @enderror</b>
                            </h2>
                            <select class="form-control" name="type_school">
                                @foreach($typeschool as $item)
                                    <option @if(old('type_school') == $item->id) selected
                                            @endif value="{{ $item->id }}">{{ $item->$name_l }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="divinput">
                            <h2>@lang('petition.Select graduation date') <span class="color-red">*</span>
                                <b>@error('graduation_date')
                                    ! {{ $message }} @enderror</b></h2>
                            <select class="form-control" name="graduation_date">
                                @for($i = date('Y'); $i > date('Y')-2 ; $i--)
                                    <option @if(old('graduation_date') == $i) selected
                                            @endif value="{{ $i }}">{{ $i }}</option>
                                @endfor

                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="divinput">
                            <h2>@lang('petition.Diploma number') <span class="color-red">*</span>
                                <b>@error('diplom_number')
                                    ! {{ $message }} @enderror</b></h2>
                            <input type="text" class="latyn_address" name="diplom_number"
                                   value="{{ old('diplom_number') }}"
                                   placeholder="@lang('petition.Example - K1234567')">
                        </div>
{{--                        <div class="divinput">--}}
{{--                            <h2>@lang('petition.Imtiyozli diplom') <span class="color-red">*</span>--}}
{{--                                <b>@error('privileged_diploma')--}}
{{--                                    ! {{ $message }} @enderror</b></h2>--}}
{{--                            <select name="privileged_diploma" class="form-control" id="">--}}
{{--                                <option @if(old('privileged_diploma') == 0) selected @endif value="0">Yo'q</option>--}}
{{--                                <option @if(old('privileged_diploma') == 1) selected @endif value="1">Ha</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}

                    </div>


                    <div class="col-md-3">
                        <div class="divinput">
                            <h2>@lang('petition.Upload Diploma (Upload only diploma)') <span class="color-red">*</span>
                                <b>@error('diplom_image')
                                    ! {{ $message }} @enderror</b></h2>
                            <div class="chose_file upload-button3">
                                <b>@lang('petition.Choose file')</b>
                            </div>
                            <input type="file" class="file-upload3" hidden id="image_dip"
                                   accept="image/x-png,image/jpeg,application/pdf" name="diplom_image">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="big_img2">
                            <img src="" class="profile-pic3" alt="">
                            <iframe id="iframePdf" style="display: block; width: 100%; height: auto" src=""
                                    class="profile-pic3-pdf" src=""></iframe>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="divinput">
                            <h2>@lang('petition.Upload Diploma application (Upload only diploma application)') <span
                                    class="color-red">*</span> <b>@error('diplom_image_app')
                                    ! {{ $message }} @enderror</b></h2>
                            <div class="chose_file upload-button6">
                                <b>@lang('petition.Choose file')</b>
                            </div>
                            <input type="file" class="file-upload6" hidden id="image_dip_app"
                                   accept="image/x-png,image/jpeg,application/pdf" name="diplom_image_app">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="big_img2">
                            <img src="" class="profile-pic6" alt="">
                            <iframe id="iframePdf" style="display: block; width: 100%; height: auto" src=""
                                    class="profile-pic6-pdf" src=""></iframe>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form_one">
                <div class="top">
                    <b>@lang('petition.English Proficiency Information')</b>
                </div>
                <div class="row">
                    <div class="col-md-4 bor_right">

                        <div class="divinput">
                            <h2>@lang('petition.English degree') <b>@error('english_degree')
                                    ! {{ $message }} @enderror</b></h2>
                            <select class="form-control" name="english_degree">
                                @foreach($endegree as $item)
                                    <option @if(old('endegree') == $item) selected
                                            @endif value="{{ $item->id }}">{{ $item->$name_l }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="divinput">
                            <h2>@lang('petition.Overall band score')</h2>
                            <input type="text" style="width: 100px !important;" class="latyn_address"
                                   name="overall_score_english" value="{{ old('overall_score_english') }}">
                        </div>

                        <div class="divinput">
                            <h2>@lang('petition.IELTS Test Report Form Number (only if IELTS)')</h2>
                            <input type="text" class="latyn_address" name="ilts_number"
                                   value="{{ old('ilts_number') }}">
                        </div>


                    </div>
                    <div class="col-md-4">
                        <div class="divinput">
                            <h2>@lang('petition.Upload test report copy') </h2>
                            <div class="chose_file upload-button4">
                                <b>@lang('petition.Choose file')</b>
                            </div>
                            <input type="file" class="file-upload4" hidden id="image_eng"
                                   accept="image/x-png,image/jpeg,application/pdf" name="english_image">
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="big_img2">
                            <img src="" class="profile-pic4" alt="">
                            <iframe id="iframePdf" style="display: block; width: 100%; height: auto" src=""
                                    class="profile-pic4-pdf" src=""></iframe>

                        </div>
                    </div>
                </div>
            </div>

            <div class="form_one">
                <div class="top">
                    <b>@lang('petition.Faculty Selection')</b>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="divinput">
                            <h2>@lang('petition.Talim tashkilotini tanlang') <span class="color-red">*</span>
                                <b>@error('high_school_id')
                                    ! {{ $message }} @enderror</b></h2>
                            <select class="form-control" id="high_school" name="high_school_id" style="width: 100%;">
                                <option value="">-----</option>
                                @foreach($high_schools as $item)
                                    <option @if(old('high_school_id') == $item->id) selected
                                            @endif value="{{ $item->id }}">{{ $item->$name_l }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="divinput">
                            <h2>@lang('petition.Select faculty') <span class="color-red">*</span>
                                <b>@error('faculty_id')! {{ $message }} @enderror</b>
                            </h2>
                            <select class="form-control" id="faculty" name="faculty_id" style="width: 100%;">
                                <option value="">-----</option>
                                @foreach($faculties as $item)
                                    <option @if(old('faculty_id') == $item->id) selected
                                            @endif value="{{ $item->id }}">{{ $item->$name_l }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="divinput">
                            <h2>@lang('petition.Type of Education') <span class="color-red">*</span>
                                <b>@error('type_education_id')
                                    ! {{ $message }} @enderror</b></h2>
                            <select class="form-control" id="faculty_type_edu" name="type_education_id"
                                    style="width: 100%;">
                                @foreach($edutypes as $item)
                                    <option @if(old('type_education_id') == $item) selected
                                            @endif value="{{ $item->id }}">{{ $item->$name_l }}</option>
                                @endforeach
                                @if(old('faculty_id'))
                                    @php $ar = 'App\FacultyTypeEdu'::where('faculty_id' , old('faculty_id'))->pluck('type_education_id'); $regions = 'App\Edutype'::whereIn('id' , $ar)->get(); @endphp
                                    @foreach($regions as $item)
                                        <option @if(old('type_education_id') == $item->id) selected
                                                @endif value="{{ $item->id }}">{{ $item->$name_l }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="divinput">
                            <h2>@lang('petition.Language of further education') <span class="color-red">*</span>
                                <b>@error('type_language_id')
                                    ! {{ $message }} @enderror</b></h2>
                            <select class="form-control" id="faculty_type_lang" name="type_language_id"
                                    style="width: 100%;">
                                @foreach($languagetype as $item)
                                    <option @if(old('type_language_id') == $item) selected
                                            @endif value="{{ $item->id }}">{{ $item->$name_l }}</option>
                                @endforeach
                                @if(old('faculty_id'))
                                    @php $ar = 'App\FacultyTypeLang'::where('faculty_id' , old('faculty_id'))->pluck('type_language_id'); $regions = 'App\Languagetype'::whereIn('id' , $ar)->get(); @endphp
                                    @foreach($regions as $item)
                                        <option @if(old('type_language_id') == $item->id) selected
                                                @endif value="{{ $item->id }}">{{ $item->$name_l }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="divinput">
                            <h2>@lang('petition.Faculties') <span class="color-red">*</span>
                                <b>@error('direction_id')
                                    ! {{ $message }} @enderror</b></h2>
                            <select class="form-control" id="direction_id" name="direction_id"
                                    style="width: 100%;">
                                @foreach($directions as $direction)
                                    <option @if(old('direction_id') == $direction->id) selected
                                            @endif value="{{ $direction->id }}">{{ $direction->$name_l }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="divinput">
                            <h2>@lang('petition.Tavfsiyanoma nusxasi') <b>@error('recommendation')
                                    ! {{ @message }} @enderror</b></h2>
                            <div class="col-md-6">
                                <div class="divinput">
                                    <h2>@lang('petition.Tavsiyanoma nusxasini yuklang') </h2>
                                    <div class="chose_file upload-button5">
                                        <b>@lang('petition.Choose file')</b>
                                    </div>
                                    <input type="file" class="file-upload5" hidden id="image_recommendation"
                                           accept="image/x-png,image/jpeg,application/pdf" name="image_recommendation">
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="big_img2">
                                    <img src="" class="profile-pic5" alt="">
                                    <iframe id="iframePdf" style="display: block; width: 100%; height: auto" src=""
                                            class="profile-pic5-pdf" src=""></iframe>

                                </div>
                            </div>
                        </div>

                    </div>
{{--                    <div class="col-md-6">--}}
{{--                        <div class="divinput">--}}
{{--                            <h2>@lang('petition.Mehnat daftarchasi (magistrlar uchun)') <b>@error('workbook')--}}
{{--                                    ! {{ @message }} @enderror</b></h2>--}}
{{--                            <div class="col-md-6">--}}
{{--                                <div class="divinput">--}}
{{--                                    <h2>@lang('petition.Mehnat daftarchasi nusxasini yuklang') </h2>--}}
{{--                                    <div class="chose_file upload-button7">--}}
{{--                                        <b>@lang('petition.Choose file')</b>--}}
{{--                                    </div>--}}
{{--                                    <input type="file" class="file-upload7" hidden id="workbook"--}}
{{--                                           accept="image/x-png,image/jpeg,application/pdf" name="workbook">--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                            <div class="col-md-12">--}}
{{--                                <div class="big_img2">--}}
{{--                                    <img src="" class="profile-pic7" alt="">--}}
{{--                                    <iframe id="iframePdf" style="display: block; width: 100%; height: auto" src=""--}}
{{--                                            class="profile-pic7-pdf" src=""></iframe>--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="divinput">--}}
{{--                            <h2>@lang('petition.Disability status') <b>@error('disability_status_id')--}}
{{--                                    ! {{ @message }} @enderror</b></h2>--}}
{{--                            <select class="form-control" name="disability_status_id" style="width: 100%;">--}}
{{--                                @foreach($disability as $item)--}}

{{--                                    <option @if(old('disability_status_id') == $item) selected--}}
{{--                                            @endif @if($item->name_en == 'No') selected--}}
{{--                                            @endif value="{{ $item->id }}">{{ $item->$name_l }}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}

{{--                        <div class="divinput">--}}
{{--                            <h2>@lang('petition.Disability description') <b>@error('disability_description')--}}
{{--                                    ! {{ @message }} @enderror</b></h2>--}}
{{--                            <textarea class="latyn_address fluid" name="disability_description" cols="30"--}}
{{--                                      rows="10">{{ old('disability_description') }}</textarea>--}}
{{--                        </div>--}}
{{--                        <div class="divinput">--}}
{{--                            <h2>@lang('petition.olympics') <b>@error('olympics')--}}
{{--                                    ! {{ @message }} @enderror</b></h2>--}}
{{--                            <input class="form-control input_requireds" name="olympics">--}}
{{--                        </div>--}}
{{--                    </div>--}}

                </div>
            </div>
{{--            <div class="form_one">--}}
{{--                <div class="top">--}}
{{--                    <b>@lang('petition.Qo`shimcha hujjarlar')</b>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-12 conversation_language_div">--}}
{{--                        <div class="divinput">--}}
{{--                            <h2>@lang('petition.Suhbat tili') <b>@error('conversation_language')--}}
{{--                                    ! {{ @message }} @enderror</b></h2>--}}
{{--                            <select class="form-control" name="conversation_language" style="width: 100%;">--}}
{{--                                <option value="1">O'zbek tilida</option>--}}
{{--                                <option value="2">Rus tilida</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-12">--}}
{{--                        <div class="divinput punkt" style="display: none">--}}
{{--                            <h2>@lang('petition.Punkt') <b>@error('punkt')--}}
{{--                                    ! {{ @message }} @enderror</b></h2>--}}
{{--                            <div class="form-group d-flex">--}}
{{--                                <input type="radio" style="opacity: 1;position: relative;width: 25px" id="punkt1"--}}
{{--                                       name="punkt" value="1">--}}
{{--                                <label for="punkt1" class="clickPunkt">“yurisprudensiya” ta’lim yo‘nalishi bo‘yicha--}}
{{--                                    bakalavriatni “imtiyozli”--}}
{{--                                    diplom bilan tugatgan bitiruvchilar hamda bazaviy oliy yuridik ma’lumotga ega,--}}
{{--                                    yuridik texnikumlar va TDYU huzuridagi akademik litseyda kamida uch yil ishlagan--}}
{{--                                    pedagog va rahbar xodimlar uchun.</label>--}}
{{--                            </div>--}}
{{--                            <div class="form-group d-flex">--}}
{{--                                <input type="radio" style="opacity: 1;position: relative;width: 40px" id="punkt2"--}}
{{--                                       name="punkt" value="2">--}}
{{--                                <label for="punkt2" class="clickPunkt">tegishli davlat organi birinchi rahbarining--}}
{{--                                    tavsiyasi asosida bazaviy--}}
{{--                                    oliy yuridik ma’lumot hamda davlat hokimiyati va boshqaruvining markaziy organlarida--}}
{{--                                    yuridik mutaxassislik bo‘yicha kamida besh yil ish stajiga ega bo‘lgan rahbar--}}
{{--                                    xodimlar hamda bazaviy oliy yuridik ma’lumotga ega, yuridik texnikumlar va TDYU--}}
{{--                                    huzuridagi akademik litseyda kamida uch yil ishlagan pedagog va rahbar xodimlar--}}
{{--                                    uchun.</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="divinput punkt" style="display: none">--}}
{{--                            <h2>@lang('petition.Ish faoliyati') <b>@error('labor_activity')--}}
{{--                                    ! {{ @message }} @enderror</b></h2>--}}
{{--                            <input type="text" name="labor_activity">--}}
{{--                        </div>--}}
{{--                        <div class="divinput forpunkt2" style="display: none">--}}
{{--                            <input type="checkbox" id="uio" style="opacity: 1; position: relative" >--}}
{{--                            <label for="uio">@lang('petition.3 yil ishlash majburiyati') <b></b></label>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-6 bor_right">--}}
{{--                        <div class="divinput document_input en_passport_copy_translate hidden_document">--}}
{{--                            <h2>@lang('petition.Passport tarjima') <b>@error('passport_copy_translate')--}}
{{--                                    ! {{ @message }} @enderror</b></h2>--}}
{{--                            <input type="file" accept="application/pdf" class="form-control input_requireds"--}}
{{--                                   name="passport_copy_translate">--}}
{{--                        </div>--}}
{{--                        <div class="divinput document_input en_birth_certificate_copy hidden_document">--}}
{{--                            <h2>@lang('petition.Tugilganlik haqida guvohnoma') <b>@error('birth_certificate_copy')--}}
{{--                                    ! {{ @message }} @enderror</b></h2>--}}
{{--                            <input type="file" accept="application/pdf" class="form-control input_requireds"--}}
{{--                                   name="birth_certificate_copy">--}}
{{--                        </div>--}}
{{--                        <div class="divinput document_input en_birth_certificate_copy_translate hidden_document">--}}
{{--                            <h2>@lang('petition.Tugilganlik haqida guvohnoma tarjimasi')--}}
{{--                                <b>@error('birth_certificate_copy_translate')--}}
{{--                                    ! {{ @message }} @enderror</b></h2>--}}
{{--                            <input type="file" accept="application/pdf" class="form-control input_requireds"--}}
{{--                                   name="birth_certificate_copy_translate">--}}
{{--                        </div>--}}
{{--                        <div class="divinput document_input en_edu_document_copy_translate hidden_document">--}}
{{--                            <h2>@lang('petition.Talim haqida hujjat tarjima')--}}
{{--                                <b>@error('birth_certificate_copy_translate')--}}
{{--                                    ! {{ @message }} @enderror</b></h2>--}}
{{--                            <input type="file" accept="application/pdf" class="form-control input_requireds"--}}
{{--                                   name="edu_document_copy_translate">--}}
{{--                        </div>--}}
{{--                        <div class="divinput document_input en_med_form_copy_086 hidden_document">--}}
{{--                            <h2>@lang('petition.086 tibbiyot malumotnomasi') <b>@error('med_form_copy_086')--}}
{{--                                    ! {{ @message }} @enderror</b></h2>--}}
{{--                            <input type="file" accept="application/pdf" class="form-control input_requireds"--}}
{{--                                   name="med_form_copy_086">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-6">--}}

{{--                        <div class="divinput document_input en_med_form_copy_086_translate hidden_document">--}}
{{--                            <h2>@lang('petition.086 tibbiyot malumotnomasi tarjima')--}}
{{--                                <b>@error('med_form_copy_086_translate')--}}
{{--                                    ! {{ @message }} @enderror</b></h2>--}}
{{--                            <input type="file" accept="application/pdf" class="form-control input_requireds"--}}
{{--                                   name="med_form_copy_086_translate">--}}
{{--                        </div>--}}
{{--                        <div class="divinput document_input en_vich_copy hidden_document">--}}
{{--                            <h2>@lang('petition.OIV infektsiyasi yo`qligi to`g`risidagi guvohnoma')--}}
{{--                                <b>@error('vich_copy')--}}
{{--                                    ! {{ @message }} @enderror</b></h2>--}}
{{--                            <input type="file" accept="application/pdf" class="form-control input_requireds"--}}
{{--                                   name="vich_copy">--}}
{{--                        </div>--}}
{{--                        <div class="divinput document_input en_vich_copy_translate hidden_document">--}}
{{--                            <h2>@lang('petition.OIV infektsiyasi yo`qligi to`g`risidagi guvohnoma tarjima')--}}
{{--                                <b>@error('vich_copy_translate')--}}
{{--                                    ! {{ @message }} @enderror</b></h2>--}}
{{--                            <input type="file" accept="application/pdf" class="form-control input_requireds"--}}
{{--                                   name="vich_copy_translate">--}}
{{--                        </div>--}}
{{--                        <div class="divinput document_input en_med_form_copy_063 hidden_document">--}}
{{--                            <h2>@lang('petition.063 tibbiyot malumotnomasi') <b>@error('med_form_copy_063')--}}
{{--                                    ! {{ @message }} @enderror</b></h2>--}}
{{--                            <input type="file" accept="application/pdf" class="form-control input_requireds"--}}
{{--                                   name="med_form_copy_063">--}}
{{--                        </div>--}}
{{--                        <div class="divinput document_input en_med_form_copy_063_translate hidden_document">--}}
{{--                            <h2>@lang('petition.063 tibbiyot malumotnomasi tarjima')--}}
{{--                                <b>@error('med_form_copy_063_translate')--}}
{{--                                    ! {{ @message }} @enderror</b></h2>--}}
{{--                            <input type="file" accept="application/pdf" class="form-control input_requireds"--}}
{{--                                   name="med_form_copy_063_translate">--}}
{{--                        </div>--}}

{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
            <div class="send">
                <button type="submit" class="send_btn">@lang('petition.Send')</button>
            </div>

        </form>
    </div>

@endsection


@section('js')
    <script type="text/javascript">

        var notf = "@lang('petition.Please select file size smaller from 4Mb')";
        $(document).ready(function () {
            $('#image_doc').bind('change', function () {
                var a = (this.files[0].size);
                // alert(a);
                if (a > 4000000) {
                    alert(notf);
                    $(this).val('');
                }
                ;
            });
            $('#image_pass').bind('change', function () {
                var a = (this.files[0].size);
                // alert(a);
                if (a > 4000000) {
                    alert(notf);
                    $(this).val('');
                }
                ;
            });
            $('#image_dip').bind('change', function () {
                var a = (this.files[0].size);
                // alert(a);
                if (a > 4000000) {
                    alert(notf);
                    $(this).val('');
                }
                ;
            });
            $('#image_eng').bind('change', function () {
                var a = (this.files[0].size);
                // alert(a);
                if (a > 4000000) {
                    alert(notf);
                    $(this).val('');
                }
                ;
            });
            $('.jonatish').click(function () {
                var ad = $('.address').val();
                var bd = $('#birth_date').val();
                var c = $('#country').val();
                var mn = $('#middle_name').val();
                var ln = $('#last_name').val();
                var fn = $('#first_name').val();
                var r = $('#country_region').val();
                var a = $('#country_region_area').val();
                var xatoc = '@lang('petition.Davlatlardan birini tanlang')';
                var xatoa = '@lang('petition.Tumanlardan  birini tanlang')';
                var xator = '@lang('petition.Viloyatlardan birini tanlang')';
                var xatot = '@lang('petition.Malumotlarni kiriting')';
                // alert(r);
                if (c == "" || c == null) {
                    $('#country_error').html(xatoc);
                }
                if (r == "" || r == null) {
                    $('#country_region_error').html(xator);
                }
                if (a == "" || a == null) {
                    $('#country_region_area_error').html(xatoa);
                }
                if (ln == "" || ln == null) {
                    $('#last_name_error').html(xatot);

                }
                if (mn == "" || mn == null) {
                    $('#middle_name_error').html(xatot);

                }
                if (fn == "" || fn == null) {
                    $('#first_name_error').html(xatot);

                }
                if (bd == "" || bd == null) {
                    $('#birth_date_error').html(xatot);

                }
                // if (ad == "" || ad == null) {
                // 	$('#address_error').html(xatot);

                // }


            });
        });

        $('.send_btn').click(function () {
            // if ($('input[name="image"]').get(0).files.length === 0) {
            // 	alert(@lang('petition.Upload photo 3x4') );
            // 	$([document.documentElement, document.body]).animate({
            //         scrollTop: $(".sc_img").offset().top
            //     }, 1000);
            // }
        });

        $('.male').click(function () {
            $('.male input').prop('checked', true);
        });
        $('.female').click(function () {
            $('.female input').prop('checked', true);
        });


    </script>
    <script type="text/javascript">
         $('#punkt2').change(function () {
            if ($(this).is(':checked')) {
                $('.forpunkt2').css({
                    'display': 'block'
                })
            }

        })
         $('#punkt1').change(function () {
            if ($(this).is(':checked')) {
                $('.forpunkt2').css({
                    'display': 'none'
                })
            }

        })
        function get_enable_documents(id) {
            if (id != '') {
                $.ajax({
                    url: '/get-enable_documents/' + id,
                    type: 'GET',
                    success: function (res) {
                        $('.input_requireds').each(function (i, obj) {
                            $(this).removeAttr('required');
                        });
                        var res2 = JSON.parse(res);
                        $.each(res2, function (key, value) {
                            $('.en_' + value.column).removeClass('hidden_document');
                            $('.en_' + value.column + ' h2 span').remove();
                            var el_content = $('.en_' + value.column + ' h2').html();
                            if (value.type_input == 'required') {
                                el_content = ' <span class="text-danger">*</span> ' + el_content;
                                $('.en_' + value.column + ' input').attr('required', 'true');

                            }
                            var el_content = $('.en_' + value.column + ' h2').html(el_content);

                        })
                    }
                })
            }
        }

        $('#high_school').change(function () {
            $('.document_input').addClass('hidden_document');
            var id = $(this).val();
            if(id == 3 || id == 4 || id ==5){

            }
            else{
                $('.conversation_language_div').css({
                    'display':'none'
                })
            }
            get_enable_documents(id)
            if (id == 3) {
                $('.punkt').css({
                    'display': 'block'
                })
            } else {
                $('.punkt').css({
                    'display': 'none'
                })
                $('.forpunkt2').css({
                    'display': 'none'
                })
            }
        })
        $(document).ready(function () {
            var id = '{{old('high_school_id')}}';
            get_enable_documents(id);
        })
        $('.clickPunkt').onclick(function () {
            var name = $(this).attr('for');
            $('#' + name).click()
        })

    </script>
@endsection
