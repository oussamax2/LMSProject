
<div class="container-fluid">
    <h3>@lang('front.registrations Requests')</h3>
<table class="table responsive-table tableanalytic-lms">
  <thead class="thead-light">
    <tr class="trback">
    @if(auth()->user()->hasRole('admin'))
      <th scope="col"><span class="icon icon-people"></span>@lang('front.Picture')</th>
      <th scope="col">@lang('front.Company')</th>
    @endif
      <th scope="col">@lang('front.User')</th>
      <th scope="col">@lang('front.Course Title')</th>
      <th scope="col">@lang('front.Country')</th>
      <th scope="col">@lang('front.Register date')</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach($rgstrdUsers as $rgstrdUsers)

      <tr class="trback">
        @if(auth()->user()->hasRole('admin'))
          @if(isset($rgstrdUsers->sessions->courses->companies['picture']) && $rgstrdUsers->sessions->courses->companies['picture'] != NULL)
            <!-- Picture Field -->
            <td scope="row" data-th="@lang('front.Picture')">
              <img style="width: 60px;height: 60px;" src="{{ asset("storage/".$rgstrdUsers->sessions->courses->companies['picture']) }}" alt="">
            </td>
          @else

            <!-- Picture Field -->
            <td scope="row" data-th="@lang('front.Picture')">
                    <img src="{{ asset("images/defaultuser.png") }}" />

            </td>

          @endif

        <td data-th="@lang('front.company')">
            <div class="titleuser">{{$rgstrdUsers->sessions->courses->companies->user['name']}}</div>

        </td>
        @endif
        <td data-th="@lang('front.User')">
            <div class="titleuser">{{$rgstrdUsers->user['name']}}</div>
            <div class="small text-muted">
                @lang('front.Registered:') {{Carbon\Carbon::parse($rgstrdUsers->user['created_at'])->isoFormat(' Do MMMM  YYYY ')}}
            </div>
        </td>

        <td data-th="@lang('front.User')">
          <div class="titleuser">{{$rgstrdUsers->sessions->courses['title']}}</div>
        </td>

        <td data-th="@lang('front.Country')">
          <div class="titleuser">{{$rgstrdUsers->sessions->countries['name']}}</div>
        </td>
        <td data-th="@lang('front.Activity')">
            {{Carbon\Carbon::parse($rgstrdUsers->created_at)->isoFormat(' Do MMMM  YYYY ')}}
            <strong></strong>
        </td>
       <td>
          <a href="{{route('registerations.show', $rgstrdUsers->id)}}" class="btn btn-ghost-success">
          <span class="icon icon-eye">

          </span>
       </a>
        </td>

      </tr>

  @endforeach


  </tbody>
</table>
</div>
