@php
    $edit = !is_null($dataTypeContent->getKey());
    $add  = is_null($dataTypeContent->getKey());
@endphp

@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', __('voyager::generic.'.($edit ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular'))

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager::generic.'.($edit ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular') }}
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered">
                    <!-- form start -->
                    <form role="form"
                            class="form-edit-add"
                            action="{{ $edit ? route('voyager.'.$dataType->slug.'.update', $dataTypeContent->getKey()) : route('voyager.'.$dataType->slug.'.store') }}"
                            method="POST" enctype="multipart/form-data">
                        <!-- PUT Method if we are editing -->
                        @if($edit)
                            {{ method_field("PUT") }}
                        @endif

                        <!-- CSRF TOKEN -->
                        {{ csrf_field() }}

                        <div class="panel-body">

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Adding / Editing -->
                            @php
                                $dataTypeRows = $dataType->{($edit ? 'editRows' : 'addRows' )};
                            @endphp

                            @foreach($dataTypeRows as $row)
                                <!-- GET THE DISPLAY OPTIONS -->
                                @php
                                    $display_options = $row->details->display ?? NULL;
                                    if ($dataTypeContent->{$row->field.'_'.($edit ? 'edit' : 'add')}) {
                                        $dataTypeContent->{$row->field} = $dataTypeContent->{$row->field.'_'.($edit ? 'edit' : 'add')};
                                    }
                                @endphp
                                @if (isset($row->details->legend) && isset($row->details->legend->text))
                                    <legend class="text-{{ $row->details->legend->align ?? 'center' }}" style="background-color: {{ $row->details->legend->bgcolor ?? '#f0f0f0' }};padding: 5px;">{{ $row->details->legend->text }}</legend>
                                @endif

                                <div class="form-group @if($row->type == 'hidden') hidden @endif col-md-{{ $display_options->width ?? 12 }} {{ $errors->has($row->field) ? 'has-error' : '' }}" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                    {{ $row->slugify }}
                                    <label class="control-label" for="name">{{ $row->getTranslatedAttribute('display_name') }}</label>
                                    @include('voyager::multilingual.input-hidden-bread-edit-add')
                                    @if (isset($row->details->view))
                                        @include($row->details->view, ['row' => $row, 'dataType' => $dataType, 'dataTypeContent' => $dataTypeContent, 'content' => $dataTypeContent->{$row->field}, 'action' => ($edit ? 'edit' : 'add'), 'view' => ($edit ? 'edit' : 'add'), 'options' => $row->details])
                                    @elseif ($row->type == 'relationship')
                                        @include('voyager::formfields.relationship', ['options' => $row->details])
                                    @else
                                        {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                    @endif

                                    @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                        {!! $after->handle($row, $dataType, $dataTypeContent) !!}
                                    @endforeach
                                    @if ($errors->has($row->field))
                                        @foreach ($errors->get($row->field) as $error)
                                            <span class="help-block">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            @endforeach
                            @if($edit)
                                <div class="form-group col-md-12" id='specificationsBlock'>
                                    <div class="alert alert-danger" role="alert" id='specificationErrorBlock' hidden>
                                          Технические характеристики товара не заполнены!
                                    </div>
                                    <label class="control-label">Технические характеристики</label>
                                    <button type="button" class="btn btn-success" onclick='addNewSpecificationBlock()'>+</button>
                                        @foreach($productSpecifications as $i=>$productSpecification)
                                                <div class="row" data-row="{{$i+1}}">
                                                    <div class="form-group col-md-3">
                                                        <label class="control-label">Тип</label>
                                                        <select class="form-control specificationsList"
                                                                data-row="{{$i+1}}"
                                                                name="specifications[{{$i+1}}][id]">
                                                            @foreach($specifications as $j=>$specification)
                                                                <option
                                                                    data-iterator="{{$j}}"
                                                                    value="{{$specification->id}}"
                                                                    @if($specification->id===$productSpecification->specification_id)
                                                                    selected="selected"
                                                                    @endif
                                                                    >
                                                                    {{$specification->name}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="control-label">Значение</label>
                                                        @if(!is_null($productSpecification->textValue))
                                                            <input  class="form-control" value="{{$productSpecification->textValue->value}}"
                                                            data-row="{{$i+1}}"
                                                            name="specifications[{{$i+1}}][textValue]" />
                                                        @else
                                                            <select
                                                                class="form-control specificationsList"
                                                                data-row="{{$i+1}}"
                                                                name="specifications[{{$i+1}}][listValue]">
                                                            @foreach($productSpecification->lists as $k=>$list)
                                                                 <option
                                                                        value="{{$list->id}}"
                                                                        @if($list->id===$productSpecification->listValue['list_value_id'])
                                                                        selected="selected"
                                                                        @endif
                                                                        >
                                                                        {{$list->name}}
                                                                 </option>
                                                            @endforeach
                                                            </select>
                                                        @endif
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <button class="deleteSpecificationRowBtn btn btn-danger">-</button>
                                                    </div>
                                                </div>
                                        @endforeach
                                </div>
                            @else
                                <div class="form-group col-md-12" id='specificationsBlock'>
                                    <div class="alert alert-danger" role="alert" id='specificationErrorBlock' hidden>
                                        Технические характеристики товара не заполнены!
                                    </div>
                                    <label class="control-label">Технические характеристики</label>
                                    <button type="button" class="btn btn-success" onclick='addNewSpecificationBlock()'>+</button>
                                </div>
                            @endif
                        </div>
                        <!-- panel-body -->

                        <div class="panel-footer">
                            @section('submit-buttons')
                                <button type="submit" class="btn btn-primary save">{{ __('voyager::generic.save') }}</button>
                            @stop
                            @yield('submit-buttons')
                        </div>
                    </form>

                    <iframe id="form_target" name="form_target" style="display:none"></iframe>
                    <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"
                            enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
                        <input name="image" id="upload_file" type="file"
                                 onchange="$('#my_form').submit();this.value='';">
                        <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
                        {{ csrf_field() }}
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-danger" id="confirm_delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager::generic.are_you_sure') }}</h4>
                </div>

                <div class="modal-body">
                    <h4>{{ __('voyager::generic.are_you_sure_delete') }} '<span class="confirm_delete_name"></span>'</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                    <button type="button" class="btn btn-danger" id="confirm_delete">{{ __('voyager::generic.delete_confirm') }}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete File Modal -->
@stop

@section('javascript')
    <script>

        //Own functions
            var specifications=@json($specifications);
            @if($edit)
                var specificationsRowNumber={{count($productSpecifications)+1}};
            @else
                var specificationsRowNumber=1;
            @endif

            function getSelectForSpecificationValue(list,rowNumber){
                let select="";
                let options="";
                    for(let i in list){
                        let value=list[i].id;
                        let name=list[i].name;
                        options+=`<option value="`+value+`">`
                                                  +name
                                                  +`</option>`;
                     }
                     select+=`<select
                                class="form-control specificationsList"
                                data-row="`+rowNumber+`"
                                name="specifications[`+rowNumber+`][listValue]">
                                `+options+`
                                </select>`
                     return select;
            }

            function getSpecificationSelect(){
                let select="";
                let options="";
                    for(let i in specifications){
                        let id=specifications[i].id;
                        let name=specifications[i].name;
                        options+=`<option value="`+id+`"
                                                     data-iterator="`+i+`">`
                                                  +name
                                                  +`</option>`;
                     }
                     select+=`<select
                                class="form-control specificationsList"
                                data-row="`+specificationsRowNumber+`"
                                name="specifications[`+specificationsRowNumber+`][id]">
                                `+options+`
                                </select>`
                     return select;
            }

            function getInputHtmlOfSpecification(specification,rowNumber){
                if(specification.list_values.length!==0){
                    return getSelectForSpecificationValue(specification.list_values,rowNumber);
                }
                return `<input type="text" class="form-control" name="specifications[`+rowNumber+`][textValue]">`;
            }
            function addNewSpecificationBlock(){
                let select=getSpecificationSelect();
                let value=getInputHtmlOfSpecification(specifications[0],specificationsRowNumber);
                let html=`
                                        <div class="row" data-row="`+specificationsRowNumber+`">
                                            <div class="form-group col-md-3">
                                                <label class="control-label">Тип</label>
                                                `+select+`
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="control-label">Значение</label>
                                                `+value+`
                                            </div>
                                            <div class="form-group col-md-3">
                                                <button class="deleteSpecificationRowBtn btn btn-danger">-</button>
                                            </div>
                                        </div>
                                        `;
                $('#specificationsBlock').append(html);
                ++specificationsRowNumber;
            }
        //Own functions


        var params = {};
        var $file;

        function deleteHandler(tag, isMulti) {
          return function() {
            $file = $(this).siblings(tag);

            params = {
                slug:   '{{ $dataType->slug }}',
                filename:  $file.data('file-name'),
                id:     $file.data('id'),
                field:  $file.parent().data('field-name'),
                multi: isMulti,
                _token: '{{ csrf_token() }}'
            }

            $('.confirm_delete_name').text(params.filename);
            $('#confirm_delete_modal').modal('show');
          };
        }

        $('document').ready(function () {
            //Own events
                $('.col-md-12').on('change','.specificationsList',function(e){
                    let row=$(this).attr('data-row');
                    let iterator=$('option:selected', this).attr('data-iterator');
                    let input=getInputHtmlOfSpecification(specifications[iterator],row);
                    $('div[data-row="'+row+'"] .form-group:eq(1) input').replaceWith(input);
                    $('div[data-row="'+row+'"] .form-group:eq(1) select').replaceWith(input);
                });

                $('#specificationsBlock').on('click','.deleteSpecificationRowBtn',function(e){
                    e.preventDefault();
                    $(this).closest('.row').remove();
                });

                $('form').submit(function(e){
                    e.preventDefault();
                    var formData = new FormData($(this)[0]);
                    $.ajax({
                        @if(strpos(url()->current(),'create')!==false)
                            url:'/admin/products',
                        @else
                            url:'/admin/products/{{$productId}}',
                        @endif
                        method:'POST',
                        data:formData,
                        contentType: false,
                        enctype: 'multipart/form-data',
                        processData: false,
                        beforeSend:function(){
                            $('#specificationErrorBlock').hide();
                        },
                        success:function(res){
                            window.location.href='/admin/products';
                        },
                        error:function(){
                            $('#specificationErrorBlock').show();
                        }
                    });
                });
            //OwnEvents

            $('.toggleswitch').bootstrapToggle();

            //Init datepicker for date fields if data-datepicker attribute defined
            //or if browser does not handle date inputs
            $('.form-group input[type=date]').each(function (idx, elt) {
                if (elt.hasAttribute('data-datepicker')) {
                    elt.type = 'text';
                    $(elt).datetimepicker($(elt).data('datepicker'));
                } else if (elt.type != 'date') {
                    elt.type = 'text';
                    $(elt).datetimepicker({
                        format: 'L',
                        extraFormats: [ 'YYYY-MM-DD' ]
                    }).datetimepicker($(elt).data('datepicker'));
                }
            });

            @if ($isModelTranslatable)
                $('.side-body').multilingual({"editing": true});
            @endif

            $('.side-body input[data-slug-origin]').each(function(i, el) {
                $(el).slugify();
            });

            $('.form-group').on('click', '.remove-multi-image', deleteHandler('img', true));
            $('.form-group').on('click', '.remove-single-image', deleteHandler('img', false));
            $('.form-group').on('click', '.remove-multi-file', deleteHandler('a', true));
            $('.form-group').on('click', '.remove-single-file', deleteHandler('a', false));

            $('#confirm_delete').on('click', function(){
                $.post('{{ route('voyager.'.$dataType->slug.'.media.remove') }}', params, function (response) {
                    if ( response
                        && response.data
                        && response.data.status
                        && response.data.status == 200 ) {

                        toastr.success(response.data.message);
                        $file.parent().fadeOut(300, function() { $(this).remove(); })
                    } else {
                        toastr.error("Error removing file.");
                    }
                });

                $('#confirm_delete_modal').modal('hide');
            });
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <style>
        .deleteSpecificationRowBtn{
            margin-top:27px !important;
        }
    </style>
@stop
