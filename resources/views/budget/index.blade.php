<x-app-layout>
            <div class="modal fade" id="create-new-project">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="{{route('budgets.store') }}" id="add-budget">
                            @csrf


                        <div class="modal-header">
                            <h5 class="modal-title">Create New Budget</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <i class="anticon anticon-close"></i>
                            </button>
                        </div>
                        <div class="modal-body">

                                <div class="form-group">
                                    <label for="new-project-name">Budget Title</label>
                                    <input type="text" class="form-control @error('budget_title') is-invalid @enderror" id="budget-title" name="budget_title" value="{{ old('budget_title') }}" placeholder="Please input Budget Title">
                                    @error('budget_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="new-project-name">Budget Amount</label>
                                    <input type="number" class="form-control @error('budget_amount') is-invalid @enderror" id="budget-amount" name="budget_amount" value="{{ old('budget_amount') }}" placeholder="KES 10000">
                                    @error('budget_amount')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Start On</label>
                                    <div class="input-affix m-b-10">
                                        <i class="prefix-icon anticon anticon-calendar"></i>
                                        <input type="text" name="start_date" class="form-control datepicker-input @error('start_date') is-invalid @enderror" placeholder="Pick a date">
                                        @error('start_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>End On</label>
                                    <div class="input-affix m-b-10">
                                        <i class="prefix-icon anticon anticon-calendar"></i>
                                        <input type="text" class="form-control datepicker-input @error('end_date') is-invalid @enderror" name="end_date" placeholder="Pick a date">
                                        @error('end_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Create Project</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>


    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Data Table</h6>
                    <p class="text-muted mb-3"><a class="btn btn-primary" href="{{route('budgets.create') }}">
                        <i class="anticon anticon-plus"></i>
                        <span class="m-l-5">New Budget</span>
                    </a></p>
                    <div class="table-responsive">
                           <table class="table">
                               <thead>
                                   <th>#</th>
                                   <th>Budget Title</th>
                                   <th>Budgeted Amount</th>
                                   <th>Run From</th>
                                   <th>Run To</th>
                                   <th>Action</th>
                               </thead>
                               <tbody>
                                   @foreach($budgets as $budget)
                                   <tr>
                                       <td>{{ $budget->id }}</td>
                                       <td>{{ $budget->budget_title }}</td>
                                       <td>KES {{ number_format($budget->budget_amount,2) }}</td>
                                       <td>{{ $budget->start_date }}</td>
                                       <td>{{ $budget->end_date }}</td>
                                       <td>
                                           <a href=""><i style="color:#999" data-feather="arrow-right-circle"></i></a>
                                           <a href=""><i style="color:#999" data-feather="edit"></i></a>
                                           <a href=""><i style="color:#999" data-feather="x-circle"></i></a>
                                       </td>

                                   </tr>
                                   @endforeach
                               </tbody>
                           </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <table id="dataTable" class="table" >
        <thead>
            <tr>
                <th>Id</th>
                <th>Budget Title</th>
                <th>BudgetAmount</th>
                <th>Start Date</th>
                <th>End date</th>
                <th>Action</th>
            </tr>
        </thead>

    </table>
    <script>
        $(document).ready(function() {
            $.fn.dataTable.render.moment = function ( from, to, locale ) {
                // Argument shifting
                if ( arguments.length === 1 ) {
                    locale = 'en';
                    to = from;
                    from = 'YYYY-MM-DD';
                }
                else if ( arguments.length === 2 ) {
                    locale = 'en';
                }

                return function ( d, type, row ) {
                    if (! d) {
                        return type === 'sort' || type === 'type' ? 0 : d;
                    }

                    var m = window.moment( d, from, locale, true );

                    // Order and type get a number value from Moment, everything else
                    // sees the rendered value
                    return m.format( type === 'sort' || type === 'type' ? 'x' : to );
                };
            };
            $('#dataTable').DataTable( {
                processing: true,
                ajax: {url:"{{url('allbudgets')}}", dataSrc: ""},

                columns: [
                    { data: "id" },
                    { data: "budget_title" },
                    { data: "budget_amount",
                      render: $.fn.dataTable.render.number( ',', '.', 2, 'KES ' )
                     },
                    { data: "start_date",
                      render: $.fn.dataTable.render.moment( 'D/M/YYYY' )
                    },
                    { data: "end_date",
                    render: $.fn.dataTable.render.moment( 'D/M/YYYY' )
                    },

                    {
                        data:null,
                        defaultContent: '<i style="font-size:24px; color:#999" class="fa-regular fa-pen-to-square"></i>',
                        className: 'row-edit dt-center',
                        orderable: false
                    },

                ]
            } );
        } );
    </script>
</x-app-layout>




