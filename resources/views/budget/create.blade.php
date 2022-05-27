<x-app-layout>
<div class="card">
    <div class="card-body">
        {!! Form::open(array('route' => 'budgets.store','method'=>'POST')) !!}



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
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create Budget</button>
        </div>
        {!! Form::close() !!}
    </div>
</div>
</x-app-layout>
<script>
    $('.datepicker-input').datepicker();

  </script>

